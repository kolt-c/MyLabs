<?php
/**
 * Created by PhpStorm.
 * User: AsusX202
 * Date: 31.03.2018
 * Time: 15:19
 */

echo 'Привет <strong>'.$_GET["name"].'</strong>!<br>';
echo '<p>Вывод массива _SERVER </p><br>';

print_r($_SERVER);

echo '<br><p> теперь построчно: </p><br>';

foreach ($_SERVER as $item) {
    echo $item.'<br>';
}

define('MY_CONST',$_GET["name"]);

echo 'MY_CONST value is '.MY_CONST.' Type is '.gettype(MY_CONST);
?>
