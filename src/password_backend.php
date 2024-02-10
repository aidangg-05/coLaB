<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$user_id = $_SESSION['current_id'];
$errOld = $errNew = $errConfirm = "";
$old_pass = $new_pass = $confirm_pass = "";

$user_result = mysqli_query($userbase_db, "SELECT * FROM user_table WHERE user_id='$user_id'");
$results = mysqli_fetch_array($user_result);
$password_pull = $results['password'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    if ($old_pass==="") {
        $errOld = "*Existing Password required";
    }

    elseif ($new_pass==="") {
        $errNew = "*New password required";
    }

    elseif ($confirm_pass==="") {
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
            $update_email_result = mysqli_query($userbase_db, "UPDATE user_table SET password='$new_pass' WHERE user_id='$user_id'");

            header("Location: profile.php");
            exit();
        }

    }


}