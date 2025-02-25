function addTask() {
    let taskInput = document.getElementById("taskInput");
    if (taskInput.value.trim() === "") return;

    fetch("./PHP/add_task.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "task=" + encodeURIComponent(taskInput.value)
    }).then(() => {
        taskInput.value = "";
        loadTasks();
    });
}

function loadTasks() {
    fetch("./PHP/get_tasks.php")
        .then(response => response.json())
        .then(tasks => {
            let taskList = document.getElementById("taskList");
            taskList.innerHTML = "";
            tasks.forEach(task => {
                let li = document.createElement("li");
                li.textContent = task.task;

                let deleteBtn = document.createElement("button");
                deleteBtn.textContent = "Supprimer";
                deleteBtn.classList.add("delete-btn");
                deleteBtn.onclick = function () {
                    fetch("./PHP/delete_task.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: "id=" + task.id
                    }).then(() => loadTasks());
                };

                li.appendChild(deleteBtn);
                taskList.appendChild(li);
            });
        });
}

function searchTasks() {
    let searchInput = document.getElementById("searchInput").value;

    fetch("./PHP/search_tasks.php?query=" + encodeURIComponent(searchInput))
        .then(response => response.json())
        .then(tasks => {
            let taskList = document.getElementById("taskList");
            taskList.innerHTML = "";
            tasks.forEach(task => {
                let li = document.createElement("li");
                li.textContent = task.task;

                let deleteBtn = document.createElement("button");
                deleteBtn.textContent = "Supprimer";
                deleteBtn.classList.add("delete-btn");
                deleteBtn.onclick = function () {
                    fetch("./PHP/delete_task.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: "id=" + task.id
                    }).then(() => loadTasks());
                };

                li.appendChild(deleteBtn);
                taskList.appendChild(li);
            });
        });
}


document.addEventListener("DOMContentLoaded", loadTasks);