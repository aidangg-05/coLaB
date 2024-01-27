function togglePopup() {
    const popup = document.getElementById('notificationPopup');
    const overlay = document.getElementById('overlay');

    if (popup.style.display === 'block') {
        popup.style.display = 'none';
        overlay.style.display = 'none';
    } else {
        popup.style.display = 'block';
        overlay.style.display = 'block';
    }
}

function closePopup() {
    const popup = document.getElementById('notificationPopup');
    const overlay = document.getElementById('overlay');

    popup.style.display = 'none';
    overlay.style.display = 'none';
}
function goprofile(){
    window.location.href="profile.php";
}
function addproject(){
    window.location.href="addprojectform.php"
}
function sorting() {
    let sort = document.getElementById('form-select').value;
    let mainBody = document.querySelector('.mainbody');
    let projects = mainBody.querySelectorAll('.Placeholder');

    let sortedProjects = Array.from(projects);

    if (sort === "end_date") {
        sortedProjects.sort((a, b) => {
            let dateA = new Date(a.querySelector('.enddate').textContent);
            let dateB = new Date(b.querySelector('.enddate').textContent);
            return dateA - dateB;
        });
    } else if (sort === "status") {
        sortedProjects.sort((a, b) => {
            let statusA = getStatusOrder(a.querySelector('.status').textContent);
            let statusB = getStatusOrder(b.querySelector('.status').textContent);
            return statusA - statusB; // Compare statuses for sorting
        });
    } else if (sort === "priority") {
        sortedProjects.sort((a, b) => {
            let priorityA = getPriorityOrder(a.querySelector('.priority').textContent);
            let priorityB = getPriorityOrder(b.querySelector('.priority').textContent);
            return priorityA - priorityB;
        });
    }
    // Append sorted projects
    sortedProjects.forEach(project => {
        mainBody.appendChild(project);
    });
}

function validate_signup(){
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    var name = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();
    document.getElementById('errEmail').innerHTML =  "&nbsp;"
    document.getElementById('errName').innerHTML = "&nbsp;"
    document.getElementById('errPassword').innerHTML = "&nbsp;"

    if (email === ""){
        document.getElementById('errEmail').innerHTML = "<sup>*</sup>Email required"
    }

    else if (!regex.test(email)) {
        document.getElementById('errEmail').innerHTML = "<sup>*</sup>Invalid Email"
    }

    else if (name === ""){
        document.getElementById('errName').innerHTML = "<sup>*</sup>Full Name required"
    }

    else if (password === ""){
        document.getElementById('errPassword').innerHTML = "<sup>*</sup>Password required"
    }

    else {
        document.getElementById('formID').submit()
    }
}

function validate_login() {
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();
    document.getElementById('errEmail').innerHTML =  "&nbsp;"
    document.getElementById('errPassword').innerHTML = "&nbsp;"

    if (email === ""){
        document.getElementById('errEmail').innerHTML = "<span> <sup>*</sup>Email required</span>"
        return false
    }

    else if (!regex.test(email)) {
        document.getElementById('errEmail').innerHTML = "<sup>*</sup>Invalid Email"
    }

    else if (password === ""){
        document.getElementById('errPassword').innerHTML = "<sup>*</sup>Password required"
    }

    else {
        document.getElementById('formID').submit()
    }
}
// Helper function to determine order of statuses
function getStatusOrder(status) {
    switch (status.toLowerCase()) {
        case "not started":
            return 1;
        case "progress":
            return 2;
        case "complete":
            return 3;
        default:
            return 0;
    }
}

// Helper function to determine order of priorities
function getPriorityOrder(priority) {
    switch (priority.toLowerCase()) {
        case "high priority":
            return 1;
        case "medium priority":
            return 2;
        case "low priority":
            return 3;
        default:
            return 0;
    }
}

