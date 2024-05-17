<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['wachtwoord'])) {
            session_start();
            $_SESSION['username'] = $username;
            echo "Login successful!";
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - PixelPlayground</title>
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
        <button onclick="toggleMode()">Toggle light/dark mode</button>
    </header>
    <main>
        <div class="container">
            <h2>Login</h2>
            <form method="post" action="user_dasboard.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Login" name="login">
            </form>
        </div>
    </main>
</body>
</html>
