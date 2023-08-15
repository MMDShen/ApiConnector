<?php

namespace DomainSetter;

require_once 'ProtocolValidator.php';
require_once 'DomainValidator.php';

use DomainValidator\DomainValidator;

/**
 *  this is MOACs!!
 *
 *
 */
class DomainSetter
{
    protected $domain;
    private $domainValidator;

    public function __construct(DomainValidator $domainValidator)
    {
        $this->domainValidator = $domainValidator;
    }

    public function setDomain($domain)
    {
        if (isset($this->domain))
            $result = ['result' => 'domain exist'];
        else {
            if ($this->domainValidator->checkDomain($domain)) {
                $this->domain = 'https://' . $domain;
                $result = ['result' => 'domain set'];
            } else
                $result = ['result' => 'domain is not valid'];
        }


        return json_encode($result);
    }


    public function getDomain()
    {
        if (isset($this->domain))
            $result = ['result' => $this->domain];
        else
            $result = ['result' => 'there is no domain'];
        return json_encode($result);
    }

    public function unsetDomain()
    {
        if (isset($this->domain)) {
            unset($this->domain);
            $result = ['result' => 'domain unset'];
        } else
            $result = ['result' => 'there is no domain'];
        return json_encode($result);
    }

}
// TODO set an abstraction for build domain url method

//$protocol = new ProtocolValidator();
//$Domain = new DomainValidator();
////var_dump($protocol);
//$g = new DomainSetter($Domain);
//try {
//    //$g->getDomain();
//    //$g->unsetDomain();
//    $g->setDomain("w2ww.RE.com",1);
//}
//catch (Exception $e) {
//    echo "Error: " . $e->getMessage();
//}
