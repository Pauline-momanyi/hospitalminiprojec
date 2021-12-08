<?php
session_start();
include "../post-esp-data.php"; // Using database connection file here
?>


<!DOCTYPE html>
<html>
<head>
    <title>Doctor dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body{
            background-image: url("../images/doc2.jpg");
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-size: cover;


        }
    </style>

</head>
<body>
<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$db = "patientsdata";
//
////connection
//$conn = mysqli_connect($servername, $username, $password, $db);
//if (!$conn) {
//    die ("connection failed" . mysqli_connect_error());
//}
//echo "connected" . "<br>";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit'])){
    $patient_number = $_POST['patientnumber'];
    $diagnosis = $_POST['diagnosis'];
    $prescription = $_POST['prescription'];

    $sql = "UPDATE sensordata SET diagnosis = '{$diagnosis}', prescription='{$prescription}' WHERE patientid ={$patient_number}";
//    die($sql);
    mysqli_query($conn,$sql);

    echo "<script>alert('Updated successfully')</script>";
}

?>
<div class="container">
<p class="text-capitalize">Welcome doctor
    <?= $_SESSION['activeuser'] ?>
</p>
<h2>Patient Details</h2>

<table class="table table-dark" >
    <tr>
        <th>ID</th>
        <th>Date $ Time</th>
        <th>Sensor</th>
        <th>Location</th>
        <th>Patient ID</th>
        <th>Temperature &deg;C</th>
        <th>hbeat </th>
        <td>Status</td>
    </tr>
    <?php
    $sql = "SELECT * FROM sensordata";
    $results = mysqli_query($conn , $sql);

    while($data = mysqli_fetch_assoc($results))
    {
        ?>
        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['reading_time']; ?></td>
            <td><?php echo $data['sensor']; ?></td>
            <td><?php echo $data['location']; ?></td>
            <td><?php echo $data['patientid']; ?></td>
            <td><?php echo $data['temp']; ?></td>
            <td><?php echo $data['hbeat']; ?></td>

            <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault"></td>
        </tr>
        <?php
    }
    ?>
</table>

<?php //mysqli_close($db); // Close connection ?>
<br>
<hr>
<div class="container ">
    <div id="section">
        <h4>Patient Diagnosis and prescription</h4>
        <div class="row">
            <form action="doc.php" class="col-6 p-2" method="POST" id="form-data">
                <div class="form-group">
                    <label for="">Patient Number</label>
                    <input type="number" name="patientnumber" id="patientnumber" class="form-control"  placeholder="enter patient number">
                </div>
                <div class="form-group">
                    <label for="">Diagnosis</label>
                    <textarea name="diagnosis" id="diagnosis" rows="3" class="form-control" placeholder="diagnosis"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Prescription</label>
                    <textarea name="prescription" id="prescription" rows="3" class="form-control" placeholder="prescription"></textarea>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <input type="submit" name="submit" value="OK" class="btn btn-success col-4">
                    <input type="button" value="print" class="btn btn-secondary col-4" onclick="printSection()">
                </div>
            </form>
            <div class="d-none col-6 p-2" id="pres-show">

                Patient Number: &nbsp; <span id="id"></span> <br><br>
                Diagnosis: &nbsp; <span id="diag"></span> <br><br>
                Prescription:  &nbsp; <span id="pres"></span> <br><br>
            </div>
        </div>



    </div>
</div>


<form action="../authentication/logout.php" method="post" class="d-flex justify-content-center w-50">
    <input type="submit" name="logout" id="logout" value="Logout" class="btn btn-danger">

</form>
</div>

<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">

    function printSection(){
        $("#id").text($("#patientnumber").val());
        $("#diag").text($("#diagnosis").val());
        $("#pres").text($("#prescription").val());
        $("#pres-show").show();



        var print_div = document.getElementById("pres-show");
        var print_area = window.open();
        print_area.document.write(print_div.innerHTML);
        print_area.document.close();
        print_area.focus();
        print_area.print();
        print_area.close();
    }

</script>
</body>
</html>