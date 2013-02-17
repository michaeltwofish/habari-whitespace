<!-- page.single -->
<?php $theme->display('header'); ?>

<div id="content">

<?php $theme->display('l_sidebar'); ?>
        <div id="contentleft">
        <?php echo $post->content_out; ?>
</div>

<?php $theme->display('r_sidebar'); ?>

</div> <!-- wrap -->

<?php $theme->display('footer'); ?>
<!-- /page.single -->
