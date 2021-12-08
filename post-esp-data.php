<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test2";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (/*mysqli_connect_error() ama $conn===false*/!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully <br>";

//$api_key_value = "tPmAT5Ab3j7F9";
//
//$api_key= $sensor = $patientid = $temp = $hbeat = $SpO2 = "";
//
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $api_key = test_input($_POST["api_key"]);
//    if($api_key == $api_key_value) {
//        $sensor = test_input($_POST["sensor"]);
//        $patientid = test_input($_POST["patientid"]);
//        $temp = test_input($_POST["temp"]);
//        $hbeat = test_input($_POST["hbeat"]);
//        $SpO2 = test_input($_POST["SpO2"]);
//
//
//        // Create connection
////        $conn = new mysqli($servername, $username, $password, $dbname);
////        // Check connection
////        if ($conn->connect_error) {
////            die("Connection failed: " . $conn->connect_error);
////        }
//
//        $sql = "INSERT INTO sensordata (sensor , patientid , temp , hbeat , SpO2)
//VALUES ('" . $sensor . "', '" . $patientid . "', '" . $temp . "', '" . $hbeat . "', '" . $SpO2 . "')";
//
//        if ($conn->query($sql) === TRUE) {
//            echo "New record created successfully";
//        }
//        else {
//            echo "Error: " . $sql . "<br>" . $conn->error;
//        }
//
//        $conn->close();
//    }
//    else {
//        echo "Wrong API Key provided.";
//    }
//
//}
//else {
//    //echo "No data posted with HTTP POST.";
//}
//
//function test_input($data) {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
//}