<?php
include '../database/database_controller.php';

//variables
$email = $password = $encrypted = $userRole = $status = "";
$emailErr = $passwordErr = "";
$_SESSION['userUnavailable'] = "user does not exist, create account";
$_SESSION['alertTypeError'] = "danger";
$_SESSION['activeuser'] = "welcome";

if (isset($_POST['login'])) {
    # code...
    if (empty($_POST['emailLog'])) {
        # code...
        $emailErr = "Email required";
    } else {
        $email = $_POST['emailLog'];
    }
    if (empty($_POST['passLog'])) {
        # code...
        $passwordErr = "Password is required";
    } else {
        $password = $_POST['passLog'];
    }

    if (empty($emailErr) && empty($passwordErr)) {
        $dbc = new DatabaseController();
        $result = $dbc->login($email, $password);
    }

}

?>