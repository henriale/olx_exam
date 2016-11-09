<?php

namespace App\Contracts\Exception;

interface HandlerInterface
{
    /**
     * @param \Exception $exception
     *
     * @return bool
     */
    public function handle(\Exception $exception): bool;
}