<?php
$result=0;

$x=trim($argv[1]);
$oper=trim($argv[2];
$y=trim($argv[3]);
var_dump($argv);
echo(PHP_EOL);

printf('x='.$x.' oper='.$oper.' y='.$y);
echo(PHP_EOL);

$test=true;

if (is_numeric($x)){
    printf($x.' is numeric');
}
else{
    printf($x.' is incorrect');
    $test=false;
}
echo(PHP_EOL);
if (is_numeric($y)){
    printf($y.' is numeric');
}
else{
    printf($y.' is incorrect');
    $test=false;
}
echo(PHP_EOL);
$samples=array("+","-","*","/");
if (in_array($oper,$samples)){
    if (($y==0)and($oper=="/")){
        echo("Zero division founded!");
        $test=false;
    }else {
        printf($oper . ' is OK');
    }
}
else{
    printf($oper.' is incorrect. It should be only +,-,*,/');
    $test=false;
}
echo(PHP_EOL);

if ($test==false){
    echo('Correct you mistakes and try again.');
    exit();
}else{
    if($oper=="+"){
        $result=$x+$y;
    }elseif ($oper=="-"){
        $result=$x-$y;
    }elseif ($oper=="*"){
        $result=$x*$y;
    }elseif($oper=="/"){
        if ($y!=0) {
            $result = $x / $y;
        }
    }
}
echo('result is '.$result.PHP_EOL);
exit();