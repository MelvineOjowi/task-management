<?php
session_start();

// Establish database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'logindatabase';

$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        echo "Please enter both email and password.";
    }
        else {
        // Check if email and password match a record in the 'users' table
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($con, $query);

  if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                echo "Login successful!";
                header('Location: taskmanagement.php');
            }
        } else {
            echo "User not found.";
        }
    }
}



mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style2.css" />
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('loginForm').addEventListener('submit', async (e) => {
                e.preventDefault();
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                try {
                    const response = await fetch('login.php', {
                        method: 'POST',
                        body: new URLSearchParams({ email, password }),
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    });

                    const data = await response.text();
                    document.getElementById('login-message').textContent = data;
                    if (data.includes('Login successful!')) {
        
                    }
                } catch (error) {
                    console.error('Error:', error);
                    document.getElementById('login-message').textContent = 'An error occurred.';
                }
            });
        });
    </script>
</head>
<body>
    <div class="login-container">
        <img src="images/siginon.png" alt="siginon.jpg" class="header-image">
        <form id="loginForm">
            <label for="email">email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <div id="login-message"></div>
    </div>
</body>
</html>
