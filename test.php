<?php
/**
 * Created by PhpStorm.
 * User: MY PC
 * Date: 9/19/2019
 * Time: 2:59 AM
 */
$my_file = 'data.txt';
//$data = nl2br('New data line 1');
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);

//fwrite($handle, $data);
$typical=[0,'firstname','lastname','assword','mail'];
$ser = base64_encode(serialize($typical));
$new_data = "\n".$ser;
fwrite($handle, $new_data);
fclose($handle);

$handle = fopen('readable.txt', 'a') or die('Cannot open file:  ');

//fwrite($handle, $data);
$typical=[0,'firstname','lastname','assword','mail'];
$ser = serialize($typical);
$new_data = "\n".$ser;
fwrite($handle, $new_data);
fclose($handle);


//foreach($lines as $key => $line) {
////    if($line === $remove) unset($lines[$key]);
//    echo $key;
//}
//$my_file =fopen($my_file,"r");
$lines = file($my_file);
foreach($lines as $line) {
//    if(trim($line) != $DELETE) {
//        $out[] = $line;
//    }
    if(trim($line)=="password"){
        echo "foind it";
   }
   else{
       echo "mo";
   }
}
//$handle= fopen($my_file,"r");
//if($handle){
//    while (($line=fgets($handle)) != false){
//    if($line=="password"){
//        echo "foind it";
//    }
//
//    }
//}

