<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 18.12.2021 13:58
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Application;

use PatryQHyper\Pterodactyl\Application\Managers\LocationManager;
use PatryQHyper\Pterodactyl\Application\Managers\NestManager;
use PatryQHyper\Pterodactyl\Application\Managers\NodeManager;
use PatryQHyper\Pterodactyl\Application\Managers\ServerManager;
use PatryQHyper\Pterodactyl\Application\Managers\UserManager;
use PatryQHyper\Pterodactyl\Pterodactyl;

class Application
{
    /**
     * Pterodactyl's instance.
     *
     * @var Pterodactyl
     */
    public Pterodactyl $pterodactyl;

    public UserManager $users;
    public NodeManager $nodes;
    public LocationManager $locations;
    public ServerManager $servers;
    public NestManager $nests;

    /**
     * Create Application instance.
     */
    public function __construct(Pterodactyl $pterodactyl)
    {
        $this->pterodactyl = $pterodactyl;

        $this->users = new UserManager($this->pterodactyl);
        $this->nodes = new NodeManager($this->pterodactyl);
        $this->locations = new LocationManager($this->pterodactyl);
        $this->servers = new ServerManager($this->pterodactyl);
        $this->nests = new NestManager($this->pterodactyl);
    }
}