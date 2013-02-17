<!-- entry.single -->
<?php include 'header.php'; ?>

<div id="content">

<?php include 'l_sidebar.php'; ?>

<div id="contentleft">

  <?php $single= true; ?>
  <?php include 'entry.php'; ?>

  <?php include_once( 'comments.php' ); ?>
</div> <!-- #contentleft -->

</div> <!-- wrap -->

<?php include 'footer.php'; ?>
<!-- /entry.single -->
