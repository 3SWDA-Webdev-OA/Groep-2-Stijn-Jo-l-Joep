<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>4 op een rij</title>
    <link rel="stylesheet" type="text/css" href="../css/gamestyles.css">
    <script src="../js/4op1rij.js" defer></script>
    <script>
        function toggleMode() {
            var element = document.body;
            element.classList.toggle("dark-mode");
        }
    </script>
</head>
<body>
    <header>
        <h1>4 op een rij</h1>
        <nav>
            <a href="../php/home.php">Home</a>
        </nav>
        <button onclick="toggleMode()">Toggle light/dark mode</button>
    </header>
    <main>
        <p>Welcome to 4 op een rij, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : "Guest"; ?>!</p>
        <h2 id="winnaar"></h2>
        <div id="bord"></div>
    </main>
</body>
</html>
