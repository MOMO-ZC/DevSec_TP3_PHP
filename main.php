<?php
session_start();
//session_regenerate_id(true); // sécurisé
if (!isset($_SESSION['user'])) {
    header("Location: login_page.php");
    exit;
}

$db = new SQLite3('PHP/data/database.sqlite');

$result = $db->query("SELECT * FROM tasks");
$tasks = [];

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $tasks[] = $row;
}


foreach ($tasks as &$task) {
    echo $task['task']; //non sécurisé
    //echo htmlspecialchars($task['task'], ENT_QUOTES, 'UTF-8'); // sécurisé
}
?>

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
        <p>Bienvenue, <?php echo htmlspecialchars($_SESSION['user']); ?> !</p>
        <a href="PHP/logout.php">Déconnexion</a>
        
        <div class="task-input">
            <input type="text" id="taskInput" placeholder="Ajouter une tâche...">
            <button onclick="ajouterTache()">Ajouter</button>
        </div>
        <div class="task-search">
            <input type="text" id="searchInput" placeholder="Rechercher une tâche..." oninput="rechercherTaches()">
        </div>
        <ul id="taskList"></ul>
    </div>
    <script src="script.js"></script>
</body>
</html>
