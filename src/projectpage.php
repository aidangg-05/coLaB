<!DOCTYPE html>
<?php include 'projectpage_backend.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_projectpage.css">
    <title>Project Management</title>
    <!--For icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>
<body>
<style>
    /* Add your own styles here */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        display: flex;
        flex-direction: column;
        justify-content: flex-start; /* Updated to start from the top */
        height: 100vh;
    }

    #projectDetails {
        text-align: center;
        margin-top: 20px;
    }

    h1 {
        color: #3498db;
        margin: 0;
    }

    button {
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 20px;
    }

    button:hover {
        background-color: #2980b9;
    }

    .popup-form {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1;
        border-radius: 10px;
        width: 300px;
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label {
        margin-top: 10px;
    }

    input, select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="date"] {
        padding: 8px;
    }

    input[type="submit"] {
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 0;
    }

    #taskTable {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #3498db;
        color: #fff;
    }
</style>
<nav class="navbar">

    <ul>
        <li><span class="material-symbols-outlined" onclick="window.location.href='index.php'" style="font-size: 20px">arrow_back</span></li>
        <li style="background-color: white;color: black">Projects</li>
        <li onclick="goGanttchart()">Gnatt Chart</li>
    </ul>
</nav>

<!-- Add Task Modal -->
<div id="projectDetails">
    <h1 id="projectName">Your Project Name</h1>
    <button onclick="showPopup()">Add Task</button>
</div>

<div class="popup-form" id="taskForm">
    <form id="addTaskForm" method="post">
        <label for="taskName">Task Name:</label>
        <input type="text" id="taskName" name="name">
        <span> </span>

        <label for="dueDate">Due Date:</label>
        <input type="date" id="dueDate" name="due_date">
        <span> </span>

        <label for="assignee">Assignee:</label>
        <input type="text" id="assignee" name="assign">
        <span> </span>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Not Started" selected>Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Finished">Finished</option>
        </select>

        <input type="submit" value="Add Task">
    </form>
</div>

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

        while ($task = mysqli_fetch_assoc($tasks_result)){

            $task_name = $task['task_name'];
            $assignee = $task['assignee'];
            $status = $task['status'];
            $due = $task['due_date'];
            $dateObject = new DateTime($due);
            $formattedDate = $dateObject->format('d-m-Y'); ?>
            <tr>
                <td id="task_name"><?php echo $task_name?></td>
                <td id="end_date"><?php echo $formattedDate?> </td>
                <td><?php echo $assignee?></td>
                <td>
                    <select>
                        <option value="Not Started" <?php if ($status ==="Not Started"): ?> selected <?php endif ?>>Not Started</option>
                        <option value="In Progress" <?php if ($status ==="In Progress"): ?> selected <?php endif ?> >In Progress</option>
                        <option value="Finished" <?php if ($status ==="Finished"): ?> selected <?php endif ?>>Finished</option>
                    </select>
                </td>
            </tr>
            <?php }?>
        <!-- Task rows will be dynamically added here -->
    </tbody>
</table>

<script>
    function showPopup() {
        document.getElementById('taskForm').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    function hidePopup() {
        document.getElementById('taskForm').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
        resetForm();
    }

    function resetForm() {
        document.getElementById('addTaskForm').reset();
    }

    function addTask() {
        const taskName = document.getElementById('taskName').value;
        const dueDate = document.getElementById('dueDate').value;
        const assignee = document.getElementById('assignee').value;
        const status = document.getElementById('status');

        const taskTable = document.getElementById('taskTable');
        const taskList = document.getElementById('taskList');

        const newRow = taskList.insertRow(taskList.rows.length);
        const cell1 = newRow.insertCell(0);
        const cell2 = newRow.insertCell(1);
        const cell3 = newRow.insertCell(2);
        const cell4 = newRow.insertCell(3);

        cell1.innerHTML = taskName;
        cell2.innerHTML = dueDate;
        cell3.innerHTML = assignee;

        const statusValue = status.value;
        const statusDropdown = document.createElement('select');
        statusDropdown.innerHTML = `
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Finished">Finished</option>
        `;
        statusDropdown.value = statusValue;

        statusDropdown.addEventListener('change', function () {
            status.value = this.value;
        });

        cell4.innerHTML = '';
        cell4.appendChild(statusDropdown);

        hidePopup();
    }

    function goGanttchart(){
        window.location.href="gantt_V2.php";
    }
</script>
</body>
</html>
