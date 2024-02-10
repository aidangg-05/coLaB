<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');
include 'functions.php';

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$errName = $errAssign = $errDue = "";
$project_id = $_COOKIE['current_project'];

//Pull task for current project
$tasks_result = mysqli_query($userbase_db, "SELECT * FROM task_table WHERE project_id='$project_id' ");


//Pull project info from project_info table
$projectinfo_results = mysqli_query($userbase_db, "SELECT * FROM project_info WHERE project_id='$project_id' ");
$project_info = mysqli_fetch_assoc($projectinfo_results);
$project_name = $project_info['project_id'];
$project_start = $project_info['start_date'];
$project_due = $project_info['end_date'];
$project_status = $project_info['status'];
$project_priority= $project_info['priority'];
$project_des = $project_info['project_des'];

//Pull list of members for this project
$members_result =  mysqli_query($userbase_db, "SELECT member FROM project_members WHERE project_id='$project_id'");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $task_name = $_POST['name'];
    $assign = $_POST['assign'];
    $due = $_POST['due_date'];
    $start = "testfirst";
    $status = $_POST['status'];

    if ($task_name === "") {
        $errName = "Task name cannot be empty";
    }

    else if ($assign === "") {
        $errAssign = "Cannot be empty";
    }

    else if ($due === "") {
        $errDue = "Due start cannot be empty";
    }

    else {
        //Insert into table
        if ($userbase_db->query("INSERT INTO task_table(project_id,task_name,assignee,start_date,due_date,status)
                                        VALUES ('$project_id','$task_name', '$assign', '$start', '$due','$status' )") === TRUE) {
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            $errName = "Unable to insert task into project";
        }
    }
}

if (isset($_POST["delete"])) {
    $wrong1 = $wrong2 = $wrong3 = $wrong4 = TRUE;

    //Delete Project from project_info
    if ($userbase_db->query("DELETE FROM project_info WHERE project_id='$project_id'") === TRUE) {
        $wrong1 = FALSE;
    }

    //Delete project from project_member
    if ($userbase_db->query("DELETE FROM project_members WHERE project_id='$project_id'") === TRUE) {
        $wrong2 = FALSE;
    }

    //Delete tasks from project from task_table
    if ($userbase_db->query("DELETE FROM task_table WHERE project_id='$project_id'") === TRUE) {
        $wrong3 = FALSE;
    }

    //Delete sub-tasks from project from subtask_table


    //If everything is deleted
    if ($wrong1 == FALSE && $wrong2 == FALSE && $wrong3 == FALSE){
        header("Location: index.php");
        exit();
    }

}
