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

function getTasks($conn, $userId)
{
    $query2 = $conn->prepare("SELECT * FROM tasks WHERE user_id = ?");

    $query2->bind_param("i", $userId);
    $query2->execute();

    return $query2->get_result();
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