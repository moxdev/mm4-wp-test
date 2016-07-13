<?php
/**
 * Rollins Ridge Theme Custom flexslider photogallery for page-photo-gallery-page.php.
 *
 * @package Rollins_Ridge
 */

/**
 * Adds a photo gallery if custom field exists.
 *
 */

function rr_test_photo_gallery() {
    if ( is_page_template( 'page-photo-gallery-page.php' ) ) {
        if( function_exists( 'get_field') ) {
            $images = get_field( 'images' );
                if( $images ): ?>
                <div id="slider" class="flexslider">
                    <ul class="slides">

                        <li data-thumb="<?php echo $image['url']; ?>">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <p><?php echo $image['caption']; ?></p>
                        </li>

                    </ul>
                </div>
                <?php endif;
        }
    }
}



/*
<!-- Place somewhere in the <body> of your page -->
<div class="flexslider">
  <ul class="slides">
    <li data-thumb="http://localhost:5757/wp-content/uploads/2016/07/Metro-1.png">
      <img src="http://localhost:5757/wp-content/uploads/2016/07/Metro-1.png" />
    </li>
    <li data-thumb="http://localhost:5757/wp-content/uploads/2016/07/Metro-1.png">
      <img src="http://localhost:5757/wp-content/uploads/2016/07/Metro-1.png" />
    </li>
    <li data-thumb="http://localhost:5757/wp-content/uploads/2016/07/Metro-1.png">
      <img src="http://localhost:5757/wp-content/uploads/2016/07/Metro-1.png" />
    </li>
    <li data-thumb="http://localhost:5757/wp-content/uploads/2016/07/Metro-1.png">
      <img src="http://localhost:5757/wp-content/uploads/2016/07/Metro-1.png" />
    </li>
  </ul>
</div>
*/