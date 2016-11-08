<?php

return $config = [
    /**
     * Class to handle and map routes.
     * Must implement \Contracts\Http\RouterInterface.
     */
    'router' => new \App\Http\Router(),

    /**
     * Modules namespace root for early loading.
     */
    'modules' => [
        'Base',
        'Api',
        'Manager',
        'Website',
    ],

    /**
     *
     */
    'request' => new \App\Http\Request($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER),

    /**
     *
     */
    'response' => new \App\Http\Response(),

    /**
     *
     */
    'session' => new \App\Http\Session(),

    /**
     *
     */
    'database' => new App\Database\Database('192.168.99.100', 'homestead', 'homestead', 'secret'),
];