<?php
    if ( ! defined( 'ABSPATH' ) ) exit;
    function aryaCsvWoocommerceNotDetect() {
        ?>
        <div class="notice notice-error">
            <p>
                <strong><?php _e('Woocommerce CSV Price', 'woo-csv-price'); ?></strong> <?php _e('is not detected Woocommerce! Please install or active Woocommerce plugin!', 'woo-csv-price'); ?>
            </p>
        </div>
        <?php
    }
    add_action( 'admin_notices', 'aryaCsvWoocommerceNotDetect' );
?>