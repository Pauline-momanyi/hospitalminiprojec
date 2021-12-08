<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Auth form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script-->

	<!--link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css"-->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>
<body class="overflow-md-hidden">
	<?php
		require 'connection.php';
	?>
	<div class="container">
		<div class=" p-2 mt-4">
			<div class="row">
				<div class="col-md jumbotron text-center " >
					
					<p class="alert alert-<?php
						if (isset($_GET['registered'])) {
							# code...
							echo $_SESSION['classTypeSuccess'];
							session_unset();
							session_destroy();
						}elseif (isset($_GET['notreg'])) {
							# code...
							echo $_SESSION['classTypeError'];
							session_unset();
							session_destroy();
						}elseif (isset($_GET['wrongCred'])){
							echo $_SESSION['classTypeError'];
							session_unset();
							session_destroy();

						}

					?>">
						<?php
							if (isset($_GET["registered"])){
								if (isset($_SESSION["reg"])){
									echo $_SESSION["reg"];
									session_unset();
									session_destroy();
								}else{
									echo "registration successful";
								}
							}elseif (isset($_GET["notreg"])) {
								# code...
								if (isset($_SESSION["noreg"])) {
									# code
									echo $_SESSION["noreg"];
									session_unset();
									session_destroy();
								}else{
									echo "not registered";
								}
							}elseif (isset($_GET['wrongCred'])) {
								# code...
								if (isset($_SESSION['userTaken'])) {
									# code...
									echo $_SESSION['userTaken'];
									session_unset();
									session_destroy();
								}else{
									echo "Credentials (username/email) exist";
								}
							}


						?>
					</p>
					<h3>CREATE ACCOUNT</h3>
					<hr style="margin-right: 26px; margin-left: 26px;">
					<form action="authentication/register.php" method="post">
						<div class="form-group">
							<input type="text" name="username" id="username" placeholder="Enter Username" class="form-control">			
						</div>

						<!--role selection-->
						<div class="form-group">
							<label for="role" style="padding: 5px" >Select user role</label>
							<select name="role" id="role" class="form-control">
								<option> </option>
								<option value="Admin">Admin</option>
								<option value="Doctor">Doctor</option>
								<option value="Pharmacist">Pharmacist</option>
							</select>
							

						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" placeholder="Enter Email" class="form-control">			
						</div>
						<div class="form-group">
							<input type="password" onkeyup="check();" name="password" id="password" placeholder="Enter Password" class="form-control">		
						</div>
						<div class="form-group">
							<input type="password" onkeyup="check();" name="conpass" id="conpass" placeholder="Confirm Password" class="form-control">
							<br> 	
							<span id="message"></span>		
						</div>
						<div class="row">
							<div class="col" style="text-align: center;">
								<input type="submit" name="save" id="save" class="btn btn-success" value="create account">
							</div>
							<br>
							<div class="col" style="text-align: center;">
								<input type="reset" name="reset" id="reset" class="btn btn-danger" value="Reset Details">
							</div>

						</div>

						<div class="form-group" style="text-align: center;">
         		    	<p>Have an account , proceed to Login</p>
         		    </div>
					</form>
				</div>
				<div class="col-md jumbotron mt-3 mt-md-0" style="text-align: center; margin-top: 34px">
				<p class="alert alert-<?php 
                 	if (isset($_GET['WrongCredLogin']) && isset($_SESSION['alertTypeError'])) {
                     # code...
                        echo $_SESSION['alertTypeError'];
                        session_unset();
                        session_destroy();
                    }

                     if(isset($_SESSION['userUnavailable'])){
                         echo "danger";
                     }
                 

                    // if (isset($_GET['nverified'])) {
                    //  # code...
                    //   if (isset($_SESSION['alertTypeError'])) {
                    //     # code...
                    //     echo $_SESSION['alertTypeError'];
                    //     session_unset();
                    //     session_destroy();
                    //   } elseif($_GET['update']){
                    //     echo $_SESSION['alertTypeError'];
                    //     session_unset();
                    //     session_destroy();
                    //   } 
                    //   else {
                    //     echo "danger";
                    //   }
                   //}
                 ?>"> 
                <?php 
//                   if (isset($_GET['WrongCredLogin'])) {
//                     # code...
//                      if (isset($_SESSION['userUnavailable'])) {
//                        # code...
//                        echo $_SESSION['userUnavailable'];
//                        session_unset();
//                        session_destroy();
//                   }else {
//                        echo "user details are wrong, kindly check and try again";
//                      }
//                   }

                if (isset($_SESSION['userUnavailable'])) {
                    # code...
                    echo $_SESSION['userUnavailable'];
                    session_unset();
                    session_destroy();
                }
                  
                   

                   if (isset($_GET['nverified'])) {
                     # code...
                      if (isset($_SESSION['notVerified'])) {
                        # code...
                        echo $_SESSION['notVerified'];
                        session_unset();
                        session_destroy();
                      } else {
                        echo "not verified yet";  
                      }
                   }

                ?>
              </p>
              <p class="alert alert-<?php 
                      if(isset($_GET['update'])){
                      	if(isset($_SESSION['typealert'])){                         
                            echo $_SESSION['typeAlert'];
                            session_unset();
                            session_destroy();
                          } else{
                          	echo "info";
                          }
                      }
                       

                ?>">
            <?php  
              if (isset($_GET['update'])) {
                        # code...
                        if (isset($_SESSION['updateSuccess'])) {
                          # code...
                        echo $_SESSION['updateSuccess'];
                        session_unset();
                        session_destroy();
                        } else {
                          echo "reset successful login with new password";
                        }
                      }
                 ?>    
					</p>

					<h3>LOGIN</h3>
					<hr>
					<form action="authentication/access.php" method="post">
						<div class="form-group">
							<input type="text" name="emailLog" id="emailLog" placeholder="Enter Email" class="form-control">			
						</div>
						
						<div class="form-group">
							<input type="password" name="passLog" id="passLog" placeholder="Enter Password" class="form-control">		
						</div>
						
						<div class="form-group">
							<input type="submit" name="login" id="login" class="btn btn-success" value="Login">

						</div>
						<div class="form-group" style="text-align: center;">
         		    	<p>If you do not have an account , create one in the Create Account Form</p>
                  <a href="authentication/reset.php">
                                      <p>Forgot Password ?  Reset Password</p>

                  </a>
         		    </div> 	
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function check() {
			if (document.getElementById('password').value===document.getElementById('conpass').value){
				document.getElementById('message').style.color="green";
				document.getElementById('message').innerHTML="passwords match";
				document.getElementById('save').disabled=false;
			}else{
				document.getElementById('message').style.color="red";
				document.getElementById('message').innerHTML="passwords do not match";
				document.getElementById('save').disabled=true;
			}
			
		}
	</script>

<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>