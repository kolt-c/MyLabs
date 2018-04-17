<?php

/**
 * Class MacBook
 */
class MacBook extends Computer
{
    const IS_DESKTOP = false;

    public function __construct()
    {
        $this->computerName = 'Apple MacBook Air 13"';
        $this->cpu = 'Intel Core i5 (1.6 - 2.7 GHz)';
        $this->ram = 'RAM 8 Gb';
        $this->video = 'Intel HD Graphics 6000';
        $this->memory = 'SSD 256 Gb';
    }

    public function identifyUser()
    {
        echo $this->computerName . ': Identify by Apple ID' . PHP_EOL;
    }
}
