<?php

if (isset($_SESSION['auth_id'])) {
    $id = $_SESSION['auth_id'];
} else {
    $_SESSION['status'] = "You need to Log in!";
    header('Location: ' . $home . '/index.php');
    exit;
}