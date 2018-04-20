<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\ApiResourceCollection;
use Chelout\PhpSdk\Resources\User;

trait ManagesUsers
{
    public function me(): User
    {
        $response = $this->get('me');

        return new User($response);
    }

    public function users(): ApiResourceCollection
    {
        $response = $this->get('users');

        return new ApiResourceCollection($response, User::class);
    }

    public function user(int $id): User
    {
        $response = $this->get("users/{$id}");

        return new User($response);
    }
}
