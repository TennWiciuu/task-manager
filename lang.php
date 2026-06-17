<?php

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$langCode = $_SESSION['lang'] ?? 'pl';

$file = __DIR__ . "/config/lang/$langCode.php";

if (!file_exists($file)) {
    $file = __DIR__ . "/config/lang/pl.php";
}

return require $file;