<?php
session_start();
$loggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home - PixelPlayground</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script>
        function toggleMode() {
            var element = document.body;
            element.classList.toggle("dark-mode");
        }
    </script>
</head>
<body>
    <header>
        <h1>PixelPlayground</h1>
        <?php if ($loggedIn): ?>
            <nav>
                <a href="highscores.php">Highscores</a>
                <a href="vrienden.php">Vrienden</a>
                <a href="toernooi.php">Toernooi</a>
                <a href="badges.php">Badges/Achievements</a>
            </nav>
            <div class="user-info">
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="logout.php">Logout</a>
            </div>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
        <button onclick="toggleMode()">Toggle light/dark mode</button>
    </header>
    <main>
        <section class="game-selection">
            <h2>Select a Game</h2>
            <div class="game-card">
                <h3>4 op een rij</h3>
                <a href="4op1rij.php">Play Now</a>
            </div>
        </section>
    </main>
</body>
</html>
