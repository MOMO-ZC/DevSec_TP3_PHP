<?php
$db = new SQLite3(__DIR__ . '/data/database.sqlite');

$username = 'admin';
$password = '123'; 
$hashed_password = password_hash($password, PASSWORD_BCRYPT); // sécurisé

$stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
$stmt->bindValue(':username', $username, SQLITE3_TEXT);
$stmt->bindValue(':password', $hashed_password, SQLITE3_TEXT);
$stmt->execute();

echo "Utilisateur ajouté avec succès.";
?>
