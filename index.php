<?php

use ApiConfigure\ApiConfigure;
use DomainSetter\DomainSetter;
use AddressSetter\AddressSetter;
use CurlConnector\CurlConnector;

require_once 'PatternSetter.php';
require_once 'ApiConfigure.php';
require_once 'DomainSetter.php';
require_once 'AddressSetter.php';
require_once 'CurlConnector.php';



$domainSetter = new DomainSetter(new \DomainValidator\DomainValidator());
$patternSetter = new \PatternSetter\PatternSetter();
$addressSetter = new AddressSetter($domainSetter, $patternSetter);
$apiSetter = new ApiConfigure($addressSetter);
$curlConnector = new CurlConnector($apiSetter);

$ans = json_decode($domainSetter->setDomain('api.github.com'));
$ans = json_decode($domainSetter->getDomain());
$ans = json_decode($patternSetter->setPattern('ththtxtxt'));
$ans = json_decode($addressSetter->setOneAddress('quote','/users/MMDShen/followers'));
$ans = json_decode($addressSetter->getAddresses(),true);
$ans = json_decode($apiSetter->setAddressList(),true);
$ans = json_decode($apiSetter->setAddressList(),true);
$ans = json_decode($apiSetter->getApi('quote'),true);
$ans = json_decode($curlConnector->tokenSetter('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'),true);
$ans = $curlConnector->curlConnection('quote','');
//$ans = json_decode($(),true);



//$curlConnector = new CurlConnector($apiSetter);
//$ans = json_decode($domainSetter->getDomain(), true);
//$ans = json_decode($domainSetter->unsetDomain(), true)['result'];
//$ans = json_decode($domainSetter->setDomain('api.github.com'), true);
//$ans = json_decode($domainSetter->getDomain(), true);
////$ans = json_decode($domainSetter->unsetDomain(),true);
//$ans = json_decode($patternSetter->getPattern());
//$ans = json_decode($patternSetter->unsetPattern(), true)['result'];
//$ans = json_decode($patternSetter->setPattern(' '), true);
//$ans = json_decode($patternSetter->testPattern('i am a good guy.'), true);
//$ans = json_decode($patternSetter->unsetPattern(), true)['result'];
//$ans = json_decode($patternSetter->setPattern('{.[^}]*}'), true);
//$ans = json_decode($patternSetter->testPattern('i am {a} good {guy.}'), true);
//$ans = json_decode($patternSetter->setPattern('{.[^}]*}'), true);
//$ans = json_decode($addressSetter->unsetAddresses(), true);
//$ans = json_decode($addressSetter->getAddresses(), true);
//$ans = json_decode($addressSetter->getOneAddress('follow'), true);
//$ans = json_decode($addressSetter->setOneAddress('follow','/{user}/follow/{target_user}'), true);
//$ans = json_decode($addressSetter->getOneAddress('follow'), true); // TODO if be empty is done!!! // if be repetitive has no appropriate error
////$ans = json_decode($addressSetter->setOneAddress('follow','/user/follow/{target_user}'), true);
//$ans = json_decode($addressSetter->getAddresses(), true);
////$ans = json_decode($addressSetter->getOneAddress('follow'), true)['result'][0];
//$ans = json_decode($addressSetter->unsetAddresses(), true);
//$ans = json_decode($addressSetter->getAddresses(), true);
//$ans = json_decode($addressSetter->setOneAddress('follow','/user/follow/{target_user}'), true);
//$ans = json_decode($addressSetter->setOneAddress('show','/user'), true);
//$ans = json_decode($apiSetter->setAddressList(), true);
//$ans = json_decode($apiSetter->getAddressList(), true);
//$ans = json_decode($apiSetter->getApi('follow','ali'), true);
//$ans = json_decode($apiSetter->getApi('show'), true);
////$ans = json_decode($curlConnector->tokenSetter(''), true);
////$ans = json_decode($curlConnector->curlConnection('show',''), true);
//
//$patternSetter->setPattern('');
//$domainSetter->unsetDomain();
//$domainSetter->setDomain('api.api-ninjas.com');
//$ans = $domainSetter->getDomain();
//$addressSetter->unsetAddresses();
//$addressSetter->setOneAddress('quote','/v1/quotes?category=happiness');
//$ans = $addressSetter->getAddresses();
//$apiSetter->setAddressList();
////$ans = json_decode($apiSetter->getApi('follow',''),true);

//$ans = $apiSetter->unsetAddressList();
//$ans = $apiSetter->setAddressList();
//$ans = $curlConnector->curlConnection('follow','');
//$ans = json_decode($apiSetter->getAddressList(),true);









var_dump($ans);