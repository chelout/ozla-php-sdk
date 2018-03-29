<?php

namespace Ozla\PhpSdk\Resources;

class ApiResource
{
    /**
     * Api Resource Type.
     *
     * @var string
     */
    protected $type;

    /**
     * User id.
     *
     * @var int
     */
    public $id;

    /**
     * Api Resource.
     *
     * @var array
     */
    public $attributes = [];

    /**
     * User API Resources.
     *
     * @var array
     */
    public $links;

    /**
     * @var \Ozla\PhpSdk\Ozla
     */
    protected $ozla;

    /**
     * @param array             $attributes
     * @param \Ozla\PhpSdk\Ozla $ozla
     */
    public function __construct(array $attributes, $ozla = null)
    {
        $this->attributes = $attributes;

        $this->ozla = $ozla;

        $this->fill();
    }

    protected function fill()
    {
        foreach ($this->attributes as $key => $value) {
            $key = $this->camelCase($key);

            $this->{$key} = $value;
        }
    }

    protected function camelCase(string $key): string
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if (0 !== $i) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }
}
