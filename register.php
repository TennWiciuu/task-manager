<?php

require_once __DIR__ . "/auth/auth.php";

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$langCode = $_SESSION['lang'] ?? 'pl';
$lang = require __DIR__ . "/config/lang/$langCode.php";
?>

<!DOCTYPE html>
<html>
<script src="assets/script.js" defer></script>

<head>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="auth-container">

    <h1><?= $lang["register"] ?></h1>

    <form action="auth/register_handler.php" method="POST">

        <input type="text"
               name="username"
               id="username"
               placeholder="<?= $lang["username"] ?? "Username" ?>">

        <p id="username-status"></p>

        <input type="password"
               name="password"
               id="password"
               placeholder="<?= $lang["password"] ?? "Password" ?>">

        <p id="password-status"></p>

        <button type="submit" id="register-btn">
            <?= $lang["createAccount"] ?? "Create account" ?>
        </button>

    </form>

</div>

</body>

</html>