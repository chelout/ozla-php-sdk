<?php

namespace Chelout\PhpSdk\Resources;

class Company extends ApiResource
{
    /**
     * Attributes that should be casted to DateTime.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
    ];

    /**
     * Company creation date (ISO-8601).
     *
     * @var string
     */
    public $created_at;

    /**
     * Company name.
     *
     * @var string
     */
    public $name;

    /**
     * Company url.
     *
     * @var string
     */
    public $url;

    /**
     * Company address.
     *
     * @var string
     */
    public $address;

    /**
     * Company phones.
     *
     * @var \Chelout\PhpSdk\Resources\ApiResourceCollection
     */
    public $phones;

    /**
     * Company emails.
     *
     * @var \Chelout\PhpSdk\Resources\ApiResourceCollection
     */
    public $emails;

    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->emails = new ApiResourceCollection($this->emails, Email::class);
        $this->phones = new ApiResourceCollection($this->phones, Phone::class);
    }
}
