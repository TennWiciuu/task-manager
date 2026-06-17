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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/style.css">
</head>

<body class="index-landing">
    <header class="header">
        <div class="app-wrap" style="display:flex;justify-content:space-between;align-items:center;width:100%;gap:16px;">
            <div class="logo"><?= $lang["appName"] ?></div>

            <nav class="nav">
                <a href="?lang=pl">PL</a>
                <a href="?lang=en">EN</a>
            </nav>
        </div>
    </header>

    <main class="app-hero">
        <div class="app-wrap">
            <div class="hero-grid">
                <section>

                    <div class="cta-row">
                        <a class="btn btn-primary" href="register.php">
                            <span>→</span>
                            <span><?php echo $lang["register"] ?? "Register" ?></span>
                        </a>
                        <a class="btn" href="login.php"> <?php echo $lang["login"] ?? "Login" ?></a>
                    </div>

                </section>
            </div>
        </div>

        <section class="section">
            <div class="app-wrap">
                <h3>Everything you need to run your day</h3>
                <p class="lead">A SaaS-style workflow built around one thing: finishing tasks.</p>

                <div class="grid-3">
                    <div class="feature">
                        <div class="kicker">FEATURE</div>
                        <h4>Fast task creation</h4>
                        <p>Add tasks instantly from your workspace—no clutter, no distractions.</p>
                    </div>
                    <div class="feature">
                        <div class="kicker">FEATURE</div>
                        <h4>Edit and complete</h4>
                        <p>Update titles and mark tasks as completed with a clean dropdown flow.</p>
                    </div>
                    <div class="feature">
                        <div class="kicker">FEATURE</div>
                        <h4>Status filters</h4>
                        <p>See what’s active vs. completed so you always know what’s next.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="app-wrap">
                <h3>How it works</h3>
                <p class="lead">From signup to productive tasks in minutes.</p>

                <div class="grid-3">
                    <div class="step">
                        <div class="num">1</div>
                        <h4>Create an account</h4>
                        <p><?php echo $lang["register"] ?? "Register" ?> to get your personal dashboard.</p>
                    </div>
                    <div class="step">
                        <div class="num">2</div>
                        <h4>Add your tasks</h4>
                        <p>Type a title and keep your work organized from day one.</p>
                    </div>
                    <div class="step">
                        <div class="num">3</div>
                        <h4>Complete and iterate</h4>
                        <p>Update titles, mark completion, and filter by status to stay focused.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="app-wrap">
                <h3>About this portfolio app</h3>
                <p class="lead">This landing page is a UI-only view. The actual app logic lives in the PHP files: authentication (login/register) and the task workflow on the dashboard.</p>

                <div class="grid-3">
                    <div class="feature">
                        <div class="kicker">AUTH</div>
                        <h4>Login + registration</h4>
                        <p>Session-based auth handled by <code>auth/auth.php</code> and the request handlers.</p>
                    </div>
                    <div class="feature">
                        <div class="kicker">WORKFLOW</div>
                        <h4>Tasks per account</h4>
                        <p>The dashboard renders tasks from <code>app/tasks.php</code> and updates them via <code>app/task_handler.php</code>.</p>
                    </div>
                    <div class="feature">
                        <div class="kicker">I18N</div>
                        <h4>Two languages</h4>
                        <p>Language switching is driven by <code>$_SESSION['lang']</code> and files in <code>config/lang</code>.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="app-wrap footer-grid">
            <div>
                <b style="color:rgba(255,255,255,.86)"><?php echo $lang["appName"] ?></b>
                <div class="muted">© <?php echo date('Y'); ?> Task Manager</div>
            </div>
        </div>
    </footer>
</body>

</html>