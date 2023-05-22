<?php
include '../includes/connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_SESSION['auth_id'];
    $amount = $row['billAmount'];
    //Declared Variables
    $amount = $_POST['cashout_amount'];
    $gcash_num = $_POST['gcash_number'];

    $sql = "SELECT * FROM users INNER JOIN billing ON users.uID = billing.uID WHERE users.uID = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $user_balance = $row['uBalance'];

    //computation
    $wholeNumber = floor($amount / 1000); //get the whole number
    $modulo = $amount % 1000;
    if ($modulo > 0 && $modulo <= 999) {
        $wholeNumber += 1;
        $wholeNumber *= 20;
    }else{
        $wholeNumber *= 20;
    }

    $resultCashOut = $amount + $wholeNumber;


    if ($resultCashOut > $user_balance) {
        $_SESSION['status'] = "Insufficient Ticket.";
        header('Location: ' . $home . '/driver/cash_out.php');
    } else {



        $sql = "INSERT INTO billing (uID, billType, billGCashNum, billAmount) VALUES ('$id', 'Cash Out' ,'$gcash_num', '$amount');";
        $result = $conn->query($sql);

        $_SESSION['status'] = "Your Transaction is waiting for Approval.";
        header('Location: ' . $home . '/driver/cash_out.php');
    }
}
