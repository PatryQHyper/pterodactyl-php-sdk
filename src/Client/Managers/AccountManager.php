<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 00:59
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client\Managers;

use PatryQHyper\Pterodactyl\BaseManager;

class AccountManager extends BaseManager
{
    public function details()
    {
        return $this->httpClient->get('account');
    }

    public function twoFactorDetails()
    {
        return $this->httpClient->get('account/two-factor');
    }

    public function enableTwoFactor(string $code)
    {
        return $this->httpClient->post('account/two-factor', compact('code'));
    }

    public function disableTwoFactor(string $password)
    {
        return $this->httpClient->delete('account/two-factor', compact('password'));
    }

    public function updateEmail(string $email, string $password)
    {
        return $this->httpClient->put('account/email', compact('email', 'password'));
    }

    public function updatePassword(string $current_password, string $password, string $password_confirmation)
    {
        return $this->httpClient->put('account/password', compact('current_password', 'password', 'password_confirmation'));
    }

    public function listApiKeys()
    {
        return $this->httpClient->get('account/api-keys');
    }

    public function createApiKey(array $data = [])
    {
        return $this->httpClient->post('account/api-keys', $data);
    }

    public function deleteApiKey(string $identifier)
    {
        return $this->httpClient->delete('account/api-keys/' . $identifier);
    }
}