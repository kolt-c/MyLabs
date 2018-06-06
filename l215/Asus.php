<?php


class Asus extends Computer
{
    const IS_DESKTOP = false;

    public function __construct()
    {
        $this->setComputerName('Asus EEE');
        $this->setCpu('Intel Atom');
        $this->setRam('RAM 1 Gb');
        $this->setVideo('int.');
        $this->setMemory('HDD 320Gb');
    }
}