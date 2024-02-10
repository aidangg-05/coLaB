<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="helpme.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
<div class ="navbar">
    <ul>
        <div class="navlinks">
            <li><a href="#" onclick="goabout() " >About</a></li>
            <li><p class="dot">•</p></li>
            <li><a href="#" onclick="gocontactus() " >Contact Us</a></li>
            <li><p class="dot">•</p></li>
            <li><a href="#" onclick="goprofile()" >Profile</a></li>
            <li><p class="dot">•</p></li>
            <li><a href="#" onclick="togglePopup()" >Notifications</a></li>
        </div>
        <li>
            <button id="button"><img class="hamburger" src="images/burger.png"/></button>
        </li>

        <li id ="name"><b>CoLab</b></li>
        <li style="float:left">
            <img id="ramen" src="images/BSmH.gif"/>
        </li>
    </ul>
</div>
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


<script src="helpme.js"></script>
</body>
</html>