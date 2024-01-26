<!DOCTYPE html>
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
    <form>
        <h1>Add Your Project Here!</h1>
        <div class="input_box">
            <span class="input_text">Project Name:</span>
            <input type="text" class="project_name_input" placeholder="Your project name">
        </div>
        <div class="input_box">
            <span class="input_text">Start Date:</span>
            <input type="datetime-local" class="startdate_input">
        </div>

        <div class="input_box">
            <span class="input_text">End Date:</span>
            <input type="datetime-local" class="enddate_input">
        </div>

        <div class="input_box">
            <span class="input_text">Project Description:</span>
            <textarea placeholder="Input your project description here" class="desc_input"></textarea>
        </div>

        <div class="input_box">
            <span class="input_text">Add Other Users:</span>
            <button class="add_user_button">
                <span class="material-symbols-outlined">group_add</span>
            </button>
        </div>

        <div class="form_buttons">
            <input type="button" value="Back" class="back" onclick="backtomain()">
            <input type="reset" class="reset">
            <input type="button" value="Submit" class="submit">
        </div>
    </form>
</html>