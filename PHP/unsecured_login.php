<?php
$db = new SQLite3(__DIR__ . '/data/database.sqlite');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE password = '$password' AND username = '$username'"; // non sécurisé
    $result = $db->query($query);

    if ($result->fetchArray()) {
        session_start();
        $_SESSION['user'] = $username;
        echo json_encode(["success"=> true, "message" => "Connexion réussie"]);
    } else {
        echo json_encode(["success"=> false, "message" => "Connexion failed"]);
    }
}
?>
