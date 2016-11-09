<?php

namespace App\Http;

use App\Contracts\Http\ResponseInterface;
use Symfony\Component\HttpFoundation\Response as BaseResponse;

class Response extends BaseResponse implements ResponseInterface
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
     * @param array $content
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function setContent($content)
    {
        return parent::setContent(json_encode($content));
    }
}