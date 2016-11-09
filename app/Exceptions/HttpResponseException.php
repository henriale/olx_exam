<?php

namespace App\Exceptions;

class HttpResponseException extends \Exception
{
    /**
     * HttpResponseException constructor.
     *
     * @param string $content
     * @param int $statusCode
     * @param \Exception|null $previous
     */
    public function __construct(string $content, int $statusCode, \Exception $previous = null)
    {
        parent::__construct($content, $statusCode, $previous);
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return ['message' => $this->message];
    }
}