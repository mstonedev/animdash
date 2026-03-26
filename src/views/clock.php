<?php
$title = 'Clock';

ob_start();
?>

<div class="flex flex-col items-center justify-center min-h-screen -mt-6">

    <!-- Time -->
    <div id="clock-time" class="text-8xl font-bold tracking-tight opacity-0">
        00:00:00
    </div>

    <!-- Date -->
    <div id="clock-date" class="text-2xl text-gray-400 mt-4 opacity-0">
        Wednesday, January 1
    </div>

    <!-- AM/PM -->
    <div id="clock-ampm" class="text-4xl font-light text-blue-400 mt-2 opacity-0">
        AM
    </div>

</div>

<script>
    // Animate in on load
    gsap.to("#clock-time", {
        opacity: 1,
        y: -10,
        duration: 1,
        ease: "power2.out"
    });
    gsap.to("#clock-date", {
        opacity: 1,
        y: -10,
        duration: 1,
        delay: 0.2,
        ease: "power2.out"
    });
    gsap.to("#clock-ampm", {
        opacity: 1,
        y: -10,
        duration: 1,
        delay: 0.4,
        ease: "power2.out"
    });

    function updateClock() {
        const now = new Date();

        // Time
        let hours = now.getHours();
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12;

        document.getElementById('clock-time').textContent =
            `${String(hours).padStart(2, '0')}:${minutes}:${seconds}`;
        document.getElementById('clock-ampm').textContent = ampm;

        // Date
        const options = {
            weekday: 'long',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById('clock-date').textContent =
            now.toLocaleDateString('en-US', options);
    }

    updateClock();
    setInterval(updateClock, 1000);
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
