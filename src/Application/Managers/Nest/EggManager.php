<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 00:35
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Application\Managers\Nest;

use PatryQHyper\Pterodactyl\BaseManager;

class EggManager extends BaseManager
{
    public function get(int $nestId, string $includeParameters = 'nest,servers,config,script,variables')
    {
        return $this->httpClient->get('nests/' . $nestId . '/eggs', ['include' => $includeParameters]);
    }

    public function details(int $nestId, int $eggId, string $includeParameters = 'nest,servers,config,script,variables')
    {
        return $this->httpClient->get('nests/' . $nestId . '/eggs/' . $eggId, ['include' => $includeParameters]);
    }
}