<?php
session_start();

unset($_SESSION['auth_id']);
$_SESSION['status'] = "Logged Out!";
header('Location: ../index.php');
return;

?>