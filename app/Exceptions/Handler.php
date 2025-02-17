<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException as SymHttpException;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        \League\OAuth2\Server\Exception\OAuthServerException::class,
        \Symfony\Component\Console\Exception\NamespaceNotFoundException::class,
        \Symfony\Component\Console\Exception\CommandNotFoundException::class,
        \Symfony\Component\Mailer\Exception\HttpTransportException::class,
        NotFoundHttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        if (app()->bound('sentry') && $this->shouldReport($exception)) {
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param Throwable $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors(__('redirects.session_timeout'));
        } elseif ($exception instanceof AuthorizationException && auth()->guest()) {
            // User needs to be logged in, remember the page they visited
            session()->put('login_redirect', $request->getRequestUri());
        } elseif ($exception instanceof SymHttpException && $exception->getStatusCode() == 503) {
            if (request()->ajax()) {
                return response()->json([
                    'title' => __('errors.503.title'),
                    'message' => __('errors.503.json'),
                ], 503);
            }
            return response()->view('errors.maintenance', [
                'message' => $exception->getMessage(),
                //'retry' => $exception->retryAfter
            ], 200);
        } elseif ($request->is('api/*')) {
            // API error handling
            return $this->handleApiErrors($exception);
        }

        return parent::render($request, $exception);
    }

    /**
     * Unauthenticated exception handler
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->is('api/*')
            ? response()->json([
                'message' => 'Unauthenticated (missing the authorization token in the request headers, or the token is invalid).',
                'documentation' => 'https://kanka.io/api-docs/1.0/setup#authentication'
            ], 401)
            : redirect()->guest(route('login'));
    }

    /**
     * Handle all errors that happen in the API
     * @param Throwable $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function handleApiErrors(Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()
                ->json([
                    'code' => 404,
                    'error' => $exception->getMessage(),
                ], 404);
        } elseif ($exception instanceof MethodNotAllowedHttpException) {
            return response()
                ->json([
                    'code' => 405,
                    'error' => $exception->getMessage()
                ], 405);
        } elseif ($exception instanceof ValidationException) {
            return response()
                ->json([
                    'code' => $exception->status,
                    'error' => $exception->getMessage(),
                    'fields' => $exception->errors()
                ], $exception->status);
        } elseif ($exception instanceof AuthorizationException) {
            return response()
                ->json([
                    'code' => 403,
                    'error' => $exception->getMessage()
                ], 403);
        } elseif ($exception instanceof NotFoundHttpException) {
            return response()
                ->json(['error' => 'Page not found'], 404);
        } elseif ($exception instanceof ThrottleRequestsException) {
            return response()
                ->json(['Too many requests. Limit requests to ' . auth()->user()->rateLimit
                    . ' per minute or subscribe to unlock higher limits.'], 429);
        }
        return response()
            ->json([
                'code' => 500,
                'error' => 'Unhandled API error. Contact us on Discord',
                'hint' => Str::limit($exception->getMessage(), 100)
            ], 500);
    }
}
