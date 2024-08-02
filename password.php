<?php
// Define the password
$password = 'bonny@2020';

// Hash the password using BCRYPT
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Display the hashed password
echo "Hashed Password: " . $hashed_password;