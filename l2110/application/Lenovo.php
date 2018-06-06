<?php

namespace application;

use helpers\Console;

/**
 * Class Lenovo
 * @package application
 */
class Lenovo extends Computer implements IComputer
{
    const IS_DESKTOP = true;

    public function __construct()
    {
        $this
            ->setComputerName('Lenovo E50-00')
            ->setCpu('Intel Pentium Quad Core J2900 (2.41 GHz)')
            ->setRam('4 Gb')
            ->setVideo('Intel HD Graphics')
            ->setMemory('HDD 1 Tb');
    }

    public function identifyUser()
    {
        Console::printLine($this->getComputerName() . ': Identify by fingerprints', Console::$note);
    }
}
