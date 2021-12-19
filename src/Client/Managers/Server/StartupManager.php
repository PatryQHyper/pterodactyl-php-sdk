<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 02:48
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client\Managers\Server;

use PatryQHyper\Pterodactyl\BaseManager;

class StartupManager extends BaseManager
{
    public function list(string $serverIdentifier)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/startup');
    }

    public function updateVariable(string $serverIdentifier, array $data = [])
    {
        return $this->httpClient->put('servers/' . $serverIdentifier . '/startup/variable', $data);
    }
}