<?php

namespace DomainValidator;

class DomainValidator
{
    public function __construct()
    {
    }

    public function checkDomain($domain)
    {
        $result = get_headers('https://' . $domain);
        return preg_match('/(403)|(20\d)/', $result[0]);
    }

}
