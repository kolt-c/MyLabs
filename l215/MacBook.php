<?php

class MacBook extends Computer
{
    const IS_DESKTOP = false;

    public function __construct()
    {
        $this->setComputerName('Apple MacBook Air 13"');
        $this->setCpu('I-7');
        $this->setRam('8Gb');
        $this->setVideo('Intel HD');
        $this->setMemory('SSD 256 Gb');
    }

    public function identifyUser()
    {
        echo $this->GetComputerName() . ': Identify by Apple ID' . PHP_EOL;
    }
}
