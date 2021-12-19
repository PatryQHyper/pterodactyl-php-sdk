<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 18.12.2021 13:02
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl;

use PatryQHyper\Pterodactyl\Application\Application;
use PatryQHyper\Pterodactyl\Client\Client;
use PatryQHyper\Pterodactyl\Exceptions\InvalidApiTypeException;

class Pterodactyl
{
    /**
     * Pterodactyl's API key.
     *
     * @var string
     */
    public string $apiKey;

    /**
     * Pterodactyl's base uri
     *
     * @var string
     */
    public string $baseUri;

    /**
     * API type for API key.
     *
     * @var string
     */
    public string $apiType;

    /**
     * Instance of HttpClient.
     *
     * @var HttpClient
     */
    public HttpClient $httpClient;

    /**
     * Instance of application API type.
     *
     * @var Application
     */
    public Application $application;

    /**
     * Instance of Client instance.
     *
     * @var Client
     */
    public Client $client;

    /**
     * Create a new Pterodactyl instance.
     *
     * @param string $baseUri
     * @param string $apiKey
     * @param string $apiType
     * @throws InvalidApiTypeException
     */
    public function __construct(string $baseUri, string $apiKey, string $apiType = 'application')
    {
        $this->baseUri = $baseUri;
        $this->apiKey = $apiKey;

        if (!in_array($apiType, ['application', 'client']))
            throw new InvalidApiTypeException();
        $this->apiType = $apiType;

        $this->httpClient = new HttpClient($this);

        $this->application = new Application($this);
        $this->client = new Client($this);
    }
}