<?php

namespace Chelout\PhpSdk\Resources;

use DateTime;

class ApiResource
{
    /**
     * Attributes that should be casted to DateTime.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * Attributes array.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * User id.
     *
     * @var int
     */
    public $id;

    /**
     * User API Resources.
     *
     * @var array
     */
    public $links;

    /**
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->id = $response['id'];
        $this->attributes = $response['attributes'];
        $this->links = $response['links'] ?? '';

        $this->fill();
    }

    protected function fill()
    {
        foreach ($this->attributes as $key => $value) {
            $this->{$key} = $value;
        }

        $this->castDates();
    }

    protected function castDates()
    {
        foreach ($this->dates as $key) {
            $this->{$key} = DateTime::createFromFormat(DateTime::ISO8601, $this->{$key});
        }
    }
}
