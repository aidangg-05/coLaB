<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_profile.css">
    <title>Profile</title>
</head>
<body>
    <div class="profile-container">
        <div class="top">
            <img src="noimg.jpg" alt="Profile Image">
            <text class="name">Insert Name</text>
            <button type="button" id="logout">Log Out</button>
        </div>
        <p>
            <span class="textA">Account</span>
            <br />
            <span class="textB">Update your personal information</span>
        </p>
        <form action="#" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Insert Existing Username Value">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Insert Existing Email Value">

            <a class="chg-password" href="password.php">Change Password</a>

            <div class="buttons">
                <button type="button" id="back" onclick="window.location.href='https://www.youtube.com/watch?v=TTG8o4gnqVw'">Back</button>
                <button type="reset" id="reset">Discard</button>
                <button type="submit" id="submit">Update Info</button>
            </div>
        </form>
    </div>
</body>
</html>
