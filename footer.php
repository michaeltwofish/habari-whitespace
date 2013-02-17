<!-- begin footer.php -->

<div style="clear:both;"></div>

<div id="footer">

  <div class="footerleft">
  <h2>Feeds</h2>
  <ul>
  <li><a href="<?php URL::out( 'atom_feed', array( 'index' => '1' ) ); ?>">Entries</a></li>
  <li><a href="<?php URL::out( 'atom_feed_comments' ); ?>">Comments</a></li>
  </ul>
  </div> <!-- #footerleft -->

  <div class="footermiddle">
  <h2>Admin</h2>
  <ul>
    <?php
    if ( $user ): ?>
      <li><a href="<?php Site::out_url( 'admin' ); ?>" title="Admin area">Site Admin</a></li>
    <?php else: ?>
      <li><a href="<?php URL::out( 'user', array( 'page' => 'login' ) ); ?>" title="login">Login</a></li>
    <?php endif; ?>
    <li><a href="http://validator.w3.org/check?uri=referer">XHTML</a></li>
  </ul>
  </div> <!-- #footermiddle -->


  <div class="footerright">
  <h2>Credits</h2>
  <p>
  <a href="<?php Site::out_url( 'habari' ); ?>"><?php Options::out( 'title' ); ?></a>
  &bull; Powered by
  <a href="http://www.habariproject.com/" >Habari</a>
  </p>
  </div> <!-- #footerright -->

<?php $theme->footer(); ?>

</div> <!-- footer -->

</div> <!-- content -->

  </body>
</html> 
<!-- /footer -->
