<!-- home -->
<?php include 'header.php'; ?>

<div id="content">

<?php include 'l_sidebar.php'; ?>

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

<?php include 'r_sidebar.php'; ?>

</div> <!-- #content -->

<?php include 'footer.php'; ?>

<!-- home -->


