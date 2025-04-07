<?php
/**
 * OnlyFans Clone Theme - Core Functions
 */

// Theme setup
function onlyfans_theme_setup() {
    // Add theme supports
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('wp-block-styles');
    
    // Register menus
    register_nav_menus([
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ]);

    // Image sizes
    add_image_size('content-thumbnail', 400, 400, true);
    add_image_size('model-avatar', 200, 200, true);

    // Include payment handler
    require_once get_template_directory() . '/includes/payment-handler.php';

    // Register custom post types
    register_post_type('payment_request', [
        'labels' => [
            'name' => 'Payment Requests',
            'singular_name' => 'Payment Request'
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'supports' => ['title']
    ]);
}
add_action('after_setup_theme', 'onlyfans_theme_setup');

// Enqueue scripts and styles
function onlyfans_enqueue_assets() {
    // Tailwind CSS
    wp_enqueue_style('tailwind', 'https://cdn.tailwindcss.com');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    
    // Theme JS
    wp_enqueue_script('onlyfans-js', get_template_directory_uri() . '/js/main.js', ['jquery'], '1.0', true);
    
    // Localize script for AJAX
    wp_localize_script('onlyfans-js', 'onlyfans_ajax', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('onlyfans_nonce')
    ]);
}
add_action('wp_enqueue_scripts', 'onlyfans_enqueue_assets');

// Handle payment AJAX request
function handle_payment_request() {
    check_ajax_referer('onlyfans_nonce', 'nonce');
    
    $payment_method = sanitize_text_field($_POST['payment_method']);
    $amount = floatval($_POST['payment_amount']);
    $proof = sanitize_text_field($_POST['payment_proof']);
    
    if (empty($payment_method) || empty($amount) || empty($proof)) {
        wp_send_json_error(['message' => 'All fields are required']);
    }
    
    $payment_id = wp_insert_post([
        'post_type' => 'payment_request',
        'post_status' => 'pending',
        'post_title' => 'Payment from ' . get_current_user_id()
    ]);
    
    if ($payment_id) {
        update_post_meta($payment_id, '_payment_method', $payment_method);
        update_post_meta($payment_id, '_amount', $amount);
        update_post_meta($payment_id, '_proof', $proof);
        update_post_meta($payment_id, '_user_id', get_current_user_id());
        
        wp_send_json_success(['message' => 'Payment request submitted']);
    } else {
        wp_send_json_error(['message' => 'Payment processing failed']);
    }
}
add_action('wp_ajax_process_payment', 'handle_payment_request');
add_action('wp_ajax_nopriv_process_payment', 'handle_payment_request');

// Add custom user roles
function add_custom_roles() {
    add_role('model', 'Content Model', [
        'read' => true,
        'upload_files' => true,
        'edit_posts' => true,
        'delete_posts' => true
    ]);
    
    add_role('subscriber', 'Premium Subscriber', [
        'read' => true,
        'read_private_posts' => true
    ]);
    
    add_role('seller', 'Payment Manager', [
        'manage_options' => true,
        'edit_others_posts' => true
    ]);
}
add_action('init', 'add_custom_roles');