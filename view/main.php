<?php require 'header.php'; ?>
    <?php
        require ARYACSV_DIR.'/main.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="main col-8">
                <div class="card">
                    <div class="card-body">
                        <form name="import" method="post" enctype="multipart/form-data">
                            <h5 class="card-title"><?php _e('Upload CSV file', 'woo-csv-price'); ?></h5>
                            <div class="form-group">
                                <label for="fileInput"><?php _e('CSV File (.csv)', 'woo-csv-price'); ?></label>
                                <input type="file" name="file" class="form-control" id="fileInput" />
                            </div>
                            <?php wp_nonce_field( 'arya_import_csv', 'arya_nonce' ); ?>
                            <button type="submit" name="submit" class="btn btn-primary"><?php _e('Upload', 'woo-csv-price'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="sidebar col-4">
                <div class="card hidden">
                    <div class="card-body">
                        <h5 class="card-title"><?php _e('Example CSV file', 'woo-csv-price'); ?></h5>
                        <p class="card-text text-justify">
                            <?php _e('Download example CSV file from below link and edit that data to your Woocommerce products.', 'woo-csv-price'); ?>
                        </p>
                        <a href="#" class="btn btn-success">
                            <?php _e('Download', 'woo-csv-price'); ?>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php _e('Export CSV', 'woo-csv-price'); ?></h5>
                        <p class="card-text text-justify">
                            <?php _e('You can export all published Woocommerce products CSV list, with id, name and price for edit & store.', 'woo-csv-price'); ?>
                        </p>
                        <a href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=arya-csv-export" class="btn btn-dark">
                            <?php _e('Export', 'woo-csv-price'); ?>
                        </a>
                    </div>
                </div>
                <div class="card hidden">
                    <div class="card-body">
                        <h5 class="card-title"><?php _e('FAQ', 'woo-csv-price'); ?></h5>
                        <p class="card-text text-justify">
                            <?php _e('Have a question? Just going to FAQ section in plugin page.', 'woo-csv-price'); ?>
                        </p>
                        <a href="#" class="btn btn-info">
                            <?php _e('FAQ', 'woo-csv-price'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>