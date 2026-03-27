<?php
// Detect environment
$is_local = ($_SERVER['REMOTE_ADDR'] === '127.0.0.1' || $_SERVER['REMOTE_ADDR'] === '::1' || $_SERVER['SERVER_NAME'] === 'localhost');

if ($is_local) {
    // Local XAMPP MySQL Configuration
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'gracelending_db');
}
else {
    // Hosted Configuration
    define('DB_HOST', 'localhost');
    define('DB_USER', 'gracelending_user');
    define('DB_PASS', 'gracelending_pass');
    define('DB_NAME', 'gracelending_gracelanding_db');
}

// Create connection
function getConnection()
{
    try {
        $host = '127.0.0.1';
        $conn = new mysqli($host, DB_USER, DB_PASS, DB_NAME);

        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8mb4");
        return $conn;
    }
    catch (Exception $e) {
        die("Database connection error: " . $e->getMessage());
    }
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Session management is handled by individual entry points (index.php, login.php)
?>