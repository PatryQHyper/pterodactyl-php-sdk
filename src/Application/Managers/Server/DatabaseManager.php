<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 00:28
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Application\Managers\Server;

use PatryQHyper\Pterodactyl\BaseManager;

class DatabaseManager extends BaseManager
{
    public function get(int $serverId)
    {
        return $this->httpClient->get('servers/' . $serverId . '/databases');
    }

    public function getWithPasswordAndHost(int $serverId)
    {
        return $this->httpClient->get('servers/' . $serverId . '/databases', ['include' => 'password,host']);
    }

    public function details(int $serverId, int $databaseId)
    {
        return $this->httpClient->get('servers/' . $serverId . '/databases/' . $databaseId);
    }

    public function create(int $serverId, array $data = [])
    {
        return $this->httpClient->post('servers/' . $serverId . '/databases', $data);
    }

    public function resetPassword(int $serverId, int $databaseId)
    {
        return $this->httpClient->post('servers/' . $serverId . '/databases/' . $databaseId . '/reset-password');
    }

    public function delete(int $serverId, int $databaseId)
    {
        return $this->httpClient->delete('servers/' . $serverId . '/databases/' . $databaseId);
    }
}