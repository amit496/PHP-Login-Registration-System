<?php 
ob_start();
session_start();
require_once('../../1config/connection.php');
require_once('../../1config/common_function.php');

emailNotSet(); // Check if user is logged in
last_activity(); // Update last activity time

$page_title = 'Dashboard';

// Get some statistics
try {
    $total_users_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
    $total_users = mysqli_fetch_assoc($total_users_query)['total'];
} catch(Exception $e) {
    $total_users = 0;
}
?>

<?php require_once('../../1config/header.php'); ?>
<?php require_once('../../1config/sidebar.php'); ?>

<!-- Main Content -->
<div class="ml-64 p-8">
    <div class="max-w-7xl mx-auto">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Welcome back, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?>! 👋</h1>
            <p class="text-gray-600 mt-2">Here's what's happening with your account today.</p>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Users -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-600 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Users</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2"><?php echo $total_users; ?></h3>
                    </div>
                    <div class="bg-purple-100 p-4 rounded-full">
                        <i class="fas fa-users text-2xl text-purple-600"></i>
                    </div>
                </div>
            </div>
            
            <!-- Active Sessions -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-600 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Active Sessions</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">1</h3>
                    </div>
                    <div class="bg-blue-100 p-4 rounded-full">
                        <i class="fas fa-signal text-2xl text-blue-600"></i>
                    </div>
                </div>
            </div>
            
            <!-- Last Login -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-600 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Last Login</p>
                        <h3 class="text-lg font-bold text-gray-900 mt-2"><?php echo date('H:i A'); ?></h3>
                    </div>
                    <div class="bg-green-100 p-4 rounded-full">
                        <i class="fas fa-clock text-2xl text-green-600"></i>
                    </div>
                </div>
            </div>
            
            <!-- Account Status -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-600 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Account Status</p>
                        <h3 class="text-lg font-bold text-green-600 mt-2">Active</h3>
                    </div>
                    <div class="bg-yellow-100 p-4 rounded-full">
                        <i class="fas fa-check-circle text-2xl text-yellow-600"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activity & Quick Actions -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Activity -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-history text-purple-600 mr-2"></i>
                    Recent Activity
                </h2>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3 pb-4 border-b border-gray-200">
                        <div class="bg-green-100 p-2 rounded-full">
                            <i class="fas fa-sign-in-alt text-green-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Logged in successfully</p>
                            <p class="text-xs text-gray-500"><?php echo date('F d, Y - H:i A'); ?></p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 pb-4 border-b border-gray-200">
                        <div class="bg-blue-100 p-2 rounded-full">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Profile viewed</p>
                            <p class="text-xs text-gray-500">Earlier today</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="bg-purple-100 p-2 rounded-full">
                            <i class="fas fa-cog text-purple-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Settings updated</p>
                            <p class="text-xs text-gray-500">Yesterday</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-bolt text-purple-600 mr-2"></i>
                    Quick Actions
                </h2>
                <div class="grid grid-cols-2 gap-4">
                    <a href="profile.php" class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-purple-50 to-blue-50 rounded-lg hover:from-purple-100 hover:to-blue-100 transition-all group">
                        <i class="fas fa-user text-3xl text-purple-600 mb-2 group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium text-gray-700">View Profile</span>
                    </a>
                    <a href="users.php" class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg hover:from-blue-100 hover:to-indigo-100 transition-all group">
                        <i class="fas fa-users text-3xl text-blue-600 mb-2 group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium text-gray-700">All Users</span>
                    </a>
                    <a href="settings.php" class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-green-50 to-teal-50 rounded-lg hover:from-green-100 hover:to-teal-100 transition-all group">
                        <i class="fas fa-cog text-3xl text-green-600 mb-2 group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium text-gray-700">Settings</span>
                    </a>
                    <a href="../../2managment/logout.php" class="flex flex-col items-center justify-center p-4 bg-gradient-to-br from-red-50 to-pink-50 rounded-lg hover:from-red-100 hover:to-pink-100 transition-all group">
                        <i class="fas fa-sign-out-alt text-3xl text-red-600 mb-2 group-hover:scale-110 transition-transform"></i>
                        <span class="text-sm font-medium text-gray-700">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('../../1config/footer.php'); ?>