<?php

session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$user_id = $_SESSION['current_id'];
$user_table = "user_".$user_id."_table";


$user_projects_result = mysqli_query($userbase_db, "SELECT * FROM `$user_table` ");  //Fetch user_id
