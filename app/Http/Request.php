<?php

namespace App\Http;

use App\Contracts\Http\EnvelopeInterface;
use App\Contracts\Http\RequestInterface;
use App\Exceptions\BadRequestException;
use Symfony\Component\HttpFoundation\Request as BaseRequest;

class Request extends BaseRequest implements RequestInterface
{
    /**
     * @return string
     */
    public function getUri() : string
    {
        return $this->getPathInfo();
    }

    /**
     * @return array
     */
    public function getUrlParameters() : array
    {
        return (array) $this->query->all();
    }

    /**
     * @param array $params
     *
     * @return void
     */
    public function setUrlParameters(array $params)
    {
        $this->query->add($params);
    }

    /**
     * @param bool $asResource
     *
     * @return mixed|resource|string
     */
    public function getContent($asResource = false)
    {
        $content = parent::getContent($asResource);

        if ($this->getContentType() == 'json') {
            $content = preg_replace('/(\v|\s)+/', '', $content);
            $content = json_decode($content, true);

            $this->request->add((array) $content);
        }

        return $content;
    }

    /**
     * @param \App\Contracts\Http\EnvelopeInterface $envelope
     *
     * @return bool
     * @throws \App\Exceptions\BadRequestException
     */
    public function hasValidEnvelope(EnvelopeInterface $envelope) : bool
    {
        $valid = true;

        foreach ($envelope->getHeader() as $envelopeKey => $envelopeHeader) {
            $valid = false;

            foreach ($this->headers->all() as $key => $headers) {
                foreach (explode(';', reset($headers)) as $header) {
                    if (
                        strtolower($key) == strtolower($envelopeKey)
                        && strtolower($header) == strtolower($envelopeHeader)
                    ) {
                        $valid = true;
                        continue 2;
                    }
                }
            }
        }

        if (! $valid) {
            throw new BadRequestException('Invalid header');
        }

        return $valid;
    }
}