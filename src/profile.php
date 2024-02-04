<!DOCTYPE html>
<?php include 'profile_backend.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_profile.css">
    <title>Profile</title>
    <script src="script.js" type="text/javascript"></script>
</head>
<body>
    <div class="profile-container">
        <div class="top">
            <img src="noimg.jpg" alt="Profile Image">
            <text class="name"> <?php echo $name ?> </text>
            <button type="button" id="logout" onclick="window.location.href='login.php'">Log out</button>
        </div>

        <p>
            <span class="textA">Account</span>
            <br />
            <span class="textB">Update your personal information</span>
        </p>

        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name ?>">
            <span class="error-text">  <?php echo $errName ?>  &nbsp; </span>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email ?>">
            <span class="error-text">  <?php echo $errEmail ?>  &nbsp; </span>

            <a class="chg-password" href="password.php">Change Password</a>

            <div class="buttons">
                <button type="button" id="back" onclick="window.location.href='index.php'">Back</button>
                <button type="reset" id="reset">Discard</button>
                <button type="submit" id="submit">Update Info</button>
            </div>
        </form>
    </div>
</body>
</html>
