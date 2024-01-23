<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_signup.css">
    <title>Sign Up</title>

    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            if (name === "" || email === "" || password === "") {
                alert("Please fill in all the information.");
                return false;
            }
        }
    </script>
</head>
<body>

<div class="signup-container">
    <h1>Sign Up</h1>
    <form method="post" onsubmit="return validateForm()">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="submit">Sign Up</button>
    </form>

    <p class="login-text">Already have an account? <a href="login.php" class="login-link">Log in</a></p>
</div>

</body>
</html>
