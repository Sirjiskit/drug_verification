
</div>
<!-- container-scroller -->

<!-- base:js -->
<script src="<?php echo ASSET_DIR ?>vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo ASSET_DIR ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?php echo ASSET_DIR ?>js/off-canvas.js"></script>
<script src="<?php echo ASSET_DIR ?>js/hoverable-collapse.js"></script>
<script src="<?php echo ASSET_DIR ?>vendors/bootbox/bootbox.all.min.js"></script>
<script src="<?php echo ASSET_DIR ?>js/template.js"></script>
<?php
if (isset($this->jslibrary)) {
    echo "\n";
    foreach ($this->jslibrary as $js) {
        echo "\t<script type='text/javascript' src='" . ASSET_DIR . $js . ".js'></script>\n";
    }
}
?>
<?php
if (isset($this->customlibrary)) {
    echo "\n";
    foreach ($this->customlibrary as $js) {
        echo "\t<script type='text/javascript' src='" . URL . "views/" . $js . ".js'></script>\n";
    }
}
?>
</body>

</html>