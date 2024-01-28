<!DOCTYPE html>
<?php include 'signup_validation.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_signup.css">
    <title>Sign Up</title>
</head>
<body>

<div class="signup-container">
    <h1>Sign Up</h1>
    <form method="post">
        <label for="email">Email:</label>
        <input type="text" name="email">
        <span class="error-text"> <?php echo $errEmail ?> &nbsp; </span>


        <label for="name">Full Name:</label>
        <input type="text" name="name">
        <span class="error-text">  <?php echo $errName ?> &nbsp; </span>

        <label for="password">Password:</label>
        <input type="password" name="password">
        <span class="error-text"> <?php echo $errPassword ?> &nbsp; </span>

        <button type="submit" >Sign Up</button>

    </form>

    <p class="login-text">Already have an account? <a href="login.php" class="login-link">Log in</a></p>
</div>

</body>
</html>
