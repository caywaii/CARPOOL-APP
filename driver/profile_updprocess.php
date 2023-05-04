<?php
include '../connection.php';
session_start()
;
$user_id = $_SESSION['auth_id'];

$password = $_POST['userpassword'];


$stmnt = $conn->prepare("UPDATE users SET uPassword = '$password' WHERE uID='$user_id'");
$stmnt->execute();


// $stmnt = $connection->prepare("UPDATE passengers SET pass_id_type = '$id_type', pass_id_number = '$id_number' WHERE user_id='$user_id'");
// $stmnt->execute();

$stmnt->close();
$conn->close();

$_SESSION['status'] = "Your Password is now updated successfully";
header('Location: ' . $home . '/driver/profile.php');
?>