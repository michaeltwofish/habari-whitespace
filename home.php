<!-- home -->
<?php $theme->display('header'); ?>

<div id="content">

<?php $theme->display('l_sidebar'); ?>

<div id="contentleft">
  <?php
  $first= true;
  foreach ( $posts as $post ) {
    include 'entry.php';
    $first= false;
  }
  ?>

<div>
Page: <?php $theme->prev_page_link(); ?> <?php $theme->page_selector( null, array( 'leftSide' => 2, 'rightSide' => 2 ) ); ?> <?php $theme->next_page_link(); ?>
</div>

</div> <!-- #contentleft -->

<?php $theme->display('r_sidebar'); ?>

</div> <!-- #content -->

<?php $theme->display('footer'); ?>

<!-- home -->


