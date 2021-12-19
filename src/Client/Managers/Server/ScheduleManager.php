<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 02:12
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client\Managers\Server;

use PatryQHyper\Pterodactyl\BaseManager;
use PatryQHyper\Pterodactyl\Pterodactyl;

class ScheduleManager extends BaseManager
{
    public ScheduleTasksManager $tasks;

    public function __construct(Pterodactyl $pterodactyl)
    {
        parent::__construct($pterodactyl);

        $this->tasks = new ScheduleTasksManager($pterodactyl);
    }

    public function list(string $serverIdentifier)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/schedules');
    }

    public function create(string $serverIdentifier, array $data = [])
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/schedules', $data);
    }

    public function details(string $serverIdentifier, int $scheduleId)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/schedules/' . $scheduleId);
    }

    public function update(string $serverIdentifier, int $scheduleId, array $data = [])
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/schedules/' . $scheduleId, $data);
    }

    public function delete(string $serverIdentifier, int $scheduleId)
    {
        return $this->httpClient->delete('servers/' . $serverIdentifier . '/schedules/' . $scheduleId);
    }
}