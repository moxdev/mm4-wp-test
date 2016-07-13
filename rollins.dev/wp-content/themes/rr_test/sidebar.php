<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rollins_Ridge
 */
?>

<aside id="secondary" class="widget-area" role="complementary">
    <?php  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) :
         endif;
    ?>

    <?php if ( is_page_template( 'page-amenities-page.php' ) ) {
        if ( function_exists('get_field') ) {
            $image = get_field( 'images' );
            ?>
            <div class="side-img-wrapper">
                <ul>
                    <li><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></li>
                    <li><img src="http://placehold.it/350x250" class="side-img"></li>
                    <li><img src="http://placehold.it/350x250" class="side-img"></li>
                    <li><img src="http://placehold.it/350x250" class="side-img"></li>
                </ul>
            </div>
            <?php
       } // func exists
    } // End ?>
</aside><!-- #secondary -->
