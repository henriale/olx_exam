<?php

namespace App\Http;

use App\Contracts\Http\RequestInterface;
use Symfony\Component\HttpFoundation\Request as BaseRequest;

class Request extends BaseRequest implements RequestInterface
{
    /**
     * @return string
     */
    public function getUri() : string
    {
        return $this->getPathInfo();
    }

    /**
     * @return array
     */
    public function getUrlParameters() : array
    {
        return (array) $this->query->all();
    }

    /**
     * @param array $params
     *
     * @return void
     */
    public function setUrlParameters(array $params)
    {
        $this->query->add($params);
    }

    /**
     * @param bool $asResource
     *
     * @return mixed|resource|string
     */
    public function getContent($asResource = false)
    {
        $content = parent::getContent($asResource);

        if ($this->getContentType() == 'json') {
            $content = preg_replace('/(\v|\s)+/', '', $content);
            $content = json_decode($content, true);

            $this->request->add($content);
        }

        return $content;
    }
}