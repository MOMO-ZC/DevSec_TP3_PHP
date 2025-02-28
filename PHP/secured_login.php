<?php
session_start();
$db = new SQLite3(__DIR__ . '/data/database.sqlite');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $db->prepare("SELECT id, password FROM users WHERE username = :username");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        session_regenerate_id(true);
        $_SESSION['user'] = $username;

        echo json_encode(["success"=> true, "message" => "Connexion réussie"]);
    } else {
        echo json_encode(["success"=> false, "message" => "Connexion failed"]);
    }
}
?>
