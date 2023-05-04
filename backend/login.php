<?php
session_start();
include '../includes/connection.php';

if ($_POST['login']) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Checks the Email & Password
    $sql = "SELECT uID, verify_status, uUserType FROM users WHERE uUsername='$username' AND uPassword='$password'";
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

                if($_SESSION['auth_type'] == "Admin"){
                    header('Location: ' . $home . '/admin/index.php');
                    return;
                }else if($_SESSION['auth_type'] == "Driver"){
                    header('Location: ' .$home . '/driver/index.php');
                    return;
                }else if($_SESSION['auth_type'] == "Passenger"){
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