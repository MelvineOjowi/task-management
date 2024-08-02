<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] === 'user') {
    header('Location: taskmanagement.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Database connection
    $mysqli = new mysqli('localhost', 'root', '', 'logindatabase');
    if ($mysqli->connect_error) {
        die('Database connection failed: ' . $mysqli->connect_error);
    }
    $stmt = $mysqli->prepare('SELECT  role, password FROM user WHERE email = ? AND role = "user"');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($role, $hashedPassword);
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = 'user';
            header('Location: taskmanagement.php');
            exit;
        } else {
            $error = 'Invalid password.';
        }
    } else {
        $error = 'No user found with that username.';
    }
    $stmt->close();
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>
  <style>
    /* Styles for user login */
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: blue;
    }
    .login-container {
      background: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h1 {
      color: #333;
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    button {
      background-color: #007BFF;
      color: #fff;
      border: none;
      padding: 10px;
      cursor: pointer;
      border-radius: 5px;
    }
    button:hover {
      background-color: #0056b3;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>
  <div class="login-container">
  <img src="images/siginon.png" alt="siginon.jpg" class="header-image">

    <h1>User Login</h1>
    <form method="POST" action="">
      <input type="text" name="email" placeholder="email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    </form>
  </div>
</body>
</html>