<!DOCTYPE html>
<?php include 'addproject_backend.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="styles_addprojectform.css">
    <script type="text/javascript" src="script_addprojectform.js"></script>
    <!--For icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>

</body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <h1>Add Your Project Here!</h1>
        <section>
            <div class="input_box">
                <span class="input_text">Project Name:</span>
                <input type="text" class="project_name_input" placeholder="Your project name" name="name" value="<?php echo $project_name ?>">
                <span class="error-text"><?php echo $errName ?>  &nbsp; </span>
            </div>

            <div class="input_box">
                <span class="input_text">Start Date:</span>
                <input type="date" class="startdate_input" name="start">
                <span class="error-text"> <?php echo $errStart?> &nbsp; </span>
            </div>

            <div class="input_box">
                <span class="input_text">End Date:</span>
                <input type="date" class="enddate_input" name="end">
                <span class="error-text"> <?php echo $errEnd?> &nbsp; </span>
            </div>

            <div class="input_box">
                <span class="input_text">Project Description:</span>
                <textarea placeholder="Brief project description" class="desc_input" name="desc"><?php echo $project_des ?></textarea>
                <span class="error-text"> <?php echo $errDesc?> &nbsp; </span>
            </div>

            <div class="input_box">
                <span class="input_text">Add Priority:</span>
                <select class="priority_input" content="Choose One" name="priority">
                    <option disabled selected>Choose One</option>
                    <option>High</option>
                    <option selected>Medium</option>
                    <option>Low</option>
                </select>
            </div>

            <div class="input_box" id="add_users_box">
                <span class="input_text">Add Other Users:</span>
                <span id="errmsg" class="error-text"><?php echo $errUsers?></span>
                <span class="material-symbols-outlined" onclick="addTextInput()">add</span>
            </div>

        </section>

        <div class="form_buttons">
            <input type="button" value="Back" class="back" onclick="backtomain()">
            <input type="reset" class="reset">
            <input type="submit" value="Submit" class="submit">
        </div>
    </form>
</html>
