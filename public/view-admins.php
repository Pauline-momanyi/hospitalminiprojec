<?php
include '../database/database_controller.php';
$dbc = new DatabaseController();
$admins = $dbc->select_all_admins();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container pt-3">
    <h5 class="text-center text-capitalize">
        Admins
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
            <th>
                Role
            </th>
            <th>
                Verified Status
            </th>
            <th>
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_assoc($admins)){
        ?>
            <tr>
                <td><?=$row['username']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['role']?></td>
                <td><?=$row['verified_status']?></td>
                <td>
                    <?php
                    if($row['verified_status'] == 'yes'){
                        ?>
                        <a class="btn btn-secondary" href="toggle-verified.php?id=<?=$row['id']?>&status=no">Mark unverified</a>
                    <?php
                    }
                    else{
                    ?>
                        <a class="btn btn-secondary" href="toggle-verified.php?id=<?=$row['id']?>&status=yes">Verify</a>
                    <?php
                    }
                    ?>
                </td>
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