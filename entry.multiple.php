<?php $theme->display('header'); ?>

<div id="content">

<?php $theme->display('l_sidebar'); ?>

<!-- entry.multiple -->

  <div id="contentleft">

  <?php
  $single= false;
  foreach ( $posts as $post ) {
    $theme->display('entry');
    $first= false;
  }
  ?>
  <div>
    Page: <?php $theme->prev_page_link(); ?> <?php $theme->page_selector( null, array( 'leftSide' => 2, 'rightSide' => 2 ) ); ?> <?php $theme->next_page_link(); ?>
  </div> <!-- #navigation -->
</div> <!-- #content -->

<?php $theme->display('r_sidebar'); ?>
<!-- /entry.multiple -->
<?php $theme->display('footer'); ?>
