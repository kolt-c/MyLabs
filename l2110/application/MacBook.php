<?php

namespace application;

use helpers\Console;

/**
 * Class MacBook
 * @package application
 */
class MacBook extends Computer implements IComputer
{
    const IS_DESKTOP = false;

    public function __construct()
    {
        $this
            ->setComputerName('Apple MacBook Air 13"')
            ->setCpu('Intel Core i5 (1.6 - 2.7 GHz)')
            ->setRam('8 Gb')
            ->setVideo('Intel HD Graphics 6000')
            ->setMemory('SSD 256 Gb');
    }

    public function identifyUser()
    {
        Console::printLine($this->getComputerName() . ': Identify by Apple ID', Console::$note);
    }
}
