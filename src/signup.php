<!DOCTYPE html>
<?php include 'signup_validation.php' ;?>
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
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required
               value="<?php echo $username; ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required
               value="<?php echo $email; ?>">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required
               value="<?php echo $password; ?>">

        <button type="submit" name="submit">Sign Up</button>
    </form>

    <p class="login-text">Already have an account? <a href="login.php" class="login-link">Log in</a></p>
</div>

</body>
</html>
