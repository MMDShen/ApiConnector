<?php
//require_once 'CurlConnector.php';
namespace AddressSetter;

use DomainSetter\DomainSetter;
use Exception;
use PatternSetter\PatternSetter;

/**
 * this is a modular class
 * gets domain from user
 * gets paths with their usage as key and lists their placeholders if exist
 * gets used pattern in paths to determines placeholder locations
 *
 * @package SetApi
 * @author Mohammad Sharafi <mohammad.sharafi.iranian.1994@gmail.com>
 * @version
 * @access public
 */
class AddressSetter
{
    private $addresses;
    private $domainSetter;
    private $patternSetter;

    public function __construct(DomainSetter $domainSetter, PatternSetter $patternSetter)
    {
        $this->domainSetter = $domainSetter;
        $this->patternSetter = $patternSetter;
    }

    public function setOneAddress($usage, $path)
    {
        if (json_decode($this->domainSetter->getDomain(), true)['result'] != 'there is no domain') {
            $this->addresses[$usage]['address'] = json_decode($this->domainSetter->getDomain(), true)['result'] . $path;
            $this->setPlaceHolders($usage, $path);
            $result = ['result' => 'address set'];
        } else
            $result = ['result' => 'address is not set'];
        return json_encode($result);
    }

    public function getAddresses()
    {
        if (isset($this->addresses))
            $result = ['result' => $this->addresses];
        else
            $result = ['result' => 'there is no address'];
        return json_encode($result);
    }

    public function getOneAddress($usage)
    {
        if ($this->checkOneAddress($usage))
            $result = ['result' => [$this->addresses[$usage]['address']],$this->addresses[$usage]['entities']];  // task: later try $this
        else
            $result = ['result' => 'there is no address'];
        return json_encode($result);
    }

    public function unsetAddresses()
    {
        if (isset($this->addresses)) {
            unset($this->addresses);
            $result = ['result' => 'address unset'];
        } else
            $result = ['result' => 'there is no address'];
        return json_encode($result);
    }

    private function setPlaceHolders($usage, $path)
    {
        if (json_decode($this->patternSetter->testPattern($path),true)['result']!='there is no matches') {
            preg_match_all('/' . json_decode($this->patternSetter->getPattern(), true)['result'] . '/', $path, $matches);  // put possible matches in matches variable
            foreach ($matches as $entity) {
                $this->addresses[$usage]['entities'] = $entity;   // save em in entities one by one
            }
        } else
            $this->addresses[$usage]['entities'] = 'there is no entities';

    }

    private function checkOneAddress($usage)
    {
        return isset($this->addresses[$usage]['address']);
    }
}

//$test = new AddressSetter('www.example.com');
//var_dump($test);
//echo "</br>";
//
//$test->setPattern("{.+}");
//
//$test->setDomain('www.example3.com');
//var_dump($test);
//echo "</br>";
//
//$test -> setOneAddress('follow','/user/follow/{target_user}');
//var_dump($test);
//echo "</br>";
//
//$test -> setAddresses('gist','/{gist}/{user}/id/{gist-id}');
//var_dump($test);
//echo "</br>";


//$api = new SetApi("www.google.com");
////$api -> setDomain("www.google.com");
////echo $api -> getDomain()."</br>";
//$api -> setAddresses('follow','/user/follow/target_user');
//$api -> setAddresses('block','/user/block/target_user');
//echo "</br></br></br>";
//
//var_dump($api);
//echo "</br></br></br>";
//
////foreach ($api -> getAddresses() as $x)
//  //  echo $x."</br>";
//
//
//$api -> setDomain("www.example.com");
////echo $api -> getDomain()."</br>";
//
//
////echo filter_var('https://www.google.com/', FILTER_SANITIZE_URL)."</br>";
////echo filter_var('www.google.com', FILTER_SANITIZE_URL)."</br>";
////echo filter_var('google.com', FILTER_SANITIZE_URL)."</br>";
//
////$a = $api ->setAddresses('list of followers','/users/{username}/following/{target_user}',1)->getAddresses();
////var_dump($api->setUserName('/users/{username}/following/{target_user}'));
////var_dump($a);
////var_dump($api -> getAddresses());
//echo "</br></br></br>";
//try {
//    $g = $api -> getAddresses();
//    var_dump($api -> getAddresses());
//    if(isset($g))
//        foreach ($g as $x) // throw
//            echo $x."</br>";
//
//}catch (Exception $e){
////    echo 'Caught exception: ',  $e->getMessage(), "\n";
////}
