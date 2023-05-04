<?php

include '../../includes/connection.php';
session_start();
$car_id = $_GET['car_id'];
$user_id = $_GET['user_id'];

// Prepared Statement & Binding (Avoid SQL Injections)
$stmnt = $conn->prepare("UPDATE cardetails SET verify_car = 1 WHERE cID='$car_id'");
$stmnt->execute();
$stmnt->close();
$conn->close();
// $stmnt = $connection->prepare("UPDATE users SET user_type = 'Driver' WHERE user_id='$user_id'");
// $stmnt->execute();

$_SESSION['status'] = "Approved!";
header('Location: ' . $home . '/admin/car_status/pending.php');