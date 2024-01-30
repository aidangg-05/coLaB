// JavaScript code for handling modal and tasks

function openModal() {
    document.getElementById("addTaskModal").style.display = "block";
}

function closeModal() {
    document.getElementById("addTaskModal").style.display = "none";
}

function addTask() {
    const taskForm = document.getElementById("taskForm");
    const taskName = taskForm.elements["taskName"].value;
    const assignedTo = taskForm.elements["assignedTo"].value;
    const dueDate = taskForm.elements["dueDate"].value;
    const status = taskForm.elements["status"].value;

    if (taskName && dueDate) {
        // Create a task card
        const taskCardContainer = document.getElementById("taskCardsContainer");
        const taskCard = document.createElement("div");
        taskCard.className = "task-card";
        taskCard.innerHTML = `
      <h3>${taskName}</h3>
      <p>Assigned to: ${assignedTo || 'Not assigned'}</p>
      <p>Due Date: ${dueDate}</p>
      <p>Status: ${status}</p>
    `;
        taskCardContainer.appendChild(taskCard);

        // Close the modal
        closeModal();

        // Clear the form
        taskForm.reset();
    } else {
        alert("Please fill in all required fields (Task Name and Due Date).");
    }
}
