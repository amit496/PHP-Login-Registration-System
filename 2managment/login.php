<?php 
ob_start();
session_start();
require_once('../1config/connection.php');
require_once('../1config/common_function.php');

try {
    if(isset($_POST['submit'])) {
        // Validate input
        if(empty($_POST['email']) || empty($_POST['password'])) {
            throw new Exception('Email and password are required');
        }
        
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $password = $_POST['password'];
        
        // Validate email format
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email format');
        }
        
        // Find user
        $query = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($conn, $query);
        
        if(!$result) {
            throw new Exception('Database query failed: ' . mysqli_error($conn));
        }
        
        $find_record = mysqli_fetch_assoc($result);
        
        if($find_record) {
            // Verify password
            if(password_verify($password, $find_record['password'])) {
                // Login successful
                $_SESSION['emailID'] = $email;
                $_SESSION['user_id'] = $find_record['id'];
                $_SESSION['user_name'] = $find_record['name'];
                last_activity();
                
                setToast('success', 'Login successful! Welcome back.');
                header('location:../3view/pages/dashboard.php');
                exit();
            } else {
                throw new Exception('Incorrect password');
            }
        } else {
            throw new Exception('No account found with this email');
        }
    } else {
        throw new Exception('Invalid request');
    }
    
} catch(Exception $e) {
    setToast('error', $e->getMessage());
    header('location:../3view/login.php');
    exit();
}
?>