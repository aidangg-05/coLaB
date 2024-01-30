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


    <title>Main Page</title>
</head>
<body>

    <section class="header">
        <span class="title">CoLab</span>
        <span class="icons">
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
            <ul>
                <li>Notification 1</li>
                <li>Notification 2</li>
                <li>Notification 3</li>
                <!-- Add more notifications here -->
            </ul>
        </div>
    </div>


    <span style="font-size: large;font-weight: bold; padding-left: 10px;color: white">Your Projects:</span>


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

            <?php while ($row = mysqli_fetch_assoc($user_projects_result)){  //Display list of project id
                $project_id = $row['project_id'];
                $projects_result = mysqli_query($userbase_db, "SELECT * FROM project_info WHERE project_id = $project_id ");
                $projects_info = mysqli_fetch_assoc($projects_result); //That project information, in array
                $project_name = $projects_info['project_name'];
                $project_end = $projects_info['end_date'];

                $dateObject = new DateTime($project_end);
                $formattedDate = $dateObject->format('d-m-Y');

                $project_status = $projects_info['status'];
                $project_priority = $projects_info['priority'];
                ?>

                <div class="Placeholder" onclick=>
                    <span class="pname"><?php echo $project_name?></span>
                    <span class="enddate"><?php echo $formattedDate?> </span>
                    <span class="status" id="status1"> <?php echo $project_status?> </span>
                    <span class="priority" id="highP"> <?php echo $project_priority?> </span>
                </div>
            <?php }?>

            <div class="Placeholder">
                <span class="pname">Placeholder Project Name</span>
                <span class="enddate">1/2/20</span>
                <span class="status" id="status2">Progress</span>
                <span class="priority" id="medP">Medium Priority</span>

            </div>
            <div class="Placeholder">
                <span class="pname">Placeholder Project Name</span>
                <span class="enddate">1/3/20</span>
                <span class="status" id="status3">Complete</span>
                <span class="priority" id="lowP">Low Priority</span>
            </div>
            <div class="Placeholder">
                <span class="pname">Placeholder Project Name</span>
                <span class="enddate">1/1/20</span>
                <span class="status" id="status3">Complete</span>
                <span class="priority" id="lowP">Low Priority</span>
            </div>
            <div class="Placeholder">
                <span class="pname">Placeholder Project Name</span>
                <span class="enddate">1/12/20</span>
                <span class="status" id="status1">Not started</span>
                <span class="priority" id="lowP">Low Priority</span>
            </div>

        </section>



    </section>


</body>
</html>
