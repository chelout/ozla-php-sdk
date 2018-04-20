<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\ApiResourceCollection;
use Chelout\PhpSdk\Resources\Deals\Statuses\Type;

trait ManagesStatusTypes
{
    public function statusTypes(): ApiResourceCollection
    {
        $response = $this->get('statuses/types');

        return new ApiResourceCollection($response, Type::class);
    }

    public function statusType(int $id): Type
    {
        $response = $this->get("statuses/types/{$id}");

        return new Type($response);
    }
}
