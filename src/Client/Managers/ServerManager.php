<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 01:05
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client\Managers;

use PatryQHyper\Pterodactyl\BaseManager;
use PatryQHyper\Pterodactyl\Client\Managers\Server\AllocationManager;
use PatryQHyper\Pterodactyl\Client\Managers\Server\BackupManager;
use PatryQHyper\Pterodactyl\Client\Managers\Server\DatabaseManager;
use PatryQHyper\Pterodactyl\Client\Managers\Server\FileManager;
use PatryQHyper\Pterodactyl\Client\Managers\Server\ScheduleManager;
use PatryQHyper\Pterodactyl\Client\Managers\Server\SettingsManager;
use PatryQHyper\Pterodactyl\Client\Managers\Server\StartupManager;
use PatryQHyper\Pterodactyl\Client\Managers\Server\UserManager;
use PatryQHyper\Pterodactyl\Pterodactyl;

class ServerManager extends BaseManager
{
    public DatabaseManager $databases;
    public FileManager $files;
    public ScheduleManager $schedules;
    public AllocationManager $allocations;
    public UserManager $users;
    public BackupManager $backups;
    public StartupManager $startup;
    public SettingsManager $settings;

    public function __construct(Pterodactyl $pterodactyl)
    {
        parent::__construct($pterodactyl);

        $this->databases = new DatabaseManager($pterodactyl);
        $this->files = new FileManager($pterodactyl);
        $this->schedules = new ScheduleManager($pterodactyl);
        $this->allocations = new AllocationManager($pterodactyl);
        $this->users = new UserManager($pterodactyl);
        $this->backups = new BackupManager($pterodactyl);
        $this->startup = new StartupManager($pterodactyl);
        $this->settings = new SettingsManager($pterodactyl);
    }

    public function details(string $serverIdentifier)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier);
    }

    public function console(string $serverIdentifier)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/websocket');
    }

    public function resourceUsage(string $serverIdentifier)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/resources');
    }

    public function sendCommand(string $serverIdentifier, string $command)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/command', compact('command'));
    }

    public function power(string $serverIdentifier, string $signal)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/power', compact('signal'));
    }
}