<?php

include '../../includes/connection.php';
$car_id = $_GET['car_id'];
$user_id = $_GET['user_id'];
$id = $_SESSION['auth_id'];
$sql = "SELECT cID FROM cardetails INNER JOIN passenger ON cardetails.pdID = passenger.pdID INNER JOIN users ON passenger.uID = users.uID WHERE users.uID = '$user_id' AND verify_car='1'";
$result = $conn->query($sql);


if($result->num_rows == 0){

    $sqlUpdate = "UPDATE users SET uBalance= uBalance + 40 WHERE uID = '$user_id'";
    $potangina = $conn->query($sqlUpdate);
    // Prepared Statement & Binding (Avoid SQL Injections)
    $stmnt = $conn->prepare("UPDATE cardetails SET verify_car = 1 WHERE cID='$car_id'");
    $stmnt->execute();
    $stmnt->close();
    $conn->close();
    // $stmnt = $connection->prepare("UPDATE users SET user_type = 'Driver' WHERE user_id='$user_id'");
    // $stmnt->execute();

    $_SESSION['status'] = "Approved!";
    header('Location: ' . $home . '/admin/car_status/pending.php');

}else{
    
     // Prepared Statement & Binding (Avoid SQL Injections)
     $stmnt = $conn->prepare("UPDATE cardetails SET verify_car = 1 WHERE cID='$car_id'");
     $stmnt->execute();
     $stmnt->close();
     $conn->close();
     // $stmnt = $connection->prepare("UPDATE users SET user_type = 'Driver' WHERE user_id='$user_id'");
     // $stmnt->execute();
 
     $_SESSION['status'] = "Approved!";
     header('Location: ' . $home . '/admin/car_status/pending.php');
}


