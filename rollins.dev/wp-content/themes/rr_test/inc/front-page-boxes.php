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
                $image = get_sub_field( 'highlight_image' );
                $url = get_sub_field( 'highlight_url' );
                $text = get_sub_field( 'highlight_text' ); ?>

                    <div class="highlight-box">
                        <a href="<?php echo $url; ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /><span><?php echo $text; ?></span></a>
                    </div>
            <?php endwhile; ?>

        </div><!-- highlight-boxes-wrapper -->
    <?php endif;
}