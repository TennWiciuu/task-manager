<?php
require_once __DIR__ . "/auth/auth.php";
requireLogin();

require_once __DIR__ . "/config/config.php";

$langCode = $_SESSION['lang'] ?? 'pl';
$lang = require __DIR__ . "/config/lang/$langCode.php";

require_once __DIR__ . "/app/tasks.php";

$tasks = getTasks($conn, $_SESSION['user_id']);
?>
<link rel="stylesheet" href="assets/style.css">
<div class="dashboard">

    <aside class="sidebar">
        <h2><?= $lang["menu"] ?? "Menu" ?></h2>

        <a href="#"><?= $lang["tasks"] ?? "Tasks" ?></a>
        <a href="#"><?= $lang["completed"] ?? "Completed" ?></a>

        <a href="auth/logout.php"><?= $lang["logout"] ?? "Logout" ?></a>
    </aside>

    <main class="content">

        <h1><?= $lang["yourTasks"] ?? "Your Tasks" ?></h1>

        <form action="app/task_handler.php" method="POST">
            <input type="text" name="taskTitle" placeholder="<?= $lang["newTask"] ?? "New task" ?>">
            <button type="submit"><?= $lang["add"] ?? "Add" ?></button>
        </form>

        <div class="tasks">
            <?php while ($task = $tasks->fetch_assoc()): ?>
                <div class="task">

                    <?= htmlspecialchars($task['title']) ?>

                    <form action="app/task_handler.php" method="POST">
                        <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                        <button type="submit" name="action" value="delete">
                            Usuń zadanie
                        </button>
                    </form>

                </div>
            <?php endwhile; ?>
        </div>

    </main>

</div>