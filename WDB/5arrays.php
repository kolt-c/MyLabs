<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arrays</title>
</head>
<body>
<h1>Arrays</h1>

<?php
$name["Niko"]='1982';
$name["Nata"]='1981';
$name["Sasha"]='2009';

foreach ($name as $n=>$d){
    echo "Hi $n you was born in $d";
    echo '<br>';
}
$gender["Niki"]='male';
$gender["Natan"]='female';
$gender["Sash"]='female';
$all = $name + $gender;

echo var_dump($all);

?>

</body>
</html>