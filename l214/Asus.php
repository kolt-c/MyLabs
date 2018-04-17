<?php

class Asus extends Computer
{
    const IS_DESKTOP = false;

    public function __construct()
    {
        $this->computerName = 'Asus X540LJ';
        $this->cpu = 'Intel Core i3-4005U (1.7 Ghz)';
        $this->ram = 'RAM 6 Gb';
        $this->video = 'nVidia GeForce GT 920M';
        $this->memory = 'HDD 1 Tb';
    }
}