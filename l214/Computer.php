<?php

class Computer
{
    /**
     * @var string
     */
    protected $cpu;

    /**
     * @var string
     */
    protected $ram;

    /**
     * @var string
     */
    protected $video;

    /**
     * @var string
     */
    protected $memory;

    /**
     * @var string
     */
    protected $computerName = 'Computer';

    /**
     * @var bool
     */
    private $isWorking = false;

    public function start()
    {
        $this->isWorking = true;
        echo $this->computerName . ' is working' . PHP_EOL;
    }

    public function shutDown()
    {
        $this->isWorking = false;
        echo $this->computerName . ' is off' . PHP_EOL;
    }

    public function restart()
    {
        if ($this->isWorking) {
            $this->shutDown();

            for ($timer = 5; $timer > 0; $timer--) {
                echo '.';
                sleep(1);
            }
            echo PHP_EOL;

            $this->start();
        } else {
            echo $this->computerName . ' must be turned on for restart' . PHP_EOL;
        }
    }

    public function printParameters()
    {
        $result = $this->computerName . ' must be turned on for print parameters' . PHP_EOL;
        if ($this->isWorking) {
            $result = sprintf(
                "<<<<<<<<<<\nName: %s\nCPU: %s\nRAM: %s\nVideo card: %s\nMemory: %s\n>>>>>>>>>>\n",
                $this->computerName,
                $this->cpu,
                $this->ram,
                $this->video,
                $this->memory
            );
        }

        echo $result;
    }

    public function identifyUser()
    {
        echo $this->computerName . ': Identify by login and password' . PHP_EOL;
    }
}
