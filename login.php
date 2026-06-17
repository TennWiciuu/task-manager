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
            <div class="auth-sub"><?= $lang["loginSubtitle"] ?? "Create account" ?></div>
        </div>

        <?php
        $errorCode = $_GET['error'] ?? null;
        $errorKey = null;

        if ($errorCode === 'invalid') {
            $errorKey = $lang['errorInvalid'];
        } elseif ($errorCode === 'empty') {
            $errorKey = $lang['errorEmpty'];
        }
        if ($errorKey && isset($lang[$errorKey])): ?>
            <div class="auth-error"><?= htmlspecialchars($lang[$errorKey]) ?></div>
        <?php endif; ?>


        <form action="auth/login_handler.php" method="POST" class="auth-form">
            <input type="text" name="username" placeholder="<?= $lang["username"] ?? "Username" ?>">
            <input type="password" name="password" placeholder="<?= $lang["password"] ?? "Password" ?>">
            <button type="submit" class="btn btn-primary"><?= $lang["ctaLogin"] ?? $lang["login"] ?></button>

        </form>

        <div class="auth-footer">
            <span><?= $lang["loginFooterPrompt"] ?? "Have account already?" ?></span>
            <a class="auth-link" href="register.php"><?= $lang["createAccountTip"] ?? "Create account" ?></a>
        </div>
    </div>

</body>

</html>
