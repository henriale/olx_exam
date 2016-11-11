<?php

namespace App\Contracts\Http;

interface RequestInterface
{
    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getUri();

    /**
     * @return array
     */
    public function getUrlParameters();

    /**
     * @param array $params
     *
     * @return void
     */
    public function setUrlParameters(array $params);

    /**
     * @param \App\Contracts\Http\EnvelopeInterface $envelope
     *
     * @return bool
     */
    public function hasValidEnvelope(EnvelopeInterface $envelope) : bool;
}