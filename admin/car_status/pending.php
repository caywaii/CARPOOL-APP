<?php
include '../../includes/connection.php';
include '../../includes/auth.php';
// Retrieves Pending Car Approval
$sql = "SELECT * FROM cardetails INNER JOIN passenger ON passenger.pdID = cardetails.pdID INNER JOIN users ON users.uID = passenger.uID WHERE verify_car = 0;";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Panel </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <hr>
  
        <h3 align="center"> Car Registration </h3>
       
        <?php
        if (isset($_SESSION['status'])) {
            echo "<h4 align='center' style='color:gray;'>" . $_SESSION['status'] . "</h4>";
            unset($_SESSION['status']);
        }
        ?>

        <hr>

        <table class="table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Drivers Name</th>
                    <th scope="col" class="text-center">Plate Number</th>
                    <th scope="col" class="text-center">Model</th>
                    <th scope="col" class="text-center">Color</th>
                    <th scope="col" class="text-center">Brand</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($result->num_rows > 0) :
                    $x = 1;
                    while ($row = $result->fetch_assoc()) :
                ?>
                        <tr>
                            <th class="text-center"> <?= $x ?> </th>
                            <td class="text-center"> <?= $row['uFirstName'] . " " . $row['uLastName'] ?> </td>
                            <td class="text-center"> <?= $row['cPlateNumber'] ?> </td>
                            <td class="text-center"> <?= $row['cModel'] ?> </td>
                            <td class="text-center"> <?= $row['cColor'] ?> </td>
                            <td class="text-center"> <?= $row['cBrand'] ?> </td>
                            <td class="text-center">
                                <a href="id_approve.php?car_id=<?= $row['cID'] ?>&user_id=<?=$row['uID']?>" class="btn btn-primary"> Approve </a>
                                <a href="id_reject.php?car_id=<?= $row['cID'] ?>&user_id=<?=$row['uID']?>" class="btn btn-danger"> Reject </a>
                            </td>
                        </tr>
                <?php
                        $x++;
                    endwhile;
                endif;
                ?>
            </tbody>
        </table>

        <hr>
        <div align="right">
            <a href="../index.php" class="btn btn-warning"> Back </a>
        </div>


    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>