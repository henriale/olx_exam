<?php

namespace App\Http;

use App\Contracts\Http\EnvelopeInterface;

class Envelope implements EnvelopeInterface
{
    /**
     * @var string $protocol
     */
    protected $protocol;
    /**
     * @var array $header
     */
    protected $header = [];
    /**
     * @var mixed $body
     */
    protected $body;

    /**
     * @param string $protocol
     *
     * @return \App\Contracts\Http\EnvelopeInterface
     */
    public function setProtocol(string $protocol) : EnvelopeInterface
    {
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * @return string
     */
    public function getProtocol() : string
    {
        return $this->protocol;
    }

    /**
     * @param array $header
     *
     * @return \App\Contracts\Http\EnvelopeInterface
     */
    public function setHeader(array $header) : EnvelopeInterface
    {
        $this->header = $header;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeader() : array
    {
        return $this->header;
    }

    /**
     * @param string $body
     *
     * @return \App\Contracts\Http\EnvelopeInterface
     */
    public function setBody(string $body) : EnvelopeInterface
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody() : string
    {
        return $this->body;
    }
}