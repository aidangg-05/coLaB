<?php
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');
include 'functions.php';

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$current_taskid = $_COOKIE['current_task'];

$subtask_results = mysqli_query($userbase_db, "SELECT * FROM subtask_table WHERE task_id='$current_taskid'");


/* To delete taski */
if (isset($_POST["delete_subtask"])) {
    $current_subtaskid = $_POST["delete_subtask"];

    if ($userbase_db->query("DELETE FROM subtask_table WHERE subtask_id='$current_subtaskid'") === TRUE) {  //Delete task from task_table
        echo "<meta http-equiv='refresh' content='0'>";
    }

}