<?php 
    try {
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'loginsystem';
        
        $conn = mysqli_connect($hostname, $username, $password, $database);
        
        if(!$conn) {
            throw new Exception('Database connection failed: ' . mysqli_connect_error());
        }
        
        mysqli_set_charset($conn, "utf8mb4");
        
    } catch(Exception $e) {
        die('Connection Error: ' . $e->getMessage());
    }
?>