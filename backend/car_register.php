<?php 
include '../includes/connection.php';
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id = $_SESSION['auth_id'];

    $sqlselect = "SELECT dID FROM driver WHERE uID = '$id'";
    $resultselect = $conn->query($sqlselect);
    $row = $resultselect->fetch_assoc();
    $driverID = $row['dID'];


    //Declared Variables
    $plate_no = $_POST['plate_no'];

    $model = $_POST['model'];
    $color = $_POST['color'];
    $brand = $_POST['brand'];
    $chassis = $_POST['chassis'];
    $car_seat = $_POST['carseat'];
   
     // Checks the Plate
     $sql = "SELECT * FROM cardetails WHERE cPlateNum='$plate_no'";
     $result = $conn->query($sql);
 
     if ($result->num_rows > 0) {
         $_SESSION['status'] = "Existing Plate Number";
         header('Location: ' . $home .'/driver/car_register.php');
         return;

     }

      // Checks the Chassis
    $sql = "SELECT * FROM cardetails WHERE cVIN='$chassis'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        $_SESSION['status'] = "Exsting Car Identity Number!";
        header('Location: ' . $home .'/driver/car_register.php');
        return;
    }

    $sqlusersinsertion = "INSERT INTO cardetails (dID, cPlateNum, cBrand, cColor, cModel, cYear, cVIN, cSeatAvailable) 
    VALUES ('$driverID', '$plate_no', '$brand', '$color', '$model', '$year', '$chassis', '$car_seat');";
    $usersinserted = $conn->query($sqlusersinsertion);
    
        $_SESSION['status'] = "Your car is now pending for approval.";
        header('Location: ' . $home .'/driver/car_register.php');
}
