<?php


class Asus extends Computer
{
    const IS_DESKTOP = false;

    public function __construct()
    {
        $this->computerName = 'Asus EEE';
        $this->cpu = 'Intel Atom';
        $this->ram = 'RAM 1 Gb';
        $this->video = 'int.';
        $this->memory = 'HDD 320Gb';
    }
}