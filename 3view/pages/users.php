<?php 
ob_start();
session_start();
require_once('../../1config/connection.php');
require_once('../../1config/common_function.php');

emailNotSet(); // Check if user is logged in
last_activity(); // Update last activity time

$page_title = 'Users';

// Fetch all users
try {
    $users_query = mysqli_query($conn, "SELECT id, name, email, mobile FROM users ORDER BY id DESC");
    if(!$users_query) {
        throw new Exception('Failed to fetch users');
    }
} catch(Exception $e) {
    setToast('error', $e->getMessage());
}
?>

<?php require_once('../../1config/header.php'); ?>
<?php require_once('../../1config/sidebar.php'); ?>

<!-- Main Content -->
<div class="ml-64 p-8">
    <div class="max-w-7xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Users Management</h1>
                <p class="text-gray-600 mt-2">Manage all registered users</p>
            </div>
            <button class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-blue-700 transition-all shadow-md">
                <i class="fas fa-plus mr-2"></i>Add New User
            </button>
        </div>
        
        <!-- Users Table -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-purple-600 to-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold">ID</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Mobile</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php 
                        if(isset($users_query) && mysqli_num_rows($users_query) > 0):
                            while($user = mysqli_fetch_assoc($users_query)): 
                        ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900"><?php echo htmlspecialchars($user['id']); ?></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
                                        <?php echo strtoupper(substr($user['name'], 0, 1)); ?>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($user['name']); ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700"><?php echo htmlspecialchars($user['email']); ?></td>
                            <td class="px-6 py-4 text-sm text-gray-700"><?php echo htmlspecialchars($user['mobile']); ?></td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-700 p-2 hover:bg-blue-50 rounded transition-all" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-700 p-2 hover:bg-green-50 rounded transition-all" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-700 p-2 hover:bg-red-50 rounded transition-all" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            endwhile;
                        else:
                        ?>
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                <i class="fas fa-users text-4xl mb-2"></i>
                                <p>No users found</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="mt-6 flex justify-between items-center">
            <p class="text-sm text-gray-600">
                Showing <?php echo isset($users_query) ? mysqli_num_rows($users_query) : 0; ?> users
            </p>
            <div class="flex space-x-2">
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-chevron-left mr-2"></i>Previous
                </button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Next<i class="fas fa-chevron-right ml-2"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<?php require_once('../../1config/footer.php'); ?>