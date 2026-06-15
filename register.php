<?php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$langCode = $_SESSION['lang'] ?? 'pl';
$lang = require "config/lang/$langCode.php";
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="auth-container">

        <h1><?= $lang["register"] ?></h1>

        <form action="auth/register_handler.php" method="POST">
            <input type="text" name="username" placeholder="<?= $lang["username"] ?? "Username" ?>">
            <input type="password" name="password" placeholder="<?= $lang["password"] ?? "Password" ?>">
            <button type="submit"><?= $lang["createAccount"] ?? "Create account" ?></button>
        </form>

    </div>

</body>

</html>