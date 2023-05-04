<?php 
include '../includes/connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id = $_SESSION['auth_id'];

    //Declared Variables
    $plate_no = $_POST['plate_no'];
    $field_office = $_POST['field_office'];
    $office_code = $_POST['office_code'];
    $receipt_no = $_POST['receipt_no'];
    $tin_no = $_POST['tin_no'];

    $model = $_POST['model'];
    $color = $_POST['color'];
    
    $brand = $_POST['brand'];
    $classification = $_POST['classification'];
    $engine = $_POST['engine'];

    $chassis = $_POST['chassis'];
    $car_year = $_POST['car_year'];
    $car_type = $_POST['car_type'];

    $car_category = $_POST['car_category'];
    $car_fuel = $_POST['car_fuel'];
    $car_renewal = $_POST['car_renewal'];
}
?>