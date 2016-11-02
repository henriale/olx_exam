<?php

namespace App\Http;

use App\Contracts\Http\RequestInterface;
use App\Contracts\Http\RouterInterface;
use App\Contracts\Http\RoutesInterface;

class Router implements RouterInterface
{
    /**
     * @var RoutesInterface[] $routes
     */
    protected $routes = [];
    /**
     * @var RequestInterface $request
     */
    protected $request;

    /**
     * @param \App\Contracts\Http\RoutesInterface $routes
     *
     * @return void
     */
    public function map(RoutesInterface $routes)
    {
        $this->routes = array_merge($this->routes, $routes->actions());
    }

    /**
     *
     * Complexity: O(n)
     *
     * @param string $uri
     * @param string $method
     *
     * @return array
     */
    public function matchAction(string $uri, string $method = Request::METHOD_GET)
    {
        foreach ($this->routes as $mask => $value) {
            if (preg_match_all("/:([\w%]+)/", $mask)) {
                $a = array_filter(explode('/', $uri));
                $b = array_filter(explode('/', $mask));

                if (count($a) !== count($b)) {
                    continue;
                }

                if (! isset($this->routes[$mask][$method])) {
                    continue;
                }

                $parsedParams = [];

                foreach ($b as $index => $d) {
                    if ($d != $a[$index]) {
                        if (substr($b[$index], 0, 1) != ':') {
                            $parsedParams = [];
                            continue;
                        }
                    }

                    if (substr($b[$index], 0, 1) === ':') {
                        $parsedParams[substr($b[$index], 1)] = $a[$index];
                    }
                }

                $uriPattern = $mask;
                $this->request->setUrlParameters($parsedParams);
            }
        }

        if (! isset($this->routes[$uriPattern]) || ! isset($this->routes[$uriPattern][$method])) {
            return $this->routes['404'];
        }

        return $this->routes[$uriPattern][$method];

    }

    /**
     * @param \App\Contracts\Http\RequestInterface $request
     */
    public function setRequestHandler(RequestInterface $request)
    {
        $this->request = $request;
    }
}