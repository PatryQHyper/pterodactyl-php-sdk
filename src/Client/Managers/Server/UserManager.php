<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 02:41
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client\Managers\Server;

use PatryQHyper\Pterodactyl\BaseManager;

class UserManager extends BaseManager
{
    public function list(string $serverIdentifier)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/users');
    }

    public function create(string $serverIdentifier, array $data = [])
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/users', $data);
    }

    public function details(string $serverIdentifier, string $subUserUuid)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/users/' . $subUserUuid);
    }

    public function update(string $serverIdentifier, string $subUserUuid, array $data = [])
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/users/' . $subUserUuid, $data);
    }

    public function delete(string $serverIdentifier, string $subUserUuid)
    {
        return $this->httpClient->delete('servers/' . $serverIdentifier . '/users/' . $subUserUuid);
    }
}