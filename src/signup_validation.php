<?php
session_start();
$username = "";
$password = "";
$email = "";
$userbase_db = mysqli_connect('localhost', 'root', '' , 'colab_userbase');

if (!$userbase_db){
    die("Connection failed:" . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $insert_statement = "INSERT INTO user_id (username,email,password) VALUES ('$username','$email','$password')";
    $pull_username_statement = "SELECT * FROM user_id WHERE username='$username'";

    $username_result = mysqli_query($userbase_db, $pull_username_statement);     //For $username need to use ' '

    if (mysqli_num_rows($username_result) == 1) {     //Account is already available
        $_SESSION['message'] = "Account already exist";
    } else {                                              //No account available

        if (mysqli_query($userbase_db, $insert_statement)) {  //Able to create account
            $_SESSION['message'] = "Account created";
            header("Location: index.php");
            exit();
        } else {                                               //Unable to create account
            $_SESSION['message'] = "Account not created";
        }
    }
}