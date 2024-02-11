<!DOCTYPE html>
<?php include 'subtask_backend.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_projectpage.css">
    <title>Project Management</title>
    <!--For icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
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
<body>
<nav class="navbar">

    <ul>
        <li><span class="material-symbols-outlined" onclick="window.location.href='projectpage.php'" style="font-size: 20px">arrow_back</span></li>
        <li style="background-color: white;color: black">Sub-tasks</li>
    </ul>
</nav>
<div>
        <table>
            <thead>
            <tr>
                <th>SubTask Name</th>
                <th>Due Date</th>
                <th>Assignee</th>
                <th></th>
            </tr>
            </thead>
            <form method="post">
                <tbody>
                <?php
                while ($subtask_info = mysqli_fetch_assoc($subtask_results)) {
                    $subtask_id = $subtask_info['subtask_id'];
                    $subtask_name =  $subtask_info['subtask_name'];
                    $subtask_end =  $subtask_info['due_date'];

                    $dateObject3 = new DateTime($subtask_end);
                    $formatted_Start = $dateObject3->format('d-m-Y');

                    $subtask_assignee =  $subtask_info['assignee'];
                    $assignee_name = getName($userbase_db,$subtask_assignee)
                    ?>
                    <tr>
                        <td><?php echo $subtask_name?></td>
                        <td><?php echo $formatted_Start ?></td>
                        <td><?php echo $assignee_name?></td>
                        <td>
                            <button type="submit" name="delete_subtask" value="<?php echo $subtask_id?>"> Delete </button>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </form>
        </table>
</div>
