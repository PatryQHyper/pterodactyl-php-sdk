<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 00:22
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Application\Managers;

use PatryQHyper\Pterodactyl\Application\Managers\Server\DatabaseManager;
use PatryQHyper\Pterodactyl\BaseManager;
use PatryQHyper\Pterodactyl\Pterodactyl;

class ServerManager extends BaseManager
{
    public DatabaseManager $databases;

    public function __construct(Pterodactyl $pterodactyl)
    {
        parent::__construct($pterodactyl);

        $this->databases = new DatabaseManager($pterodactyl);
    }

    public function paginate(int $page = 1)
    {
        return $this->httpClient->get('servers', compact('page'));
    }

    public function details(int $serverId)
    {
        return $this->httpClient->get('servers/' . $serverId);
    }

    public function detailsFromExternalId($externalId)
    {
        return $this->httpClient->get('servers/external/' . $externalId);
    }

    public function updateDetails(int $serverId, array $data = [])
    {
        return $this->httpClient->patch('servers/' . $serverId . '/details', $data);
    }

    public function updateBuild(int $serverId, array $data = [])
    {
        return $this->httpClient->patch('servers/' . $serverId . '/build', $data);
    }

    public function updateStartup(int $serverId, array $data = [])
    {
        return $this->httpClient->patch('servers/' . $serverId . '/startup', $data);
    }

    public function create(array $data = [])
    {
        return $this->httpClient->post('servers', $data);
    }

    public function suspend(int $serverId)
    {
        return $this->httpClient->post('servers/' . $serverId . '/suspend');
    }

    public function unsuspend(int $serverId)
    {
        return $this->httpClient->post('servers/' . $serverId . '/unsuspend');
    }

    public function reinstall(int $serverId)
    {
        return $this->httpClient->post('servers/' . $serverId . '/reinstall');
    }

    public function delete(int $serverId)
    {
        return $this->httpClient->delete('servers/' . $serverId);
    }

    public function forceDelete(int $serverId)
    {
        return $this->httpClient->delete('servers/' . $serverId . '/force');
    }
}