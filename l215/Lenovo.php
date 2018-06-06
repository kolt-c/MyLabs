<?php

class Lenovo extends Computer
{
    const IS_DESKTOP = true;

    public function __construct()
    {
        $this->setComputerName('Lenovo580b');
        $this->setCpu('A-8');
        $this->setRam('4Gb');
        $this->setVideo('Radeon');
        $this->setMemory('128SSD');
    }

    public function identifyUser()
    {
        echo $this->GetComputerName() . ': Identify by fingerprints' . PHP_EOL;
    }
}
