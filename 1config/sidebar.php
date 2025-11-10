<!-- Sidebar -->
<aside class="fixed left-0 top-16 h-[calc(100vh-4rem)] w-64 bg-white shadow-lg overflow-y-auto">
    <div class="p-4">
        <nav class="space-y-2">
            <!-- Dashboard -->
            <a href="dashboard.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'bg-gradient-to-r from-purple-600 to-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100'; ?> transition-all duration-200">
                <i class="fas fa-home text-lg"></i>
                <span class="font-medium">Dashboard</span>
            </a>
            
            <!-- Users -->
            <a href="users.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg <?php echo basename($_SERVER['PHP_SELF']) == 'users.php' ? 'bg-gradient-to-r from-purple-600 to-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100'; ?> transition-all duration-200">
                <i class="fas fa-users text-lg"></i>
                <span class="font-medium">Users</span>
            </a>
            
            <!-- Profile -->
            <a href="profile.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'bg-gradient-to-r from-purple-600 to-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100'; ?> transition-all duration-200">
                <i class="fas fa-user text-lg"></i>
                <span class="font-medium">Profile</span>
            </a>
            
            <!-- Settings -->
            <a href="settings.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'bg-gradient-to-r from-purple-600 to-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100'; ?> transition-all duration-200">
                <i class="fas fa-cog text-lg"></i>
                <span class="font-medium">Settings</span>
            </a>
            
            <!-- Divider -->
            <div class="border-t border-gray-200 my-4"></div>
            
            <!-- Logout -->
            <a href="../../2managment/logout.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 transition-all duration-200">
                <i class="fas fa-sign-out-alt text-lg"></i>
                <span class="font-medium">Logout</span>
            </a>
        </nav>
    </div>
    
    <!-- User Info at Bottom -->
    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gray-50 border-t border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
                <?php echo strtoupper(substr($_SESSION['emailID'], 0, 1)); ?>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">
                    <?php echo htmlspecialchars(explode('@', $_SESSION['emailID'])[0]); ?>
                </p>
                <p class="text-xs text-gray-500 truncate">
                    <?php echo htmlspecialchars($_SESSION['emailID']); ?>
                </p>
            </div>
        </div>
    </div>
</aside>