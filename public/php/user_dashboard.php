<?php
session_start();
$loggedIn = isset($_SESSION['username']);

if (!$loggedIn) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard - PixelPlayground</title>
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
        <button onclick="toggleMode()">Toggle Mode</button>
    </header>
    <main>
        <section class="dashboard">
            <h2>User Dashboard</h2>
            <div class="dashboard-card">
                <h3>Play a Game</h3>
                <a href="4op1rij.php">4 op een rij</a>
            </div>
            <div class="dashboard-card">
                <h3>Check Badges/Achievements</h3>
                <a href="badges.php">View Badges</a>
            </div>
            <div class="dashboard-card">
                <h3>Check Tournaments</h3>
                <a href="toernooi.php">View Tournaments</a>
            </div>
            <div class="dashboard-card">
                <h3>Check Friends</h3>
                <a href="vrienden.php">View Friends</a>
            </div>
            <div class="dashboard-card">
                <h3>View Highscores</h3>
                <a href="highscores.php">View Highscores</a>
            </div>
        </section>
    </main>
</body>
</html>
