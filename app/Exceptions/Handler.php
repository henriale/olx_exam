<?php

namespace App\Exceptions;

use App\Contracts\Exception\HandlerInterface;
use App\Http\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class Handler implements HandlerInterface
{
    /**
     * redirects exception and return true if succeeded
     *
     * @param \Exception $exception
     *
     * @return bool
     */
    public function handle(\Exception $exception): bool
    {
        if ($exception instanceof HttpResponseException) {
            $response = new Response();
            $response->headers = new ResponseHeaderBag(['Content-Type' => 'application/json']);

            $response->setContent($exception->getContent())->setStatusCode($exception->getCode())->send();

            return true;
        }

        return false;
    }
}