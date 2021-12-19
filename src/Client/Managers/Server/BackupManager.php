<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 02:46
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client\Managers\Server;

use PatryQHyper\Pterodactyl\BaseManager;

class BackupManager extends BaseManager
{
    public function paginate(string $serverIdentifier, int $page = 1)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/backups', compact('page'));
    }

    public function create(string $serverIdentifier, array $data = [])
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/backups', $data);
    }

    public function details(string $serverIdentifier, string $backupUuid)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/backups/' . $backupUuid);
    }

    public function download(string $serverIdentifier, string $backupUuid)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/backups/' . $backupUuid . '/download');
    }

    public function delete(string $serverIdentifier, string $backupUuid)
    {
        return $this->httpClient->delete('servers/' . $serverIdentifier . '/backups/' . $backupUuid);
    }
}