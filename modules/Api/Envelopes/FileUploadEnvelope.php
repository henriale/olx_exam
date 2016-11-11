<?php

namespace Api\Envelopes;

use App\Http\Envelope;

class FileUploadEnvelope extends Envelope
{
    /**
     * @var array $header
     */
    protected $header = [
        'Content-Type' => 'multipart/form-data',
    ];
}