<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db="Authentications";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection(communicate with server and database)
if (/*mysqli_connect_error() ama $conn===false*/!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 
//include '../connection.php';

//variables to store input
$usernames = $email = $password = $encrypted_pass = $role = '';
$usernameErr = $emailErr = $passwordErr = '';

//session variables
$_SESSION["reg"] = "Registration successful";
$_SESSION["noreg"] = "Registration not successful";
//if succesful or not
$_SESSION['classTypeSuccess'] = "success";
$_SESSION['classTypeError'] = "danger";
$_SESSION['userTaken'] = "Wrong credentials, try again or create account";

//capture user input save-name of submit button
if (isset($_POST['save'])){     //if save has been pressed
	if(empty($_POST['username'])){
		$usernameErr= "username required";
	}else{
		$usernames=$_POST['username'];
	}
	if(empty($_POST['email'])){
		$emailErr= "email required";
	}else{
		$email=test_input($_POST['email']);

	}
	if(empty($_POST['password'])){
		$passwordErr= "password required";
	}else{
		$passwords=$_POST['password'];

		//password encryption
		$encrypted_pass = md5($passwords);
	}
	$role = $_POST['role'];

	//not to repeat information: use sql multifilter using SELECT statement
	//Fetching records to compare sign up details
	$sql= "SELECT * FROM users WHERE username='$usernames' AND email='$email'";
	//execute the query
	$result = mysqli_query($conn,$sql);
	//find the number of rows that match the sql query we have written
	$num = mysqli_num_rows($result);

//check if the implementations above work
	//echo "number of row(s) that match reg details: " .$num;
	//logic to use the number of rows.. dont allow user to register
	if ($num >= 1){
		$_SESSION['userTaken'];
		header("location: ../form.php?wrongCred");
	}else{
		//kama hakuna repeated rows na  errors go ahead with the registration
		if (empty($usernameErr) && empty($emailErr) && empty($passwordErr)){
	//protection against sql injection. stmnt preparation. prepare the statement
			$stmt= $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?,?,?,?)");
			//bind our values
			$stmt->bind_param("ssss",$usernames,$email,$encrypted_pass,$role);

			if ($stmt->execute() === TRUE) {
				# code...
				$_SESSION["reg"];
				$_SESSION['classTypeSuccess'];
				header('location: ../form.php?registered');
			}else{
				$_SESSION["noreg"];
				$_SESSION['classTypeError'];
				header('location: ../form.php?notreg');
			}
		
		}

	}


	
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>