<?php

if(isset($argv[1])) {
    $name=trim($argv[1]);
}else{
    $name=NULL;
    exit("There is no name at command line! Try again.");
}

$db=array();
$db["Nick"]=array("Name"=>"Nick","Age"=>35,"Gender"=>"male");
$db["Olha"]=array("Name"=>"Olha","Age"=>20,"Gender"=>"female");
$db["Andrey"]=array("Name"=>"Andrey","Age"=>37,"Gender"=>"male");

$found=false;

foreach($db as $key => $value){
    if($key==$name){
        echo("$value[Name]".PHP_EOL);
        echo("$value[Age]".PHP_EOL);
        echo("$value[Gender]".PHP_EOL);
        $found=true;
    }
}
if($found==false){
    exit("There is no students with this name found!");
}
