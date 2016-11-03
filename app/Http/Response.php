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
}