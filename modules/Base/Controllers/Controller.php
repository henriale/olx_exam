<?php

namespace Base\Controllers;

use App\Http\Request;
use App\Http\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class Controller
{
    /**
     * @var \App\Http\Response $response
     */
    protected $response;
    /**
     * @var \App\Http\Request $request
     */
    protected $request;

    /**
     * Controller constructor.
     *
     * @param \App\Http\Response $response
     * @param \App\Http\Request $request
     */
    public function __construct(Response $response, Request $request)
    {
        $response->headers = new ResponseHeaderBag(['Content-Type' => 'application/json']);

        $this->response = $response;
        $this->request = $request;
    }

    /**
     *
     * @return array
     */
    public function index()
    {
        $this->response->json([]);
    }
}