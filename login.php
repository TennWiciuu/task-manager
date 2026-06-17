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

<body class="auth-bg">

    <div class="auth-container">
        <div class="auth-top">
            <div class="auth-brand">&nbsp;</div>
            <h1 class="auth-title"><?= $lang["login"] ?></h1>
            <div class="auth-sub">Zaloguj się, aby zarządzać zadaniami</div>
        </div>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid'): ?>
            <div class="auth-error">Logowanie się nie powiodło, sprawdź nazwę użytkownika lub hasło</div>
        <?php endif; ?>

        <form action="auth/login_handler.php" method="POST" class="auth-form">
            <input type="text" name="username" placeholder="<?= $lang["username"] ?? "Username" ?>">
            <input type="password" name="password" placeholder="<?= $lang["password"] ?? "Password" ?>">
            <button type="submit" class="btn btn-primary"><?= $lang["login"] ?></button>
        </form>

        <div class="auth-footer">
            <span>Nie masz konta?</span>
            <a class="auth-link" href="register.php">Utwórz konto</a>
        </div>
    </div>

</body>

</html>
