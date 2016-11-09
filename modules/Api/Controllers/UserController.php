<?php

namespace Api\Controllers;

use Api\Models\User;
use App\Exceptions\InternalServerErrorException;
use Base\Controllers\Controller;
use App\Exceptions\NotFoundException;

class UserController extends Controller
{
    /**
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findAll()
    {
        $user = new User();

        return $this->response->setContent($user->find())->send();
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \App\Exceptions\NotFoundException
     */
    public function find($id)
    {
        $user = new User();

        if (empty($users = $user->find($id))) {
            throw new NotFoundException('User ' . $id . ' Not found');
        }

        return $this->response->setContent($users)->send();
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \App\Exceptions\InternalServerErrorException
     */
    public function update($id)
    {
        $user = new User();

        if (! $user->update($id, $this->request->getContent())) {
            throw new InternalServerErrorException('Error on update user ' . $id);
        }

        return $this->response->setStatusCode(204)->sendHeaders();
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \App\Exceptions\InternalServerErrorException
     */
    public function delete($id)
    {
        $user = new User();

        if (! $user->delete($id)) {
            throw new InternalServerErrorException('Error on delete user ' . $id);
        }

        return $this->response->setStatusCode(204)->sendHeaders();
    }
}