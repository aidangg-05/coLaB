<?php

if (isset($_POST["deletetask"])) {  //To delete project

    header("Location: index.php");
    exit();

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
