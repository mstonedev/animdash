<?php
$title = 'AnimDash';

ob_start();
?>

<div id="hero" class="text-4xl font-bold opacity-0">
    AnimDash 🚀
</div>

<script>
    gsap.to("#hero", {
        opacity: 1,
        y: -20,
        duration: 2,
        ease: "power2.out"
    });
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/layouts/base.php';
