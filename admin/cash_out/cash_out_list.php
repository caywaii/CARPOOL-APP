<?php
include '../../includes/connection.php';
include '../../includes/auth.php';


// Retrieves Pending Car Approval
$sql = "SELECT * FROM billing INNER JOIN users ON billing.uID = users.uID WHERE bill_status = 0 AND billType = 'Cash Out';";
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

    <h3 align="center"> Transaction Status </h3>

    <?php
    if (isset($_SESSION['status'])) {
        echo "<h4 align='center' style='color:gray;'>" . $_SESSION['status'] . "</h4>
            <br>
            <p align='center'>They will be receiving an EMAIL regarding this!</p>";
        unset($_SESSION['status']);
    }
    ?>

    <hr>



    <table class="table-responsive" style="width:100%">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Full Name</th>
                <th scope="col" class="text-center">Amount</th>
                <th scope="col" class="text-center">GCash Number</th>
                <th scope="col" class="text-center">GCash Reference</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if ($result->num_rows > 0) :
                $x = 1;
                while ($row = $result->fetch_assoc()) :
            ?>
                    <form method="GET" action="id_approve.php">
                        <tr>
                            <input type="hidden" name="userid" value="<?= $row['uID'] ?>">
                            <input type="hidden" name="billid" value="<?= $row['billID'] ?>">
                            <th class="text-center"> <?= $x ?> </th>
                            <td class="text-center"> <?= $row['uFirstName'] . " " . $row['uLastName'] ?> </td>
                            <td class="text-center"> <?= $row['billAmount'] ?> </td>
                            <td class="text-center"> <?= $row['billGCashNum'] ?> </td>
                            <td class="text-center">
                                <input type="text" name="refer" id="refer" class="form-control" required placeholder="9999999999" maxlength="8">
                            </td>
                            <td class="text-center">
                                <input type="submit" name="submit" value="approve">
                                <a href="id_reject.php?billing_id=<?= $row['billID'] ?>" class="btn btn-danger"> Reject </a>
                            </td>
                        </tr>
                    </form>


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