<?php

namespace App\Contracts\Http;

interface RouterInterface
{
    /**
     * @param \App\Contracts\Http\RoutesInterface $routes
     *
     * @return mixed
     */
    public function map(RoutesInterface $routes);

    /**
     * @param string $method Request method
     *
     * @return array
     */
    public function getMethodAction(string $method);
}