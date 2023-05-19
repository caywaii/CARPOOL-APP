<?php
include '../../includes/connection.php';
include '../../includes/auth.php';
// Retrieves Registered Users
$sql = "SELECT * FROM users WHERE verify_user = '1'";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verified Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <hr>
    <h3 align="center">User Verification List</h3>
    
        <table class="table-responsive" style="width:100%">
        <hr>
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Contact</th>
                    <th scope="col" class="text-center">Type</th>
                    <th scope="col" class="text-center">Full Details</th>
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
                            <td class="text-center"> <?= $row['uEmail'] ?> </td>
                            <td class="text-center"> <?= $row['uContact'] ?> </td>
                            <td class="text-center"> <?= $row['uUserType'] ?> </td>
                            <td class="text-center">
                                <a href="user_id.php?user_id=<?= $row['uID'] ?>" class="btn btn-success"> See More </a>
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