<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Change this if you have a different password
$dbname = "logindatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task-name'];
    $task_duration = $_POST['task-duration'];
    $task_site = $_POST['task-site'];
    $department = $_POST['department'];
    $supervisor = $_POST['supervisor'];
    $task_progress = $_POST['task-progress'];
    $task_status = $_POST['task-status'];
    $due_by_time = $_POST['due-by-time'];
    $urgency = $_POST['urgency'];
    $confirmed = isset($_POST['checkbox']) ? 1 : 0;

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO tasks (task_name, task_duration, task_site, department, supervisor, task_progress, task_status, due_by_time, urgency, confirmed) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssisssi", $task_name, $task_duration, $task_site, $department, $supervisor, $task_progress, $task_status, $due_by_time, $urgency, $confirmed);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New task created successfully";
        header('Location: events.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();