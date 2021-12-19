<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 00:58
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client;

use PatryQHyper\Pterodactyl\Client\Managers\AccountManager;
use PatryQHyper\Pterodactyl\Client\Managers\ServerManager;
use PatryQHyper\Pterodactyl\Pterodactyl;

class Client
{
    /**
     * Pterodactyl's instance.
     *
     * @var Pterodactyl
     */
    public Pterodactyl $pterodactyl;

    public AccountManager $account;
    public ServerManager $server;

    /**
     * Create Client instance.
     */
    public function __construct(Pterodactyl $pterodactyl)
    {
        $this->pterodactyl = $pterodactyl;

        $this->account = new AccountManager($this->pterodactyl);
        $this->server = new ServerManager($this->pterodactyl);
    }

    public function servers()
    {
        return $this->pterodactyl->httpClient->get('');
    }

    public function permissions()
    {
        return $this->pterodactyl->httpClient->get('permissions');
    }
}