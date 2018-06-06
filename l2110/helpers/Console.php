<?php

namespace helpers;

/**
 * Class Console
 * @package helpers
 */
class Console
{
    /**
     * @var string
     */
    public static $success = 'SUCCESS';

    /**
     * @var string
     */
    public static $failure = 'FAILURE';

    /**
     * @var string
     */
    public static $warning = 'WARNING';

    /**
     * @var string
     */
    public static $note = 'NOTE';

    /**
     * @param string $message
     * @param string $status
     */
    public static function printLine($message, $status = '')
    {
        switch ($status) {
            case self::$success:
                $color = "[0;32m";
                break;
            case self::$failure:
                $color = "[0;31m";
                break;
            case self::$warning:
                $color = "[1;33m";
                break;
            case self::$note:
                $color = "[0;34m";
                break;
            default:
                $color = '[1;37m';
        }

        echo chr(27) . "{$color}{$message}" . chr(27) . "[0m" . PHP_EOL;
    }
}