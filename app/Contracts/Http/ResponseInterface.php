<?php

namespace App\Contracts\Http;

interface ResponseInterface
{
    /**
     * @param \App\Contracts\Http\EnvelopeInterface $envelope
     *
     * @return \App\Contracts\Http\ResponseInterface
     */
    public function setEnvelope(EnvelopeInterface $envelope) : ResponseInterface;

    /**
     * @return \App\Contracts\Http\EnvelopeInterface
     */
    public function getEnvelope() : EnvelopeInterface;
}