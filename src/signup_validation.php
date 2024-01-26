<?php
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db){
    die("Connection failed:" . mysqli_connect_error());
}

$email = "";
$name = "";
$password = "";
$errName = $errEmail = $errPassword =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"]))
    {
        $errEmail = "Email required";
    }

    if (empty($_POST["name"]))
    {
        $errName = "Name required";
    }

    if (empty($_POST["password"]))
    {
        $errPassword = "Password required";
    }

    else            //When all input valid
    {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];

        $pull_email = "SELECT * FROM user_table WHERE email='$email'";
        $insert = "INSERT INTO user_table (name,email,password) VALUES ('$name','$email','$password')"; //For $name need to use ' '

        $name_result = mysqli_query($userbase_db, $pull_email);
        if (mysqli_num_rows($name_result) == 1) {
            $errEmail = "Account already exist";
        } else {
            header("Location: index.php");
            exit();
        }
    }

}


