<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\ApiResourceCollection;
use Chelout\PhpSdk\Resources\Contragent;

trait ManagesDealContragents
{
    public function dealContragents(int $dealId): ApiResourceCollection
    {
        $response = $this->get("deals/{$dealId}/contragents");

        return new ApiResourceCollection($response, Contragent::class);
    }

    public function attachDealContragent(int $dealId, array $data): Contragent
    {
        $response = $this->post("deals/{$dealId}/contragents", $data);

        return new Contragent($response);
    }

    public function detachDealContragent(int $dealId, int $id)
    {
        $this->delete("deals/{$dealId}/contragents/{$id}");
    }
}
