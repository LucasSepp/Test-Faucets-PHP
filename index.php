<?php
    require('Faucet.php');
    require('Person.php');
    require('helpers.php');
    require('seeds.php');
    
    function queueTimeFillingBottles($faucets, $queuePeople, $timeToGetOnTapInSeconds)
    {    

        parameterValidation($faucets, $queuePeople, $timeToGetOnTapInSeconds);
        
        foreach ($queuePeople as &$person) {

            $freeFaucetPosition = isAvailableFaucet($faucets);
            if($freeFaucetPosition!=-1){
                $faucets[$freeFaucetPosition]->isAvailable = false;
                $person->waitingTime = timeToFillBottle($person->bottleSizeML, $faucets[$freeFaucetPosition]->mlPerSecond)+$faucets[$freeFaucetPosition]->accumulatedTime;
                $faucets[$freeFaucetPosition]->accumulatedTime = $person->waitingTime;
                $person->usedFaucet = $freeFaucetPosition;
            }
            else{
                $nextFaucetPosition = nextFreeFaucet($faucets);
                $person->waitingTime = timeToFillBottle($person->bottleSizeML, $faucets[$nextFaucetPosition]->mlPerSecond)+$faucets[$nextFaucetPosition]->accumulatedTime+$timeToGetOnTapInSeconds;
                $faucets[$nextFaucetPosition]->accumulatedTime = $person->waitingTime;
                $person->usedFaucet = $nextFaucetPosition;
            }
  
        }

        return $queuePeople;
    }

    function main(){

       $timeToGetOnTapInSeconds = 3;
       $queuePeople = queueTimeFillingBottles(generateFaucets(), generatePeople(), $timeToGetOnTapInSeconds);
        
       echo "----------TIME TO FILL THE BOTTLE--------<br>";  

       foreach($queuePeople as $person){
            echo $person->bottleSizeML."(ml) -> ".$person->waitingTime."s - used faucet:".$person->usedFaucet."<br><br>";
       }

    }

    main();

?>