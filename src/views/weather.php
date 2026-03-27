<?php
require_once __DIR__ . '/../config/env.php';
require_once __DIR__ . '/../services/Weather.php';

$weather = (new Weather())->getCurrent();
$title = 'Weather';

ob_start();
?>

<?php if (isset($weather['error'])): ?>
    <div class="text-red-500 text-center mt-20"><?= $weather['error'] ?></div>
<?php else: ?>

    <div class="flex flex-col items-center justify-center min-h-screen -mt-6">

        <!-- Icon -->
        <img
            src="https://openweathermap.org/img/wn/<?= $weather['icon'] ?>@2x.png"
            alt="<?= $weather['description'] ?>"
            class="w-24 h-24 opacity-0"
            id="weather-icon">

        <!-- Temp -->
        <div id="weather-temp" class="text-8xl font-bold tracking-tight mt-2 opacity-0">
            <?= $weather['temp'] ?>°F
        </div>

        <!-- Description -->
        <div id="weather-desc" class="text-2xl text-gray-400 mt-4 opacity-0">
            <?= $weather['description'] ?>
        </div>

        <!-- City -->
        <div id="weather-city" class="text-xl text-blue-400 mt-2 opacity-0">
            <?= $weather['city'] ?>, <?= $_ENV['WEATHER_STATE'] ?>
        </div>

        <!-- Details -->
        <div id="weather-details" class="flex gap-8 mt-8 text-gray-400 opacity-0">
            <div class="text-center">
                <div class="text-2xl font-bold text-white"><?= $weather['feels_like'] ?>°</div>
                <div class="text-sm">Feels Like</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-white"><?= $weather['humidity'] ?>%</div>
                <div class="text-sm">Humidity</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-white"><?= $weather['wind'] ?> mph</div>
                <div class="text-sm">Wind</div>
            </div>
        </div>

    </div>

    <script>
        gsap.to("#weather-icon", {
            opacity: 1,
            y: -10,
            duration: 1,
            ease: "power2.out"
        });
        gsap.to("#weather-temp", {
            opacity: 1,
            y: -10,
            duration: 1,
            delay: 0.2,
            ease: "power2.out"
        });
        gsap.to("#weather-desc", {
            opacity: 1,
            y: -10,
            duration: 1,
            delay: 0.3,
            ease: "power2.out"
        });
        gsap.to("#weather-city", {
            opacity: 1,
            y: -10,
            duration: 1,
            delay: 0.4,
            ease: "power2.out"
        });
        gsap.to("#weather-details", {
            opacity: 1,
            y: -10,
            duration: 1,
            delay: 0.5,
            ease: "power2.out"
        });
    </script>

<?php endif; ?>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
