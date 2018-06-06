<?php

namespace application;

use helpers\Console;

/**
 * Class Asus
 * @package application
 */
class Asus extends Computer implements IComputer
{
    const IS_DESKTOP = false;

    public function __construct()
    {
        $this
            ->setComputerName('Asus X540LJ')
            ->setCpu('Intel Core i3-4005U (1.7 Ghz)')
            ->setRam('6 Gb')
            ->setVideo('nVidia GeForce GT 920M')
            ->setMemory('HDD 1 Tb');
    }

    public function identifyUser()
    {
        Console::printLine($this->getComputerName() . ': Identify by login and password', Console::$note);
    }
}