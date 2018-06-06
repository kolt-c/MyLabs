<?php

$templates = array(
    'content'=>'content.php',
    'home'=>'home.php',
    '404'=>'404.php'
);

//var_dump($_GET);

if (isset($_GET['page'])){
    if (in_array($_GET['page'].'.php',$templates)){
        $path = './templates/'.$_GET['page'].'.php';
        //echo $path;
        showPage($path);
    }
    else{
        showPage('./templates/404.php');
    }
}

function showPage($path){
    require_once($path);
}