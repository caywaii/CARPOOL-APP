<?php
include '../includes/connection.php';
include_once '../includes/auth.php';

$id = $_SESSION['auth_id'];
$sql = "SELECT * FROM users INNER JOIN billing ON users.uID = billing.uID WHERE users.uID ='$id' AND bill_status = 1 AND billType='Cash Out'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Carpool | Cash Out </title>

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
        <h3 align="center">Cash Out Transaction</h3>
        <hr>

        <!-- Car Registration -->
        <form action="../backend/cash_out_driver.php" method="post">
            <div class="row">

                <div class="mb-3 col-6">
                    <label for="gcash_number" class="form-label">GCash Number</label>
                    <input type="text" name="gcash_number" id="gcash_number" class="form-control" required placeholder="09123456789" minlength="11" maxlength="11">
                </div>

                <div class="mb-3 col-6">
                    <label for="amount" class="form-label">Amount to Cash Out</label>
                    <input type="number" name="cashout_amount" id="cashout_amount" class="form-control" required placeholder="1000" min="1">
                </div>
            </div>


            <div class="col">
                <input type="submit" name="register" value="Transact" class="btn btn-primary">
                <a href="../driver/" class="btn btn-warning"> Back </a>
            </div>
        </form>

    </div>

    <!-- Table for Cash Out Transaction -->
    <div class="container">
        <div class="container my-3 col-lg-6">
            <h3 align="center"> Your Approved Cash In Transaction History</h3>
            <hr>
        </div>

        <table class="table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">GCash Number</th>
                    <th scope="col" class="text-center">GCash Reference</th>
                    <th scope="col" class="text-center">Amount</th>
                    <th scope="col" class="text-center">Conversion Fee</th>
                    <th scope="col" class="text-center">Ticket</th>
                    <th scope="col" class="text-center">Cash In Date</th>
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
                            <td class="text-center"> <?= $row['billGCashNum'] ?> </td>
                            <td class="text-center"> <?= $row['billGCashReference'] ?> </td>
                            <td class="text-center"> <?= $row['billAmount'] ?> </td>
                            <td class="text-center"> <?= $row['billProFee'] ?> </td>
                            <td class="text-center"> <?= $row['billAmount'] - $row['billConFee'] ?> </td>
                            <td class="text-center"> <?= $row['billDate'] ?> </td>

                    <?php
                        $x++;
                    endwhile;
                endif;
                    ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>