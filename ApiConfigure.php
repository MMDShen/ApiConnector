<?php

namespace ApiConfigure;

use AddressSetter\AddressSetter;


//use AddressSetter\AddressSetter;

require_once 'AddressSetter.php';

/**
 *
 */
class ApiConfigure
{
    private $addressSetter;
    private $addressList; // should have key and value

    /**
     * @var AddressSetter
     */

    function __construct(AddressSetter $addressSetter)
    {
        $this->addressSetter = $addressSetter;
    }

    public function setAddressList()
    {
        if (isset($this->addressList))
            $result = ['result' => 'addresslist exist'];
        else {
            $this->addressList = json_decode($this->addressSetter->getAddresses(), true)['result']; // should have key and value
            $result = ['result' => 'addresslist set'];
        }
        return json_encode($result);
    }

    public function unsetAddressList()
    {
        if (isset($this->addressList)) {
            $this->addressList = $this->addressSetter->getAddresses(); // should have key and value
            $result = ['result' => 'adresslist unset'];
        } else
            $result = ['result' => 'there is no addresslist'];
        return json_encode($result);

    }

//
    public function getAddressList()
    {
        if (isset($this->addressList))
            $result = ['result' => $this->addressList];
        else
            $result = ['result' => 'there is no addresslist'];
        return json_encode($result);
    }

    public function getApi($usage, ...$entities)
    {
        $api = $this->addressList[$usage]['address'];
        if ($this->addressList[$usage]['entities'] != 'there is no entities') {
            $entity = $this->addressList[$usage]['entities']; // TODO fatal error done
            foreach (array_combine($entity, $entities) as $pattern => $replacement) {
                $configuredApi = preg_replace('/' . $pattern . '/', $replacement, $api);
            }
            $result = ['result' => $configuredApi];
        } else
            $result = ['result'=>$api];
        //var_dump($this->addressList);
        return json_encode($result);
    }

}
//$testing = new AddressSetter('www.google.com');
//$testing ->setPattern('\{.+?\}');
//$testing -> setOneAddress('follow','/user/follow/{target_user}');
////var_dump($testing);
//$api = new ApiSetter();
//$api->getApi($testing);
////$api->setApi($test);