<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_password.css">
    <title>Password</title>
</head>
<body>

<div class="pw-container">
    <h1>Change Password</h1>
    <form action="#" method="post">
        <label for="oldpw">Password:</label>
        <input type="password" name="password" required>

        <label for="newpw">New Password:</label>
        <input type="password" name="password" required>

        <label for="cfm-newpw">Confirm New Password:</label>
        <input type="password" name="password" required>

        <div class="buttons">
            <button type="button" id="back" onclick="window.location.href='https://www.youtube.com/watch?v=TTG8o4gnqVw'">Back</button>
            <button type="submit" id="submit">Change Password</button>
        </div>
    </form>
</div>

</body>
</html>
