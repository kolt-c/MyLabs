<?php

class Computer
{
    private $cpu;
    private $ram;
    private $video;
    private $memory;
    private $computerName = 'Computer';
    private $isWorking = false;


    protected function setCpu($cpu)
    {
        $this->cpu = $cpu;
        return $this;
    }

    public function getCpu()
    {
        return $this->cpu;
    }

    protected function setRam($ram)
    {
        $this->ram = $ram;
        return $this;
    }
    public function getRam()
    {
        return $this->ram;
    }
    protected function setVideo($video)
    {
        $this->video = $video;
        return $this;
    }
    public function getVideo()
    {
        return $this->video;
    }
    protected function setMemory($memory)
    {
        $this->memory = $memory;
        return $this;
    }
    public function getMemory()
    {
        return $this->memory;
    }
    protected function setComputerName($computerName)
    {
        $this->computerName = $computerName;
        return $this;
    }
    public function getComputerName()
    {
        return $this->computerName;
    }

    public function start()
    {
        $this->isWorking=True;
        printf($this->getComputerName() ." is starting..".PHP_EOL);
    }

    public function shutDown()
    {
        $this->isWorking=False;
        printf($this->getComputerName() ." is stopping..".PHP_EOL);

    }

    public function restart()
    {
        if ($this->isWorking==True){
            $this->Shutdown();
            //printing 5 dots
            for($i=0;$i<5;$i++){
                printf(".");
                sleep(1);
            }
            printf(PHP_EOL);
            $this->Start();
        }
        else{
            printf($this->getComputerName()." is off. You can't restart it now.".PHP_EOL);
        }
    }

    public function printParameters()
    {
        $result = $this->computerName . ' is not working.' . PHP_EOL;
        if ($this->isWorking) {
            $result = $this->getComputerName().' params:'.' cpu '.$this->getCpu(). ' ram '.$this->getRam().' video '.$this->getVideo().' memory '.$this->getMemory();}

        echo $result;
    }

    public function identifyUser()
    {
        echo $this->getComputerName() . ': Identify by login and password' . PHP_EOL;
    }



}