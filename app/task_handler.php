<?php

require_once "tasks.php";

$userId = $_SESSION['user_id'];

if (isset($_POST['taskTitle'])) {

    $title = trim($_POST['taskTitle']);

    if ($title === '') {
        header("Location: ../dashboard.php");
        exit();
    }

    addTask($conn, $userId, $title);

    header("Location: ../dashboard.php");
    exit();
}

if (isset($_POST['action']) && $_POST['action'] === 'delete') {

    deleteTask($conn, $_POST['task_id']);

    header("Location: ../dashboard.php");
    exit();
}