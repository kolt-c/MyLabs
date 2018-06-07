<?php

/**
 * Class Strings
 */
class Strings
{
    /**
     * @param int $length
     * @return string
     */
    public function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, strlen($characters))];
        }
        return $string;
    }
}