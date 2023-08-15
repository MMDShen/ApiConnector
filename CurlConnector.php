<?php
namespace CurlConnector;
use AddressSetter\AddressSetter;
use ApiConfigure\ApiConfigure;
use DomainSetter\DomainSetter;
use DomainValidator\DomainValidator;
use PatternSetter\PatternSetter;

require_once 'PatternSetter.php';
require_once 'ApiConfigure.php';
require_once 'DomainSetter.php';
require_once 'AddressSetter.php';


class CurlConnector
{
    private $token='';
    private $apiConfigure;
    protected $header = ['auth' => 'Authorization: Bearer ','accept' => 'Accept: application/vnd.github+json'];
    private $options = [
        CURLOPT_USERAGENT => 'useragent',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true
    ];

    function __construct(ApiConfigure $apiConfigure)
    {
        $this->apiConfigure = $apiConfigure;
    }

    function tokenSetter($token)
    {
        if(isset($token)){
            $this->token = $token;
            $result = ['result' => 'token set'];}
        else{
            $result = ['result' => 'there is no token'];
        }
        return json_encode($result);
    }

    function curlConnection($usage, ...$entities)
    {
        //return $this->token;
        // this is it
        $init = curl_init(json_decode($this->apiConfigure->getApi($usage,$entities),true)['result']);
        curl_setopt($init,CURLOPT_HTTPHEADER,array($this->header['accept'], $this->header['auth'] . $this->token));
        curl_setopt_array($init,$this->options);
        $result = curl_exec($init);
        curl_close($init);
        return  $result;
        // this is it


        //TODO REBUILD this section
//        var_dump($this->token);
//        echo "</br>";
//        var_dump($usage);
//        echo "</br>";
//        var_dump($entities);
//        echo "</br>";
//        var_dump(json_decode($this->apiConfigure->getApi($usage,$entities),true)['result']);
//        echo "</br>";
//        var_dump($this->token);
//        $curlSession = curl_init();
//        curl_setopt($curlSession, CURLOPT_URL, json_decode($this->apiConfigure->getApi($usage, $entities),true)['result']);
//        curl_setopt_array($curlSession, $this->options);
//        //curl_setopt($curlSession, CURLOPT_HTTPHEADER, array('Accept: application/vnd.github+json', 'Authorization: Bearer ' . $this->token));
//        curl_close($curlSession);
//        //var_dump(curl_exec($curlSession));
//        $result = ['result' => curl_exec($curlSession)];
//
//        return json_encode($result);
    }
}

class HeaderSetter extends CurlConnector{
    public  function setAuthMethod($method){
        $this->header+=['auth' => 'Authorization: ' . $method];
    }
    public function setAcceptMethod($method){
        $this->header+=['accept' => 'Accept: ' . $method];
    }
}

$d = new HeaderSetter(new ApiConfigure(new AddressSetter(new DomainSetter(new DomainValidator()),new PatternSetter())));
 //var_dump($d->dd(['god'=>'bombs']));
//done
//$newConnection = new CurlConnector( new ApiConfigure(new AddressSetter(new DomainSetter(new DomainValidator()),new PatternSetter())));
//$newConnection->tokenSetter('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');
//$newConnection->curlConnection('f','f');
//


////$do = new CurlConnector('MMDShen','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');
////$many = $do->curlConnection();
//echo "<pre>";
////var_dump($many);
//echo "</pre>";
