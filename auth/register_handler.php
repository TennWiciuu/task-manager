<?php

require_once __DIR__ . "/auth.php";

$host = "localhost";
$user = "root";
$pass = "";
$db = "task_manager";

$conn = new mysqli($host, $user, $pass, $db);

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (strlen($username) < 4 || strlen($username) > 32) {
    header("Location: ../register.php?error=username_length");
    exit();
}

if (strlen($password) < 4 || strlen($password) > 16) {
    header("Location: ../register.php?error=password_length");
    exit();
}

/* min 2 litery + 2 cyfry */
if (!preg_match('/^(?=(.*[A-Za-z]){2,})(?=(.*\d){2,}).+$/', $password)) {
    header("Location: ../register.php?error=password_format");
    exit();
}

$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: ../register.php?error=username_taken");
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    header("Location: ../login.php?success=registered");
    exit();
} else {
    header("Location: ../register.php?error=register_failed");
    exit();
}