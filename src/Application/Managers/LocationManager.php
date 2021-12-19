<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 00:18
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Application\Managers;

use PatryQHyper\Pterodactyl\BaseManager;

class LocationManager extends BaseManager
{
    public function paginate(int $page = 1)
    {
        return $this->httpClient->get('locations', compact('page'));
    }

    public function details(int $locationId)
    {
        return $this->httpClient->get('locations/' . $locationId);
    }

    public function create(array $data = [])
    {
        return $this->httpClient->post('locations', $data);
    }

    public function update(int $locationId, array $data = [])
    {
        return $this->httpClient->patch('locations/' . $locationId, $data);
    }

    public function delete(int $locationId)
    {
        return $this->httpClient->delete('locations/' . $locationId);
    }
}