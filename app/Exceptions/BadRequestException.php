<?php

namespace App\Exceptions;

class BadRequestException extends HttpResponseException
{
    /**
     * NotFoundException constructor.
     *
     * @param string $content
     * @param null $previous
     */
    public function __construct(string $content, $previous = null)
    {
        parent::__construct($content, 400, $previous);
    }
}