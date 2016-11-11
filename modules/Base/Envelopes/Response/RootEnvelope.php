<?php

namespace Base\Envelopes\Response;

use App\Http\Envelope;

class RootEnvelope extends Envelope
{
    /**
     * @var array $header
     */
    protected $header = [
        'Content-Type' => 'application/json'
    ];
}