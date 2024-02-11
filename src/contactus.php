<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles_contactus.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=s  wap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src="script_contactus.js"></script>
<div class="form">
    <form action="https://usebasin.com/f/63b3ada2e844" method="POST">


        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">

        <label for="student">Rate your experience on our platform</label>
        <select id="student" name="student">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

        <input type="button" value="back" onclick="window.location.href='helpme.php'">
        <input type="submit" value="Submit">
    </form>
</div>




</body>
</html>