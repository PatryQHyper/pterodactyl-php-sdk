<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 00:33
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Application\Managers;

use PatryQHyper\Pterodactyl\Application\Managers\Nest\EggManager;
use PatryQHyper\Pterodactyl\BaseManager;
use PatryQHyper\Pterodactyl\Pterodactyl;

class NestManager extends BaseManager
{
    public EggManager $eggs;

    public function __construct(Pterodactyl $pterodactyl)
    {
        parent::__construct($pterodactyl);

        $this->eggs = new EggManager($pterodactyl);
    }

    public function paginate(int $page = 1)
    {
        return $this->httpClient->get('nests');
    }

    public function details(int $nestId)
    {
        return $this->httpClient->get('nests/' . $nestId);
    }
}