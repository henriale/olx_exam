<?php

namespace Api\Controllers;

use Base\Controllers\Controller;

class UserController extends Controller
{
    /**
     *
     * @return array
     */
    public function findAll()
    {
        $this->response->json(['findAll']);
    }

    /**
     *
     * @return array
     */
    public function create()
    {
        $this->response->json(['create']);
    }

    /**
     * @param $id
     */
    public function find($id)
    {
        $this->response->json(['find', $id]);
    }

    /**
     * @param $id
     */
    public function update($id)
    {
        $this->response->json(['update', $id]);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->response->json(['delete', $id]);
    }
}