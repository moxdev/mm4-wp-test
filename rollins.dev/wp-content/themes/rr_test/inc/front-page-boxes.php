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
                        <?php if( $url ): ?>
                            <a href="<?php echo $url; ?>">
                        <?php endif;
                        if( $image ): ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php endif;
                        if( $text ): ?>
                            <span><?php echo $text; ?></span>
                        <?php endif;
                        if( $url ): ?>
                            </a>
                        <?php endif; ?>
                    </div>
            <?php endwhile; ?>
        </div>
    <?php endif;
}