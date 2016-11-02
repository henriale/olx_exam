<?php

namespace App\Http;

use App\Contracts\Http\ResponseInterface;

class Response implements ResponseInterface
{

    /**
     * @param array $content
     *
     * @return mixed
     */
    public function json(array $content)
    {
        print json_encode($content);
    }

    /**
     * @param array $header
     *
     * @return \App\Contracts\Http\ResponseInterface
     */
    public function header(array $header)
    {
        // TODO: Implement header() method.
    }
}