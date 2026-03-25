<?php
// layouts/base.php
// Usage: set $title and $content before including this file
$title = $title ?? 'AnimDash';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="/css/output.css">
    <script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
</head>

<body class="bg-gray-950 text-white min-h-screen">

    <main class="container mx-auto p-6">
        <?= $content ?>
    </main>

</body>

</html>