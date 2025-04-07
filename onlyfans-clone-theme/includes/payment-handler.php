<?php
/**
 * Payment Handler for OnlyFans Clone Theme
 * Processes manual payment verifications
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class OnlyFans_Payment_Handler {
    
    public function __construct() {
        add_action('admin_menu', [$this, 'add_admin_page']);
        add_action('admin_init', [$this, 'process_payment_verification']);
    }
    
    public function add_admin_page() {
        add_submenu_page(
            'edit.php?post_type=payment_request',
            'Payment Verifications',
            'Verifications',
            'manage_options',
            'payment-verifications',
            [$this, 'render_admin_page']
        );
    }
    
    public function render_admin_page() {
        ?>
        <div class="wrap">
            <h1>Payment Verifications</h1>
            
            <div class="card">
                <h2>Pending Verifications</h2>
                <?php
                $pending_payments = get_posts([
                    'post_type' => 'payment_request',
                    'post_status' => 'pending',
                    'posts_per_page' => -1
                ]);
                
                if ($pending_payments) {
                    echo '<table class="wp-list-table widefat fixed striped">';
                    echo '<thead><tr><th>ID</th><th>User</th><th>Method</th><th>Amount</th><th>Proof</th><th>Actions</th></tr></thead>';
                    echo '<tbody>';
                    
                    foreach ($pending_payments as $payment) {
                        $user = get_user_by('id', get_post_meta($payment->ID, '_user_id', true));
                        echo '<tr>';
                        echo '<td>' . $payment->ID . '</td>';
                        echo '<td>' . ($user ? $user->user_login : 'N/A') . '</td>';
                        echo '<td>' . get_post_meta($payment->ID, '_payment_method', true) . '</td>';
                        echo '<td>' . get_post_meta($payment->ID, '_amount', true) . '</td>';
                        echo '<td>' . get_post_meta($payment->ID, '_proof', true) . '</td>';
                        echo '<td><a href="?page=payment-verifications&verify=' . $payment->ID . '" class="button button-primary">Verify</a></td>';
                        echo '</tr>';
                    }
                    
                    echo '</tbody></table>';
                } else {
                    echo '<p>No pending payments to verify.</p>';
                }
                ?>
            </div>
        </div>
        <?php
    }
    
    public function process_payment_verification() {
        if (isset($_GET['verify']) && current_user_can('manage_options')) {
            $payment_id = intval($_GET['verify']);
            wp_update_post([
                'ID' => $payment_id,
                'post_status' => 'publish'
            ]);
            
            // Grant access to content
            $user_id = get_post_meta($payment_id, '_user_id', true);
            if ($user_id) {
                $user = new WP_User($user_id);
                $user->add_role('subscriber');
            }
            
            wp_redirect(admin_url('edit.php?post_type=payment_request&page=payment-verifications'));
            exit;
        }
    }
}

new OnlyFans_Payment_Handler();