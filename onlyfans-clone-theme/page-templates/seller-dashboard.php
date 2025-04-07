<?php
/**
 * Template Name: Seller Dashboard
 * Description: Payment management dashboard for sellers
 */

get_header();
?>

<div class="container mx-auto p-6">
    <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 shadow-2xl">
        <h1 class="text-3xl font-bold mb-8 text-white">Earnings Dashboard</h1>
        
        <!-- Earnings Summary -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-6 rounded-lg">
                <h3 class="text-white text-opacity-80 mb-2">Total Earnings</h3>
                <p class="text-3xl font-bold text-white">$4,200.00</p>
            </div>
            <div class="bg-gradient-to-r from-blue-500 to-indigo-500 p-6 rounded-lg">
                <h3 class="text-white text-opacity-80 mb-2">This Month</h3>
                <p class="text-3xl font-bold text-white">$1,250.00</p>
            </div>
            <div class="bg-gradient-to-r from-green-500 to-teal-500 p-6 rounded-lg">
                <h3 class="text-white text-opacity-80 mb-2">Pending</h3>
                <p class="text-3xl font-bold text-white">$320.00</p>
            </div>
            <div class="bg-gradient-to-r from-yellow-500 to-orange-500 p-6 rounded-lg">
                <h3 class="text-white text-opacity-80 mb-2">Withdrawn</h3>
                <p class="text-3xl font-bold text-white">$2,630.00</p>
            </div>
        </div>

        <!-- Payment Methods -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold mb-6 text-white">Payment Methods</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- PayPal Card -->
                <div class="bg-white bg-opacity-10 rounded-lg p-6 border border-white border-opacity-20">
                    <div class="flex items-center mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paypal-icon.png" alt="PayPal" class="w-10 h-10 mr-3">
                        <h3 class="text-xl font-bold text-white">PayPal</h3>
                    </div>
                    <p class="text-white mb-4">Balance: $1,200.00</p>
                    <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors duration-300">
                        Withdraw
                    </button>
                </div>
                
                <!-- CashApp Card -->
                <div class="bg-white bg-opacity-10 rounded-lg p-6 border border-white border-opacity-20">
                    <div class="flex items-center mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/cashapp-icon.png" alt="CashApp" class="w-10 h-10 mr-3">
                        <h3 class="text-xl font-bold text-white">CashApp</h3>
                    </div>
                    <p class="text-white mb-4">Balance: $850.00</p>
                    <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg transition-colors duration-300">
                        Withdraw
                    </button>
                </div>
                
                <!-- Chime Card -->
                <div class="bg-white bg-opacity-10 rounded-lg p-6 border border-white border-opacity-20">
                    <div class="flex items-center mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/chime-icon.png" alt="Chime" class="w-10 h-10 mr-3">
                        <h3 class="text-xl font-bold text-white">Chime</h3>
                    </div>
                    <p class="text-white mb-4">Balance: $1,100.00</p>
                    <button class="w-full bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded-lg transition-colors duration-300">
                        Withdraw
                    </button>
                </div>
                
                <!-- Crypto Card -->
                <div class="bg-white bg-opacity-10 rounded-lg p-6 border border-white border-opacity-20">
                    <div class="flex items-center mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/crypto-icon.png" alt="Crypto" class="w-10 h-10 mr-3">
                        <h3 class="text-xl font-bold text-white">Crypto</h3>
                    </div>
                    <p class="text-white mb-4">Balance: 0.05 BTC</p>
                    <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg transition-colors duration-300">
                        Withdraw
                    </button>
                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div>
            <h2 class="text-2xl font-semibold mb-6 text-white">Recent Transactions</h2>
            <div class="bg-white bg-opacity-5 rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="bg-white bg-opacity-10">
                            <th class="py-3 px-4 text-left text-white">Date</th>
                            <th class="py-3 px-4 text-left text-white">User</th>
                            <th class="py-3 px-4 text-left text-white">Amount</th>
                            <th class="py-3 px-4 text-left text-white">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-white border-opacity-10">
                            <td class="py-3 px-4 text-white">2023-06-15</td>
                            <td class="py-3 px-4 text-white">@premium_user</td>
                            <td class="py-3 px-4 text-green-400">$49.99</td>
                            <td class="py-3 px-4">
                                <span class="bg-green-500 bg-opacity-20 text-green-400 py-1 px-3 rounded-full text-sm">Completed</span>
                            </td>
                        </tr>
                        <!-- More transaction rows would go here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>