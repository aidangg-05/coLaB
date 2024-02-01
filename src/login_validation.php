<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$email = "";
$password = "";
$password_pull = "";
$errEmail = $errPassword =  "";
$regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email==="") {
        $errEmail = "*Email required";
    }
    else if (preg_match($regex,$email) === 0){
        $errEmail = "*Invalid email";
    }

    if($password===""){
        $errPassword = "*Password required";
    }
    else {
                                                                            //When all input valid
        $pull_email = "SELECT * FROM user_table WHERE email='$email'";
        $email_result = mysqli_query($userbase_db, $pull_email);

        if (mysqli_num_rows($email_result) == 1) {           //Available record

            $results = mysqli_fetch_array($email_result);
            $password_pull = $results['password'];

            if ($password_pull == $password) {          //Password correct

                $userid_result = mysqli_query($userbase_db, "SELECT user_id FROM user_table WHERE email = '$email'");
                $userid = mysqli_fetch_array($userid_result)['user_id'];       //Fetch user_id

                $_SESSION['current_id'] = $userid;
                header("Location: index.php");
                exit();

            } else {                                     //Incorrect Password
                $errPassword = "Password Incorrect";
            }
        } else {          //No available record
            $errEmail = "Account don't exist";
        }
    }
}