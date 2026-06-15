<?php
require_once "lang.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<div class="dashboard">

    <aside class="sidebar">
        <h2><?= $lang["menu"] ?? "Menu" ?></h2>
        <a href="#"><?= $lang["tasks"] ?? "Tasks" ?></a>
        <a href="#"><?= $lang["completed"] ?? "Completed" ?></a>
        <a href="auth/logout.php"><?= $lang["logout"] ?? "Logout" ?></a>
    </aside>

    <main class="content">

        <h1><?= $lang["yourTasks"] ?? "Your Tasks" ?></h1>
        
        <form>
            <input type="text" placeholder="<?= $lang["newTask"] ?? "New task" ?>">
            <button><?= $lang["add"] ?? "Add" ?></button>
        </form>

        <div class="tasks">
            <div class="task"><?= $lang["exampleTask"] ?? "Example task" ?></div>
        </div>

    </main>

</div>

</body>
</html>
