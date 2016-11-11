<?php

namespace App\Http;

use App\Contracts\Http\EnvelopeInterface;
use App\Contracts\Http\ResponseInterface;
use Symfony\Component\HttpFoundation\Response as BaseResponse;

class Response extends BaseResponse implements ResponseInterface
{
    /**
     * @var EnvelopeInterface $envelope
     */
    protected $envelope;

    /**
     * Response constructor.
     *
     * @param mixed|string $content
     * @param int $status
     * @param array $headers
     */
    public function __construct($content = '', $status = 200, $headers = [])
    {
        $this->envelope = new Envelope;

        parent::__construct($content, $status, $headers);
    }

    /**
     * @param array $content
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function setContent($content)
    {
        return parent::setContent(json_encode($content));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function send()
    {
        $this->headers->add($this->envelope->getHeader());

        return parent::send();
    }

    /**
     * @param \App\Contracts\Http\EnvelopeInterface $envelope
     *
     * @return \App\Contracts\Http\ResponseInterface
     */
    public function setEnvelope(EnvelopeInterface $envelope) : ResponseInterface
    {
        $this->envelope = $envelope;

        return $this;
    }

    /**
     * @return \App\Contracts\Http\EnvelopeInterface
     */
    public function getEnvelope() : EnvelopeInterface
    {
        return $this->envelope;
    }
}