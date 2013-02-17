<?php include 'header.php'; ?>

<div id="content">

<?php include 'l_sidebar.php'; ?>

<!-- entry.multiple -->

  <div id="contentleft">

  <?php
  $single= false;
  foreach ( $posts as $post ) {
    include 'entry.php';
    $first= false;
  }
  ?>
  <div>
    Page: <?php $theme->prev_page_link(); ?> <?php $theme->page_selector( null, array( 'leftSide' => 2, 'rightSide' => 2 ) ); ?> <?php $theme->next_page_link(); ?>
  </div> <!-- #navigation -->
</div> <!-- #content -->

<?php include 'r_sidebar.php'; ?>
<!-- /entry.multiple -->
<?php include 'footer.php'; ?>
