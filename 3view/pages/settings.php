
<?php 
ob_start();
session_start();
require_once('../../1config/connection.php');
require_once('../../1config/common_function.php');

emailNotSet();
last_activity();

$page_title = 'Settings';
?>

<?php require_once('../../1config/header.php'); ?>
<?php require_once('../../1config/sidebar.php'); ?>

<!-- Main Content -->
<div class="ml-64 p-8">
    <div class="max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Settings</h1>
            <p class="text-gray-600 mt-2">Manage your preferences and account settings</p>
        </div>
        
        <!-- Settings Sections -->
        <div class="space-y-6">
            <!-- Account Settings -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-user-cog text-purple-600 mr-2"></i>
                    Account Settings
                </h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                        <div>
                            <h3 class="font-medium text-gray-900">Email Notifications</h3>
                            <p class="text-sm text-gray-600">Receive email updates about your account</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                        </label>
                    </div>
                    <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                        <div>
                            <h3 class="font-medium text-gray-900">Two-Factor Authentication</h3>
                            <p class="text-sm text-gray-600">Add an extra layer of security</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                        </label>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Session Timeout</h3>
                            <p class="text-sm text-gray-600">Auto logout after 30 minutes of inactivity</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Privacy Settings -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-shield-alt text-blue-600 mr-2"></i>
                    Privacy Settings
                </h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                        <div>
                            <h3 class="font-medium text-gray-900">Profile Visibility</h3>
                            <p class="text-sm text-gray-600">Make your profile visible to other users</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Activity Status</h3>
                            <p class="text-sm text-gray-600">Show when you're active</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Danger Zone -->
            <div class="bg-white rounded-xl shadow-md p-6 border-2 border-red-200">
                <h2 class="text-xl font-bold text-red-600 mb-4 flex items-center">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    Danger Zone
                </h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="font-medium text-gray-900">Delete Account</h3>
                        <p class="text-sm text-gray-600 mb-3">Once you delete your account, there is no going back. Please be certain.</p>
                        <button class="bg-red-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-red-700 transition-all">
                            <i class="fas fa-trash mr-2"></i>Delete Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('../../1config/footer.php'); ?>