<!-- entry.single -->
<?php $theme->display('header'); ?>

<div id="content">

<?php $theme->display('l_sidebar'); ?>

<div id="contentleft">

  <?php
    $single= true;
    $theme->display('entry');
    $theme->display('comments');
  ?>

</div> <!-- #contentleft -->

</div> <!-- wrap -->

<?php $theme->display('footer'); ?>
<!-- /entry.single -->
