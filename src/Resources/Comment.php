<?php

namespace Chelout\PhpSdk\Resources;

class Comment extends ApiResource
{
    /**
     * Attributes that should be casted to DateTime.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Comment creation date (ISO-8601).
     *
     * @var DateTime
     */
    public $created_at;

    /**
     * Comment creation date (ISO-8601).
     *
     * @var DateTime
     */
    public $updated_at;

    /**
     * Comment author id.
     *
     * @var int
     */
    public $author_id;

    /**
     * Comment.
     *
     * @var string
     */
    public $message;
}
