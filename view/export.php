<?php require 'header.php'; ?>
    <?php
        require ARYACSV_DIR.'/export.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="main col-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php _e('Export CSV', 'woo-csv-price'); ?></h5>
                        <form name="export" action="<?php bloginfo('url'); ?>/arya-csv-export" method="post" enctype="multipart/form-data">
                            <p class="text-justify">
                                <?php _e('You can export all published Woocommerce products CSV list, with id, name and price for edit & store.', 'woo-csv-price'); ?>
                            </p>
                            <?php wp_nonce_field( 'arya_export_csv', 'arya_nonce' ); ?>
                            <button type="submit" name="submit" class="btn btn-primary"><?php _e('Download', 'woo-csv-price'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="sidebar col-4">
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