<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 18.12.2021 18:00
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Application\Managers;

use PatryQHyper\Pterodactyl\Application\Managers\Node\AllocationManager;
use PatryQHyper\Pterodactyl\BaseManager;
use PatryQHyper\Pterodactyl\Pterodactyl;

class NodeManager extends BaseManager
{
    public AllocationManager $allocations;

    public function __construct(Pterodactyl $pterodactyl)
    {
        parent::__construct($pterodactyl);

        $this->allocations = new AllocationManager($pterodactyl);
    }

    public function paginate(int $page = 1)
    {
        return $this->httpClient->get('nodes', compact('page'));
    }

    public function details(int $nodeId)
    {
        return $this->httpClient->get('nodes/' . $nodeId);
    }

    public function configuration(int $nodeId)
    {
        return $this->httpClient->get('nodes/' . $nodeId . '/configuration');
    }

    public function create(array $data = [])
    {
        return $this->httpClient->post('nodes', $data);
    }

    public function update(int $nodeId, array $data = [])
    {
        return $this->httpClient->patch('nodes/' . $nodeId, $data);
    }

    public function delete(int $nodeId)
    {
        return $this->httpClient->delete('nodes/' . $nodeId);
    }
}