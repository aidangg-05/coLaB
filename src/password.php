<!DOCTYPE html>
<?php include 'password_backend.php'; ?>
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
        <label for="oldpw"> Existing Password:</label>
        <input type="password" name="old_pass" value="<?php echo $old_pass?>">
        <span class="error-text">  <?php echo $errOld ?>  &nbsp; </span>

        <label for="newpw">New Password:</label>
        <input type="password" name="new_pass" value="<?php echo $new_pass?>">
        <span class="error-text">  <?php echo $errNew ?>  &nbsp; </span>

        <label for="cfm-newpw">Confirm New Password:</label>
        <input type="password" name="confirm_pass" value="<?php echo $confirm_pass?>">
        <span class="error-text">  <?php echo $errConfirm ?>  &nbsp; </span>

        <div class="buttons">
            <button type="button" id="back" onclick="window.location.href='profile.php'">Back</button>
            <button type="submit" id="submit">Change Password</button>
        </div>
    </form>
</div>

</body>
</html>
