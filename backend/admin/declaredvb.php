<?php 
include '../includes/connection.php';
include_once '../includes/auth.php';

    //Retrieves User
    $sql = "SELECT * FROM users WHERE uID = $id";
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
            $userBalance = $row['uBalance'];

        }
    } else {
        $_SESSION['status'] = 'Your Profile is nowhere to be found!';
        header('Location: ' .$home .'/index.php');
        return;
    }
?>