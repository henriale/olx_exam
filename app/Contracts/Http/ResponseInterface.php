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

    /**
     * @param array $header
     *
     * @return \App\Contracts\Http\ResponseInterface
     */
    public function header(array $header);
}