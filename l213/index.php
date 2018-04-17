<?php
class Computer{
    const IS_DESKTOP=True;
    public $strCPU;
    public $strRAM;
    public $strVideo;
    public $strMemory;
    public $boolCurStatus=False;
    public $strCpu;

    public function oStart(){
        printf("Computer is starting..".PHP_EOL);
        $this->boolCurStatus=True;
    }
    public function oRestart(){
        if ($this->boolCurStatus==True){
            $this->oShutdown();
            //printing 5 dots
            for($i=0;$i<5;$i++){
                printf(".");
                sleep(1);
            }
            printf(PHP_EOL);
            $this->oStart();
        }
        else{
            printf("Computer is off. You can't restart it now/".PHP_EOL);
        }
    }
    public function oShutdown(){
        printf("Computer is stopping..".PHP_EOL);
        $this->boolCurStatus=False;
    }

}
$MyComp = new Computer;
if ($MyComp instanceof Computer) {
    $MyComp->oStart();
    $MyComp->oRestart();
    $MyComp->oShutDown();
    $MyComp->oRestart();
}
