<?php
include '../backend/admin/declaredvb.php';
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
        <div class="container">
            <div class="row g-3">
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">You may update and check your profile anytime.</p>
                        <a href="profile.php" class="btn btn-primary">Look</a>
                    </div>
                </div>

                 <!-- Verified Users -->
                 <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">User Verify Status</h5>
                        <p class="card-text">You may see all the verified users on the Carpool App.</p>
                        <a href="user_list/user_verified.php" class="btn btn-secondary">Look</a>
                    </div>
                </div>

                <!-- Driver Status -->
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Driver Status</h5>
                        <p class="card-text">You may now Reject or Approve Drivers.</p>
                        <a href="driver_id/pending.php" class="btn btn-warning">Verify</a>
                    </div>
                </div>

                <!-- Car Register -->
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Car Registration</h5>
                        <p class="card-text">You may now Reject or Approve Registered Cars.</p>
                        <a href="car_status/pending.php" class="btn btn-success">Verify</a>
                    </div>
                </div>

                <!-- Verify Transaction Cash In Type -->
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Verify Cash In </h5>
                        <p class="card-text">You may now assure the Cash In Transactions of the users.</p>
                        <a href="cash_in/cash_in_list.php" class="btn btn-primary">Verify</a>
                    </div>
                </div>

                 <!-- Verify Transaction Cash Out Type -->
                 <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Verify Cash Out </h5>
                        <p class="card-text">You may now assure the Cash Out Transactions of the users.</p>
                        <a href="cash_out/cash_out_list.php" class="btn btn-primary">Verify</a>
                    </div>
                </div>

                <!-- Transaction Reporty -->
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Transaction Report</h5>
                        <p class="card-text">See all the Transaction made by the Passengers/Driver.</p>
                        <a href="transaction.php" class="btn btn-warning">Look</a>
                    </div>
                </div>
            </div>
            <br>
            <a href="../backend/logout.php" class="btn btn-danger">Log out</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>