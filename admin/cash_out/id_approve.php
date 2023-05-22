<?php

include '../../includes/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../backend/phpmailer/src/Exception.php';
require '../../backend/phpmailer/src/PHPMailer.php';
require '../../backend/phpmailer/src/SMTP.php';

$billing_id = $_GET['billid'];
$reference = $_GET['refer'];
$user_id = $_GET['userid'];
//Selecting Users

$sql = "SELECT * FROM billing INNER JOIN users ON billing.uID = users.uID WHERE billing.billID = '$billing_id'";
$result = $conn->query($sql);

$sqlReference = "UPDATE billing SET billGCashReference = $reference WHERE billID = '$billing_id'";
$referenceResult = $conn->query($sqlReference);
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
      
        
        $amount = $row['billAmount'];
    }
}

$wholeNumber = floor($amount/1000); //get the whole number
$modulo = $amount % 1000;
if($modulo > 0 && $modulo <= 999){
    $wholeNumber += 1;
    $wholeNumber *= 20;
}else{
    $wholeNumber *= 20;
}

$resultCashOut = $amount + $wholeNumber;

// Prepared Statement & Binding (Avoid SQL Injections)
$stmnt = $conn->prepare("UPDATE billing SET bill_status = '1' WHERE billID='$billing_id'");
$stmnt->execute();

// Update Cash Out
$stmnt = $conn->prepare("UPDATE billing SET billProFee = '$wholeNumber' WHERE billID='$billing_id' ");
$stmnt->execute();
// Update User Type in Users Table
$stmnt = $conn->prepare("UPDATE users INNER JOIN billing ON billing.uID = users.uID SET uBalance = uBalance - '$resultCashOut' WHERE billID = '$billing_id'");
//$stmnt = $conn->prepare("UPDATE users INNER JOIN billing ON billing.uID = users.uID SET uBalance = uBalance + '$amount' WHERE billID = '$billing_id'");
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
 <p>Your Cashed Out Transaction is now Verified by the Admin! Please do refresh or log in again to see</p>
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
header('Location: ' . $home . '/admin/cash_out/cash_out_list.php');




