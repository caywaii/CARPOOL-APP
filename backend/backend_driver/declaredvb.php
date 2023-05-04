<?php 
include '../connection.php';
session_start();
if(isset($_SESSION['auth_id'])){
    $id = $_SESSION['auth_id'];

    //Retrieves User
    $sql = "SELECT * FROM users INNER JOIN driver ON users.uID = driver.uID WHERE users.uID = $id";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){

            //Check if Account is Verified or not Verified
            if($row['verify_status'] == 0){
                $_SESSION['status'] = "Account still not Verified!";
                header('Location: ' . $home . '/index.php');
                return;
            }

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
            
            $id_num = $row['dLicense'];

        }
    } else {
        $_SESSION['status'] = 'Your Profile is nowhere to be found!';
        header('Location: ' .$home .'/index.php');
        return;
    }
}else{
    $_SESSION['status'] = "You need to log in first to access it!";
    header('Location: ' .$home. '/index.php');
    return;
}
?>