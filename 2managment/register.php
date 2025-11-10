<?php 
ob_start();
session_start();
require_once('../1config/connection.php');
require_once('../1config/common_function.php');

try {
    if(isset($_POST['submit'])) {
        // Validate input
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['contact']) || empty($_POST['password'])) {
            throw new Exception('All fields are required');
        }
        
        $name = mysqli_real_escape_string($conn, trim($_POST['name']));
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $contact = mysqli_real_escape_string($conn, trim($_POST['contact']));
        $password = $_POST['password'];
        
        // Validate email format
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email format');
        }
        
        // Validate password length
        if(strlen($password) < 6) {
            throw new Exception('Password must be at least 6 characters long');
        }
        
        // Validate contact number
        if(!preg_match('/^[0-9]{10}$/', $contact)) {
            throw new Exception('Contact number must be 10 digits');
        }
        
        // Check if email already exists
        $check_query = "SELECT * FROM `users` WHERE `email` = '$email'";
        $check_result = mysqli_query($conn, $check_query);
        
        if(!$check_result) {
            throw new Exception('Database query failed: ' . mysqli_error($conn));
        }
        
        $find_mail = mysqli_fetch_assoc($check_result);
        
        if($find_mail) {
            throw new Exception('Email already registered. Please login instead.');
        }
        
        // Hash password
        $password_encryption = password_hash($password, PASSWORD_BCRYPT);
        
        // Insert new user
        $insert_query = "INSERT INTO `users` (`name`, `email`, `mobile`, `password`) VALUES ('$name', '$email', '$contact', '$password_encryption')";
        $complete_registration = mysqli_query($conn, $insert_query);
        
        if(!$complete_registration) {
            throw new Exception('Registration failed: ' . mysqli_error($conn));
        }
        
        // Get the newly created user ID
        $user_id = mysqli_insert_id($conn);
        
        // Auto login after registration
        $_SESSION['emailID'] = $email;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $name;
        last_activity();
        
        setToast('success', 'Registration successful! Welcome to Login System.');
        header('location:../3view/pages/dashboard.php');
        exit();
        
    } else {
        throw new Exception('Invalid request');
    }
    
} catch(Exception $e) {
    setToast('error', $e->getMessage());
    header('location:../3view/registeration.php');
    exit();
}
?>