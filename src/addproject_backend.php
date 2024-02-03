<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$user_id = $_SESSION['current_id'];

$project_name = $start_date = $end_date = $project_des = $priority  = "";
$errName = $errStart = $errEnd = $errDesc = $errUsers = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $project_name = $_POST['name'];
    $start_date = $_POST['start'];
    $end_date = $_POST['end'];
    $project_des = $_POST['desc'];
    $priority = $_POST['priority'];

    $err1 = $err2 = $err3 = TRUE ;

    if(isset($_POST['users'])) {
        $users = $_POST['users'];
    } else {
        $users = "no other users";
    }

    if ($project_name === ""){
        $errName = "*Name required";
    }

    if ($start_date === ""){
        $errStart = "*Start Date required";
    }

    if ($end_date === ""){
        $errEnd = "*End Date required";
    }

    if ($project_des === ""){
        $errDesc = "*Desc required";
    }
    if ($users === ""){
        $errUsers = "*Email required";
    }


else {

    $users_array = explode(',', $users); //array of users



        //To check,if unable to insert into project_info
        if ($userbase_db -> query("  
                                        INSERT INTO project_info (project_name,start_date,end_date,status,priority,creator,project_des)
                                        VALUES ('$project_name', '$start_date', '$end_date', 'Not started' , '$priority', '$user_id' , '$project_des' )") === TRUE){ $err1 = FALSE; }

        else {
            $errStart= "Unable to insert into project_info table";
        }

        $project_result = mysqli_query($userbase_db, "SELECT project_id FROM project_info WHERE project_name = '$project_name' AND creator ='$user_id'");  //Fetch user_id
        $project_id = mysqli_fetch_array($project_result)['project_id'];
        $project_table_name = "project_".$project_id."_tasks";

        //Check if able to create table project tasks
        if ($userbase_db -> query("CREATE TABLE `colab_db`.`$project_table_name` (
                                              `task_id` INT NOT NULL AUTO_INCREMENT,
                                              `task` VARCHAR(45) NOT NULL,
                                              `assignee` VARCHAR(45) NOT NULL,
                                              `status` VARCHAR(45) NOT NULL,
                                              `due_date` VARCHAR(45) NOT NULL,
                                              `parent` VARCHAR(45) NULL,
                                              PRIMARY KEY (`task_id`));
                                            ") === TRUE){ $err2 = FALSE; }
        else{
                $errEnd= "Unable to create table";
            }

        //Insert to user project_info
        $user_table = "user_".$user_id."_table";
        if ($userbase_db -> query("INSERT INTO `$user_table`  (project_id,permission) VALUES($project_id,1)") === TRUE){ $err3 = FALSE; }
        else {
            $errDesc= "Unable to insert into user_table";
        }

        if ($err1 == FALSE && $err2 == FALSE && $err3 == FALSE){

            header("Location: index.php");
            exit();
        }

    }
}
