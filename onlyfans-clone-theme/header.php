<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-gray-900 text-white'); ?>>
<header class="sticky top-0 z-50 bg-gray-800 shadow-lg">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="<?php echo home_url(); ?>" class="flex items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="OnlyFans Clone" class="h-10">
                <span class="ml-2 text-2xl font-bold bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">OnlyFans</span>
            </a>
        </div>
        
        <button class="md:hidden mobile-menu-button p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        
        <nav class="hidden md:flex space-x-8">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'flex space-x-6',
                'link_before' => '<span class="hover:text-pink-400 transition">',
                'link_after' => '</span>'
            ]);
            ?>
        </nav>
        
        <div class="hidden md:flex items-center space-x-4">
            <a href="/login" class="px-4 py-2 rounded hover:bg-gray-700 transition">Sign In</a>
            <a href="/register" class="px-4 py-2 bg-pink-600 rounded hover:bg-pink-700 transition">Join Free</a>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu hidden fixed inset-0 bg-gray-900 z-50 p-4">
    <div class="flex justify-end">
        <button class="mobile-menu-close p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <div class="flex flex-col items-center justify-center h-full space-y-8">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'flex flex-col space-y-6 text-center',
            'link_before' => '<span class="text-2xl hover:text-pink-400 transition">',
            'link_after' => '</span>'
        ]);
        ?>
        <div class="flex space-x-4">
            <a href="/login" class="px-6 py-3 rounded hover:bg-gray-700 transition text-lg">Sign In</a>
            <a href="/register" class="px-6 py-3 bg-pink-600 rounded hover:bg-pink-700 transition text-lg">Join Free</a>
        </div>
    </div>
</div>