<?php
session_start();
include "../post-esp-data.php";
//include "../post-esp-data.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pharmacist Module</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>

        body{
            background-image: url("../images/pharm2.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            /*opacity: 1;*/
            background-position: right top;
            /*filter: blur(8px);*/
            /*-webkit-filter: blur(8px);*/

        }
    </style>
</head>
<body>
<div class="container">

	<h6 class="text-capitalize ">Welcome pharmacist
<!--        --><?//= $_SESSION['activeuser'] ?>
		<?php
//        $servername = "localhost";
//        $username = "root";
//        $password = "";
//        $dbname = "test2";
//
//        // Create connection
//        $conn = new mysqli($servername, $username, $password, $dbname);
//        // Check connection
//        if ($conn->connect_error) {
//            die("Connection failed: " . $conn->connect_error);
//        }//echo "connected";


		if (isset($_GET['logged'])) {
			# code...
			if(isset($_SESSION['activeuser'])){
				echo $_SESSION['activeuser'];
//				session_unset();
//				session_destroy();

		}else{
			echo ".";
		}
	}
		?>
    </h6>
    </p>
    <div class="container">
    <h2 class="text-center">Patient Diagnosis and Medication</h2>

    <table class="table table-bordered table-dark table-hover" >
        <tr>
            <td>Sr.No.</td>
            <td>Full Name</td>
            <td>Patient ID</td>
            <td>Diagnosis</td>
            <td>Prescription</td>
            <td>Status</td>

        </tr>
<?php
    $sql = "SELECT id, Name, Age, patientid, diagnosis, prescription FROM sensordata";
    $results = mysqli_query($conn , $sql);

    while($data = mysqli_fetch_assoc($results))
{
    ?>
    <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['Name']; ?></td>
        <td><?php echo $data['patientid']; ?></td>
        <td><?php echo $data['diagnosis']; ?></td>
        <td><?php echo $data['prescription']; ?></td>
        <td><input class="form-check-input" type="checkbox" style="margin-left: 0rem"></td>

    </tr>
    <?php
}
?>
    </table>

    <form action="../authentication/logout.php" method="post">
		<input type="submit" class="btn btn-danger" name="logout" id="logout" value="Logout">

	</form>
    </div>
</div>
</body>
</html>