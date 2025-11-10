<!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-4 ml-64">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-600 text-sm">
                    &copy; <?php echo date('Y'); ?> Login System. All rights reserved.
                </div>
                <div class="flex space-x-6 mt-2 md:mt-0">
                    <a href="#" class="text-gray-600 hover:text-gray-900 text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 text-sm">Terms of Service</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 text-sm">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // Auto logout check every 30 seconds
        setInterval(function() {
            $.ajax({
                url: '../../2managment/check_session.php',
                type: 'POST',
                success: function(response) {
                    if(response.logged_out) {
                        window.location.href = '../../3view/login.php';
                    }
                }
            });
        }, 30000);
    </script>
</body>
</html>