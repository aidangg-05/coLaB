function backtomain(){
    window.location.href="index.php";
}

function addTextInputIfNoError() {
    if (document.getElementById("errmsg").innerText.trim() === "" ) {
        addTextInput();
    }
}
function addTextInput() {
    var container = document.getElementById("add_users_box");
    var input = document.createElement("input");

    // Input box
    input.type = "text";
    input.placeholder = "Enter user's Email";
    input.name = "users"; // Use array notation since you're adding multiple inputs
    input.className = "user_input"
    input.style.fontSize = "16px";
    input.style.padding = "10px";

    // Find the last input box
    var lastInput = container.querySelector(".user_input:last-of-type");

    // Check if previous input box is blank
    if (lastInput && lastInput.value.trim() === "") {
        document.getElementById("errmsg").innerText = "Please fill in the email before adding";
        return;
    }

    // Clear error message if user starts typing
    input.addEventListener('input', function() {
        document.getElementById("errmsg").innerText = "";
    });



    // Append input container to the main container
    container.insertBefore(input, container.querySelector(".material-symbols-outlined"));
}
