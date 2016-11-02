<?php

namespace Base\Controllers;

use App\Http\Request;
use App\Http\Response;

class HttpErrorsController
{
    /**
     * @var \App\Http\Response $response
     */
    protected $response;
    /**
     * @var \App\Http\Request $request
     */
    private $request;

    /**
     * Controller constructor.
     *
     * @param \App\Http\Response $response
     * @param \App\Http\Request $request
     */
    public function __construct(Response $response, Request $request)
    {
        $this->response = $response;
        $this->request = $request;
    }

    /**
     *
     * @return array
     */
    public function error404()
    {
        $this->response->json(['error' => 404, 'message' => 'not found']);
    }
}