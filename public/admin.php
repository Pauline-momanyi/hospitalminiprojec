<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            position: relative;
        }
        </style>
    <body
        <?php
        if (isset($_GET['logged'])) {
            # code...
            if(isset($_SESSION['activeuser'])){
                echo $_SESSION['activeuser'];
            }else{
                echo "";
            }
        }
        ?>
    </h5>

    <div class="row  justify-content-center">
        <a class="border border-dark p-2 text-center col-7 my-2 btn btn-outline-dark" href="view-admins.php">
            View Admins
        </a>
        <a class="border border-dark p-2 text-center col-7 my-2 btn btn-outline-dark" href="view-doctors.php">
            View Doctors
        </a>
        <a class="border border-dark p-2 text-center col-7 my-2 btn btn-outline-dark" href="view-pharmacists.php">
            View Pharmacists</a>
    </div>
    <div class="text-center">
    <form action="../authentication/logout.php" method="post">
        <input type="submit" name="logout" class="btn btn-danger" id="logout" value="Logout">
    </form>
    </div>
    </div>
</div>


</body>
</html>