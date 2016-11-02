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
     * @param string $uri
     * @param string $method
     *
     * @return array
     */
    public function matchAction(string $uri, string $method);

    /**
     * @param \App\Contracts\Http\RequestInterface $request
     *
     * @return void
     */
    public function setRequestHandler(RequestInterface $request);
}