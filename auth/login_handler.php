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
    header("Location: ../login.php?error=empty");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {

    loginUser($user);
    header("Location: ../dashboard.php");
    exit();

} else {

    header("Location: ../login.php?error=invalid");
    exit();
}
