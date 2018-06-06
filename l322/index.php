<?php

include_once 'FILE.php';

$path = 'data.php';

if !file_exists($path){
    'Exception! File does not exist.';
}
else{
    $x=new FILE($path);
}

