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
function goabout(){
    window.location.href="about.php"
}
function addproject(){
    window.location.href="addprojectform.php"
}
function gocontactus(){
    window.location.href="contactus.php"
}
function sorting() {
    let sort = document.getElementById('form-select').value;
    let mainBody = document.querySelector('.scroll-container');
    let projects = mainBody.querySelectorAll('.projectrow');

    let sortedProjects = Array.from(projects);

    if (sort === "end_date") {
        sortedProjects.sort((a, b) => {
            let dateA = new Date(
                a.querySelector('.enddate').textContent.split('-').reverse().join('/')
            );
            let dateB = new Date(
                b.querySelector('.enddate').textContent.split('-').reverse().join('/')
            );
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

//For index.php, set the current project to cookies
function toProjectPage(event){
    this_form = event.target.closest('form');
    project_id = this_form.getAttribute('id');
    document.cookie ="current_project="+project_id;
    event.preventDefault();
    window.location.href='projectpage.php'
}

function deleteProject(projectId) {
    if (confirm("Are you sure you want to delete this project?")) {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Specify the HTTP method and URL destination
        xhr.open("POST", "deleteproject_backend.php", true);

        // Set the request header
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Define what happens on successful data submission
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText); // Display the response message
                // Reload the page or update the project list as needed
            }
        };

        // Send the request with the project_id data
        xhr.send("project_id=" + projectId);
    }
}

