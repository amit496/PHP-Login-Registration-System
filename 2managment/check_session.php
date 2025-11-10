<?php
session_start();
require_once('../1config/common_function.php');

header('Content-Type: application/json');

try {
    $logged_out = autologout();
    
    if($logged_out) {
        echo json_encode(['logged_out' => true, 'message' => 'Session expired']);
    } else {
        last_activity();
        echo json_encode(['logged_out' => false, 'message' => 'Session active']);
    }
    
} catch(Exception $e) {
    echo json_encode(['logged_out' => false, 'error' => $e->getMessage()]);
}
?>