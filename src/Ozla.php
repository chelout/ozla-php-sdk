<?php

namespace Ozla\PhpSdk;

use GuzzleHttp\Client;

class Ozla
{
    use MakesHttpRequests;

    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $apiKey;

    /**
     * @var \GuzzleHttp\Client
     */
    public $client;

    public function __construct(string $domain, string $apiKey, Client $client = null)
    {
        $this->apiKey = $apiKey;

        $this->client = $client ?: new Client([
            'base_uri' => 'https://' . $this->domain . '.ozla.ru/api/v1/',
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    protected function transformCollection(array $collection, string $class): array
    {
        return array_map(function ($attributes) use ($class) {
            return new $class($attributes, $this);
        }, $collection);
    }
}
