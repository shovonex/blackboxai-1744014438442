/**
 * OnlyFans Clone Theme - Main JavaScript File
 * Handles frontend interactions and AJAX requests
 */

document.addEventListener('DOMContentLoaded', function() {
    // Content Upload Form Handling
    const contentForm = document.getElementById('content-upload-form');
    if (contentForm) {
        contentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Uploading...
            `;

            // Simulate upload (replace with actual AJAX call)
            setTimeout(function() {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
                
                // Show success message
                const successMsg = document.createElement('div');
                successMsg.className = 'mt-4 p-4 bg-green-500 bg-opacity-20 text-green-400 rounded-lg';
                successMsg.textContent = 'Content uploaded successfully!';
                contentForm.parentNode.insertBefore(successMsg, contentForm.nextSibling);
                
                // Refresh content grid after 2 seconds
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
            }, 3000);
        });
    }

    // Payment Form Handling
    const paymentForm = document.getElementById('payment-form');
    if (paymentForm) {
        paymentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            const loadingEl = document.getElementById('payment-loading');
            const successEl = document.getElementById('payment-success');
            const errorEl = document.getElementById('payment-error');
            
            // Show loading state
            submitBtn.disabled = true;
            loadingEl.classList.remove('hidden');
            successEl.classList.add('hidden');
            errorEl.classList.add('hidden');

            // Prepare form data
            const formData = new FormData(this);
            
            // AJAX request (using WordPress AJAX)
            fetch(onlyfans_ajax.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(formData).toString()
            })
            .then(response => response.json())
            .then(data => {
                loadingEl.classList.add('hidden');
                
                if (data.success) {
                    successEl.classList.remove('hidden');
                    paymentForm.reset();
                } else {
                    errorEl.textContent = data.data.message || 'Payment failed. Please try again.';
                    errorEl.classList.remove('hidden');
                }
            })
            .catch(error => {
                loadingEl.classList.add('hidden');
                errorEl.textContent = 'Network error. Please check your connection.';
                errorEl.classList.remove('hidden');
            })
            .finally(() => {
                submitBtn.disabled = false;
            });
        });
    }

    // Dashboard Tabs
    const dashboardTabs = document.querySelectorAll('.dashboard-tab');
    if (dashboardTabs.length) {
        dashboardTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                dashboardTabs.forEach(t => t.classList.remove('bg-pink-500', 'text-white'));
                // Add active class to clicked tab
                this.classList.add('bg-pink-500', 'text-white');
                
                // Hide all tab content
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Show selected tab content
                const target = this.getAttribute('data-tab');
                document.getElementById(target).classList.remove('hidden');
            });
        });
    }
});