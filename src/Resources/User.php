<?php

namespace Chelout\PhpSdk\Resources;

class User extends ApiResource
{
    /**
     * User e-mail.
     *
     * @var string
     */
    public $email;

    /**
     * User avatar url.
     *
     * @var string
     */
    public $avatar;

    /**
     * User name.
     *
     * @var string
     */
    public $name;

    /**
     * User phone.
     *
     * @var string
     */
    public $phone;

    /**
     * Is user active.
     *
     * @var bool
     */
    public $is_active;
}
