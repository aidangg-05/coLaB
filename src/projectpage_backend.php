<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$errName = $errAssign = $errDue = "";
$project_id = $_SESSION['project_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $task_name = $_POST['name'];
    $assign= $_POST['assign'];
    $due = $_POST['due_date'];
    $status = $_POST['status'];

    if ($task_name === ""){
        $errName = "*Task name cannot be empty";
    }

    if ($assign === ""){
        $errAssign = "*Cannot be empty";
    }

    if ($due === ""){
        $errAssign = "*Due start cannot be empty";
    }

    else {

    }






}
