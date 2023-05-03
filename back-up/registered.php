<?php
include('connection.php');
$verified = "SELECT * FROM users WHERE verify_status='1'";
$verified_query_run = mysqli_query($conn, $verified);
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

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($data = $verified_query_run->fetch_assoc()) :
            ?>
                <tr>
                    <th scope="row"><?php echo $data['uID'] ?></th>
                    <td><?php echo $data['uUsername'] ?></td>
                    <td><?php echo $data['uFirstName'] ?></td>
                    <td><?php echo $data['uLastName'] ?></td>
                </tr>
        </tbody>
    <?php endwhile; ?>
    </table>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4' crossorigin='anonymous'></script>
</body>

</html>