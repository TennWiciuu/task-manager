<?php

require_once "tasks.php";
require_once "../auth/auth.php";

$userId = $_SESSION['user_id'];

if (isset($_POST['taskTitle'])) {

    $title = trim($_POST['taskTitle']);

    if ($title !== '') {
        addTask($conn, $userId, $title);
    }

    header("Location: ../dashboard.php");
    exit();
}

if (isset($_POST['action']) && $_POST['action'] === 'delete') {

    deleteTask($conn, $_POST['task_id']);

    header("Location: ../dashboard.php");
    exit();
}

if (isset($_POST['action']) && $_POST['action'] === 'complete') {

    completeTask($conn, $_POST['task_id']);

    header("Location: ../dashboard.php");
    exit();
}

if (isset($_POST['action']) && $_POST['action'] === 'edit') {

    $_SESSION['edit_task_id'] = $_POST['task_id'];

    header("Location: ../dashboard.php");
    exit();
}

if (isset($_POST['action']) && $_POST['action'] === 'update') {

    $taskId = $_POST['task_id'];
    $newTitle = trim($_POST['new_title']);

    if ($newTitle !== '') {
        updateTaskTitle($conn, $taskId, $newTitle);
    }

    unset($_SESSION['edit_task_id']);

    header("Location: ../dashboard.php");
    exit();
}