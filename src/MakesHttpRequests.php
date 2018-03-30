<?php

namespace Chelout\PhpSdk;

use Chelout\PhpSdk\Exceptions\FailedActionException;
use Chelout\PhpSdk\Exceptions\FailedAuthorizationException;
use Chelout\PhpSdk\Exceptions\NotFoundException;
use Chelout\PhpSdk\Exceptions\ValidationException;
use Exception;
use Psr\Http\Message\ResponseInterface;

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
     * @param string $uri
     * @param array  $payload
     *
     * @return mixed
     */
    protected function patch(string $uri, array $payload = [])
    {
        return $this->request('PATCH', $uri, $payload);
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
            empty($payload) ? [] : ['json' => $payload]
        );

        if (! in_array($response->getStatusCode(), [200, 201, 204])) {
            return $this->handleRequestError($response);
        }

        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    protected function handleRequestError(ResponseInterface $response)
    {
        $data = json_decode((string) $response->getBody(), true);
        $message = $data['message'];
        $errors = $data['errors'] ?? [];
        dump($data);
        if (422 === $response->getStatusCode()) {
            throw new ValidationException($message, $errors);
        }

        if (404 === $response->getStatusCode()) {
            throw new NotFoundException($message);
        }

        if (401 === $response->getStatusCode() || 403 === $response->getStatusCode()) {
            throw new FailedAuthorizationException($message);
        }

        if (400 === $response->getStatusCode()) {
            throw new FailedActionException($message);
        }

        throw new Exception($message);
    }
}
