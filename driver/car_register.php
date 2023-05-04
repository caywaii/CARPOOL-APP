<?php
include '../includes/connection.php';
include '../includes/auth.php';
session_start();

if (isset($_SESSION['status'])) {
    echo "<h4 align='center' style='color:gray;'>" . $_SESSION['status'] . "</h4>";
    unset($_SESSION['status']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <hr>
    <div class="container my-3 col-lg-6">

        <?php
        if (isset($_SESSION['status'])) {
            echo "<h4 align='center' style='color:gray;'>" . $_SESSION['status'] . "</h4>";
            unset($_SESSION['status']);
        }
        ?>
        <h3 align="center">Car Register</h3>
        <hr>
        <!-- Car Registration -->
        <form action="../backend/car_register.php" method="post">
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="plate_no" class="form-label">Plate Number</label>
                    <input type="text" name="plate_no" id="plate_no" class="form-control" required placeholder="AAA-9999" minlength="8" maxlength="8">
                </div>
                <div class="mb-3 col-4">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" name="brand" id="brand" class="form-control" placeholder="ex. Toyota" required>
                </div>

                <div class="mb-3 col-4">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" name="color" id="color" class="form-control" required placeholder="ex. Color">
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" name="model" id="model" class="form-control" placeholder="ex. vios" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="car_year" class="form-label">Year</label>
                    <input type="text" minlength="4" maxlength="4" name="car_year" placeholder="ex. 2015" id="car_year" class="form-control" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="carseat" class="form-label">Vehicle Identity Number</label>
                    <input type="text" minlength="17" maxlength="17" name="carseat" id="carseat" placeholder="ex. 4Y1SL65848Z411439" class="form-control" required>
                </div>

            </div>
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="model" class="form-label">Seats Available</label>
                    <textarea type="text" name="model" id="model" placeholder="ex.1 Window Seat and 3 Back Seat" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col">
                <input type="submit" name="register" value="Add Car" class="btn btn-primary">
                <a href="index.php" class="btn btn-warning"> Back </a>
            </div>
        </form>
       
    </div>
    <hr>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>