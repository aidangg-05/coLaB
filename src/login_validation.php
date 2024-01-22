<?php

session_start();
$userbase_db = mysqli_connect('localhost', 'root', '', 'colab_userbase');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];
$password_pull = "";
$login = false;

$pull_email_statement = "SELECT * FROM user_id WHERE email='$email'";

$email_result = mysqli_query($userbase_db, $pull_email_statement);     //For $username need to use ' '

if (mysqli_num_rows($email_result) == 1) {           //Available record

    $results = mysqli_fetch_array($email_result);  //Pull password
    $password_pull = $results['password'];

    if ($password_pull == $password){
        $_SESSION['message'] = "Valid Password";
        $login = true;
        echo "Statement 1";
    }

    else {
        $_SESSION['message'] = "Invalid Password";
        echo "Statement 2";
    }
}

else {          //No available record
    $_SESSION['message'] = "No exciting account";
    echo "Statement 3";
}