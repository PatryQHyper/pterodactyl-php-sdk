<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 01:09
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client\Managers\Server;

use PatryQHyper\Pterodactyl\BaseManager;

class DatabaseManager extends BaseManager
{
    public function list(string $serverIdentifier, bool $includePassword = false)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/databases', ($includePassword ? ['include' => 'password'] : []));
    }

    public function create(string $serverIdentifier, array $data = [])
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/databases', $data);
    }

    public function rotatePassword(string $serverIdentifier, string $databaseId)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/databases/' . $databaseId);
    }

    public function delete(string $serverIdentifier, string $databaseId)
    {
        return $this->httpClient->delete('servers/' . $serverIdentifier . '/databases/' . $databaseId);
    }
}