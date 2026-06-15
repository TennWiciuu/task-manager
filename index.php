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
    <header class="header">
        <div class="logo"><?= $lang["appName"] ?></div>

        <nav class="nav">
            <a href="?lang=pl">PL</a>
            <a href="?lang=en">EN</a>
            <a href="login.php"><?php echo $lang["login"] ?></a>
            <a href="register.php"><?php echo $lang["register"] ?></a>
        </nav>
    </header>

    <main class="hero">

        <section class="hero-left">
            <h1><?php echo $lang["title"] ?></h1>
            <p><?php echo $lang["desc"] ?></p>
        </section>

        <section class="hero-right">
            <div class="card">
                <h2><?php echo $lang["taskManager"] ?? "Task Manager" ?></h2>
                <p><?php echo $lang["simpleSaaS"] ?? "Simple SaaS App" ?></p>
            </div>
        </section>

    </main>

</body>

</html>