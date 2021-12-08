<?php 
session_start();

class DatabaseController{
	public $conn;

	public function __construct(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db="authentications";

		// Create connection
		$this->conn = mysqli_connect($servername, $username, $password,$db);

		// Check connection(communicate with server and database)
		if (/*mysqli_connect_error() ama $conn===false*/!$this->conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}
	}

	public function execute_query($sql){
		return mysqli_query($this->conn,$sql);
	}


	public function login($email, $password){		
		$result = $this->execute_query("SELECT * FROM users WHERE email='$email' AND password='" .md5($password) ."'" );

		if(mysqli_num_rows($result)> 0 ){
            $row = mysqli_fetch_assoc($result);
            $userRole = $row['role'];
            $status = $row['verified_status'];
            $username = $row['username'];

            //redirect ,switch
            switch ($userRole) {
                case 'Admin':
                    if ($status == "yes") {
                        # code...
                        $_SESSION['activeuser'] = $username;
                        header('location: ../public/admin.php?logged');

                    } else {
                        $_SESSION['notVerified'] = "not verified yet";
                        header('location: ../form.php?nverified');
                    }
                    break;

                case 'Doctor':
                    $_SESSION['activeuser'] = $username;
                    header('location: ../public/doc.php?logged');
                    break;
                case 'Pharmacist':
                    $_SESSION['activeuser'] = $username;
                    header('location: ../public/pharm.php?logged');
                    break;
                default:
                    # code...
                    $_SESSION['guest'] = "welcome guest user";
                    header('location: ../dashboard.php?guest');
                    break;
            }
		}
		else{
			$_SESSION['userUnavailable'] = 'user does not exist, create account';
            header('location: ../form.php');
		}
	}

    public function select_all_users(){
        return $this->execute_query("SELECT id,username, email,role,verified_status FROM  users");
    }

    public function select_all_admins(){
        return $this->execute_query("SELECT id,username, email,role,verified_status FROM  users WHERE role='admin'");
    }

    public function toggle_verified_status($id,$verified_status){
        $sql = "UPDATE users SET verified_status='{$verified_status}' WHERE id={$id}";
        echo $sql;
        return $this->execute_query($sql);
    }
    public function select_all_doctors(){
        return $this->execute_query("SELECT id,username, email FROM  users WHERE role='Doctor'");
    }
    public function select_all_pharmacists(){
        return $this->execute_query("SELECT id,username, email FROM  users WHERE role='Pharmacist'");
    }

}