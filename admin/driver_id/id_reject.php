<?php

include '../../includes/connection.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../backend/phpmailer/src/Exception.php';
require '../../backend/phpmailer/src/PHPMailer.php';
require '../../backend/phpmailer/src/SMTP.php';

$pass_id = $_GET['pass_id'];

//Selecting Users

$sql = "SELECT * FROM users INNER JOIN passenger ON users.uID = passenger.uID WHERE passenger.pID = '$pass_id'";
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
        
    }
}

// Prepared Statement & Binding (Avoid SQL Injections)
$stmnt = $conn->prepare("UPDATE passenger SET verify_driver = '3' WHERE pID='$pass_id'");
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
 <p>We are so sorry to say that your Drivers ID is rejected! You will stay as a Passenger VROOM VROOM</p>
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

$_SESSION['status'] = "Succesfully Rejected";
header('Location: ' . $home . '/admin/driver_id/pending.php');




