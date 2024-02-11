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
$project_name = $project_info['project_name'];
$project_start = $project_info['start_date'];
$project_due = $project_info['end_date'];
$project_status = $project_info['status'];

$project_creator = $project_info['creator'];
$creator_email = getEmail($userbase_db,$project_creator);

$project_priority= $project_info['priority'];
$project_des = $project_info['project_des'];

//Pull list of members for this project
$members_result =  mysqli_query($userbase_db, "SELECT member FROM project_members WHERE project_id='$project_id'");
$members_result1 =  mysqli_query($userbase_db, "SELECT member FROM project_members WHERE project_id='$project_id'");


if (isset($_POST['AddTask'])){

    $task_name = trim($_POST['name']);
    $assign = trim($_POST['assign']);
    $start = $_POST['start_date'];
    $due = $_POST['due_date'];
    $status = $_POST['status'];

    if ($task_name === "") {
        $errName = "Task name cannot be empty";
    }

    else if ($assign === "") {
        $errAssign = "Cannot be empty";
    }

    else if ($start === "") {
        $errDue = "Due start cannot be empty";
    }

    else if ($due === "") {
        $errDue = "Due start cannot be empty";
    }

    else if (strtotime($start) > strtotime($due)) {
        $errStart = "*Start Date cannot be after End Date";
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

if (isset($_POST["delete"])) {  //To delete project
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

if (isset($_POST["deletetask"])) {  //To delete task
    $current_task = $_POST["deletetask"];
    $wong1 = $wong2 = TRUE;

    if ($userbase_db->query("DELETE FROM task_table WHERE task_id='$current_task'") === TRUE) {  //Delete task from task_table
        $wong1 = FALSE;
    }


    //Delete subtask that has this task id from subtask_table
    $wong2 = FALSE;


    if ($wong1 == FALSE && $wong2 == FALSE){   //Refresh content
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if (isset($_POST["modify_project"])) {  //To modify project
    $modify_name = trim($_POST['modifyProjectName']);
    $modify_des = trim($_POST['modifyProjectDescription']);
    $modify_end = $_POST['modifyEndDate'];
    $modify_priority = $_POST['modifypriority'];

    if ($modify_name === "") {

    }


    else if ($modify_des === "") {

    }

    else if ($modify_end === "") {

    }


    else {

        //Update in project_info table
        if ($userbase_db->query("
            UPDATE project_info SET project_name='$modify_name',end_date='$modify_end',priority='$modify_priority',project_des='$modify_des' WHERE project_id='$project_id'") === TRUE) {
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }
}



/*
if (isset($_POST["addsubtask"])) {
    $sub_name = trim($_POST['subtaskName']);
    $due_date = $_POST['subtaskDueDate'];
    $sub_assignee = $_POST['subtaskAssignee'];


    if ($sub_name === "") {

    }

    else if ($sub_assignee === "") {

    }

    else {


        $errDue = "Due start cannot be empty";
    }
}
*/



/*
         <select>
           <?php
            while ($members_row = mysqli_fetch_assoc($members_result)){
                foreach ($members_row as $member){
                    if ($member == $project_creator){
                        continue;}
                    $member_email = getEmail($userbase_db,$member)

                    ?>
                    <option value="<?php $member_email?>" name="assign" id="assignee"><?php $member_email?></option>
                <?php }} ?>
        </select>
        <span> </span>

 */