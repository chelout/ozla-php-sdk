<?php

namespace Chelout\PhpSdk\Resources;

class ApiResourceCollection
{
    /**
     * Api Resource.
     *
     * @var array
     */
    public $items = [];

    /**
     * Collection API Resources.
     *
     * @var array
     */
    public $links;

    /**
     * Collection Meta.
     *
     * @var array
     */
    public $meta;

    /**
     * @param array $response
     */
    public function __construct(array $response, string $class)
    {
        $this->items = $this->collect($response['data'] ?? $response, $class);

        $this->links = $response['links'] ?? '';

        $this->meta = $response['meta'] ?? '';
    }

    protected function collect(array $items, string $class): array
    {
        return array_map(function ($item) use ($class) {
            return new $class($item);
        }, $items);
    }

    // public function all()
    // {
    //     return $this->items;
    // }
}
