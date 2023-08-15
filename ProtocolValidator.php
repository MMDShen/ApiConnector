<?php

namespace ProtocolValidator;

class ProtocolValidator
{
    public function __construct(){
    }

    public function  __destruct(){
    }

    public function checkProtocol($protocol){
        if($protocol<3)
            return 1;
        else
            throw new Exception('There is No Valid Protocol');
    }
}