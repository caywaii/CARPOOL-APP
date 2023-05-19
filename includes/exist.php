<?php 
if(isset($_SESSION['auth_id']) && isset($_SESSION['auth_type'])){
    $id = $_SESSION['auth_id'];
    $auth_type = $_SESSION['auth_type'];

    if($auth_type == "Admin"){
        header('Location: ' . $home . '/admin/index.php');
    }else if($auth_type == "Driver"){
        header('Location: ' .$home . '/driver/index.php');
    }else if($auth_type == "Passenger"){
        header('Location: ' . $home . '/passenger/index.php');
    }
    
    exit;
}
?>