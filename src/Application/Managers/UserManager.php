<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 18.12.2021 15:39
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Application\Managers;

use PatryQHyper\Pterodactyl\BaseManager;

class UserManager extends BaseManager
{
    public function paginate(int $page = 1)
    {
        return $this->httpClient->get('users', compact('page'));
    }

    public function find(int $id)
    {
        return $this->httpClient->get('users/' . $id);
    }

    public function findByExternal($externalId)
    {
        return $this->httpClient->get('users/external/' . $externalId);
    }

    public function create(array $data = [])
    {
        return $this->httpClient->post('users', $data);
    }

    public function update(int $userId, array $data = [])
    {
        return $this->httpClient->patch('users/' . $userId, $data);
    }

    public function delete(int $userId)
    {
        return $this->httpClient->delete('users/' . $userId);
    }
}