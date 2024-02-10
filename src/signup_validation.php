<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db){
    die("Connection failed:" . mysqli_connect_error());
}

$email = $name = $password = "";
$errName = $errEmail = $errPassword =  "";
$regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    if ($email==="") {
        $errEmail = "*Email required";
    }

    else if (preg_match($regex,$email) === 0){
        $errEmail = "*Invalid email";
    }

    else if ($name == "") {
        $errName = "*Name required";
    }

    else if ($password == "") {
        $errPassword = "*Password required";
    }

    else            //When all input valid
    {

        $row_result = mysqli_query($userbase_db, "SELECT * FROM user_table WHERE email='$email'");

        if (mysqli_num_rows($row_result) == 1) {        //When email already has account

            $errEmail = "*Account already exist";

        } else {                                    //When email does not have an account

            if ($userbase_db -> query("INSERT INTO user_table (name,email,password) VALUES ('$name','$email','$password')") === TRUE){  //If able to insert into user_table

                $userid_result = mysqli_query($userbase_db, "SELECT user_id FROM user_table WHERE email = '$email'");  //Fetch user_id
                $userid = mysqli_fetch_array($userid_result)['user_id'];                                                     //Get user_id from the array


                $_SESSION['current_id'] = $userid;          //Set the session (To determine current user)
                header("Location: index.php");
                exit();
                }

                else {
                    $errEmail = "*Error";
                }

        }
    }

}


