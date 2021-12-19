<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 18.12.2021 14:09
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl;

class BaseManager
{
    /**
     * Pterodactyl's instance.
     *
     * @var Pterodactyl
     */
    protected Pterodactyl $pterodactyl;

    /**
     * HTTP Client's instance.
     *
     * @var HttpClient
     */
    protected HttpClient $httpClient;

    public function __construct(Pterodactyl $pterodactyl)
    {
        $this->pterodactyl = $pterodactyl;
        $this->httpClient = $this->pterodactyl->httpClient;
    }
}