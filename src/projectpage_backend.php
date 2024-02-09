<?php
session_start();
$userbase_db = mysqli_connect('colab-instance.cjaiw2wo2z3k.ap-southeast-2.rds.amazonaws.com', 'admin1', 'admin123' , 'colab_db');

if (!$userbase_db) {
    die("Connection failed:" . mysqli_connect_error());
}

$errName = $errAssign = $errDue = "";
$project_id = $_SESSION['project_id'];


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

/*
<div class="overlay" id="overlay" onclick="hidePopup()"></div>
<table id="taskTable">
    <thead>
    <tr>
        <th>Task Name</th>
        <th>Due Date</th>
        <th>Assignee</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody id="taskList">
    <?php
    $i = 0;
    while ($row = mysqli_fetch_assoc($projects_task_result)) {

        $task_id = $row['task_id'];
        $task = $row['task'];
        $assignee = $row['assignee'];
        $status = $row['status'];
        $due = $row['due_date'];
        $dateObject = new DateTime($due);
        $formattedDate = $dateObject->format('d-m-Y');

    ?>

        <tr>
            <td><?php echo $task?></td>
            <td><?php echo $formattedDate?> </td>
            <td><?php echo $assignee?></td>
            <td>
                <select>
                <option value="Not Started" <?php if ($status ==="Not Started"): ?> selected <?php endif ?>>Not Started</option>
                <option value="In Progress" <?php if ($status ==="In Progress"): ?> selected <?php endif ?> >In Progress</option>
                <option value="Finished" <?php if ($status ==="Finished"): ?> selected <?php endif ?>>Finished</option>
                </select>
                </td>
        </tr>
    <?php $i++;}?>

    <!-- Task rows will be dynamically added here -->
    </tbody>
</table>
 */