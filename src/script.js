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

