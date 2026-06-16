<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function loginUser($user)
{
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
}

function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

function requireLogin()
{
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}

function logout()
{
    session_destroy();
}
