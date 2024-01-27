<!DOCTYPE html>
<?php include 'login_validation.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_login.css">
    <title>Login Form</title>
</head>
<body>
<div class="login-container">
        <h1>Login</h1>
        <form method="post">
            <label for="email">Email:</label>
            <input type="email" name="email">
            <span class="error-text">  <?php echo $errEmail ?>  &nbsp; </span>

            <label for="password">Password:</label>
            <input type="password"  name="password">
            <span class="error-text" > <?php echo $errPassword ?>  &nbsp; </span>

            <button type="submit">Login</button>
        </form>
    <p class="signup-text">Don't have an account? <a href="signup.php" class="signup-link">Sign up</a></p>
</div>
</body>
</html>
