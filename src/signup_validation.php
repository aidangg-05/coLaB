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

    if (empty($_POST["email"]))
    {
        $errEmail = "Email required";
    }

    else if (preg_match($regex, $_POST["email"]) === 0)
    {
        $errEmail = "*Invalid email";
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

        $row_result = mysqli_query($userbase_db, "SELECT * FROM user_table WHERE email='$email'");

        if (mysqli_num_rows($row_result) == 1) {        //When email already has account

            $errEmail = "Account already exist";

        } else {

            $table_name = $email."_table";

            if ($userbase_db -> query("INSERT INTO user_table (name,email,password) VALUES ('$name','$email','$password')") === TRUE){  //If able to insert into user_table

                $userid_result = mysqli_query($userbase_db, "SELECT user_id FROM user_table WHERE email = '$email'");  //Fetch user_id
                $userid = mysqli_fetch_array($userid_result)['user_id'];                                                     //Gte user_id from the array

                $user_table_name = "user_".$userid."_table";                             //add table at the end

                if ($userbase_db -> query("CREATE TABLE `colab_db`.`$user_table_name`(`project_id` INT NOT NULL,`permission` INT NOT NULL);") === TRUE){
                    $_SESSION['current_id'] = $userid;          //Set the session (To determine current user)
                    header("Location: index.php");
                    exit();
                }

                else {
                    $errEmail = "Error - Cannot create Table";
                }
            }

            else {
                $errEmail = "Error -Cannot insert data ";
            }

        }
    }

}


