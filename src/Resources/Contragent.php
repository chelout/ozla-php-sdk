<?php

namespace Chelout\PhpSdk\Resources;

class Contragent extends ApiResource
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
     * Contragent creation date (ISO-8601).
     *
     * @var string
     */
    public $created_at;

    /**
     * Contragent company id.
     *
     * @var string
     */
    public $company_id;

    /**
     * Contragent name.
     *
     * @var string
     */
    public $name;

    /**
     * Contragent position.
     *
     * @var string
     */
    public $position;

    /**
     * Contragent phones.
     *
     * @var \Chelout\PhpSdk\Resources\ApiResourceCollection
     */
    public $phones;

    /**
     * Contragent emails.
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
