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

            
            <p>Repozytorium projektu na GitHub: <a href="https://github.com/TennWiciuu/task-manager">link</a></p>

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
                            <span><?= $lang["ctaCreateAccount"] ?? ($lang["register"] ?? "Register") ?></span>
                        </a>
                        <a class="btn" href="login.php"> <?= $lang["ctaLogin"] ?? ($lang["login"] ?? "Login") ?></a>

                    </div>

                </section>
            </div>
        </div>

        <section class="section">
            <div class="app-wrap">
                <h3><?= $lang["everythingYouNeed"] ?? "Everything you need to run your day" ?></h3>
                <p class="lead"><?= $lang["workflowSaaS"] ?? "A workflow built around one thing: finishing tasks." ?></p>


                <div class="grid-3">
                    <div class="feature">
                        <div class="kicker"><?= $lang["feature"] ?? "FEATURE" ?></div>
                        <h4><?= $lang["featureFast"] ?? "Fast task creation" ?></h4>

                        <p><?= $lang["featureFastDesc"] ?? "Add tasks instantly from your workspace—no clutter, no distractions." ?></p>

                    </div>
                    <div class="feature">
                        <div class="kicker"><?= $lang["feature"] ?? "FEATURE" ?></div>
                        <h4><?= $lang["featureEditComplete"] ?? "Edit and complete" ?></h4>

                        <p><?= $lang["featureEditCompleteDesc"] ?? "Update titles and mark tasks as completed with a clean dropdown flow." ?></p>

                    </div>
                    <div class="feature">
                        <div class="kicker"><?= $lang["feature"] ?? "FEATURE" ?></div>
                        <h4><?= $lang["featureStatusFilters"] ?? "Status filters" ?></h4>

                        <p><?= $lang["featureStatusFiltersDesc"] ?? "See what’s active vs. completed so you always know what’s next." ?></p>

                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="app-wrap">
                <h3><?= $lang["howItWorks"] ?? "How it works" ?></h3>
                <p class="lead"><?= $lang["howItWorksLead"] ?? "From signup to productive tasks in minutes." ?></p>


                <div class="grid-3">
                    <div class="step">
                        <div class="num"><?= $lang["step1"] ?? "1" ?></div>
                        <h4><?= $lang["step1Title"] ?? "Create an account" ?></h4>
                        <p><?= $lang["step1Desc"] ?? ( ($lang["register"] ?? "Register") . ' to get your personal dashboard.' ); ?></p>

                    </div>
                    <div class="step">
                        <div class="num"><?= $lang["step2"] ?? "2" ?></div>
                        <h4><?= $lang["step2Title"] ?? "Add your tasks" ?></h4>
                        <p><?= $lang["step2Desc"] ?? "Type a title and keep your work organized from day one." ?></p>

                    </div>
                    <div class="step">
                        <div class="num"><?= $lang["step3"] ?? "3" ?></div>
                        <h4><?= $lang["step3Title"] ?? "Complete and iterate" ?></h4>
                        <p><?= $lang["step3Desc"] ?? "Update titles, mark completion, and filter by status to stay focused." ?></p>

                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="app-wrap">
                <h3><?= $lang["aboutPortfolioApp"] ?? "About this portfolio app" ?></h3>

                <p class="lead"><?= $lang["aboutLead"] ?? "This landing page is a UI-only view. The actual app logic lives in the PHP files: authentication (login/register) and the task workflow on the dashboard." ?></p>

                <div class="grid-3">
                    <div class="feature">
                        <div class="kicker"><?= $lang["auth"] ?? "AUTH" ?></div>
                        <h4><?= $lang["authTitle"] ?? "Login + registration" ?></h4>
                        <p><?= $lang["authDesc"] ?? "Session-based auth handled by <code>auth/auth.php</code> and the request handlers." ?></p>
                    </div>
                    <div class="feature">
                        <div class="kicker"><?= $lang["workflow"] ?? "WORKFLOW" ?></div>
                        <h4><?= $lang["workflowTitle"] ?? "Tasks per account" ?></h4>
                        <p><?= $lang["workflowDesc"] ?? "The dashboard renders tasks from <code>app/tasks.php</code> and updates them via <code>app/task_handler.php</code>." ?></p>
                    </div>
                    <div class="feature">
                        <div class="kicker"><?= $lang["i18n"] ?? "I18N" ?></div>
                        <h4><?= $lang["i18nTitle"] ?? "Two languages" ?></h4>
                        <p><?= $lang["i18nDesc"] ?? "Language switching is driven by a server-side session variable and translation files" ?></p>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <footer>
                <div class="app-wrap footer-grid">
            <div>
                <b style="color:rgba(255,255,255,.86)"><?php echo $lang["appName"] ?></b>
                <div class="muted">© <?php echo date('Y'); ?> <?php echo htmlspecialchars($lang["taskManager"] ?? "Task Manager created by Wiktor Przygodzki"); ?></div>

            </div>
        </div>
    </footer>
</body>

</html>