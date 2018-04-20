<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\ApiResourceCollection;
use Chelout\PhpSdk\Resources\Deal;

trait ManagesDeals
{
    public function deals(): ApiResourceCollection
    {
        $response = $this->get('deals');

        return new ApiResourceCollection($response, Deal::class);
    }

    public function createDeal(array $data): Deal
    {
        $response = $this->post('deals', $data);

        return new Deal($response);
    }

    public function deal(int $id): Deal
    {
        $response = $this->get("deals/{$id}");

        return new Deal($response);
    }

    public function updateDeal(int $id, array $data): Deal
    {
        $response = $this->put("deals/{$id}", $data);

        return new Deal($response);
    }

    public function updateDealStatus(int $id, array $data): Deal
    {
        $response = $this->patch("deals/{$id}/status", $data);

        return new Deal($response);
    }

    public function updateDealAuthor(int $id, array $data): Deal
    {
        $response = $this->patch("deals/{$id}/author", $data);

        return new Deal($response);
    }

    public function deleteDeal(int $id)
    {
        $this->delete("deals/{$id}");
    }
}
