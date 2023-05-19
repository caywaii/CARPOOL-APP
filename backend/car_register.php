<?php
include '../includes/connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_SESSION['auth_id'];

    //Declared Variables
    $plate_no = $_POST['plate_no'];

    $model = $_POST['model'];
    $color = $_POST['color'];
    $brand = $_POST['brand'];
    $chassis = $_POST['chassis'];
    $car_seat = $_POST['carseat'];
    $car_year = $_POST['car_year'];
    $type = $_POST['type'];

    $sql = "SELECT * FROM users INNER JOIN passenger ON users.uID = passenger.uID WHERE users.uID ='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $user_id = $row['pdID'];
    //Check the Plate
    $sql = "SELECT * FROM cardetails WHERE cPlateNumber = '$plate_no'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['status'] = "Existing Plate Number";
        header('Location ' . $home . '/driver/car_register.php');
        return;
    }

    $sql = "SELECT * FROM cardetails WHERE cVIN = '$chassis'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['status'] = "Existing Vehicle Identity Number";
        header('Location ' . $home . "/driver/car_register.php");
        return;
    }

    $stmnt = "INSERT INTO cardetails (pdID, cPlateNumber, cType, cModel, cColor, cBrand, cYear, cVIN, cCarSeat) VALUES ('$user_id', '$plate_no', '$type', '$model', '$color', '$brand', '$car_year', '$chassis', '$car_seat');";
    $result = $conn->query($stmnt);

    $_SESSION['status'] = "Your car is now pending for approval.";
    header('Location: ' . $home . '/driver/car_register.php');
}
