<?php
/**
 * Created by PhpStorm.
 * User: MY PC
 * Date: 9/19/2019
 * Time: 9:50 AM
 */
//echo dirname('data.txt');
$my_file = 'data.txt';
$lines = file($my_file);
//$d=file_get_contents($my_file);
//echo $d[2];
//$t=(unserialize($lines[2]));
//echo $t[0];

foreach($lines as $line) {
    $result= unserialize(base64_decode($line));
//    if(trim($line) != $DELETE) {
//        $out[] = $line;
//    }
//    if(trim($line)=="password"){
//        echo "foind it";
//    }
//    else{
//        echo "mo";
//    }
//    if(trim($line)!='Array'){
//        $result= unserialize($lines[2]);
//        echo $result[0];
//    }
    echo $result[4];
    continue;


}