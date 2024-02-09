<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="helpme.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
<div class ="navbar">
    <ul>
        <div class="navlinks">
            <li><a href="contactus.html">Contact Us</a></li>
            <li><p class="dot">•</p></li>
            <li><a href="locations.html">Locations</a></li>
            <li><p class="dot">•</p></li>
            <li><a href="index.html">Home</a></li>
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
<script src="helpme.js"></script>
</body>
</html>