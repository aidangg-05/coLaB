<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$errName = $errAssign = $errDue = "";
$project_id = $_SESSION['project_id'];
echo $project_id;

$project_task_name = "project_".$project_id."_tasks";
$projects_task_result = mysqli_query($userbase_db, "SELECT * FROM `$project_task_name` ");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $task_name = $_POST['name'];
    $assign = $_POST['assign'];
    $due = $_POST['due_date'];
    $status = $_POST['status'];

    if ($task_name === "") {
        $errName = "Task name cannot be empty";
    }

    if ($assign === "") {
        $errAssign = "Cannot be empty";
    }

    if ($due === "") {
        $errDue = "Due start cannot be empty";
    } else {
        $project_task_name = "project_" . $project_id . "_tasks";
        if ($userbase_db->query("  
                                        INSERT INTO `$project_task_name` (task,assignee,status,due_date)
                                        VALUES ('$task_name', '$assign', '$status', '$due' )") === TRUE) {
        } else {
            $errName = "Unable to insert into to project task";
        }
    }
}