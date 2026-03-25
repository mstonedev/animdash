<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimDash</title>
    <link rel="stylesheet" href="/css/output.css">
</head>
<body class="bg-gray-950 text-white min-h-screen flex items-center justify-center">

    <div id="hero" class="text-4xl font-bold opacity-0">
        AnimDash 🚀
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
    <script>
        gsap.to("#hero", { opacity: 1, y: -20, duration: 1, ease: "power2.out" });
    </script>

</body>
</html>
