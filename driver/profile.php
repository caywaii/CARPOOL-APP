<?php
include '../backend/backend_driver/declaredvb.php';
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
    <h1>Profile</h1>
    <hr>
    <?php
     if (isset($_SESSION['status'])) {
        echo "<h4 align='center' style='color:gray;'>" . $_SESSION['status'] . "</h4>";
        unset($_SESSION['status']);
    }
    ?>
    <div class="container">
        <table class="table table-borderless">
         
            <tbody>
                <tr>
                    <th scope="row">Full Name:</th>
                    <td><?= $fname . ' ' . $mname . ' ' . $lname?></td>
                </tr>
                <tr>
                    <th scope="row">Contact:</th>
                    <td><?= $contact ?></td>
                </tr>
                <tr>
                    <th scope="row">Address:</th>
                    <td><?= $street . ' ' . $barangay . ' ' . $city . ',' . $province?></td>
                </tr>
            </tbody>
        </table>
        <a href="profile_update.php" class="btn btn-primary">Update</a>
        <a href="index.php" class="btn btn-warning">Back</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>

</html>