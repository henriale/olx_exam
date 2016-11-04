<?php

namespace Api\Controllers;

use Api\Models\User;
use Base\Controllers\Controller;

class UserController extends Controller
{
    /**
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findAll()
    {
        $user = new User();

        return $this->response->setContent(json_encode($user->find()))->send();
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function find($id)
    {
        $user = new User();

        return $this->response->setContent(json_encode($user->find($id)))->send();
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id)
    {
        $user = new User();

        if ($user->update($id, $this->request->getContent())) {
            $message = 'User succesfully updated';
            $statusCode = 200;
        }

        return $this->response
            ->setStatusCode($statusCode ?? 500)
            ->setContent(json_encode(['message' => $message ?? 'Error on update User']))
            ->send();
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        $user = new User();

        if ($user->delete($id)) {
            $message = 'User succesfully deleted';
            $statusCode = 200;
        }

        return $this->response
            ->setStatusCode($statusCode ?? 500)
            ->setContent(json_encode(['message' => $message ?? 'Error on delete User']))
            ->send();
    }
}