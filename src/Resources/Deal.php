<?php

namespace Chelout\PhpSdk\Resources;

class Deal extends ApiResource
{
    /**
     * Attributes that should be casted to DateTime.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'finished_at',
    ];

    /**
     * Deal creation date (ISO-8601).
     *
     * @var DateTime
     */
    public $created_at;

    /**
     * Deal name.
     *
     * @var string
     */
    public $name;

    /**
     * Deal budget.
     *
     * @var float
     */
    public $budget;

    /**
     * Deal manager id.
     *
     * @var int
     */
    public $manager_id;

    /**
     * Deal status id.
     *
     * @var int
     */
    public $status_id;

    /**
     * Deal planed finish date.
     *
     * @var DateTime
     */
    public $finished_at;

    /**
     * Deal priority.
     *
     * @var int
     */
    public $priority;
}
