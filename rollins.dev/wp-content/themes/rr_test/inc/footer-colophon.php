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

function rr_test_footer_colophon() {
    $address = get_theme_mod('setting_address');
    $city    = get_theme_mod('setting_city');
    $state   = get_theme_mod('setting_state');
    $zip     = get_theme_mod('setting_zipcode');
    $phone   = get_theme_mod('setting_phone');
    ?>
    <div class="site-info">

        <div class="footer-address-section">
            <div class="footer-message">
                <span>A residential and retail community on Rollins Avenue at Rockville Pike</span>
            </div>
            <div class="footer-address">
                <span><?php echo $address; ?></span>
                <span>, </span>
                <span><?php echo $city; ?></span>
                <span><?php echo $state; ?></span>
                <span><?php echo $zip; ?></span>
                <br>
                <span class="footer-phone"><?php echo $phone; ?></span>
            </div>
        </div>

        <div class="footer-equal-housing">
            <span>Stuff here</span>
        </div>
    </div><!-- .site-info -->
<?php }
