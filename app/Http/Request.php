<?php

namespace App\Http;

use App\Contracts\Http\RequestInterface;
use Symfony\Component\HttpFoundation\Request as BaseRequest;

class Request extends BaseRequest implements RequestInterface
{
    /**
     * @return string
     */
    public function getUri()
    {
        return $this->getPathInfo();
    }

    /**
     * @return array
     */
    public function getUrlParameters()
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
}