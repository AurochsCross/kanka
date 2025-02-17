@extends('layouts.login', ['title' => __('auth.login.title')])

@section('content')
    <h1>{{ __('auth.login.title') }}</h1>

    @if (session()->has('info'))
        <div class="alert alert-info alert-dismissable">
            {{ session()->get('info') }}
        </div>
    @endif
    @include('partials.success')

    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <ul>
            @if(config('auth.user_list'))
                @foreach (\App\User::limit(5)->orderBy('last_login_at', 'desc')->get() as $user)
                    <li>
                        <a href="{{ route('login-as-user', ['user' => $user]) }}">{!! $user->name !!}</a>
                    </li>
                @endforeach
            @endif
        </ul>
        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
            @if(config('auth.user_list'))
                <select id="email" name="email" class="form-control">
                    @foreach (\App\User::limit(30)->get() as $user)
                        <option value="{{ $user->email}}">{!! $user->name !!}</option>
                    @endforeach
                </select>
            @else
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ __('auth.login.fields.email') }}" required autofocus>
            @endif
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="input-group">
                <input id="password" type="password" class="form-control" name="password" required placeholder="{{ __('auth.login.fields.password') }}">
                <a href="#" class="toggle-password input-group-addon" title="{{ __('auth.helpers.password') }}">
                    <i class="toggle-password-icon fa-solid fa-eye"></i>
                </a>
            </div>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="minimal" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        {{ __('auth.login.remember_me') }}
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn pull-right btn-primary">
                    {{ __('auth.login.submit') }}
                </button>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">

            </div>
        </div>
    </form>

@if(config('auth.register_enabled'))
    <div class="row">
        <div class="col-md-12">
            <div class="social-auth-links text-center">
                <p>- {{ __('auth.login.or') }} -</p>

                @if(config('services.facebook.client_id'))
                <a href="{{ route('auth.provider', ['provider' => 'facebook']) }}" class="btn btn-app btn-facebook" title="{{ __('auth.login.login_with_facebook') }}">
                    <i class="fab fa-facebook-f"></i>
                    Facebook
                </a>
                @endif

                @if(config('services.google.client_id'))
                <a href="{{ route('auth.provider', ['provider' => 'google']) }}" class="btn btn-app btn-google" title="{{ __('auth.login.login_with_google') }}">
                    <i class="fab fa-google"></i>
                    Google
                </a>
                @endif

                @if(config('services.twitter.client_id'))
                <a href="{{ route('auth.provider', ['provider' => 'twitter']) }}" class="btn btn-app btn-twitter" title="{{ __('auth.login.login_with_twitter') }}">
                    <i class="fab fa-twitter"></i>
                    Twitter
                </a>
                @endif
            </div>
        </div>
    </div>
@endif
    <div class="row">
        <div class="hidden-xs hidden-sm">
            <div class="col-md-6">
                <a class="" href="{{ route('password.request') }}">
                    {{ __('auth.login.password_forgotten') }}
                </a>
            </div>@if(config('auth.register_enabled'))
            <div class="col-md-6 text-right">
                <a class="" href="{{ route('register') }}">
                    {{ __('auth.login.new_account') }}
                </a>
            </div>@endif
        </div>
        <div class="visible-xs visible-sm">

            <div class="col-md-12 text-center">
                <a class="" href="{{ route('password.request') }}">
                    {{ __('auth.login.password_forgotten') }}
                </a>
            </div>@if(config('auth.register_enabled'))
            <div class="col-md-12 text-center">
                <a class="" href="{{ route('register') }}">
                    {{ __('auth.login.new_account') }}
                </a>
            </div>@endif
        </div>
    </div>
@endsection
