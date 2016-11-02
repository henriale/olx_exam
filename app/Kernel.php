<?php

namespace App;
use DI\ContainerBuilder;

/**
 * Class Kernel
 *
 * Register modules and IoC
 */
class Kernel
{
    /**
     * @var array $modules
     */
    protected $modules;

    /**
     * @var \App\Contracts\Http\RouterInterface $router
     */
    protected $router;

    /**
     * @var \App\Contracts\Http\RequestInterface $request
     */
    protected $request;

    /**
     * @var \DI\Container $container
     */
    protected $container;

    /**
     * Kernel constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->modules = $this->validateAndGetConfigItem($config, 'modules');

        $this->router = $this->validateAndGetConfigItem($config, 'router');

        $this->request = $this->validateAndGetConfigItem($config, 'request');

        $this->container = ContainerBuilder::buildDevContainer();

        $this->router->setRequestHandler($this->request);
        $this->registerModulesRoutes();

    }

    /**
     * @param array $config
     * @param string $key
     *
     * @return mixed
     * @throws \Exception
     */
    protected function validateAndGetConfigItem(array $config, string $key)
    {
        if (! isset($config[$key])) {
            throw new \Exception("key {$key} was not set.");
        }

        return $config[$key];
    }

    /**
     *
     */
    public function run()
    {
        $this->container->call(
            $this->router->matchAction(
                $this->request->getUri(),
                $this->request->getMethod()
            ), $this->request->getUrlParameters()
        );
    }

    /**
     *
     */
    protected function registerModulesRoutes()
    {
        foreach ($this->modules as $moduleRoot) {
            if ($routes = $this->getModuleRoutes($moduleRoot)) {
                $this->router->map($routes);
            }
        }
    }

    /**
     * @param string $moduleRoot
     *
     * @return \App\Contracts\Http\RoutesInterface|null
     */
    protected function getModuleRoutes(string $moduleRoot)
    {
        $routesClass = $moduleRoot . '\\Routes';

        if (class_exists($routesClass)) {
            return new $routesClass;
        }

        return null;
    }
}