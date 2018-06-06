<?php

class MacBook extends Computer
{
    const IS_DESKTOP = false;

    public function __construct()
    {
        $this->computerName = 'Apple MacBook Air 13"';
        $this->cpu = 'I-7';
        $this->ram = '8Gb';
        $this->video = 'Intel HD';
        $this->memory = 'SSD 256 Gb';
    }

    public function identifyUser()
    {
        echo $this->computerName . ': Identify by Apple ID' . PHP_EOL;
    }
}
