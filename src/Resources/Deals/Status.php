<?php

namespace Chelout\PhpSdk\Resources\Deals;

use Chelout\PhpSdk\Resources\ApiResource;

class Status extends ApiResource
{
    /**
     * Status name.
     *
     * @var string
     */
    public $name;

    /**
     * Status funnel id.
     *
     * @var int
     */
    public $funnel_id;

    /**
     * Status type id.
     *
     * @var int
     */
    public $type_id;

    /**
     * Status color id.
     *
     * @var int
     */
    public $color_id;

    /**
     * Is status guarded.
     *
     * @var bool
     */
    public $is_guarded;

    /**
     * Status priority.
     *
     * @var int
     */
    public $priority;
}
