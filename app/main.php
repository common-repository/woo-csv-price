<?php
    if ( ! defined( 'ABSPATH' ) ) exit;
    if ( ! current_user_can( 'administrator' ) )  exit;
    global $wpdb;
    if(isset($_POST["submit"]))
    {
        if (! isset( $_POST['arya_nonce'] ) || ! wp_verify_nonce( $_POST['arya_nonce'], 'arya_import_csv' ) && check_admin_referer( 'arya_import_csv', 'arya_nonce' ))
        { ?>
            <div class="alert alert-danger">
                <strong><?php _e('Sorry!', 'woo-csv-price'); ?></strong> <?php _e('Operation did not verify!', 'woo-csv-price'); ?>
            </div>
        <?php
            exit;
        } else {
            $fname = ( isset( $_FILES['file']['tmp_name'] ) ) ? $_FILES['file']['tmp_name'] : '';
            $fileSan = sanitize_file_name($fname);
            if ($fileSan && isset( $_FILES['file']['tmp_name']))
            {
                $file = $_FILES['file']['tmp_name'];
                $handle = fopen($file, "r");
                while(! feof($handle))
                {
                    $csv = fgetcsv($handle);
                    $id = (int)$csv[0];
                    $price = (int)$csv[2];
                    $query = $wpdb->prepare(
                        "UPDATE {$wpdb->prefix}postmeta
                        SET meta_value = '%s'
                        WHERE post_id = '%s'
                        AND meta_key = '_price'",
                        $price, $id);
                    $result = $wpdb->query($query);
                }
                $result++;
                if ($wpdb->print_error()) { ?>
                    <div class="alert alert-danger">
                        <strong><?php _e('Failed!', 'woo-csv-price'); ?></strong> <?php _e('Operation has failed!', 'woo-csv-price'); ?>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-success">
                        <strong><?php _e('Success!', 'woo-csv-price'); ?></strong> <?php _e('Price products are update successfully!', 'woo-csv-price'); ?>
                    </div>
                <?php }
                fclose($handle);
            }
        }
    }
?>