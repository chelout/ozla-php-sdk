<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\Deals\Status;
use Chelout\PhpSdk\Resources\ApiResourceCollection;

trait ManagesStatuses
{
    public function statuses(): ApiResourceCollection
    {
        $response = $this->get('statuses');

        return new ApiResourceCollection($response, Status::class);
    }

    public function createStatus(array $data): Status
    {
        $response = $this->post('statuses', $data);

        return new Status($response);
    }

    public function status(int $id): Status
    {
        $response = $this->get("statuses/{$id}");

        return new Status($response);
    }

    public function updateStatus(int $id, array $data): Status
    {
        $response = $this->put("statuses/{$id}", $data);

        return new Status($response);
    }

    public function updateStatusPriority(int $id, array $data): Status
    {
        $response = $this->patch("statuses/{$id}/priority", $data);

        return new Status($response);
    }

    public function deleteStatus(int $id)
    {
        $this->delete("statuses/{$id}");
    }
}
