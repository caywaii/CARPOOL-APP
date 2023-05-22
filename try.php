<?php
$amount = 100;
$wholeNumber = floor($amount/1000); //get the whole number
$modulo = $amount % 1000;
if($modulo > 0 && $modulo <= 999){
    $wholeNumber += 1;
    $wholeNumber *= 20;
}

$resultCashOut = $amount + $wholeNumber;

echo $resultCashOut;
echo $wholeNumber;

?>