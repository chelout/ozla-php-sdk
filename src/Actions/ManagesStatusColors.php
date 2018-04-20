<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\ApiResourceCollection;
use Chelout\PhpSdk\Resources\Deals\Statuses\Color;

trait ManagesStatusColors
{
    public function statusColors(): ApiResourceCollection
    {
        $response = $this->get('statuses/colors');

        return new ApiResourceCollection($response, Color::class);
    }

    public function statusColor(int $id): Color
    {
        $response = $this->get("statuses/colors/{$id}");

        return new Color($response);
    }
}
