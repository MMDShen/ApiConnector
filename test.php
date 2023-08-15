<?php
$a = "i/am/a/{nice}/person/with/{a}/{lot-2}/to/do";
//$a = "i am a nice person with a lot to do";
//$ggg=null;
$b = "/\{([^}]+)\}/";
$c = "/\{.+?\}/"; // bing suggestion
preg_match_all($c,$a,$matches);
//var_dump($matches); // this variable do the rest

foreach ($matches as $entity){
    $match['god']['ABC']=$entity;
}
//var_dump(preg_replace($c,'abcd',$a,1));
var_dump($matches);

