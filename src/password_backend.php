<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$email = $_SESSION['current_email'];
$errOld = $errNew = $errConfirm = "";
$old_pass = $new_pass = $confirm_pass = "";

$pull_email = "SELECT * FROM user_table WHERE email='$email'";
$email_result = mysqli_query($userbase_db, $pull_email);
$results = mysqli_fetch_array($email_result);
$password_pull = $results['password'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    if ($old_pass==="") {
        $errOld = "*Existing Password required";
    }

    if ($new_pass==="") {
        $errNew = "*New password required";
    }

    if ($confirm_pass==="") {
        $errConfirm = "*Confirm password required";
    }

    else if ($confirm_pass != $new_pass) {
        $errConfirm = "*Confirm password must match new password";
    }

    else {
        if ($old_pass != $password_pull){           //Wrong existing password
            $errOld = "*Wrong password";
        }

        else if ($new_pass == $old_pass){           //New password same as old password
            $errNew = "*New password cannot be the same";
        }

        else {
            $update_email = "UPDATE user_table SET password='$new_pass' WHERE email='$email'";
            $update_email_result = mysqli_query($userbase_db, $update_email);

            header("Location: profile.php");
            exit();
        }

    }


}