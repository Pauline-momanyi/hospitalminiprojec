<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Dashboard </title>
</head>
<body>
	<p>Logged in
		<?php
			if (isset($_GET['guest'])) {
				# code...
				if (isset($_SESSION['guest'])) {
					# code...
					echo $_SESSION['guest'];
					session_unset();
					session_destroy();
				}else{
					echo "<br> Welcome guest";
				}
			}

		?>

	</p>

	<form action="../authentication/logout.php" method="post">
		<input type="submit" name="logout" id="logout" value="Logout">
		
	</form>

</body>
</html>