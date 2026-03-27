<?php
// Database configuration
// Detect environment
$is_local = ($_SERVER['REMOTE_ADDR'] === '127.0.0.1' || $_SERVER['REMOTE_ADDR'] === '::1' || $_SERVER['SERVER_NAME'] === 'localhost');

if ($is_local) {
    // Local XAMPP MySQL Configuration
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'gracelending_db'); // local name from previous migration
} else {
    // Hosted Configuration
    define('DB_HOST', 'localhost');
    define('DB_USER', 'gracelending_user');
    define('DB_PASS', 'gracelending_pass');
    define('DB_NAME', 'gracelending_gracelanding_db');
}

/**
 * Get database connection
 */
function getWebsiteConnection() {
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        
        $conn->set_charset("utf8mb4");
        return $conn;
    } catch (Exception $e) {
        // Log error and return null
        error_log("Website DB Connection Error: " . $e->getMessage());
        return null;
    }
}
?>
