<?php

namespace Api\Controllers;

use Api\Envelopes\FileUploadEnvelope;
use Base\Envelopes\Response\RootEnvelope;
use Api\Models\User;
use App\Exceptions\InternalServerErrorException;
use Base\Controllers\Controller;
use App\Exceptions\NotFoundException;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ServerException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserController extends Controller
{
    /**
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findAll()
    {
        $user = new User();

        return $this->response
            ->setEnvelope(new RootEnvelope)
            ->setContent($user->find())
            ->send();
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

        return $this->response
            ->setEnvelope(new RootEnvelope)
            ->setContent($users)
            ->send();
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \App\Exceptions\InternalServerErrorException
     */
    public function formUpdate($id)
    {
        $this->request->hasValidEnvelope(new FileUploadEnvelope);

        /**
         * @var UploadedFile $picture
         */
        if (empty($picture = $this->request->files->get('picture'))) {
            throw new ServerException;
        }

        try {
            $client = new GuzzleClient();
            $response = $client->request('POST', 'https://api.olx.com/v1.0/users/images/', [
                'multipart' => [
                     [
                        'name' => 'id',
                        'contents' => '1956350'
                    ], [
                        'name' => 'url',
                        'contents' => 'ui/50/97/16/64/o_1471879056_200d9c0e4f5c597d7b12d07938de58df.jpg'
                    ], [
                        'name' => 'file',
                        'filename' => $picture->getFilename(),
                        'contents' => fopen($picture->openFile()->getPathname(), 'rb'),
                        'headers' => [
                            'Content-type' => 'image/png',
                        ]
                    ],
                ]
            ]);
        } catch (\Exception $e) {
            throw new InternalServerErrorException;
        }

        $picture = 'https://images01.olx-st.com/' . json_decode($response->getBody()->getContents())->url;
        $this->request->request->add(['picture' => $picture]);

        return $this->updateUser($id, $this->request->request->all());
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \App\Exceptions\InternalServerErrorException
     */
    public function update($id)
    {
        $this->request->hasValidEnvelope(new RootEnvelope);

        return $this->updateUser($id, $this->request->getContent());
    }

    /**
     * @param $id
     * @param $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \App\Exceptions\InternalServerErrorException
     */
    protected function updateUser($id, $data)
    {
        $user = new User();

        if (empty($data) || ! $user->update($id, $data)) {
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