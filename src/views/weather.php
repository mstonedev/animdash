<?php
$title = 'Weather';

ob_start();
?>

<div class="text-4xl font-bold">Weather Widget Coming Soon</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
