<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Web Shop</title>
<!-- 	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <?php
      require 'connection.php';
    ?>


	<div class="container">
	 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Web Shop</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="public/about.php">About</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="public/view_products">View Products</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#authenticationDiv"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#authenticationDiv"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav> 
	</div>

	<br>

	<div class="container">
 	  <div class="jumbotron">
         <div class="row">
         	<div class="col" style="text-align: center;">
         		<img src="images/weblogo.png" style="width: 200px; height: 200px;">
         	</div>
         	<div class="col" style="text-align: center;">
         		<p>
         			"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
         		</p>
         		<a href="" class="btn btn-warning">View as Guest</a>
         	</div>
         </div>
 

	   </div>
	</div>

	<br>


	<div class="container">
 	  <div class="jumbotron">
         <div class="row" id="authenticationDiv">
         	<div class="col" style="text-align: center;">
                  <p class="alert alert-<?php 
                        if (isset($_GET['registered'])) {
                           # code...
                          echo $_SESSION['classTypeSuccess'];
                          session_unset();
                          session_destroy();
                       } elseif (isset($_GET['notreg'])) {
                           # code...
                               # code...
                          echo $_SESSION['classTypeError'];
                          session_unset();
                          session_destroy();
                       } elseif (isset($_GET['wrongCred'])){
                          echo $_SESSION['classTypeError'];
                          session_unset();
                          session_destroy();
                       }
                 ?>">
                    <?php
                       if (isset($_GET["registered"])) {
                           # code...
                          if (isset($_SESSION["reg"])) {
                            # code
                          echo $_SESSION["reg"];
                          session_unset();
                          session_destroy();
                          } else {
                            echo "registration successfull";
                          }
                     

                       } elseif (isset($_GET["notreg"])) {
                           # code...
                               # code...
                         if (isset($_SESSION["noreg"])) {
                           # code...
                          echo $_SESSION["noreg"];
                          session_unset();
                          session_destroy();
                         } else
                          {
                            echo "not registered";
                          }
                       
                       } elseif (isset($_GET['wrongCred'])) {
                         # code...
                         if (isset($_SESSION['userTaken'])) {
                           # code...
                           echo $_SESSION['userTaken'];
                           session_unset();
                           session_destroy();

                         } else {
                           echo "Credentials (Username or Email) currently exist. Try different credentials";
                         }
                       }

                    ?>


                </p>
         		<h3>Create Account</h3>
              
         		<hr style="margin-right: 26px; margin-left: 26px;">
         		<form action="authentication/register.php" method="post"> 
         			<div class="form-group">
         				<input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
         			</div>

              <!-- role selection -->
              <div class="form-group">
                <label for="role" style="padding: 5px;">Select User Role</label>
                <select name="role" id="role" class="form-control">
                    <option></option>
                     <option value="Admin">Admin</option>
                     <option value="Student">Student</option>
                </select>
              </div>
        
         			<div class="form-group">
         				<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
         			</div>
         			<div class="form-group">
         				<input type="password" onkeyup="check();" name="password" id="password" class="form-control" placeholder="Enter password">
         			</div>
         			<div class="form-group">
         				<input type="password" onkeyup="check();" name="conpass" id="conpass" class="form-control" placeholder="Confirm password">
         				<span id="message"></span>
         			</div>

         			<div class="row">
		         		<div class="col" style="text-align: center;">
		         			<input type="submit" name="save" id="save" class="btn btn-success btn-block" value="Create Account">
		         		</div>
		         		<div class="col" style="text-align: center;">
		         				<input type="reset" name="reset" id="reset" class="btn btn-danger btn-block" value="Reset Details">
		         		</div>
		         	</div>

         		    <div class="form-group" style="text-align: center;">
         		    	<p>Have an account , proceed to Login</p>
         		    </div>
         			
         		</form>
         	</div>
         
         	<div class="col" style="text-align: center; margin-top: 30px;">
              <p class="alert alert-<?php 
                 if (isset($_GET['wrongCredLogin'])) {
                     # code...
                      if (isset($_SESSION['alertTypeError'])) {
                        # code...
                        echo $_SESSION['alertTypeError'];
                        session_unset();
                        session_destroy();
                      } elseif($_GET['update']){
                        echo $_SESSION['alertTypeError'];
                        session_unset();
                        session_destroy();
                      } 
                      else {
                        echo "danger";
                      }
                   }

                            if (isset($_GET['nverified'])) {
                     # code...
                      if (isset($_SESSION['alertTypeError'])) {
                        # code...
                        echo $_SESSION['alertTypeError'];
                        session_unset();
                        session_destroy();
                      } elseif($_GET['update']){
                        echo $_SESSION['alertTypeError'];
                        session_unset();
                        session_destroy();
                      } 
                      else {
                        echo "danger";
                      }
                   }


                 ?>"> 
                <?php 
                   if (isset($_GET['wrongCredLogin'])) {
                     # code...
                      if (isset($_SESSION['userUnaivable'])) {
                        # code...
                        echo $_SESSION['userUnaivable'];
                        session_unset();
                        session_destroy();
                      }
                       else {
                        echo "user details are wrong, kindly check and try again";
                      }
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
                          if($_SESSION['typeAlert']){
                            echo $_SESSION['typeAlert'];
                            session_unset();
                            session_destroy();
                          } else {
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
         	    <h3>Login</h3>
         		<hr style="margin-right: 26px; margin-left: 26px;">
        <form action="authentication/access.php" method="post"> 
         			<div class="form-group">
         				<input type="text" name="emailLog" id="emailLog" class="form-control" placeholder="Enter Email">
         			</div>
         			<div class="form-group">
         				<input type="password" name="passLog" id="passLog" class="form-control" placeholder="Enter password">
         			</div>
         		    <div class="form-group">
         		    	<input type="submit" name="login" id="login" class="btn btn-success btn-block" value="Login">
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
		 function check(){
		 	if (document.getElementById('password').value === document.getElementById('conpass').value) {
                   
                   document.getElementById('message').style.color = "green";
                   document.getElementById('message').innerHTML = "passwords match";
                   document.getElementById('save').disabled = false;
		 	} else {

                   document.getElementById('message').style.color = "red";
                   document.getElementById('message').innerHTML = "passwords do not match";
                   document.getElementById('save').disabled = true;
		 	}
		 }



	</script>


<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>