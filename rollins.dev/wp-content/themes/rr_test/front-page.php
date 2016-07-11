<?php
/**
 * Template Name: Home Page
 *
 * The template for displaying the home page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rollins_Ridge
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

                if(function_exists( 'rr_test_front_page_boxes' ) ) {
                    rr_test_front_page_boxes();
                }

            endwhile; // End of the loop ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
