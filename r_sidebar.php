<!-- begin r_sidebar -->
<div id="r_sidebar">
    <div id="search">
    <!-- searchform -->
        <h3><?php _e('Find It'); ?></h3>
        <?php Plugins::act( 'theme_searchform_before' ); ?>
        <form id="searchform" method="get" action="<?php URL::out( 'display_search' ); ?>">
        <input type="text" name="criteria" value="<?php if ( isset( $criteria ) ) { echo "To search, type and hit enter..."; } ?>" id="f" onfocus="if (this.value == 'To search, type and hit enter...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'To search, type and hit enter...';}" />
        </form>
        <?php Plugins::act( 'theme_searchform_after' ); ?>
    <!-- /searchform -->
    </div>
</div>
<!-- end r_sidebar -->    