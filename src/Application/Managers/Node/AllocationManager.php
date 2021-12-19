<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 18.12.2021 18:24
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Application\Managers\Node;

use PatryQHyper\Pterodactyl\BaseManager;

class AllocationManager extends BaseManager
{
    public function paginate(int $nodeId, int $page = 1)
    {
        return $this->httpClient->get('nodes/' . $nodeId . '/allocations', compact('page'));
    }

    public function create(int $nodeId, array $data = [])
    {
        return $this->httpClient->post('nodes/' . $nodeId . '/allocations', $data);
    }

    public function delete(int $nodeId, int $allocationId)
    {
        return $this->httpClient->delete('nodes/' . $nodeId . '/allocations/' . $allocationId);
    }
}