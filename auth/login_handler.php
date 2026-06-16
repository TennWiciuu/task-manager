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
    header("Location: ../login.php");
    exit();
}

$query1 = $conn->prepare("
    SELECT * FROM users WHERE username = ?
");

$query1->bind_param("s", $username);
$query1->execute();

$result = $query1->get_result();
$user = $result->fetch_assoc();
//$user['password'] = users.password z bazy danych
if ($user && password_verify($password, $user['password'])) {
    loginUser($user);
    header("Location: ../dashboard.php");
    exit();
} else {
    header("Location: ../login.php");
    exit();
}
