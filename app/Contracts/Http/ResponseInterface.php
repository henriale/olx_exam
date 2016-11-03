<?php

namespace App\Contracts\Http;

interface ResponseInterface
{
    /**
     * @param array $content
     *
     * @return mixed
     */
    public function json(array $content);
}