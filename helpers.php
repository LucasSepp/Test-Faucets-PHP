<?php
function timeToFillBottle($bottle, $faucetFlow){
        return $bottle/$faucetFlow;
    }

function isAvailableFaucet($faucets){
        for ($position = 0; $position < sizeof($faucets); $position++) {
            if($faucets[$position]->isAvailable){
                return $position;
            }
        }
        return -1;
}

function nextFreeFaucet($faucets){
    
    $lowerValue=$faucets[0]->accumulatedTime;
    $posLowerValue=0;

    for ($position = 1; $position < sizeof($faucets); $position++) {
        if($faucets[$position]->accumulatedTime < $lowerValue){
            $lowerValue = $faucets[$position]->accumulatedTime;
            $posLowerValue = $position;
        }
    }
    return $posLowerValue;
}

function parameterValidation($faucets, $queuePeople, $timeToGetOnTapInSeconds){

    foreach($faucets as $faucet){
        if (!is_a($faucet, 'Faucet')) {
            throw new Exception('Non-standard input parameters requested: Object is not a Faucet');
        }
    }

    foreach($queuePeople as $person){
        if (!is_a($person, 'Person')) {
            throw new Exception('Non-standard input parameters requested: Object is not a Person');
        }
    }

    if(!is_int($timeToGetOnTapInSeconds)){
        throw new Exception('Non-standard input parameters requested: Object is not a Integer'); 
    }

}



?>