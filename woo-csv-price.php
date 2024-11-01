<?php
    /**
    * @package woo-csv-price
    */
    /*
    Plugin Name: Woocommerce CSV Price
    Description: This plugin update and edit woocommerce products price with CSV file as easily.
    Version: 0.4
    Author: ARYA Creative Agency
    Author URI: https://arya.agency
    Text Domain: woo-csv-price
    Domain Path: /languages/
    License: GNU General Public License v3.0
    License URI: http://www.gnu.org/licenses/gpl-3.0.html
    */
    if ( ! defined( 'ABSPATH' ) ) exit;
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        require 'app/functions.php';
    } else {
        require 'app/not_detect.php';
    }
    // ARYACSV Langs
    function addLangs() {
        load_plugin_textdomain( 'woo-csv-price', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
    }
    add_action( 'init', 'addLangs' );
    add_action( 'plugins_loaded', 'addLangs' );
?>