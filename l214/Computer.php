<?php

class Computer
{
    protected $cpu;
    protected $ram;
    protected $video;
    protected $memory;
    protected $computerName = 'Computer';
    private $isWorking = false;

    public function start()
    {
        printf("Computer is starting..".PHP_EOL);
        $this->isWorking=True;
    }

    public function shutDown()
    {
        printf("Computer is stopping..".PHP_EOL);
        $this->isWorking=False;
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
            printf("Computer is off. You can't restart it now/".PHP_EOL);
        }
    }

    public function printParameters()
    {
        $result = $this->computerName . ' is not working.' . PHP_EOL;
        if ($this->isWorking) {
            $result = printf($this->computerName.' params:'.' cpu '.$this->cpu. ' ram '.$this->ram.' video '.$this->video.' memory '.$this->memory);}

        echo $result;
    }

    public function identifyUser()
    {
        echo $this->computerName . ': Identify by login and password' . PHP_EOL;
    }
}
