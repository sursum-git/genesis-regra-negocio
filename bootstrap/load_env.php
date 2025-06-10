<?php
// File: bootstrap/load_env.php

$envFile = __DIR__ . '/../.env';

if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) continue;

        [$name, $value] = explode('=', $line, 2);
        putenv(trim($name) . '=' . trim($value));
    }
}
