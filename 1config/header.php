<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Dashboard'; ?> - Login System</title>
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
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }
        .toast.hide {
            animation: slideOut 0.3s ease-in forwards;
        }
    </style>
</head>
<body class="bg-gray-100">
    
    <!-- Toast Notification -->
    <?php 
    $toast = getToast();
    if($toast): 
        $bg_color = '';
        $icon = '';
        switch($toast['type']) {
            case 'success':
                $bg_color = 'bg-green-500';
                $icon = 'fa-check-circle';
                break;
            case 'error':
                $bg_color = 'bg-red-500';
                $icon = 'fa-times-circle';
                break;
            case 'warning':
                $bg_color = 'bg-yellow-500';
                $icon = 'fa-exclamation-triangle';
                break;
            case 'info':
                $bg_color = 'bg-blue-500';
                $icon = 'fa-info-circle';
                break;
            default:
                $bg_color = 'bg-gray-500';
                $icon = 'fa-bell';
        }
    ?>
    <div id="toast" class="toast <?php echo $bg_color; ?> text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 min-w-[300px]">
        <i class="fas <?php echo $icon; ?> text-xl"></i>
        <span class="flex-1"><?php echo htmlspecialchars($toast['message']); ?></span>
        <button onclick="closeToast()" class="text-white hover:text-gray-200">
            <i class="fas fa-times"></i>
        </button>
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
    <?php endif; ?>
    
    <!-- Top Navigation Bar - Fixed -->
    <nav class="fixed top-0 left-0 right-0 bg-white shadow-md z-50">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-2xl font-bold text-slate-700">
                            <i class="fas fa-shield-alt text-indigo-600 mr-2"></i>Login System
                        </h1>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                            <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                <?php echo strtoupper(substr($_SESSION['emailID'], 0, 1)); ?>
                            </div>
                            <span class="hidden md:block text-sm"><?php echo htmlspecialchars($_SESSION['emailID']); ?></span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Spacer for fixed header -->
    <div class="h-16"></div>