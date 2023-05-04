<?php 
include '../backend/backend_admin/declaredvb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpool Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
</head>
<body>
    <hr>
    <div class="container"> <!-- Registration Form -->
        <h3 align="center">Personal Details</h3>
        <hr>
        <form action="profile_updprocess.php" method="post" class="row g-3">
            <!-- Username -->
            <div class="col-md-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" readonly value="<?= $username ?>" style="background-color:#d3d3d3;">
            </div>
            <!-- Password -->
            <div class="col-md-4">
                <label for="userpassword" class="form-label">Password</label>
                <input type="text" class="form-control" id="userpassword" name="userpassword" value="<?= $password ?>">
            </div>
            <!-- Email -->
            <div class="col-12">
                <label for="useremail" class="form-label">Email</label>
                <input type="email" class="form-control" id="useremail" name="useremail"  readonly  value="<?= $email ?>" style="background-color:#d3d3d3;">
            </div>
            <!-- Name -->
            <div class="col-md-12">
                <label for="firstname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" readonly value ="<?= $fname . ' ' . $mname . ' ' . $lname?>" style="background-color:#d3d3d3;">
            </div>
           
            <!-- Contact Number -->
            <div class="col-md-5">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contact" name="contact" minlength="11" maxlength="11" readonly value ="<?= $contact?>" style="background-color:#d3d3d3;">
            </div>
            <!-- Gcash Number -->
            <div class="col-md-5">
                <label for="gcash" class="form-label">GCash Number</label>
                <input type="text" class="form-control" id="gcash" name="gcash" minlength="11" maxlength="11" readonly value ="<?= $gcash?>" style="background-color:#d3d3d3;">
            </div>

            <!-- ID TYPE
            <div class="col-md-5">
                <label for="id_type" class="form-label">Type of IDs</label>
                <input type="text" class="form-control" id="gcash" name="gcash" minlength="11" maxlength="11" readonly value ="<?= $id_type?>" style="background-color:#d3d3d3;">
            </div>

            <div class="col-md-5">
                <label for="id_number" class="form-label">ID Number</label>
                <input type="text" class="form-control" id="id_number" name="id_number" readonly value ="<?= $id_num?>" style="background-color:#d3d3d3;">
            </div> -->
            <div class="col-md-12">
                <label for="firstname" class="form-label">Address</label>
                <input type="text" class="form-control" id="firstname" name="firstname"  readonly value ="<?= $street . ' ' . $barangay . ' ' . $city . ',' . $province?>" style="background-color:#d3d3d3;">
            </div>
            <div class="col-md-5">
            <input type="submit" name="register" class="btn btn-primary" value="Update Password">
            <a href="index.php" class="btn btn-warning">Back</a>
            </div>
        </form>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>