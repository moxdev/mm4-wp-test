<?php
/**
 * Rollins Ridge Theme Custom Boxes for front-page.php.
 *
 * @package Rollins_Ridge
 */

/**
 * Adds the home page 3 boxes if custom field gallery exists.
 *
 */

function rr_test_front_page_boxes() {
    if( have_rows( 'highlight_boxes' ) ): ?>
        <div class="highlight-boxes-wrapper">
            <?php while( have_rows ( 'highlight_boxes' ) ): the_row();
                $image = get_sub_field( 'highlight_image' ); ?>

                    <div class="highlight-box">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>
            <?php endwhile; ?>

        </div><!-- highlight-boxes-wrapper -->
    <?php endif;
}