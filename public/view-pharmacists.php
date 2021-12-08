<?php
include '../database/database_controller.php';
$dbc = new DatabaseController();
$pharm = $dbc->select_all_pharmacists();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doc dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container pt-3">
    <h5 class="text-center text-capitalize">
        Pharmacists
    </h5>

    <table class="table">
        <thead>
        <tr>
            <th>
                Username
            </th>
            <th>
                Email
            </th>

        </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_assoc($pharm)){
            ?>
            <tr>
                <td><?=$row['username']?></td>
                <td><?=$row['email']?></td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <div class="text-center">
    <form action="../authentication/logout.php" method="post">
        <input type="submit" name="logout" class="btn btn-danger" id="logout" value="Logout">

    </form>
    </div>
</div>


</body>
</html>
