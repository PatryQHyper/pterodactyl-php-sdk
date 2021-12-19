<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 18.12.2021 13:08
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use PatryQHyper\Pterodactyl\Exceptions\BadRequestException;
use PatryQHyper\Pterodactyl\Exceptions\ForbiddenException;
use PatryQHyper\Pterodactyl\Exceptions\NotFoundHttpException;
use PatryQHyper\Pterodactyl\Exceptions\RateLimitException;
use PatryQHyper\Pterodactyl\Exceptions\RequestException;
use PatryQHyper\Pterodactyl\Exceptions\UnauthorizedException;
use PatryQHyper\Pterodactyl\Exceptions\ValidationException;
use Psr\Http\Message\ResponseInterface;

class HttpClient
{
    /**
     * Pterodactyl's instance.
     *
     * @var Pterodactyl
     */
    protected Pterodactyl $pterodactyl;

    /**
     * GuzzleHTTP's client instance.
     *
     * @var Client
     */
    protected Client $client;

    /**
     * Create Guzzle instance.
     *
     * @param Pterodactyl $pterodactyl
     */
    public function __construct(Pterodactyl $pterodactyl)
    {
        $this->pterodactyl = $pterodactyl;
        $this->client = new Client([
            'base_uri' => sprintf('%s/api/%s/', $this->pterodactyl->baseUri, $this->pterodactyl->apiType),
            'http_errors' => false,
            'headers' => [
                'Accept' => 'Application/vnd.pterodactyl.v1+json',
                'Authorization' => 'Bearer ' . $this->pterodactyl->apiKey
            ],
            'debug' => false
        ]);

        return $this;
    }

    /**
     * Make request and return it.
     *
     * @param string $uri
     * @param string $method
     * @param array $query
     * @param array $payload
     *
     * @return mixed
     *
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ForbiddenException
     * @throws NotFoundHttpException
     * @throws ValidationException
     * @throws RateLimitException
     * @throws RequestException
     * @throws BadRequestException
     *
     */
    public function request(string $uri, string $method = 'GET', array $payload = [], array $query = [], bool $sendPlain = false)
    {
        $guzzleConfig['query'] = $query;
        if ($sendPlain) {
            $guzzleConfig['body'] = $payload['plain'];
            $guzzleConfig['headers']['Content-type'] = 'text/plain';
        } else {
            $guzzleConfig['json'] = $payload;
            $guzzleConfig['headers']['Content-type'] = 'application/json';
        }

        $response = $this->client->request(strtoupper($method), $uri, $guzzleConfig);

        if (!in_array($response->getStatusCode(), [200, 201, 202, 204]))
            return $this->handleBadStatusCode($response);

        if ($response->getStatusCode() == 204)
            return true;

        return @json_decode($response->getBody()) ?? $response->getBody();
    }

    /**
     * @param ResponseInterface $response
     *
     * @return void
     *
     * @throws ForbiddenException
     * @throws NotFoundHttpException
     * @throws ValidationException
     * @throws RateLimitException
     * @throws RequestException
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    private function handleBadStatusCode(ResponseInterface $response)
    {
        switch ($response->getStatusCode()) {
            case 400:
                throw new BadRequestException();
            case 401:
                throw new UnauthorizedException();
            case 403:
                throw new ForbiddenException();
            case 404:
                throw new NotFoundHttpException();
            case 422:
                throw new ValidationException((string)$response->getBody());
            case 429:
                throw new RateLimitException();
            default:
                throw new RequestException((string)$response->getBody());
        }
    }

    /**
     * Make a request via GET and return it.
     *
     * @param string $uri
     * @param array $query
     * @return mixed
     */
    public function get(string $uri, array $query = [])
    {
        return $this->request($uri, 'GET', [], $query);
    }

    /**
     * Make a request via POST and return it.
     *
     * @param string $uri
     * @param array $payload
     * @param array $query
     * @return mixed
     */
    public function post(string $uri, array $payload = [], array $query = [])
    {
        return $this->request($uri, 'POST', $payload, $query);
    }

    /**
     * Make a request via PUT and return it.
     *
     * @param string $uri
     * @param array $payload
     * @param array $query
     * @return mixed
     */
    public function put(string $uri, array $payload = [], array $query = [])
    {
        return $this->request($uri, 'PUT', $payload, $query);
    }

    /**
     * Make a request via PATCH and return it.
     *
     * @param string $uri
     * @param array $payload
     * @param array $query
     * @return mixed
     */
    public function patch(string $uri, array $payload = [], array $query = [])
    {
        return $this->request($uri, 'PATCH', $payload, $query);
    }

    /**
     * Make a request via DELETE and return it.
     *
     * @param string $uri
     * @param array $payload
     * @param array $query
     * @return mixed
     */
    public function delete(string $uri, array $payload = [], array $query = [])
    {
        return $this->request($uri, 'DELETE', $payload, $query);
    }
}