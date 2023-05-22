<?php
include '../includes/connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_SESSION['auth_id'];

    //Declared Variables
    $gcash_num = $_POST['gcash_number'];
    $gcash_reference= $_POST['gcash_reference'];
    $amount = $_POST['amount'];

    if($amount == 50){
        $sql = "INSERT INTO billing (uID, billType, billGCashNum, billGCashReference, billAmount, billConFee) VALUES ('$id', 'Cash In' ,'$gcash_num', '$gcash_reference', '$amount', '10');";
        $result = $conn->query($sql);
   
   
    }else if($amount == 100){
        $sql = "INSERT INTO billing (uID, billType, billGCashNum, billGCashReference, billAmount, billConFee) VALUES ('$id', 'Cash In' ,'$gcash_num', '$gcash_reference', '$amount', '20');";
        $result = $conn->query($sql);
 
    }else if($amount == 250){
        $sql = "INSERT INTO billing (uID, billType, billGCashNum, billGCashReference, billAmount, billConFee) VALUES ('$id', 'Cash In' ,'$gcash_num', '$gcash_reference', '$amount', '50');";
        $result = $conn->query($sql);

 
    }else if($amount == 500){
        $sql = "INSERT INTO billing (uID, billType, billGCashNum, billGCashReference, billAmount, billConFee) VALUES ('$id', 'Cash In' ,'$gcash_num', '$gcash_reference', '$amount', '50');";
        $result = $conn->query($sql);

    }

    $_SESSION['status'] = "Your Transaction is waiting for Approval.";
    header('Location: ' . $home . '/passenger/cash_in.php');
}
