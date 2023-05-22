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
   

    <div class="container">
    <h1>Look at the Transactions</h1>
    <hr>
        <div class="container">
            <div class="row g-3">
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Today's Cash In</h5>
                        <p class="card-text">Look at the Cash In Reports.</p>
                        <a href="transactions/cash_in.php" class="btn btn-primary">Look</a>
                    </div>
                </div>

                 <!-- Cash Out -->
                 <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Today's Cash Out</h5>
                        <p class="card-text">Look at the Cash Out Reports.</p>
                        <a href="transactions/cash_out.php" class="btn btn-secondary">Look</a>
                    </div>
                </div>

                <!-- Balance  -->
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total Balance</h5>
                        <p class="card-text">All balance of the users.</p>
                        <a href="transactions/balance_user.php" class="btn btn-warning">Look</a>
                    </div>
                </div>
            </div>
            <br>
            <a href="index.php" class="btn btn-danger">Back</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>