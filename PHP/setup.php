<?php
if (!file_exists('data')) {
    mkdir('data', 0777, true);
}

$db = new SQLite3(__DIR__ . '/data/database.sqlite');

$query = "DROP TABLE IF EXISTS tasks";  
$db->exec($query);

$query = "CREATE TABLE IF NOT EXISTS tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    task TEXT NOT NULL
)";
$db->exec($query);

$query = "DROP TABLE IF EXISTS users";
$db->exec($query);

$query = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL
)";
$db->exec($query);

echo "Base de données et table créées avec succès.";
?>