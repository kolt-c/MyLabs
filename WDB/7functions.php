<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Hello!</h1>
<?php

function getSqr($n){
    static $count = 0;
    $count++;
    echo $count.'  ';
    return $n*$n;
}
for ($i=1;$i<10;$i++){
    echo getSqr($i);
    echo '<br>';
}
?>
</body>
</html>