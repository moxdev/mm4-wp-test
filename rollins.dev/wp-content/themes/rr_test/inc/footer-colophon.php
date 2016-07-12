<?php
/**
 * Rollins Ridge Theme custom footer colophon for footer.php.
 *
 * @package Rollins_Ridge
 */

/**
 * Dynamically adds company info to the footer of every page.
 *
 */

function rr_test_footer_colophon() {
    $address = get_theme_mod( 'setting_address' );
    $city    = get_theme_mod( 'setting_city' );
    $state   = get_theme_mod( 'setting_state' );
    $zip     = get_theme_mod( 'setting_zipcode' );
    $phone   = get_theme_mod( 'setting_phone' );
    ?>
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
        <span>The owner and management company for Rollins Ridge residential and retail community comply fully with the provisions of Equal Housing Opportunity laws and nondiscrimination laws. The apartment homes have been designed and constructed to be accessible in accordance with those laws.</span>
    </div><?php
}
