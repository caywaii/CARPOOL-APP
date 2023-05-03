<?php
session_start();
if(isset($_SESSION['auth_id']) && isset($_SESSION['auth_type'])){
    $id = $_SESSION['auth_id'];
    $auth_type = $_SESSION['auth_type'];

    if($auth_type == "Admin"){
        header('Location: ' . $home . 'admin/index.php');
    }else if($auth_type == "Driver"){
        header('Location: ' .$home . 'driver/index.php');
    }else if($auth_type == "Passenger"){
        header('Location: ' . $home . 'passenger/index.php');
    }
    
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpool App</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <hr>
    <h1 id="title" align="center">CARPOOL APPLICATION!</h1>
    <hr>
    <div class="container">
        <?php
        if (isset($_SESSION['status'])) {
            echo "<h4 align='center' style='color:gray;'>" . $_SESSION['status'] . "</h4>";
            unset($_SESSION['status']);
        }
        ?>
        <div class="row">
            <!-- col (column). In a column we have 12 columns. so the purpose of having two.col-6 is to make it half -->
            <div class="col-md-6 mt-5">
                <h1 class="introduction"> Vroom, </h1>
                <h1 class="introduction2"> Are you <span class="name">READY?</span></h1>
                <h3 class="description">READY, <span class="engaging2">SET,</span> RIDE!</span></h3>

            </div>
            <div class="col-md-6 mt-5">
                <form action="backend/login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Username:</label><br>

                        <input type="text" class="form-control" id="username" name="username">

                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password:</label>

                        <input type="password" class="form-control" id="password" name="password">

                    </div>
                    <div align="center">
                        <input type="submit" class="btn btn-primary loginbtn" style="background-color:rgb(241, 171, 31); border-color:rgb(241, 171, 31);" name="login" value="Log In"></input>
                    </div>
                </form>
                <br>
                <?php
                if (isset($_SESSION['login'])) {
                    echo "<h4 align='center' style='color:red;'>" . $_SESSION['login'] . "</h4>";
                    unset($_SESSION['login']);
                }
                ?>
                <br>
                <div align="center">
                    <p>Do not have an Account Yet? <a href="registration.php"><b>Click this to Register<b></a></p>
                </div>

            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

<?php

?>