<?php
$theme_options_data=DB::table('themeoptions')->get()->first();
?>
<div class="footerbar">
    <footer class="footer">
        <p class="mb-0"><?php echo e($theme_options_data->copyright??''); ?></p>
    </footer>
</div><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/common_pages/footer-nav.blade.php ENDPATH**/ ?>