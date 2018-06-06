<?php

/**
 * Class Autoload
 */
class Autoload
{
    /**
     * @param $className
     * @throws Exception
     */
    public static function loader($className)
    {
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className) . ".php";
        if (file_exists($fileName)) {
            include($fileName);

            if (false === class_exists($className) && false === interface_exists($className)) {
                throw new Exception("Class {$className} is not exists");
            }
        } else {
            throw new Exception("File {$fileName} is not exists");
        }
    }
}
