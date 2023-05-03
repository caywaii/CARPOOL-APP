<?php

session_start();
//PHP MAILER
include 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


//FUNCTIONS
function sendemail_verify($userFirstName, $userEmail, $verify_token)
{
    //PHP Mailer Declaration
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'santiagocarylrociel@gmail.com';
    $mail->Password = 'fhlrjphckkfbtnwu';

    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;



    //SETTING Email
    $mail->setFrom('santiagocarylrociel@gmail.com', 'Carpool Verification'); //Senders Email
    $mail->addAddress($userEmail); //Receivers Email
    $mail->isHTML(true);
    $mail->Subject = "Good Day!";

    $emailbody = " hello 
     <a href='http://localhost/carpool/verify-email.php?token=$verify_token'</a>
     <hr>
     <h4>Thank you and Let's RIDE!</h4>";


    $mail->Body = $emailbody;
    $mail->send();

    echo 'yeheyyyy';
}
if (isset($_POST["submit"])) {
    //DECLARATION OF NAMES 
    $userUserName = $_POST['username'];
    $userEmail = $_POST['useremail'];
    $userPassword = $_POST['userpassword'];
    $userFirstName = $_POST['firstname'];
    $userMiddleName = $_POST['middlename'];
    $userLastName = $_POST['lastname'];
    $uStreet = $_POST['street'];
    $uBarangay = $_POST['barangay'];
    $uProvince = $_POST['province'];
    $uCity = $_POST['city'];
    $uContact = $_POST['contact'];
    $uGCash = $_POST['gcash'];
    $verify_token = md5(rand());

    //EMAIL EXIST OR NOT
    $check_email_query = "SELECT uEmail FROM users WHERE uEmail = '$userEmail' LIMIT 1";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email already exists!";
        header("Location: registration.php");
    } else {
        $sql = "INSERT INTO users (uUsername, uPassword, uEmail, uFirstName, uMiddleName, uLastName, uContact, uStreet, uBarangay, uCity, uProvince, uGCashNum, verify_token) 
        VALUES ('$userUserName', '$userPassword', '$userEmail', '$userFirstName', '$userMiddleName', '$userLastName', '$uContact', '$uStreet', '$uBarangay', '$uCity', '$uProvince', '$uGCash', '$verify_token');";

        $query_run = mysqli_query($conn, $sql);

        if ($query_run) {

            sendemail_verify("$userFirstName", "$userEmail", "$verify_token");
            $_SESSION['status'] = "Registration Successful! Please Verify in Email!";
            header("Location: index.php");
        } else {
            $_SESSION['status'] = "Registration Failed!";
            header("Location: register.php");
        }
    }
}
