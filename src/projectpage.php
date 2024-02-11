<!DOCTYPE html>
<?php include 'projectpage_backend.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_projectpage.css">
    <title>Project Management</title>
    <!--For icons-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script type="text/javascript" src="script_addprojectform.js"></script>
</head>
<body>
<style>
    /* Add your own styles here */
    body {
        font-family: "Poppins";
        margin: 0;
        display: flex;
        flex-direction: column;
        justify-content: flex-start; /* Updated to start from the top */
        height: 100vh;
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
    input[type="button"] {
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
        width: 75%;
        margin: 0 auto; /* Center the table horizontally */
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Updated box shadow */
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
        border: none; /* Remove border */
        padding: 8px; /* Adjust padding */
        text-align: center; /* Center align text */
    }

    th {
        background-color: #3498db;
        color: #fff;
    }

    tbody tr {
        background-color: #f9f9f9; /* Alternate row background color */
    }

    tbody tr:hover {
        background-color: #eaeaea; /* Hover background color */
    }

    td button {
        display: inline-block; /* Display buttons inline */
        margin-right: 5px; /* Add some spacing between buttons */
    }

    .button-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 5px;
    }


    tbody tr {
        height: auto;
    }


    form {
        margin: 0;
    }

    .button-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 5px;
    }

    tbody tr {
        height: auto;
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    #name {
        font-family: "kanit";
        color: #3498db;
        font-size: 30px;
        margin-left:60px;
    }

    #doodle {
        width: 70px;
    }
    @media screen and (max-width: 1000px) {
        .navlinks {
            display: none;
        }

        .hamburger {
            display: inline;
        }

        #button {
            display: inline;
            background-color: white;
            border: none;
        }
    }

    .navlinks {
        display: flex;
        align-items: center;
    }

    .navlinks a {
        color: #e67e22; /* Use complementary orange color */
        display: block;
        padding: 8px;
        text-decoration: none;
        font-weight: bold;
        font-size: 20px;
        text-transform: uppercase;
    }


    .navlinks a:hover {
        color: lightgray;
    }

    #button {
        display:none;
    }

    .hamburger {
        width:40px;
        margin-top:5px;
        margin-right:5px;
        display:none
    }

    @media screen and (max-width: 1000px) {
        .navlinks {
            display: none;
        }

        .hamburger {
            display:inline;
        }

        #button {
            display:inline;
            background-color: white;
            border: none;
        }
    }

    .dot {
        padding: 0 5px;
    }

    .kanye {
        display: flex;
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
    }

    .kanye .west {
        margin: 5px;
    }

    .kanye .west button {
        background-color: #2ecc71;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 24px;
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s;
        font-family: "Poppins", sans-serif;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-right: 10px;
    }

    .kanye .west button:last-child {
        background-color: #3498db;
    }

    .kanye .west button:hover {
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .kanye .west button:last-child:hover {
        background-color: #2980b9;
    }

    .kanye .west button span {
        margin-right: 8px;
    }

</style>
<div class="nav-container">
    <div>
        <a href='helpme.php'><img id="doodle" src="img/girl.gif"/></a>
    </div>
    <div>
        <b id="name">CoLab</b>
    </div>
    <div class="navlinks" id="navlinks">
        <a href="gantt_V2.php">Gantt Chart</a>
    </div>
    <button id="button" class="hamburger" ><img src="img/burger.png"/></button>
</div>

<!-- project details -->
<div class="popup-form" id="projectDetailsForm">
    <table>
        <tr>
            <td style="border: none;padding: 5px"><span class="project">Project Name:</span></td>
            <td style="border: none;padding: 5px"><span><?php echo $project_name?></span></td>
        </tr>
        <tr>
            <td style="border: none;padding: 5px"><span class="project">Project Description:</span></td>
            <td style="border: none;padding: 5px"><span><?php echo $project_des?></span></td>
        </tr>
        <tr>
            <td style="border: none;padding: 5px"><span class="project">Start Date:</span></td>
            <?php
            $dateObject1 = new DateTime($project_start);
            $formatted_Start = $dateObject1->format('d-m-Y');
            ?>
            <td style="border: none;padding: 5px"><span><?php echo $formatted_Start ?></span></td>
        </tr>
        <tr>
            <td style="border: none;padding: 5px"><span class="project">End Date:</span></td>
            <?php
            $dateObject2 = new DateTime($project_due);
            $formatted_Due = $dateObject2->format('d-m-Y');
            ?>
            <td style="border: none;padding: 5px"><span><?php echo $formatted_Due?></span></td>
        </tr>
        <tr>
            <td style="border: none;padding: 5px"><span class="project">Created by:</span></td>
            <td style="border: none;padding: 5px"><span><?php echo $creator_email?></span></td>
        </tr>
        <tr>
            <td style="border: none;padding: 5px"><span class="project">Priority:</span></td>
            <td style="border: none;padding: 5px"><span><?php echo $project_priority?></span></td>
        </tr>
        <tr>
            <td style="border: none;padding: 5px"><span class="project">Members:</span></td>
            <td style="border: none;padding: 5px"><?php
                while ($members_row = mysqli_fetch_assoc($members_result)){
                    foreach ($members_row as $member){
                        if ($member == $project_creator){
                            continue;}
                        $member_email = getEmail($userbase_db,$member)

                        ?>
                        <span><?php echo $member_email?></span>
                    <?php }} ?>
            </td>
        </tr>
    </table>
    <br>
    <form>
        <button style="background-color: forestgreen" onclick="showModifyPopup()" type="button">Modify</button>
    </form>
    <form method="post">
        <button style="background-color: red" name='delete' type="submit">Delete Project</button>
    </form>
</div>

<div class="overlay" id="overlayProjectDetails" onclick="hideProjectDetailsPopup()"></div>

<!-- add button and more info button-->
<div class="kanye">
    <div class='west' style="margin: 5px">
        <button onclick="showPopup()">+ Task</button>
        <button onclick="showProjectDetailsPopup()">More Info</button>
    </div>
</div>
<!-- Modify Project Modal -->
<div class="popup-form" id="modifyForm">
    <form id="modifyProjectForm" method="post">
        <label>Project Name:</label>
        <input type="text" id="modifyProjectName" name="modifyProjectName" value="<?php echo $project_name?>">

        <label>Project Description:</label>
        <textarea id="modifyProjectDescription" name="modifyProjectDescription" style="width:97%;border: 1px solid rgb(182,182,182);border-radius: 5px"><?php echo $project_des?></textarea>

        <label>End Date:</label>
        <input type="date" id="modifyEndDate" name="modifyEndDate" value="<?php echo $project_due?>">

        <label>Priority:</label>
        <select name="modifypriority">
            <option <?php if ($project_priority == "High"){echo'selected';}?>>High</option>
            <option <?php if ($project_priority == "Medium"){echo'selected';}?>>Medium</option>
            <option <?php if ($project_priority == "Low"){echo'selected';}?>>Low</option>
        </select>

        <input type="submit" name="modify_project" value="Save changes">
    </form>
</div>

<div class="overlay" id="overlayModify" onclick="hideModifyPopup()"></div>

<div class="popup-form" id="taskForm">
    <form id="addTaskForm" method="post">
        <label for="taskName">Task Name:</label>
        <input type="text" id="taskName" name="name">
        <span> </span>

        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="start_date">
        <span> </span>

        <label for="dueDate">Due Date:</label>
        <input type="date" id="dueDate" name="due_date">
        <span> </span>


        <label for="assignee">Assignee:</label>
        <select id="Assignee" name="assign">
            <?php
            while ($members_row1 = mysqli_fetch_assoc($members_result1)){
                foreach ($members_row1 as $member){
                    $member_Name = getName($userbase_db,$member)
                    ?>
                    <option value="<?php echo $member?>" id="assignee"><?php echo $member_Name?></option>
                <?php }} ?>
            <span> </span>
        </select>
        <span> </span>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Not Started" selected>Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Finished">Finished</option>
        </select>

        <input type="submit" name="AddTask">
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
        <th>Options</th>
    </tr>
    </thead>
    <tbody id="taskList" onclick="showPopup4()" >
    <?php

    while ($task = mysqli_fetch_assoc($tasks_result)){
        $task_id = $task['task_id'];
        $task_name = $task['task_name'];

        $assignee = $task['assignee'];
        $assignee_name = getName($userbase_db,$assignee);
        $status = $task['status'];
        $due = $task['due_date'];
        $dateObject = new DateTime($due);
        $formattedDate = $dateObject->format('d-m-Y'); ?>
        <tr value="<?php echo $task_id?>">
            <td><?php echo $task_name?></td>
            <td><?php echo $formattedDate?> </td>
            <td><?php echo $assignee_name?></td>
            <td><?php echo $status?></td> <!-- Updated this line to display status as text -->
            <td>
                <div class="button-container">
                    <form method="post">
                        <button type="submit" name="deletetask" value="<?php echo $task_id?>">Delete</button>
                    </form>
                <form>
                    <button onclick="get_CurrentTask(event); window.location.href='subtask.php'">View Subtask</button>
                </form>
                    <form>
                        <button class="subtask-option" name="add_subtask" value="<?php echo $task_id?>" onclick="showSubtaskForm(); get_CurrentTask(event)" type="button">Add Subtask</button>
                    </form>
                    <form>
                        <button class="edittask-option" name="edit_task" value="<?php echo $task_id?>" onclick="showPopup3(); get_CurrentTask(event)"" type="button">Edit Task</button>
                    </form>
                </div>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>
<div class="popup-form" id="subtaskForm" style="display: none;">
    <form method="post">
        <label for="subtaskName">Subtask Name:</label>
        <input type="text" id="subtaskName" name="subtaskName">

        <label for="subtaskDueDate">Due Date:</label>
        <input type="date" id="subtaskDueDate" name="subtaskDueDate">

        <label for="subAssignee">Assignee:</label>
        <select id="SubAssignee" name="Subassign">
            <?php
            while ($members_row2 = mysqli_fetch_assoc($members_result2)){
                foreach ($members_row2 as $member){
                    $member_Name = getName($userbase_db,$member)
                    ?>
                    <option value="<?php echo $member?>" id="subassignee"><?php echo $member_Name?></option>
                <?php }} ?>
        </select>
        <button type="button" onclick="hidePopup2()">Close</button>
        <button type="submit" name="addsubtask">Add Subtask</button>
    </form>
</div>

<div class="popup-form" id="editTaskForm" style="display: none;">
    <form id="editTaskForm" method="post">
        <label for="editTaskName">Task Name:</label>
        <input type="text" id="editTaskName" name="editTaskName">

        <label for="editDueDate">Due Date:</label>
        <input type="date" id="editDueDate" name="editDueDate">

        <label for="editAssignee">Assignee:</label>
        <select id="editAssignee" name="editAssignee">
            <?php
            while ($members_row3 = mysqli_fetch_assoc($members_result3)){
                foreach ($members_row3 as $member){
                    $member_Name = getName($userbase_db,$member)
                    ?>
                    <option value="<?php echo $member?>" id="subassignee"><?php echo $member_Name?></option>
                <?php }} ?>
        </select>

        <label for="editStatus">Status:</label>
        <select id="editStatus" name="editStatus">
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Finished">Finished</option>
        </select>
        <button type="button" onclick="hidePopup3()">Close</button>
        <button type="submit" name="edittask_save">Save changes</button>
    </form>
</div>


<script>
    /*
    document.addEventListener('DOMContentLoaded', function() {
        const optionsMenus = document.querySelectorAll('.options');

        optionsMenus.forEach(menu => {
            menu.style.display = 'none'; // Hide all options menus by default
        });

        const optionsButtons = document.querySelectorAll('.options-button');

        optionsButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                const optionsMenu = button.nextElementSibling;
                optionsMenu.style.display = optionsMenu.style.display === 'block' ? 'none' : 'block';
                event.stopPropagation();
            });

            // Add event listener for the "Subtask" button inside the options menu
            const subtaskButton = button.nextElementSibling.querySelector('.subtask-option');
            subtaskButton.addEventListener('click', function(event) {
                showSubtaskForm(); // Call the showSubtaskForm function
                event.stopPropagation(); // Prevent the click event from bubbling
            });

            const editTaskButton = button.nextElementSibling.querySelector('.edittask-option');
            editTaskButton.addEventListener('click', function(event) {
                const row = button.closest('tr'); // Find the parent row of the button
                populateEditForm(row); // Populate the edit form fields with data from the selected row
                showPopup3(); // Show the edit task form
                event.stopPropagation(); // Prevent the click event from bubbling
            });

            // Add event listener for the "Delete" button inside the options menu
            const deleteButton = button.nextElementSibling.querySelector('.delete-option');
            deleteButton.addEventListener('click', function(event) {
                const row = button.closest('tr'); // Find the parent row of the button
                row.remove(); // Remove the row from the table
                event.stopPropagation(); // Prevent the click event from bubbling
            });
        });

        document.addEventListener('click', function(event) {
            optionsMenus.forEach(menu => {
                if (!menu.contains(event.target)) {
                    menu.style.display = 'none';
                }
            });
        });
    });
    */

    function showPopup() {
        document.getElementById('taskForm').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    function hidePopup() {
        document.getElementById('taskForm').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
        resetForm();
    }

    function showPopup3() {
        document.getElementById('editTaskForm').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }
    function showPopup4() {
        document.getElementById('subtask').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }


    function hidePopup3() {
        document.getElementById('editTaskForm').style.display = 'none';
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

    function hidePopup2() {
        document.getElementById('subtaskForm').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
        resetForm();
    }

    function goGanttchart(){
        window.location.href="gantt_V2.php";
    }

    function showModifyPopup() {
        document.getElementById('modifyForm').style.display = 'block';
        document.getElementById('overlayModify').style.display = 'block';
    }

    function hideModifyPopup() {
        document.getElementById('modifyForm').style.display = 'none';
        document.getElementById('overlayModify').style.display = 'none';
    }

    function showProjectDetailsPopup() {
        document.getElementById('projectDetailsForm').style.display = 'block';
        document.getElementById('overlayProjectDetails').style.display = 'block';
    }

    function hideProjectDetailsPopup() {
        document.getElementById('projectDetailsForm').style.display = 'none';
        document.getElementById('overlayProjectDetails').style.display = 'none';
    }
    function showEdittaskForm() {
        document.getElementById('').style.display = 'block';
    }

    function populateEditForm(row) {
        const cells = row.querySelectorAll('td');
        document.getElementById('editTaskName').value = cells[0].textContent; // Task Name
        document.getElementById('editDueDate').value = cells[1].textContent; // Due Date
        document.getElementById('editAssignee').value = cells[2].textContent; // Assignee
        document.getElementById('editStatus').value = cells[3].textContent; // Status
    }

    // Function to show subtask form
    function showSubtaskForm() {
        document.getElementById('subtaskForm').style.display = 'block';
    }


    // Function to add subtasks
    function addSubtask() {
        const subtaskName = document.getElementById('subtaskName').value;
        const subtaskDueDate = document.getElementById('subtaskDueDate').value;

        // Create a new subtask element
        const subtaskElement = document.createElement('p');
        subtaskElement.textContent = subtaskName + ' - Due Date: ' + subtaskDueDate;

        // Append the subtask to the subtask container
        document.getElementById('subtaskContainer').appendChild(subtaskElement);

        // Clear the subtask form
        document.getElementById('subtaskForm').reset();
        document.getElementById('subtaskForm').style.display = 'none'; // Hide subtask form
    }

    function get_CurrentTask(event){
        this_row = event.target.closest('tr');
        task_id = this_row.getAttribute('value');
        document.cookie ="current_task="+task_id;
        event.preventDefault();
    }
</script>



</body>
</html>