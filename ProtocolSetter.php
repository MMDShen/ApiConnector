<?php

require_once 'ProtocolValidator.php';

use ProtocolValidator\ProtocolValidator;

class ProtocolSetter
{
    protected $protocol;
    private $protocolValidator;

    public function __construct(ProtocolValidator $protocolValidator)
    {
        $this->protocolValidator = $protocolValidator;
    }

    public function __destruct()
    {
    }

    public function setProtocol($protocol)
    {
        $this->protocolValidator->checkProtocol($protocol);
    }

}