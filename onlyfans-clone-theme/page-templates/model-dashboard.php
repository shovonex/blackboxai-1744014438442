<?php
/**
 * Template Name: Model Dashboard
 * Description: Content creator dashboard for models
 */

get_header();
?>

<div class="container mx-auto p-6">
    <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl p-8 shadow-2xl">
        <h1 class="text-3xl font-bold mb-6 text-white">Your Content Dashboard</h1>
        
        <!-- Content Upload Form -->
        <div class="mb-8 p-6 bg-white bg-opacity-20 rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Upload New Content</h2>
            <form id="content-upload-form" class="space-y-4">
                <input type="text" placeholder="Content Title" class="w-full p-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30">
                <textarea placeholder="Description" class="w-full p-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30" rows="3"></textarea>
                <input type="file" class="w-full p-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30">
                <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300">
                    Upload Content
                </button>
            </form>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // Display user's content
            $args = [
                'post_type' => 'adult_content',
                'author' => get_current_user_id(),
                'posts_per_page' => -1
            ];
            $content = new WP_Query($args);
            
            if ($content->have_posts()) :
                while ($content->have_posts()) : $content->the_post();
                    ?>
                    <div class="content-card transform hover:scale-105 transition-transform duration-300">
                        <div class="relative overflow-hidden rounded-t-lg">
                            <?php the_post_thumbnail('content-thumbnail', ['class' => 'w-full h-48 object-cover']); ?>
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                                <h3 class="text-white font-bold text-lg"><?php the_title(); ?></h3>
                            </div>
                        </div>
                        <div class="p-4 bg-white bg-opacity-10 rounded-b-lg">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-white text-opacity-70"><?php echo get_the_date(); ?></span>
                                <span class="text-sm font-bold text-pink-400">$<?php echo get_field('price'); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-white text-opacity-70 col-span-full">No content uploaded yet.</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>