<footer class="bg-gray-800 py-12 mt-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo" class="h-10 mb-4">
                <p class="text-gray-400">The best platform for content creators to connect with their fans.</p>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Creators</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Become a Creator</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Creator Dashboard</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Pricing</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Legal</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Terms of Service</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">DMCA</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Connect</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-500">
            <p>&copy; <?php echo date('Y'); ?> OnlyFans Clone. All rights reserved.</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>