<?php
session_start();
$_SESSION['message'] = "";
$email = "";
$password = "";
$password_pull = "";

$userbase_db = mysqli_connect('localhost', 'root', '', 'colab_userbase');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pull_email_statement = "SELECT * FROM user_id WHERE email='$email'";

    $email_result = mysqli_query($userbase_db, $pull_email_statement);     //For $username need to use ' '

    if (mysqli_num_rows($email_result) == 1) {           //Available record

        $results = mysqli_fetch_array($email_result);  //Pull password
        $password_pull = $results['password'];

        if ($password_pull == $password) {
            header("Location: index.php");
            exit();
        } else{
            $_SESSION['message'] = "Wrong";
        }
    } else {          //No available record
        $_SESSION['message'] = "No account";
    }
}

?>