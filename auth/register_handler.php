<?php

require_once __DIR__ . "/auth.php";

$host = "localhost";
$user = "root";
$pass = "";
$db = "task_manager";

$conn = new mysqli($host, $user, $pass, $db);

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!$username || !$password) {
    header("Location: ../register.php");
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query1 = $conn->prepare("
    INSERT INTO users (username, password)
    VALUES (?, ?)
");

$query1->bind_param("ss", $username, $hashedPassword);
if ($query1->execute()) {

    header("Location: ../login.php");
    exit();
} else {

    echo "Błąd podczas rejestracji";
    exit();
}
