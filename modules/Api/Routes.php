<?php

namespace Api;

use Api\Controllers\UserController;
use App\Http\Request;
use App\Contracts\Http\RoutesInterface;

class Routes implements RoutesInterface
{
    /**
     * @return array
     */
    public function actions()
    {
        return [
            '/users' => [
                Request::METHOD_GET => [UserController::class, 'findAll'],
            ],
            '/users/:id' => [
                Request::METHOD_GET => [UserController::class, 'find'],
                Request::METHOD_PUT => [UserController::class, 'update'],
                Request::METHOD_POST => [UserController::class, 'formUpdate'],
                Request::METHOD_DELETE => [UserController::class, 'delete'],
            ],
        ];
    }
}