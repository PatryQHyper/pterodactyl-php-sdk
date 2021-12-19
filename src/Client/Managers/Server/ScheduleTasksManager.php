<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 02:23
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client\Managers\Server;

use PatryQHyper\Pterodactyl\BaseManager;

class ScheduleTasksManager extends BaseManager
{
    public function create(string $serverIdentifier, int $scheduleId, array $data = [])
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/schedules/' . $scheduleId . '/tasks', $data);
    }

    public function update(string $serverIdentifier, int $scheduleId, int $taskId, array $data = [])
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/schedules/' . $scheduleId . '/tasks/' . $taskId, $data);
    }

    public function delete(string $serverIdentifier, int $scheduleId, int $taskId)
    {
        return $this->httpClient->delete('servers/' . $serverIdentifier . '/schedules/' . $scheduleId . '/tasks/' . $taskId);
    }
}