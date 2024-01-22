<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
            <span class="material-symbols-outlined" style="font-size: 35px" onclick="togglePopup()">notifications</span>
            <span class="material-symbols-outlined" style="font-size: 35px" onclick="goprofile()">account_circle</span>
        </span>
    </section>

    <!-- Pop-up content -->
    <div class="popup" id="notificationPopup">
        <!--pop-up content here -->
        <h4>Notifications</h4>
        <button onclick="closePopup()">Close</button>
    </div>



    <nav class="navbar">
        <ul>
            <li><a href="">Projects</a></li>
            <li><a href="charts.html">Gantt charts</a></li>
        </ul>
    </nav>

    <section class="filter" style="margin-right: 20px;">
        <form class="row g-3 justify-content-end">
            <div class="col-auto">
                <select class="form-select" aria-label="Default select example">
                    <option selected disabled>Sort by:</option>
                    <option value="end_date" name="end_date">End Date</option>
                    <option value="status" name="status">Status</option>
                    <option value="priority" name="priority">Priority</option>
                </select>
            </div>
            <div class="col-auto">
                <span class="material-symbols-outlined" style="font-size: 30px">swap_vert</span>
            </div>
            <div class="col-auto">
                <input type="button" class="btn btn-primary" value="Filter" style="padding-right: 10px;padding-left: 10px">
            </div>
            <div class="col-auto">
                <input type="reset" class="btn btn-secondary" value="Reset" style="padding-right: 10px;padding-left: 10px">
            </div>
        </form>
    </section>


    <section class="headings">
        headings
    </section>


</body>
</html>
