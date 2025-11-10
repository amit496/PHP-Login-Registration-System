<?php 
ob_start();
session_start();
require_once('../1config/connection.php');
require_once('../1config/common_function.php');
emailSet(); // Redirect to dashboard if already logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Login System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            animation: slideIn 0.3s ease-out;
        }
        @keyframes slideIn {
            from { transform: translateX(400px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(400px); opacity: 0; }
        }
        .toast.hide {
            animation: slideOut 0.3s ease-in forwards;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    
    <!-- Toast Notification -->
    <?php 
    $toast = getToast();
    if($toast): 
        $bg_color = $toast['type'] == 'success' ? 'bg-green-500' : ($toast['type'] == 'error' ? 'bg-red-500' : 'bg-yellow-500');
        $icon = $toast['type'] == 'success' ? 'fa-check-circle' : ($toast['type'] == 'error' ? 'fa-times-circle' : 'fa-exclamation-triangle');
    ?>
    <div id="toast" class="toast <?php echo $bg_color; ?> text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3">
        <i class="fas <?php echo $icon; ?> text-xl"></i>
        <span><?php echo htmlspecialchars($toast['message']); ?></span>
        <button onclick="closeToast()" class="ml-4 text-white hover:text-gray-200">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <?php endif; ?>

    <!-- Registration Form -->
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-indigo-600 py-8 px-6 text-center">
                <h1 class="text-3xl font-bold text-white">Create Account</h1>
                <p class="text-purple-100 mt-2">Join us today!</p>
            </div>
            
            <!-- Form -->
            <form action="../2managment/register.php" method="POST" class="p-8 space-y-5">
                <!-- Name -->
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user text-purple-600 mr-2"></i>Full Name
                    </label>
                    <input type="text" name="name" required autocomplete="off"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all"
                           placeholder="Enter your name">
                </div>
                
                <!-- Email -->
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope text-purple-600 mr-2"></i>Email Address
                    </label>
                    <input type="email" name="email" required autocomplete="off"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all"
                           placeholder="Enter your email">
                </div>
                
                <!-- Contact -->
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-phone text-purple-600 mr-2"></i>Contact Number
                    </label>
                    <input type="text" name="contact" required autocomplete="off"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all"
                           placeholder="Enter your contact number">
                </div>
                
                <!-- Password -->
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock text-purple-600 mr-2"></i>Password
                    </label>
                    <input type="password" name="password" required autocomplete="off"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all"
                           placeholder="Create a password">
                </div>
                
                <!-- Submit Button -->
                <button type="submit" name="submit" 
                        class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-all transform hover:scale-[1.02] active:scale-[0.98] shadow-md">
                    <i class="fas fa-user-plus mr-2"></i>Register
                </button>
                
                <!-- Login Link -->
                <div class="text-center text-sm text-gray-600">
                    Already have an account? 
                    <a href="login.php" class="text-purple-600 hover:text-purple-700 font-semibold">Login now</a>
                </div>
            </form>
        </div>
        
        <!-- Footer -->
        <p class="text-center text-white text-sm mt-6">&copy; <?php echo date('Y'); ?> Login System. All rights reserved.</p>
    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if(toast) {
                toast.classList.add('hide');
                setTimeout(() => toast.remove(), 300);
            }
        }, 4000);
        
        function closeToast() {
            const toast = document.getElementById('toast');
            if(toast) {
                toast.classList.add('hide');
                setTimeout(() => toast.remove(), 300);
            }
        }
    </script>
</body>
</html>