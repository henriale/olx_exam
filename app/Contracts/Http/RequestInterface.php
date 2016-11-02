<?php

namespace App\Contracts\Http;

interface RequestInterface
{
    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getUri();

    /**
     * @return array
     */
    public function getUrlParameters();

    /**
     * @param array $params
     *
     * @return void
     */
    public function setUrlParameters(array $params);
}