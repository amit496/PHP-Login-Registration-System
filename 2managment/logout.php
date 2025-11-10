<?php 
ob_start();
session_start();
require_once('../1config/connection.php');
require_once('../1config/common_function.php');

try {
    // Clear all session data
    session_unset();
    session_destroy();
    
    // Start new session for toast message
    session_start();
    setToast('success', 'Logged out successfully');
    
    header('location:../3view/login.php');
    exit();
    
} catch(Exception $e) {
    // Even if there's an error, redirect to login
    session_start();
    setToast('warning', 'Logout completed');
    header('location:../3view/login.php');
    exit();
}
?>