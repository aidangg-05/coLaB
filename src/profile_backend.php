<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$name =$email = $password = "";
$new_name = $new_email = $errName = $errEmail ="";
$regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

$email = $_SESSION['current_email'];

$pull_email = "SELECT * FROM user_table WHERE email='$email'";

$email_result = mysqli_query($userbase_db, $pull_email);


$results = mysqli_fetch_array($email_result);
$name = $results['name'];
$password = $results['password'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $new_name = trim($_POST['name']);
    $new_email = trim($_POST['email']);

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
            $pull_new_email = "SELECT * FROM user_table WHERE email='$new_email'";
            $new_email_result = mysqli_query($userbase_db, $pull_new_email);

            if (mysqli_num_rows($new_email_result) == 1) {           //Available record

                $errEmail = "*Email already used";


            } else {                                             //No available record

                $update_email = "UPDATE user_table SET email='$new_email' WHERE email='$email'";
                $update_email_result = mysqli_query($userbase_db, $update_email);

                $update_name = "UPDATE user_table SET name='$new_name' WHERE email='$email'";
                $update_name_result = mysqli_query($userbase_db, $update_name);

                $_SESSION['current_email'] = $new_email;

                header("Location: profile.php");
                exit();
            }

    }


}