<div class="payment-form-container bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-white text-center">Complete Payment</h2>
    
    <form id="payment-form" class="space-y-4">
        <!-- Payment Method Selection -->
        <div>
            <label class="block text-white text-opacity-80 mb-2">Payment Method</label>
            <div class="grid grid-cols-2 gap-4">
                <label class="payment-method-option">
                    <input type="radio" name="payment_method" value="paypal" class="hidden peer" checked>
                    <div class="p-4 border border-white border-opacity-20 rounded-lg peer-checked:border-pink-500 peer-checked:bg-pink-500 peer-checked:bg-opacity-20 transition-all">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/paypal-icon.png" alt="PayPal" class="h-8 mx-auto mb-2">
                        <p class="text-white text-center">PayPal</p>
                    </div>
                </label>
                
                <label class="payment-method-option">
                    <input type="radio" name="payment_method" value="cashapp" class="hidden peer">
                    <div class="p-4 border border-white border-opacity-20 rounded-lg peer-checked:border-green-500 peer-checked:bg-green-500 peer-checked:bg-opacity-20 transition-all">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/cashapp-icon.png" alt="CashApp" class="h-8 mx-auto mb-2">
                        <p class="text-white text-center">CashApp</p>
                    </div>
                </label>
                
                <label class="payment-method-option">
                    <input type="radio" name="payment_method" value="chime" class="hidden peer">
                    <div class="p-4 border border-white border-opacity-20 rounded-lg peer-checked:border-purple-500 peer-checked:bg-purple-500 peer-checked:bg-opacity-20 transition-all">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/chime-icon.png" alt="Chime" class="h-8 mx-auto mb-2">
                        <p class="text-white text-center">Chime</p>
                    </div>
                </label>
                
                <label class="payment-method-option">
                    <input type="radio" name="payment_method" value="crypto" class="hidden peer">
                    <div class="p-4 border border-white border-opacity-20 rounded-lg peer-checked:border-yellow-500 peer-checked:bg-yellow-500 peer-checked:bg-opacity-20 transition-all">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/crypto-icon.png" alt="Crypto" class="h-8 mx-auto mb-2">
                        <p class="text-white text-center">Crypto</p>
                    </div>
                </label>
            </div>
        </div>

        <!-- Payment Details -->
        <div>
            <label for="payment_amount" class="block text-white text-opacity-80 mb-2">Amount</label>
            <div class="relative">
                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-white">$</span>
                <input type="number" id="payment_amount" name="payment_amount" 
                       class="w-full pl-8 p-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white" 
                       placeholder="0.00" step="0.01" min="5" required>
            </div>
        </div>

        <!-- Transaction ID/Proof -->
        <div>
            <label for="payment_proof" class="block text-white text-opacity-80 mb-2">Transaction ID/Proof</label>
            <input type="text" id="payment_proof" name="payment_proof" 
                   class="w-full p-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white" 
                   placeholder="Enter transaction ID or upload screenshot" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" 
                class="w-full bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300">
            Complete Payment
        </button>

        <!-- Loading Indicator -->
        <div id="payment-loading" class="hidden text-center py-4">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-white"></div>
            <p class="text-white mt-2">Processing your payment...</p>
        </div>
    </form>

    <!-- Payment Status Messages -->
    <div id="payment-success" class="hidden mt-4 p-4 bg-green-500 bg-opacity-20 text-green-400 rounded-lg text-center">
        Payment successful! Your content will be available shortly.
    </div>
    <div id="payment-error" class="hidden mt-4 p-4 bg-red-500 bg-opacity-20 text-red-400 rounded-lg text-center">
        Error processing payment. Please try again.
    </div>
</div>

<script>
// This would be enqueued in functions.php
jQuery(document).ready(function($) {
    $('#payment-form').on('submit', function(e) {
        e.preventDefault();
        
        // Show loading indicator
        $('#payment-loading').removeClass('hidden');
        $('#payment-success, #payment-error').addClass('hidden');
        
        // Simulate AJAX submission
        setTimeout(function() {
            $('#payment-loading').addClass('hidden');
            $('#payment-success').removeClass('hidden');
            $('#payment-form')[0].reset();
        }, 2000);
    });
});
</script>