<?php

class Lenovo extends Computer
{
    const IS_DESKTOP = true;

    public function __construct()
    {
        $this->computerName = 'Lenovo580b';
        $this->cpu = 'A-8';
        $this->ram = '4Gb';
        $this->video = 'Radeon';
        $this->memory = '128SSD';
    }

    public function identifyUser()
    {
        echo $this->computerName . ': Identify by fingerprints' . PHP_EOL;
    }
}
