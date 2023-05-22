<?php
include '../includes/connection.php';
include_once '../includes/auth.php';

$id = $_SESSION['auth_id'];
$sql = "SELECT * FROM billing INNER JOIN users ON billing.uID = users.uID WHERE users.uID='$id' AND bill_status='1' AND billType= 'Cash In'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Carpool-Cash In </title>

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
        <h3 align="center">Cash In Transaction</h3>
        <hr>

        <!-- Car Registration -->
        <form action="../backend/cash_in_driver.php" method="post">
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="gcash_number" class="form-label">GCash Number</label>
                    <input type="text" name="gcash_number" id="gcash_number" class="form-control" required placeholder="09123456789" minlength="11" maxlength="11">
                </div>
                <div class="mb-3 col-4">
                    <label for="gcash_reference" class="form-label">GCash Reference Number</label>
                    <input type="text" name="gcash_reference" id="gcash_reference" class="form-control" placeholder="ex. 28465927" required minlength="8" maxlength="8">
                </div>

                <div class="mb-3 col-4">
                    <label for="amount" class="form-label">Amount to Cash In</label>
                    <select class="form-select" required name="amount" id="amount" aria-label="Default select example">
                        <option value="" readonly>Choose Amount</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="250">250</option>
                        <option value="500">500</option>
                    </select>
                </div>
            </div>


            <div class="col">
                <input type="submit" name="register" value="Transact" class="btn btn-primary">
                <a href="../driver/" class="btn btn-warning"> Back </a>
            </div>
        </form>

    </div>
    <!-- Table for Cash In Transaction -->
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
                            <td class="text-center"> <?= $row['billConFee'] ?> </td>
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