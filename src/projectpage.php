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
<nav class="navbar">

    <ul>
        <li><span class="material-symbols-outlined" onclick="window.location.href='index.php'" style="font-size: 20px">arrow_back</span></li>
        <li style="background-color: white;color: black">Projects</li>
        <li onclick="goGanttchart()">Gnatt Chart</li>
    </ul>
</nav>
<div class="project-details">
    <h1>Project Name</h1>
    <!-- Add Task Button -->
    <button id="addTaskBtn" onclick="openModal()">Add Task</button>

    <!-- Task Cards Container -->
    <div id="taskCardsContainer" class="task-cards-container">
        <!-- Task cards will be dynamically added here using JavaScript -->
    </div>
</div>

<!-- Add Task Modal -->
<div id="addTaskModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Add Task</h2>
        <form id="taskForm" method="post">
            <label for="taskName">Task Name:</label>
            <input type="text" id="taskName" name="name">
            <span></span>

            <label for="assignedTo">Assign to:</label>
            <input type="text" id="assignedTo" name="assign">
            <span></span>

            <label for="dueDate">Due Date:</label>
            <input type="date" id="dueDate" name="due_date">
            <span></span>

            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="not-started" selected>Not Started</option>
                <option value="in-progress">In Progress</option>
                <option value="done">Done</option>
            </select>
            <span></span>

            <button type="submit" onclick="addTask()">Add Task</button>
        </form>
    </div>
</div>

<script src="script_projectpage.js"></script>
</body>
</html>
