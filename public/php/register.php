<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($username && $password) {
        $stmt = $conn->prepare("INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "New account created successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid input.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - PixelPlayground</title>
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
        <button onclick="toggleMode()">Toggle Mode</button>
    </header>
    <main>
        <div class="container">
            <h2>Register</h2>
            <form method="post" action="register.php">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Register" name="register">
            </form>
        </div>
    </main>
</body>
</html>
