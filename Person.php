<?php
class Person{

    public $bottleSizeML;
    public $waitingTime=0.0;
    public $usedFaucet = 0;

    function __construct($bottleSizeML){
        $this->bottleSizeML = $bottleSizeML;
    }
}

?>