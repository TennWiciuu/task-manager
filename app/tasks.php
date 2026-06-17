<?php

require_once __DIR__ . "/../auth/auth.php";
require_once __DIR__ . "/../config/config.php";
requireLogin();

function addTask($conn, $userId, $title)
{
    $title = trim($title);

    if ($title === '') {
        return false;
    }

    $query1 = $conn->prepare("INSERT INTO tasks (user_id, title, status) VALUES (?, ?, 'pending')");

    $query1->bind_param("is", $userId, $title);

    return $query1->execute();
}
function getTasks($conn, $userId, $filter = 'all')
{
    $sql = "SELECT * FROM tasks WHERE user_id = ?";

    if ($filter === 'active') {
        $sql .= " AND status = 'pending'";
    }

    if ($filter === 'completed') {
        $sql .= " AND status = 'completed'";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    return $stmt->get_result();
}
function deleteTask($conn, $taskId)
{
    $query3 = $conn->prepare(" DELETE FROM tasks WHERE id = ?");

    $query3->bind_param("i", $taskId);

    return $query3->execute();
}
function completeTask($conn, $taskId)
{
    $stmt = $conn->prepare("
        UPDATE tasks
        SET status = 'completed'
        WHERE id = ?
    ");

    $stmt->bind_param("i", $taskId);

    return $stmt->execute();
}
function updateTaskTitle($conn, $taskId, $title)
{
    $stmt = $conn->prepare("
        UPDATE tasks
        SET title = ?
        WHERE id = ?
    ");

    $stmt->bind_param("si", $title, $taskId);

    return $stmt->execute();
}