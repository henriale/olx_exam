<?php

namespace App\Exceptions;

class InternalServerErrorException extends HttpResponseException
{
    /**
     * NotFoundException constructor.
     *
     * @param string $content
     * @param null $previous
     */
    public function __construct(string $content, $previous = null)
    {
        parent::__construct($content, 500, $previous);
    }
}