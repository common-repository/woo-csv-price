<?php
    if ( ! defined( 'ABSPATH' ) ) exit;
    // ARYACSV Dir
    defined('ARYACSV_DIR') or define('ARYACSV_DIR',  dirname(__FILE__).DIRECTORY_SEPARATOR);
    // ARYACSV Menu
    add_action( 'admin_menu', 'aryaCsvAddMenu' );
    function aryaCsvAddMenu() {
        add_menu_page(
            __('Woocommerce CSV Price', 'woo-csv-price'),
            __('CSV Price', 'woo-csv-price'),
            'administrator',
            'arya-csv-price',
            'ARYACsvMain',
            plugins_url('woo-csv-price').'/assets/img/icon.png',
            '55.7'
        );
        add_submenu_page(
            'arya-csv-price',
            __('Export CSV', 'woo-csv-price'),
            __('Export CSV', 'woo-csv-price'),
            'administrator',
            'arya-csv-export',
            'ARYACsvExport'
        );
    }
    // ARYACSV Create Page
    register_activation_hook(ARYACSV_DIR, 'aryaCsvAddPage');
    function aryaCsvAddPage() {
        global $wpdb;
        $my_post = array(
          'post_title'    => wp_strip_all_tags( 'arya-csv-export' ),
          'post_content'  => __("Please don't delete or edit this page! This page is working with Woocommerce CSV Price plugin.", 'woo-csv-price'),
          'post_status'   => 'publish',
          'post_author'   => 1,
          'post_type'     => 'page',
        );
        wp_insert_post( $my_post );
    }
    // ARYACSV Custom Page
    add_filter( 'page_template', 'aryaCSVPage' );
    function aryaCSVPage( $page_template )
    {
        if ( is_page( 'arya-csv-export' ) ) {
            $page_template = ARYACSV_DIR . '/csv.php';
        }
        return $page_template;
    }
    // ARYACSV Page
    $page_check = get_page_by_title('arya-csv-export');
    if(!isset($page_check->ID)){
        function aryaCsvPageNotFound() {
            ?>
            <div class="notice notice-error">
                <p>
                    <strong><?php _e('Woocommerce CSV Price', 'woo-csv-price'); ?></strong> <?php _e('can not find page with name and slug "arya-csv-export"! Please create this page or deactive and active plugin again!', 'woo-csv-price'); ?>
                </p>
            </div>
            <?php
        }
        add_action( 'admin_notices', 'aryaCsvPageNotFound' );
    }
    __('This plugin update and edit woocommerce products price with CSV file as easily.', 'woo-csv-price');    
    __('ARYA Creative Agency', 'woo-csv-price');    
    function ARYACsvMain() { require  ARYACSV_DIR.'../view/main.php'; }
    function ARYACsvExport() { require  ARYACSV_DIR.'../view/export.php'; }
?>