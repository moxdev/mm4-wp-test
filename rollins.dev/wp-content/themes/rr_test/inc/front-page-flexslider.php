<?php
/**
 * Rollins Ridge Theme Custom Carousel for front-page.php.
 *
 * @package Rollins_Ridge
 */

/**
 * Adds the home page image carousel if custom field gallery exists.
 *
 */

function rr_test_front_page_carousel() {
    if( is_page_template( 'front-page.php' ) ) {
        if( function_exists( 'get_field') ) {
            $images = get_field( 'images' );
                if( $images ): ?>
                <div id="slider" class="flexslider">
                    <ul class="slides">
                        <?php foreach( $images as $image ): ?>
                        <li>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <p><?php echo $image['caption']; ?></p>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
        <?php endif;
        }
    }
}
