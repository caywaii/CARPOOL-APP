<?php 
include '../backend/passenger/declaredvb.php';
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