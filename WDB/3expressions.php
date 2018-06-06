<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expressions</title>
</head>
<body>
<?php
$a = 'Hello';
$b = 'World';
$c = $a.$b;
echo $c;
echo '<br>';
echo $c[1].$c[3].$c[5].$c[7];
echo '<br>';
$x = -17;

$x = $x < 0? - $x: $x;
echo $x;

?>
</body>
</html>