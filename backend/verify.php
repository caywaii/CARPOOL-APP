<?php
include '../includes/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $email = $_GET['user'];

    // Checking of Verification Email
    $sql = "SELECT * FROM users WHERE uEmail='$email'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    if ($row['verify_user'] === 1) {
        $_SESSION['status'] = "Email has already been verified!";
        header('Location: ' . $home . '/index.php');
        return;
    }

    //UPDATE
    $update_query = "UPDATE users SET verify_user='1' WHERE uEmail = '$email'";
    $result = $conn->query($update_query);

    $_SESSION['status'] = "Your email is now verified! You may now login to your account.";
    header('Location: ' . $home . '/index.php');
}
