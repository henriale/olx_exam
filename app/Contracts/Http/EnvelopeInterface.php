<?php

namespace App\Contracts\Http;

interface EnvelopeInterface
{
    /**
     * @param string $protocol
     *
     * @return \App\Contracts\Http\EnvelopeInterface
     */
    public function setProtocol(string $protocol) : EnvelopeInterface;

    /**
     * @return string
     */
    public function getProtocol() : string;

    /**
     * @param array $header
     *
     * @return \App\Contracts\Http\EnvelopeInterface
     */
    public function setHeader(array $header) : EnvelopeInterface;

    /**
     * @return array
     */
    public function getHeader() : array;

    /**
     * @param string $body
     *
     * @return \App\Contracts\Http\EnvelopeInterface
     */
    public function setBody(string $body) : EnvelopeInterface;

    /**
     * @return string
     */
    public function getBody() : string;
}