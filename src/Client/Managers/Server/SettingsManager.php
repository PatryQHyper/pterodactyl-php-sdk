<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 02:48
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client\Managers\Server;

use PatryQHyper\Pterodactyl\BaseManager;

class SettingsManager extends BaseManager
{
    public function rename(string $serverIdentifier, string $name)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/rename', compact('name'));
    }

    public function reinstall(string $serverIdentifier)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/reinstall');
    }
}