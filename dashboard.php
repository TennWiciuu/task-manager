<?php
require_once __DIR__ . "/auth/auth.php";
requireLogin();

require_once __DIR__ . "/config/config.php";

$langCode = $_SESSION['lang'] ?? 'pl';
$lang = require __DIR__ . "/config/lang/$langCode.php";

require_once __DIR__ . "/app/tasks.php";

$filter = $_GET['filter'] ?? 'all';
$tasks = getTasks($conn, $_SESSION['user_id'], $filter);
?>
<link rel="stylesheet" href="assets/style.css">
<script src="assets/script.js" defer></script>

<div class="app-shell">
    <header class="app-header">
        <div class="app-header-left">
            <div class="app-logo">Task Manager</div>
            <div class="app-badge">Twoje zadania w jednym miejscu</div>
        </div>

        <div class="app-header-right">
            <a class="btn btn-ghost" href="auth/logout.php">Logout</a>
        </div>
    </header>

    <div class="app-body">
        <aside class="sidebar">
            <h2 class="sidebar-title"><?= $lang["menu"] ?? "Menu" ?></h2>
            <div class="sidebar-links">
                <a class="sidebar-link" href="auth/logout.php">Wyloguj</a>
            </div>
        </aside>

        <main class="content">
            <div class="page-title">
                <h1><?= $lang["yourTasks"] ?? "Your Tasks" ?></h1>
                <div class="page-sub">Dodawaj, edytuj i zamykaj zadania</div>
            </div>

            <section class="panel">
                <div class="panel-title">Dodaj zadanie</div>
                <form action="app/task_handler.php" method="POST" class="panel-form">
                    <input class="input" type="text" name="taskTitle" placeholder="<?= $lang["newTask"] ?? "New task" ?>">
                    <button class="btn btn-primary" type="submit"><?= $lang["add"] ?? "Add" ?></button>
                </form>

                <?php if (isset($_SESSION['edit_task_id'])): ?>
                    <div class="panel-divider"></div>
                    <div class="panel-title">Edytuj tytuł</div>
                    <form action="app/task_handler.php" method="POST" class="panel-form">
                        <input type="hidden" name="task_id" value="<?= $_SESSION['edit_task_id'] ?>">
                        <input class="input" type="text" name="new_title" placeholder="Nowy tytuł">
                        <button class="btn btn-primary" type="submit" name="action" value="update">Zapisz</button>
                    </form>
                <?php endif; ?>
            </section>

            <section class="panel">
                <div class="panel-title">Filtry</div>
                <div class="filters">
                    <a class="filter-link" href="?filter=all">Wszystkie</a>
                    <a class="filter-link" href="?filter=active">Aktywne</a>
                    <a class="filter-link" href="?filter=completed">Ukończone</a>
                </div>
            </section>

            <section class="tasks">
                <?php while ($task = $tasks->fetch_assoc()): ?>
                    <div class="task-card">
                        <div class="task-card-top">
                            <div class="task-title">
                                <?= htmlspecialchars($task['title']) ?>
                            </div>

                            <div class="options-wrapper">
                                <button class="options-btn">⋮</button>

                                <div class="dropdown">
                                    <form action="app/task_handler.php" method="POST">
                                        <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                                        <button class="dropdown-btn" type="submit" name="action" value="complete">
                                            Zakończ
                                        </button>
                                    </form>

                                    <form action="app/task_handler.php" method="POST">
                                        <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                                        <button class="dropdown-btn" type="submit" name="action" value="delete">
                                            Usuń
                                        </button>
                                    </form>

                                    <form action="app/task_handler.php" method="POST">
                                        <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                                        <button class="dropdown-btn" type="submit" name="action" value="edit">
                                            Edytuj tytuł
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="task-meta">
                            <span class="task-meta-label"><?= $lang['status'] ?>:</span>
                            <span class="task-meta-value">
                                <?= $task['status'] === 'completed'
                                    ? $lang['completed']
                                    : $lang['pending']; ?>
                            </span>
                        </div>
                    </div>
                <?php endwhile; ?>
            </section>
        </main>
    </div>
</div>