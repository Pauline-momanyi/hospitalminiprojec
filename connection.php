<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="authentications";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection(communicate with server and database)
if (/*mysqli_connect_error() ama $conn===false*/!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully <br>";
//connection is closed automatically when the script ends. To close before use mysqli_close($conn); hii ni MySQLi procedural natumia
//CREATE DB
// $sql = "CREATE DATABASE Authentications";
// if(mysqli_query($conn,$sql)){
//  	echo "Database created successfully";
// }else{
//  	echo "Error creating db ".mysqli_error($conn);
// }

// //CREATE TABLE
// echo "<br>";
// $sql = "CREATE TABLE USERS (
// id INT(6) AUTO_INCREMENT PRIMARY KEY,
// username VARCHAR(250) NOT NULL,
// email VARCHAR(50) NOT NULL,
// password VARCHAR(50) NOT NULL,
// regdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";
// if (mysqli_query($conn,$sql)){
// 	echo "TABLE CREATED SUCCESSFULLY";
// }else {
// 	echo "ERROR CREATING TABLE ". mysqli_error($conn);
// }


//mysqli_close($conn);
?>