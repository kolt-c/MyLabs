<?php

namespace application;

use helpers\Console;
use exceptions\ComputerException;

/**
 * Class Computer
 * @package application
 */
abstract class Computer
{
    /**
     * @var string
     */
    private $cpu;

    /**
     * @param string $cpu
     * @return Computer
     */
    protected function setCpu($cpu)
    {
        $this->cpu = $cpu;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * @var string
     */
    private $ram;

    /**
     * @param string $ram
     * @return Computer
     */
    protected function setRam($ram)
    {
        $this->ram = $ram;
        return $this;
    }

    /**
     * @return string
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * @var string
     */
    private $video;

    /**
     * @param string $video
     * @return Computer
     */
    protected function setVideo($video)
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @var string
     */
    private $memory;

    /**
     * @param string $memory
     * @return Computer
     */
    protected function setMemory($memory)
    {
        $this->memory = $memory;
        return $this;
    }

    /**
     * @return string
     */
    public function getMemory()
    {
        return $this->memory;
    }

    /**
     * @var string
     */
    private $computerName = 'Computer';

    /**
     * @param string $computerName
     * @return Computer
     */
    protected function setComputerName($computerName)
    {
        $this->computerName = $computerName;
        return $this;
    }

    /**
     * @return string
     */
    public function getComputerName()
    {
        return $this->computerName;
    }

    /**
     * @var bool
     */
    private $isWorking = false;

    public function start()
    {
        $this->isWorking = true;
        Console::printLine($this->getComputerName() . ' is working', Console::$success);
    }

    public function shutDown()
    {
        $this->isWorking = false;
        Console::printLine($this->getComputerName() . ' is off', Console::$failure);
    }

    public function restart()
    {
        if ($this->isWorking) {
            $this->shutDown();

            for ($timer = 5; $timer > 0; $timer--) {
                Console::printLine('.');
                sleep(1);
            }
            echo PHP_EOL;

            $this->start();
        } else {
            throw new ComputerException($this->getComputerName() . ' must be turned on for restart');
        }
    }

    public function printParameters()
    {
        if ($this->isWorking) {
            Console::printLine('<<<<<<<<<<', Console::$note);
            Console::printLine("Name: {$this->getComputerName()}");
            Console::printLine("CPU: {$this->getCpu()}");
            Console::printLine("RAM: {$this->getRam()}");
            Console::printLine("Video card: {$this->getVideo()}");
            Console::printLine("Memory: {$this->getMemory()}");
            Console::printLine('>>>>>>>>>>', Console::$note);
        } else {
            throw new ComputerException($this->getComputerName() . ' must be turned on for print parameters');
        }
    }

    public abstract function identifyUser();
}
