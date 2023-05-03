<?php
session_start();
include '../connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if($_POST['submit']){
    $username = $_POST['username'];
    $email = $_POST['useremail'];
    $password = $_POST['userpassword'];
    $fname = $_POST['firstname'];
    $mname = $_POST['middlename'];
    $lname = $_POST['lastname'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $gcash = $_POST['gcash'];
    $idtype = $_POST['id_type'];
    $idnum = $_POST['id_number'];


    //Validation of Email Existence
    $sql = "SELECT * FROM users WHERE uEmail ='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $_SESSION['status'] = "Email Already Exist!";
        header('Location:' . $home . '/registration.php');
        return;
    }

    //Inserting Register Users
    $sqlusersinsertion = "INSERT INTO users (uUsername, uPassword, uEmail, uFirstName, uMiddleName, uLastName, uContact, uStreet, uBarangay, uCity, uProvince, uGCashNum) 
        VALUES ('$username', '$password', '$email', '$fname', '$mname', '$lname', '$contact', '$street', '$barangay', '$city', '$province', '$gcash');";
        $usersinserted = $conn->query($sqlusersinsertion);

    //Inserting Passenger or Driver
    $sql = "SELECT uID FROM users WHERE uEmail='$email' AND uPassword='$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $userID = $row['uID'];

    if($idtype === "driver"){
        $sqldriverinsertion = "INSERT INTO driver (uID, dLicense)
        VALUES ('$userID', '$idnum');";
        $driversinserted = $conn->query($sqldriverinsertion);
    }else{
        $sqlpassengerinsertion = "INSERT INTO passenger (uID, pTypeID, pNumberID)
        VALUES ('$userID', '$idtype','$idnum');";
        $passengerinserted = $conn->query($sqlpassengerinsertion);
    }


    //Mailing Message
    $name = $fname . " " . $lname;
    $subject = "Vroom Vroom, Welcome! " . $name;
    $link = $home . "/backend/verify.php?user=" . $email . "";
    $message = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    </head>
    <body>
    <h2>Welcome!</h2>
    <p>Please Verify your Email by cliking the link down below</p>
    <a id="verify" href="' .$link . '">Click this Link!</a>
    <p>Thank You!</p>
    </body>
    </html>
    ';
    

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = 'true';
    $mail->Username = 'carpoolapp@caryl.tech';
    $mail->Password = 'carpool-App123';
    $mail->SMTPSecure = 'tls';
    $mail->Port = '587';

    $mail->setFrom('carpoolapp@caryl.tech', 'Carpool App');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->send();

    $_SESSION['status'] = "Check your Email for Verification";
    header('Location: ' . $home . '/index.php');
}
?>
