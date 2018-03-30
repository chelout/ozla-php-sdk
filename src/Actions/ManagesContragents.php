<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\Contragent;
use Chelout\PhpSdk\Resources\ApiResourceCollection;

trait ManagesContragents
{
    public function contragents(): ApiResourceCollection
    {
        $response = $this->get('contragents');

        return new ApiResourceCollection($response, Contragent::class);
    }

    public function createContragent(array $data): Contragent
    {
        $response = $this->post('contragents', $data);

        return new Contragent($response);
    }

    public function contragent(int $id): Contragent
    {
        $response = $this->get("contragents/{$id}");

        return new Contragent($response);
    }

    public function updateContragent(int $id, array $data): Contragent
    {
        $response = $this->put("contragents/{$id}", $data);

        return new Contragent($response);
    }

    public function deleteContragent(int $id)
    {
        $this->delete("contragents/{$id}");
    }
}
