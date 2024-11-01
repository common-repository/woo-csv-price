<?php
    if ( ! defined( 'ABSPATH' ) ) exit;
    if ( ! current_user_can( 'administrator' ) )  exit;
    function aryaCSVFile(array &$array) {
        if (count($array) == 0) {
          return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');
        fputcsv($df, array_keys(reset($array)));
        foreach ($array as $row) {
           fputcsv($df, $row);
        }
        fclose($df);
        return ob_get_clean();
    }
 
    function aryaCSVDownload($filename) {
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2018 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");
    
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");
    }
    
    global $wpdb;
    
    if(isset($_POST["submit"])) {
        $query = "SELECT `{$wpdb->prefix}posts`.`ID`, `{$wpdb->prefix}posts`.`post_title`, `{$wpdb->prefix}postmeta`.`meta_value`
                FROM `{$wpdb->prefix}posts`, `{$wpdb->prefix}postmeta`
                WHERE `{$wpdb->prefix}posts`.`post_type` = 'product'
                AND `{$wpdb->prefix}posts`.`post_status` = 'publish'
                AND `{$wpdb->prefix}postmeta`.`post_id` = `{$wpdb->prefix}posts`.`ID`
                AND `{$wpdb->prefix}postmeta`.`meta_key` = '_price'";
        $products = $wpdb->get_results($query, ARRAY_A);

        aryaCSVDownload("data_export_" . date("Y-m-d") . ".csv");
        $aryaCSV = aryaCSVFile($products);
        echo esc_attr($aryaCSV);
    }