<?php

namespace App\Mail\Subscription\Admin;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CancelledSubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * @var string
     */
    public $reason;
    public $custom;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $reason = null, string $custom = null)
    {
        $this->user = $user;
        $this->reason = $reason;
        $this->custom = $custom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(['address' => 'hello@kanka.io', 'name' => 'Kanka Team'])
            ->subject('Subscription: Cancelled ' . $this->user->pledge)
            ->view('emails.subscriptions.cancelled.html');
    }
}
