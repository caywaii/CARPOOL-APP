<?php
session_start();
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Checks the Email & Password
    $sql = "SELECT uID, verify_status, uUserType  FROM users WHERE uUsername='$username' AND uPassword='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            // Check if the Account is Verified or Not
            if ($row['verify_status'] == 0) {
                $_SESSION['status'] = "Account still not Verified!";
                header('Location: ' . $home . '/index.php');
                return;
            } else {

                $_SESSION['auth_id'] =  $row['uID'];
                $_SESSION['auth_type'] =  $row['uUserType'];

                if($row['uUserType'] == "Admin"){
                    header('Location: ' . $home . '/admin/index.php');
                    return;
                }else if($row['uUserType'] == "Driver"){
                    header('Location: ' .$home . '/driver/index.php');
                }else if($row['uUserType'] == "Passenger"){
                    header('Location: ' . $home . '/passenger/index.php');
                    return;
                }
            }
        }
    } else {
        $_SESSION['status'] = "Invalid Username or Password!";
        header('Location: ' . $home . '/index.php');
        return;
    }
}

?>