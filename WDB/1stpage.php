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
$dat = date("d.m.Y");
echo "$dat";
echo '<br>';
$time = date("h:i:s");
echo "$time";
echo '<br>';
for ($i=1;$i<=5;$i++){
    echo "$i multiplied 3 times is";
    echo $i*$i*$i;
    echo '<br>';
}
?>
</body>
</html>