<!DOCTYPE html>
<?php include 'index_backend.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="helpme.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</head>
<body>
<div class="nav-container">
    <div>
        <img id="doodle" src="img/girl.gif"/>
    </div>
    <div>
        <b id="name">CoLab</b>
    </div>
    <div class="navlinks" id="navlinks">
        <a href="#" onclick="goabout()">About</a>
        <p class="dot">•</p>
        <a href="#" onclick="gocontactus()">Contact Us</a>
        <p class="dot">•</p>
        <a href="#" onclick="goprofile()">Profile</a>
        <p class="dot">•</p>
        <a href="#" onclick="togglePopup()">Notifications</a>
    </div>
    <button id="button" class="hamburger" ><img src="images/burger.png"/></button>
</div>


<div class="overlay" id="overlay"></div>
<div class="popup" id="notificationPopup">
    <div class="popup-header">
        <span>Notifications</span>
        <span class="material-symbols-outlined close-icon" onclick="closePopup()">x</span>
    </div>
    <div class="popup-content">
        <!--pop-up content here -->
        <ul id="notificationList">
            <!-- Add more notifications here -->
        </ul>
    </div>
</div>

<div class="filter-container">
            <div class="col-auto" style="order: 2">
                <select class="form-select" id="form-select" aria-label="Default select example">
                    <option selected disabled>Sort by:</option>
                    <option value="end_date" name="end_date" id="end_date">End Date</option>
                    <option value="priority" name="priority" id="priority">Priority</option>
                </select>
            </div>
            <div class="col-auto" style="order: 3">
                <input type="button" class="btn btn-primary" value="Filter" style="padding-right: 10px;padding-left: 10px;" onclick="sorting()">
            </div>
            <div class="col-auto" style="order: 4">
                <input type="reset" class="btn btn-secondary" value="Reset" style="padding-right: 10px;padding-left: 10px">
            </div>
    <div style="order: 1">
        <button type="button" onclick="addproject()" class="addprojectbtn">
            <span class="material-symbols-outlined" id="addbtn">+ Project</span>
        </button>
    </div>
</div>
<div class="scroll-container">
    <div class="headersProjectrow">
        <span >Project Name</span>
        <span>End Date</span>
        <span>Priority</span>
    </div>
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
</div>
<script src="helpme.js"></script>
</body>
</html>
