<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$errName = $errAssign = $errDue = "";
$project_id = $_COOKIE['current_project'];

//Pull task for current project
$tasks_result = mysqli_query($userbase_db, "SELECT * FROM task_table WHERE project_id='$project_id' ");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['name'];
    $assign = $_POST['assign'];
    $due = $_POST['due_date'];
    $start = "testfirst";
    $status = $_POST['status'];

    if ($task_name === "") {
        $errName = "Task name cannot be empty";
    }

    if ($assign === "") {
        $errAssign = "Cannot be empty";
    }

    if ($due === "") {
        $errDue = "Due start cannot be empty";
    }

    else {
        //Insert into table
        if ($userbase_db->query("INSERT INTO task_table(project_id,task_name,assignee,start_date,due_date,status)
                                        VALUES ('$project_id','$task_name', '$assign', '$start', '$due','$status' )") === TRUE) {
        } else {
            $errName = "Unable to insert task into project";
        }
    }
}
