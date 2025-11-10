<?php
/**
 * Check if user is logged in, redirect to dashboard if yes
 */
function emailSet() {
    try {
        if(isset($_SESSION['emailID']) && !empty($_SESSION['emailID'])) {
            header('location:../3view/pages/dashboard.php');
            exit();
        }
    } catch(Exception $e) {
        error_log("emailSet Error: " . $e->getMessage());
    }
}

/**
 * Check if user is NOT logged in, redirect to login if not
 */
function emailNotSet() {
    try {
        if(!isset($_SESSION['emailID']) || empty($_SESSION['emailID'])) {
            $_SESSION['warning'] = 'Please login to access this page';
            header('location:../../3view/login.php');
            exit();
        }
    } catch(Exception $e) {
        error_log("emailNotSet Error: " . $e->getMessage());
        header('location:../../3view/login.php');
        exit();
    }
}

/**
 * Update last activity time
 */
function last_activity() {
    $_SESSION['last_activity'] = time();
}

/**
 * Auto logout after inactivity
 */
function autologout() {
    try {
        if(isset($_SESSION['last_activity']) && !empty($_SESSION['last_activity'])) {
            $inactive_time = 1800; // 30 minutes
            if((time() - $_SESSION['last_activity']) > $inactive_time) {
                session_unset();
                session_destroy();
                return true;
            }
        }
        return false;
    } catch(Exception $e) {
        error_log("autologout Error: " . $e->getMessage());
        return false;
    }
}

/**
 * Set toast message
 */
function setToast($type, $message) {
    $_SESSION['toast_type'] = $type;
    $_SESSION['toast_message'] = $message;
}

/**
 * Get and clear toast message
 */
function getToast() {
    if(isset($_SESSION['toast_type']) && isset($_SESSION['toast_message'])) {
        $toast = [
            'type' => $_SESSION['toast_type'],
            'message' => $_SESSION['toast_message']
        ];
        unset($_SESSION['toast_type']);
        unset($_SESSION['toast_message']);
        return $toast;
    }
    return null;
}
?>