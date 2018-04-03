<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\Funnel;
use Chelout\PhpSdk\Resources\ApiResourceCollection;

trait ManagesFunnels
{
    public function funnels(): ApiResourceCollection
    {
        $response = $this->get('funnels');

        return new ApiResourceCollection($response, Funnel::class);
    }

    public function createFunnel(array $data): Funnel
    {
        $response = $this->post('funnels', $data);

        return new Funnel($response);
    }

    public function funnel(int $id): Funnel
    {
        $response = $this->get("funnels/{$id}");

        return new Funnel($response);
    }

    public function updateFunnel(int $id, array $data): Funnel
    {
        $response = $this->put("funnels/{$id}", $data);

        return new Funnel($response);
    }

    public function deleteFunnel(int $id)
    {
        $this->delete("funnels/{$id}");
    }
}
