<?php
require_once __DIR__ . '/config/db.php';

loadEnv(__DIR__ . '/../.env');

try {
    $pdo = getDb();
    echo "DB connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
