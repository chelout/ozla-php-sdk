<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\ApiResourceCollection;
use Chelout\PhpSdk\Resources\Deals\Status;

trait ManagesStatuses
{
    public function statuses(int $funnelId): ApiResourceCollection
    {
        $response = $this->get("funnels/{$funnelId}/statuses");

        return new ApiResourceCollection($response, Status::class);
    }

    public function createStatus(int $funnelId, array $data): Status
    {
        $response = $this->post("funnels/{$funnelId}/statuses", $data);

        return new Status($response);
    }

    public function status(int $funnelId, int $statusId): Status
    {
        $response = $this->get("funnels/{$funnelId}/statuses/{$statusId}");

        return new Status($response);
    }

    public function updateStatus(int $funnelId, int $statusId, array $data): Status
    {
        $response = $this->put("funnels/{$funnelId}/statuses/{$statusId}", $data);

        return new Status($response);
    }

    public function updateStatusPriority(int $funnelId, int $statusId, array $data): Status
    {
        $response = $this->patch("funnels/{$funnelId}/statuses/{$statusId}/priority", $data);

        return new Status($response);
    }

    public function deleteStatus(int $funnelId, int $statusId)
    {
        $this->delete("funnels/{$funnelId}/statuses/{$statusId}");
    }
}
