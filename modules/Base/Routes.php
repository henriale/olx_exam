<?php

namespace Base;

use App\Http\Request;
use Base\Controllers\Controller;
use App\Contracts\Http\RoutesInterface;
use Base\Controllers\HttpErrorsController;

class Routes implements RoutesInterface
{
    /**
     * @return array
     */
    public function actions()
    {
        return [
            '/' => [
                Request::METHOD_GET => [Controller::class, 'index'],
            ],

            '/404' => [HttpErrorsController::class, 'error404']

        ];
    }
}