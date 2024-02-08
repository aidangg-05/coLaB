<?php
include 'functions.php';
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');
if (!$userbase_db) {die("Connection failed:" . mysqli_connect_error());}

$user_id = $_SESSION['current_id'];

$current_email = getEmail($userbase_db, $user_id);

$project_name = $start_date = $end_date = $project_des = $priority  = "";
$errName = $errStart = $errEnd = $errDesc = $errUsers = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $project_name = $_POST['name'];
    $start_date = $_POST['start'];
    $end_date = $_POST['end'];
    $project_des = $_POST['desc'];
    $priority = $_POST['priority'];
    if (isset($_POST['users']))         //For incase,no users are added
    {
        $user_array = $_POST['users'];
    }

    $err1 = $err2 = TRUE;
    $user_array[] = $current_email;  //Add in current user email
    $user_array_id = [];

    foreach ($user_array as $email){
        $id = getUserID($userbase_db, $email);

        if ($id != -1){         //Valid Email
            $user_array_id[] = $id;
        }

        else {
            $errUsers = $errUsers."<br>".
                "Email: $email"." is not valid !";
        }
    }

    if ($project_name === "") {
        $errName = "*Name required";
    }

    if ($start_date === "") {
        $errStart = "*Start Date required";
    }

    if ($end_date === "") {
        $errEnd = "*End Date required";
    }

    if ($project_des === "") {
        $errDesc = "*Desc required";
    }

    else {

        //Insert into project_info table
        if ($userbase_db->query("  
                                        INSERT INTO project_info (project_name,start_date,end_date,status,priority,creator,project_des)
                                        VALUES ('$project_name', '$start_date', '$end_date', 'Not started' , '$priority', '$user_id' , '$project_des' )") === TRUE) {

            //Pull project_id from project_info table
            $pull_projectid = mysqli_query($userbase_db, "SELECT * FROM project_info WHERE project_name='$project_name' AND start_date='$start_date' AND end_date = '$end_date'
                                        AND status='Not started' AND priority='$priority' AND creator='$user_id' AND project_des='$project_des'");
            $projectid_result = mysqli_fetch_array($pull_projectid);
            $project_id = $projectid_result['project_id'];
            $err1 = FALSE;
        }

        //Insert the projects users into project_members
        $i = 0;
        foreach ($user_array_id as $user) {  //Loop through array and add to project_members
            if ($userbase_db->query("INSERT INTO project_members (project_id, member) VALUES('$project_id', '$user')") === TRUE) {
                $i++;
            }
        }

        if ($i == count($user_array))
        {
            $err2 = FALSE;
        }


        //One of statement got issue
        if ($err1 == TRUE || $err2 == TRUE) {

            if ($err1 == TRUE) {
                $errDesc = "Unable to insert into project_info";
            }

            if ($err2 == TRUE) {
                $errDesc = "Unable to insert users into project_members";
            }

        }

        //No issue for both
        if ($err1 == FALSE && $err2 == FALSE) {

            header("Location: index.php");
            exit();
        }
    }
}


