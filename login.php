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

<head>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="auth-container">

        <h1><?= $lang["login"] ?></h1>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid'): ?>
            <p style="color:red;">
                Logowanie się nie powiodło, sprawdź nazwę użytkownika lub hasło
            </p>
        <?php endif; ?>

        <form action="auth/login_handler.php" method="POST">
            <input type="text" name="username" placeholder="<?= $lang["username"] ?? "Username" ?>">
            <input type="password" name="password" placeholder="<?= $lang["password"] ?? "Password" ?>">
            <button type="submit"><?= $lang["login"] ?></button>
        </form>

    </div>

</body>

</html>