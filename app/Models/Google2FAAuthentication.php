<?php

namespace App\Models;

use PragmaRX\Google2FALaravel\Support\Authenticator;

class Google2FAAuthentication extends Authenticator
{
  // If User does not have Google2FA Setup yet
    protected function canPassWithoutCheckingOTP()
    {
        if (!isset($this->getUser()->PasswordSecurity)) {
            return true;
        }
        return !$this->getUser()->PasswordSecurity->google2fa_enable || !$this->isEnabled() || $this->noUserIsAuthenticated() || $this->twoFactorAuthStillValid();
    }

    protected function getGoogle2FaSecretkey()
    {
        // Get User secret column
        try {
            $secret = $this->getUser()->PasswordSecurity->{$this->config('otp_secret_column')};
        } catch (\Exception $e) {
            // If User has not set up Google2FA
            $secret = $this->getUser()->PasswordSecurity;
        }

    // If User is not Authenticated through 2FA
        if (is_null($secret) || empty($secret)) {
            // return Action
            return redirect()->action('PasswordSecurityController@generate2faSecretCode');
        }
            // If user has Google2FA setup and is Authenticated
        return $secret;
    }

}
