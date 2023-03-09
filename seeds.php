<?php
function generateFaucets(){

    return [
        new Faucet(100.0), 
        new Faucet(100.0), 
        new Faucet(100.0),
    ];
};

function generatePeople(){
    return  [
        new Person(150), 
        new Person(100), 
        new Person(150),
        new Person(175),                
        new Person(350), 
        new Person(400),
        new Person(1000),
        new Person(1500),
    ];
};

?>