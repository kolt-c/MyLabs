<?php
/**
 * Created by PhpStorm.
 * User: AsusX202
 * Date: 03.04.2018
 * Time: 20:21
 */

$curr_day = date('l');
$curr_hour = date('H');
//$curr_day = "Saturday";
//$curr_hour =20;

echo($curr_day.PHP_EOL);
echo($curr_hour.PHP_EOL);

if ($curr_day=="Saturday" || $curr_day=="Sunday"){
    echo "It is weekend!";
}else{
    if ($curr_hour>=9 and $curr_hour<=18){
        $h_remain=18-$curr_hour;
        echo("It's ".$h_remain." hours to the end of workday.");
    }else if ($curr_hour<9){
        $h_remain=9-$curr_hour;
        echo("It's ".$h_remain." hours to the start of workday.");
    }else if ($curr_hour>18){
        $h_remain=$curr_hour-18;
        echo("It's ".$h_remain." hours after the end of workday.");
    }else
        echo("Something wrong with this day $-(");
}

?>