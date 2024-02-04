<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$name =$email = $password = "";
$new_name = $new_email = $errName = $errEmail ="";
$regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

$userid = $_SESSION['current_id'];

$pull_email = "SELECT * FROM user_table WHERE user_id='$userid'";

$email_result = mysqli_query($userbase_db, $pull_email);

$results = mysqli_fetch_array($email_result);
$name = $results['name'];
$password = $results['password'];
$email = $results['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $new_name = trim($_POST['name']);
    $new_email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    if ($new_name==="") {
        $errName = "*Name required";

    }
    if($new_email===""){
        $errEmail = "*Email required";
    }

    else if (preg_match($regex, $new_email) === 0){
        $errEmail = "*Invalid email";
    }

    else
    {
            $new_name = filter_var($new_name, FILTER_SANITIZE_STRING);

            $pull_new_email = "SELECT * FROM user_table WHERE email='$new_email'";
            $new_email_result = mysqli_query($userbase_db, $pull_new_email);

            if (mysqli_num_rows($new_email_result) == 1) {           //Available record

                $errEmail = "*Email already used";


            } else {                                             //No available record

                $update_email = "UPDATE user_table SET email='$new_email' WHERE user_id='$userid'";
                $update_email_result = mysqli_query($userbase_db, $update_email);

                $update_name = "UPDATE user_table SET name='$new_name' WHERE user_id='$userid'";
                $update_name_result = mysqli_query($userbase_db, $update_name);

                header("Location: profile.php");
                exit();
            }

    }


}
