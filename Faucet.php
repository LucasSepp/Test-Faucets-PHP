<?php
class Faucet{

    public $accumulatedTime=0.0;
    public $mlPerSecond;
    public $isAvailable=true;

    function __construct($mlPerSecond){
        $this->mlPerSecond = $mlPerSecond;
    }
}

?>