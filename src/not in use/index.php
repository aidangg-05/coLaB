<!DOCTYPE html>
<?php include 'index_backend.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_mainpage.css">
    <script type="text/javascript " src="script.js"></script>

    <!--For icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!--Bookstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js" type="text/javascript"></script>
    <title>Main Page</title>

</head>
<body>

<section class="header">
    <span class="title">CoLab</span>
    <span class="icons">
            <span class="material-symbols-outlined" style="font-size: 35px" onclick="gocontactus()">feedback</span>
            <span class="material-symbols-outlined" style="font-size: 35px" onclick="goabout()">help</span>
            <span class="material-symbols-outlined" style="font-size: 35px" onclick="togglePopup()" >notifications</span>
            <span class="material-symbols-outlined" style="font-size: 35px" onclick="goprofile()">account_circle</span>
        </span>
</section>

<!-- Pop-up content -->
<div class="overlay" id="overlay"></div>
<div class="popup" id="notificationPopup">
    <div class="popup-header">
        <span>Notifications</span>
        <span class="material-symbols-outlined close-icon" onclick="closePopup()">close</span>
    </div>
    <div class="popup-content">
        <!--pop-up content here -->
        <ul id="notificationList">
            <!-- Add more notifications here -->
        </ul>
    </div>
</div>


<span style="font-size: large;font-weight: bold; padding-left: 10px;color: blackx">Your Projects:</span>


<section class="filter" style="margin-right: 20px;">
    <form class="row g-3 justify-content-end">
        <div class="col-auto">
            <select class="form-select" id="form-select" aria-label="Default select example">
                <option selected disabled>Sort by:</option>
                <option value="end_date" name="end_date" id="end_date">End Date</option>
                <option value="status" name="status" id="status">Status</option>
                <option value="priority" name="priority" id="priority">Priority</option>
            </select>
        </div>
        <div class="col-auto">
            <input type="button" class="btn btn-primary" value="Filter" style="padding-right: 10px;padding-left: 10px;" onclick="sorting()">
        </div>
        <div class="col-auto">
            <input type="reset" class="btn btn-secondary" value="Reset" style="padding-right: 10px;padding-left: 10px">
        </div>
    </form>
</section>


<section class="headings">
    <span class="titlepname" style="border-right:2px solid rgba(0,0,0,0.2);">Project Name</span>
    <span class="others" style="border-right:2px solid rgba(0, 0, 0, 0.2);">End Date</span>
    <span class="others" style="border-right:2px solid rgba(0, 0, 0, 0.2);">Status</span>
    <span class="others">Priority</span>
</section>

<section class="mainbody">
    <button type="button" onclick="addproject()" class="addprojectbtn">
        <span class="material-symbols-outlined" id="addbtn">add</span>
        <span>Add Project </span>
    </button>

    <section class="scroll-container">
        <?php
        while ($projectid_result = mysqli_fetch_assoc($pull_projectid)) {
            foreach ($projectid_result as $project_id) {
                $pull_each_project = mysqli_query($userbase_db, "SELECT * FROM project_info WHERE project_id = '$project_id'");
                if ($pull_each_project && mysqli_num_rows($pull_each_project) > 0) {
                    $each_project = mysqli_fetch_assoc($pull_each_project);
                    $project_name = $each_project['project_name'];
                    $project_end = $each_project['end_date'];
                    $project_priority = $each_project['priority'];


                    //For CSS part
                    $project_status = $each_project['status'];
                    if ($project_status === "Not started") {
                        $project_status_id = "Not_started";
                    } else {
                        $project_status_id = $project_status;
                    }

                    // Format date
                    $dateObject = new DateTime($project_end);
                    $formattedDate = $dateObject->format('d-m-Y');

                    // Calculate days remaining
                    $now = new DateTime();
                    $interval = $now->diff($dateObject);
                    $daysRemaining = $interval->format('%r%a');

                    // Set notification text and class
                    $notificationClass = "";

                    if ($daysRemaining > 3) {
                        // No notification for projects with more than 3 days remaining
                        $notificationText = "";
                    } elseif ($daysRemaining > 0) {
                        $notificationText = "Project $project_name due in $daysRemaining day(s)";
                    } elseif ($daysRemaining > -1) {
                        $notificationText = "Project $project_name due today";
                        $notificationClass = 'orange-notification';
                    } else {
                        $notificationText = "Project $project_name is overdue!";
                        $notificationClass = 'red-notification';
                    }

                    // Output project details and notification
                    echo "<form onclick='toProjectPage(event)' id='$project_id'>";
                    echo "<div class='projectrow'>";
                    echo "<span class='pname'>$project_name</span>";
                    echo "<span class='enddate'>$formattedDate</span>";
                    echo "<span class='status' id='$project_status_id'>$project_status</span>";
                    echo "<span class='priority' id='$project_priority'>$project_priority Priority</span>";
                    echo "</div></form>";

                    if ($notificationText !== "") {
                        echo "<script>
                            document.addEventListener('DOMContentLoaded', function () {
                                addNotification('$notificationText', '$notificationClass');
                            });
                        </script>";
                    }
                }
            }
        }
        ?>
    </section>
</section>

<script>
    function addNotification(text, className) {
        const notificationList = document.getElementById('notificationList');
        const notificationItem = document.createElement('li');
        notificationItem.textContent = text;
        notificationItem.className = className;
        notificationList.appendChild(notificationItem);
    }
</script>
</body>
</html>
