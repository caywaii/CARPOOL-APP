<?php 
session_start();
include_once '../includes/auth.php';
include '../includes/connection.php';

$sql = "SELECT * FROM users INNER JOIN passenger ON users.uID = passenger.uID WHERE users.uID = $id";
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
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpool App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<h1>Welcome, <?= $fname . ' ' . $lname ?></h1>
    <hr>
    <div class="container">
        <div class="row g-3">
            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <p class="card-text">You may update and check your profile anytime.</p>
                    <a href="profile.php" class="btn btn-primary">Look</a>
                </div>
            </div>

            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Car Register</h5>
                    <p class="card-text">You may register your car and wait for the approval.</p>
                    <a href="car_register.php" class="btn btn-warning">Register</a>
                </div>
            </div>

        </div>

        <br>
        <a href="../backend/logout.php" class="btn btn-danger">Log out</a>
    </div>
   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>