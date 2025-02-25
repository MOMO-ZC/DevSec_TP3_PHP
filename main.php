<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tâches</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Tâches</h1>
        <div class="task-input">
            <input type="text" id="taskInput" placeholder="Ajouter une tâche...">
            <button onclick="addTask()">Ajouter</button>
        </div>
        <div class="task-search">
            <input type="text" id="searchInput" placeholder="Rechercher une tâche..." oninput="searchTasks()">
        </div>
        <ul id="taskList"></ul>
    </div>
    <script src="script.js"></script>
</body>
</html>
