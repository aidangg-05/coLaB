function backtomain(){
    window.location.href="index.php";
}


function addTextInput() {
    var container = document.getElementById("add_users_box");
    var inputWrapper = document.createElement("div"); // Create a wrapper for input and delete button
    // Input box
    var input = document.createElement("input");
    input.type = "text";
    input.placeholder = "Enter user's Email";
    input.name = "users";
    input.className = "user_input";
    input.style.fontSize = "16px";
    input.style.padding = "10px";

    // Find the last input box
    // Check if previous input boxes are blank
    var inputs = container.querySelectorAll(".user_input");
    var lastInput = inputs[inputs.length - 1];

    if (lastInput && lastInput.value.trim() === "") {
        document.getElementById("errmsg").innerText = "Please fill in the email before adding";
        return;
    }

    // Clear error message if user starts typing
    input.addEventListener('input', function() {
        document.getElementById("errmsg").innerText = "";
    });

    // Create delete button
    var deleteButton = document.createElement("span");
    deleteButton.innerText = "delete";
    deleteButton.className = "delete-button";
    deleteButton.style.borderRadius ="5px";
    deleteButton.style.fontWeight ="bold";
    deleteButton.addEventListener('click', function() {
        container.removeChild(inputWrapper); // Remove the entire input wrapper
    });

    // Append input and delete button to the wrapper
    inputWrapper.style.marginBottom ="5px";
    inputWrapper.appendChild(input);
    inputWrapper.appendChild(deleteButton);

    // Append input container to the main container
    container.insertBefore(inputWrapper, container.querySelector(".material-symbols-outlined"));
}

