<!DOCTYPE html>
<?php include 'subtask_backend.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_projectpage.css">
    <title>Project Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <!--For icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
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

    table {
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

    .dot {
        padding: 0 5px;
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
</style>
<body>
<div class="nav-container">
    <div>
        <a href='projectpage.php'><img id="doodle" src="img/back.png" style="width: 25px"/></a>
    </div>
    <div>
        <b id="name">CoLab</b>
    </div>
    <div class="navlinks" id="navlinks">
        <a href="helpme.php"><img src="img/home.png" style="width: 25px"/></a>
    </div>
    <button id="button" class="hamburger" ><img src="img/burger.png"/></button>
</div>
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
