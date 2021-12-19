<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 02:28
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client\Managers\Server;

use PatryQHyper\Pterodactyl\BaseManager;

class AllocationManager extends BaseManager
{
    public function list(string $serverIdentifier)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/network/allocations');
    }

    public function assign(string $serverIdentifier)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/network/allocations');
    }

    public function setNote(string $serverIdentifier, int $allocationId, string $notes)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/network/allocations/' . $allocationId, compact('notes'));
    }

    public function setPrimary(string $serverIdentifier, int $allocationId)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/network/allocations/' . $allocationId . '/primary');
    }

    public function unassign(string $serverIdentifier, int $allocationId)
    {
        return $this->httpClient->delete('servers/' . $serverIdentifier . '/network/allocations/' . $allocationId);
    }
}