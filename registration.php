<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpool App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['status'])) {
        echo "<h4>" . $_SESSION['status'] . "</h4>";
        unset($_SESSION['status']);
    }
    ?>
    <h1>Carpool App Registration Form</h1>
    <hr>
    <div class="container"> <!-- Registration Form -->
        <h3 align="center">Personal Information</h3>
        <hr>
        <form action="backend/register.php" method="post" class="row g-3">
            <!-- Username -->
            <div class="col-md-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" required id="username" name="username">
            </div>
            <!-- Password -->
            <div class="col-md-4">
                <label for="userpassword" class="form-label">Password</label>
                <input type="password" class="form-control" required id="userpassword" name="userpassword">
            </div>
            <!-- Email -->
            <div class="col-12">
                <label for="useremail" class="form-label">Email</label>
                <input type="email" class="form-control" required id="useremail" name="useremail">
            </div>
            <!-- First Name -->
            <div class="col-md-4">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" required id="firstname" name="firstname">
            </div>
            <!-- Middle Name -->
            <div class="col-md-4">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middlename" name="middlename">
            </div>
            <!-- Last Name -->
            <div class="col-md-4">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" required id="lastname" name="lastname">
            </div>
            <!-- Contact Number -->
            <div class="col-md-5">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="text" class="form-control" required id="contact" name="contact" minlength="11" maxlength="11">
            </div>
            <!-- Gcash Number -->
            <div class="col-md-5">
                <label for="gcash" class="form-label">GCash Number</label>
                <input type="text" class="form-control" required id="gcash" name="gcash" minlength="11" maxlength="11">
            </div>

            <!-- ID TYPE -->
            <div class="col-md-5">
                <label for="id_type" class="form-label">Type of IDs</label>
                <select class="form-select" required name="id_type" id="id_type" aria-label="Default select example">
                    <option value="" disabled>Choose One</option>
                    <option value="National ID">National ID</option>
                    <option value="driver">Drivers License</option>
                </select>
            </div>

            <div class="col-md-5">
                <label for="id_number" class="form-label">ID Number</label>
                <input type="text" class="form-control" required id="id_number" name="id_number">
            </div>
            <hr>
            <h3 align="center">Address Information</h3>
            <hr>
            <!-- Street -->
            <div class="col-md-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" required id="street" name="street">
            </div>
            <!-- Barangay -->
            <div class="col-md-3">
                <label for="barangay" class="form-label">Barangay</label>
                <input type="text" class="form-control" required id="barangay" name="barangay">
            </div>
            <!-- City -->
            <div class="col-md-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" required id="city" name="city">
            </div>
            <!-- Province -->
            <div class="col-md-3">
                <label for="province" class="form-label">Province</label>
                <input type="text" class="form-control" required id="province" name="province">
            </div>
            <!-- Button -->
            <div class="col-12">
                <input type="submit" name="submit" class="btn btn-primary" value="Register"></input>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>