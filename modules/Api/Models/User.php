<?php

namespace Api\Models;

use Base\Models\Model;

class User extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'users';

    protected $attributes = [
        'name', 'address', 'picture'
    ];
}