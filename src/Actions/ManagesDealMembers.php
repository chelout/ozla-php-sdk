<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\User;
use Chelout\PhpSdk\Resources\ApiResourceCollection;

trait ManagesDealMembers
{
    public function dealMembers(int $dealId): ApiResourceCollection
    {
        $response = $this->get("deals/{$dealId}/members");

        return new ApiResourceCollection($response, User::class);
    }

    public function attachDealMember(int $dealId, array $data): User
    {
        $response = $this->post("deals/{$dealId}/members", $data);

        return new User($response);
    }

    public function detachDealMember(int $dealId, int $id)
    {
        $this->delete("deals/{$dealId}/members/{$id}");
    }
}
