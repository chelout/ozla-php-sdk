<?php

namespace Chelout\PhpSdk;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Chelout\PhpSdk\Exceptions\NotFoundException;
use Chelout\PhpSdk\Exceptions\ValidationException;
use Chelout\PhpSdk\Exceptions\FailedActionException;

trait MakesHttpRequests
{
    /**
     * @param string $uri
     *
     * @return mixed
     */
    protected function get(string $uri)
    {
        return $this->request('GET', $uri);
    }

    /**
     * @param string $uri
     * @param array  $payload
     *
     * @return mixed
     */
    protected function post(string $uri, array $payload = [])
    {
        return $this->request('POST', $uri, $payload);
    }

    /**
     * @param string $uri
     * @param array  $payload
     *
     * @return mixed
     */
    protected function put(string $uri, array $payload = [])
    {
        return $this->request('PUT', $uri, $payload);
    }

    /**
     * @param string $uri
     * @param array  $payload
     *
     * @return mixed
     */
    protected function delete(string $uri, array $payload = [])
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * @param string $verb
     * @param string $uri
     * @param array  $payload
     *
     * @return mixed
     */
    protected function request(string $verb, string $uri, array $payload = [])
    {
        $response = $this->client->request($verb, $uri,
            empty($payload) ? [] : ['form_params' => $payload]
        );

        if (! in_array($response->getStatusCode(), [200, 201, 204])) {
            return $this->handleRequestError($response);
        }

        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    protected function handleRequestError(ResponseInterface $response)
    {
        if (422 === $response->getStatusCode()) {
            throw new ValidationException(json_decode((string) $response->getBody(), true));
        }

        if (404 === $response->getStatusCode()) {
            throw new NotFoundException();
        }

        if (400 === $response->getStatusCode()) {
            throw new FailedActionException((string) $response->getBody());
        }

        throw new Exception((string) $response->getBody());
    }
}
