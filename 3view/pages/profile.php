<?php 
ob_start();
session_start();
require_once('../../1config/connection.php');
require_once('../../1config/common_function.php');

emailNotSet();
last_activity();

$page_title = 'Profile';

// Fetch user details
try {
    $email = $_SESSION['emailID'];
    $user_query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if(!$user_query) {
        throw new Exception('Failed to fetch user data');
    }
    $user = mysqli_fetch_assoc($user_query);
} catch(Exception $e) {
    setToast('error', $e->getMessage());
}
?>

<?php require_once('../../1config/header.php'); ?>
<?php require_once('../../1config/sidebar.php'); ?>

<!-- Main Content -->
<div class="ml-64 p-8">
    <div class="max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Profile</h1>
            <p class="text-gray-600 mt-2">Manage your account information</p>
        </div>
        
        <!-- Profile Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Cover Image -->
            <div class="h-32 bg-gradient-to-r from-purple-600 to-blue-600"></div>
            
            <!-- Profile Info -->
            <div class="px-8 pb-8">
                <div class="flex items-end space-x-5 -mt-16">
                    <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center text-white font-bold text-4xl shadow-lg border-4 border-white bg-gradient-to-r from-purple-600 to-blue-600">
                        <?php echo strtoupper(substr($user['name'], 0, 1)); ?>
                    </div>
                    <div class="pb-2">
                        <h2 class="text-2xl font-bold text-gray-900"><?php echo htmlspecialchars($user['name']); ?></h2>
                        <p class="text-gray-600"><?php echo htmlspecialchars($user['email']); ?></p>
                    </div>
                </div>
                
                <!-- Profile Details -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Full Name</label>
                            <p class="mt-1 text-lg text-gray-900"><?php echo htmlspecialchars($user['name']); ?></p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Email Address</label>
                            <p class="mt-1 text-lg text-gray-900"><?php echo htmlspecialchars($user['email']); ?></p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Mobile Number</label>
                            <p class="mt-1 text-lg text-gray-900"><?php echo htmlspecialchars($user['mobile']); ?></p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Account Status</label>
                            <p class="mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-2"></i>Active
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="mt-8 flex space-x-4">
                    <button class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-blue-700 transition-all shadow-md">
                        <i class="fas fa-edit mr-2"></i>Edit Profile
                    </button>
                    <button class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition-all">
                        <i class="fas fa-key mr-2"></i>Change Password
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('../../1config/footer.php'); ?>