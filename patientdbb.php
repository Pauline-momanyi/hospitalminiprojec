<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "patientsdata";

//connection
$conn = mysqli_connect ($servername , $username , $password , $db);
if (!$conn){
    die ("connection failed" . mysqli_connect_error());
    }
    //echo "connected"."<br>";
//$sql = "CREATE DATABASE patientsdata";
//if (mysqli_query($conn, $sql)){
//    echo "Created successfully";
//}else{
//    echo "Error creating db". mysqli_error($conn);
//}
//CREATE TABLE
// echo "<br>";
// $sql = "CREATE TABLE USERS (
// id INT(6) PRIMARY KEY,
// name VARCHAR(250) NOT NULL,
// age VARCHAR(50) NOT NULL,
// phone VARCHAR(50) NOT NULL ,
// temp VARCHAR(50) NOT NULL,
// heartrate VARCHAR (11) NOT NULL ,
// spo2 VARCHAR (11) NOT NULL ,
// regdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";
// if (mysqli_query($conn,$sql)){
// 	echo "TABLE CREATED SUCCESSFULLY";
// }else {
// 	echo "ERROR CREATING TABLE ". mysqli_error($conn);
// }




?>