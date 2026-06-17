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

    <script src="assets/script.js" defer></script>

    <div class="auth-container">
        <div class="auth-top">
            <h1 class="auth-title"><?= $lang["register"] ?></h1>
            <div class="auth-sub">Załóż konto i zacznij pracować nad zadaniami</div>
        </div>

        <form action="auth/register_handler.php" method="POST" class="auth-form">
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

            <button type="submit" id="register-btn" class="btn btn-primary">
                <?= $lang["createAccount"] ?? "Create account" ?>
            </button>
        </form>

        <div class="auth-footer">
            <span>Masz już konto?</span>
            <a class="auth-link" href="login.php">Zaloguj się</a>
        </div>
    </div>

</body>

</html>
