<?php

include '../../includes/connection.php';
session_start();
$pass_id = $_GET['pass_id'];

// Prepared Statement & Binding (Avoid SQL Injections)
$stmnt = $connection->prepare("UPDATE passenger SET verify_driver = 1 WHERE pID='$pass_id'");
$stmnt->execute();
$stmnt->close();
$connection->close();

$_SESSION['message'] = "Succesfully Rejected!";
header('Location: ' . $home . '/admin/driver_id/pending.php');