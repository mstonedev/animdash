<?php
$title = '404 - Not Found';

ob_start();
?>

<div class="text-center mt-20">
    <h1 class="text-6xl font-bold text-red-500">404</h1>
    <p class="text-gray-400 mt-4">Page not found.</p>
    <a href="/" class="text-blue-400 mt-6 inline-block hover:underline">← Back to Dashboard</a>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
