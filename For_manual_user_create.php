<?php

// Require the Composer autoloader
require __DIR__.'/vendor/autoload.php';

// Set up the Laravel application
$app = require_once __DIR__.'/bootstrap/app.php';

// Run the application
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Include Laravel's Hash facade
use Illuminate\Support\Facades\Hash;

// Plain text password
$plainPassword = 'qwerty';

// Hash the password
$hashedPassword = Hash::make($plainPassword);

// Database configuration
$host = env('DB_HOST');
$database = env('DB_DATABASE');
$username = env('DB_USERNAME');
$password = env('DB_PASSWORD');

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User details
$email = 'Test Vendor';
$username = 'qwert@q.com';

// Insert user into the database
//$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
$sql = "INSERT INTO clientdetails (name, username, password) VALUES ('$name', '$email', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
