<?php

namespace App\Contracts\Http;

interface RoutesInterface
{
    /**
     * @return array
     */
    public function actions();
}