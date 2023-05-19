<?php

include '../../includes/connection.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../backend/phpmailer/src/Exception.php';
require '../../backend/phpmailer/src/PHPMailer.php';
require '../../backend/phpmailer/src/SMTP.php';

$billing_id = $_GET['billing_id'];

//Selecting Users

$sql = "SELECT * FROM billing INNER JOIN users ON billing.uID = users.uID WHERE billing.billID = '$billing_id'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){

        //Declared Variables
        $username = $row['uUsername'];
        $email = $row['uEmail'];
        $password = $row['uPassword'];
        $fname = $row['uFirstName'];
        $mname = $row['uMiddleName'];
        $lname = $row['uLastName'];
        $contact = $row['uContact'];
        $street = $row['uStreet'];
        $barangay = $row['uBarangay'];
        $city = $row['uCity'];
        $province = $row['uProvince'];
        $gcash = $row['uGCashNum'];
        
        $amount = $row['billAmount'];
    }
}

// Prepared Statement & Binding (Avoid SQL Injections)
$stmnt = $conn->prepare("UPDATE billing SET bill_status = '3' WHERE billID='$billing_id'");
$stmnt->execute();
$stmnt->close();
$conn->close();

 //Mailing Message
 $name = $fname . " " . $lname;
 $subject = "Vroom Vroom, Welcome! " . $name;
 $link = $home . "/index.php";
 $message = '
 <!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="UTF-8">
 </head>
 <body>
 <h2>Welcome!</h2>
 <p>Your Cashed In Transaction is now Verified by the Admin! Please do refresh or log in again to see</p>
 <a id="verify" href="' . $link . '">Click this Link!</a>
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

$_SESSION['status'] = "Succesfully Verified";
header('Location: ' . $home . '/admin/cash_in/cash_in_list.php');




