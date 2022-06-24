<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo ESTABLISHMENT. ' :: '.$this->title ?></title>
        <!-- base:css -->
        <link rel="stylesheet" href="<?php echo ASSET_DIR ?>vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="<?php echo ASSET_DIR ?>vendors/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo ASSET_DIR ?>vendors/css/vendor.bundle.base.css">
        <?php
        if (isset($this->csslibrary)) {
            echo "\n";
            foreach ($this->csslibrary as $css) {
                echo "\t" . '<link rel="stylesheet" href="' . ASSET_DIR . $css . '.css" type="text/css" />' . "\n";
            }
        }
        ?>
        <link rel="stylesheet" href="<?php echo ASSET_DIR ?>css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="<?php echo ASSET_DIR ?>images/favicon.png" />
        <script>window.siteurl = '<?php echo URL; ?>';</script>
    </head>
    <body>
        <div class="container-scroller d-flex">