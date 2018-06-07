<?php

class Console
{
    public static $success = 'SUCCESS';
    public static $failure = 'FAILURE';
    public static $warning = 'WARNING';
    public static $note = 'NOTE';
    public static function printLine($message, $status = '')
    {
        switch ($status) {
            case self::$success:
                $color = "[0;32m]";
                break;
            case self::$failure:
                $color = "[0;31m]";
                break;
            case self::$warning:
                $color = "[1;33m]";
                break;
            case self::$note:
                $color = "[0;34m]";
                break;
            default:
                $color = '[1;37m]';
        }

        echo chr(27) . "{$color}{$message}" . chr(27) . "[0m" . PHP_EOL;
    }
}