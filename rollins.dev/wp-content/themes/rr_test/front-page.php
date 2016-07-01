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

            endwhile; // End of the loop.

         function rr_test_front_page_carousel();  ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/flexslider.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider.js"></script>

<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>


<?php
get_footer();
