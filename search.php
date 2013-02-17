<?php $theme->display('header'); ?>
<!-- search -->
<div id="content">

<?php $theme->display('l_sidebar'); ?>

<div id="contentleft">
<?php if ( count($posts) != 0 ): ?>
    <h3>Search Results for '<?php echo htmlspecialchars( $criteria ); ?>'</h3>
    <div class="post-info">Did you find what you wanted?</div>
    <?php foreach ( $posts as $post ): ?>
      <div id="post-<?php echo $post->id; ?>" class="<?php echo $post->statusname; ?>">
        <div class="post">
          <p class="post-date"><?php echo $post->pubdate_out; ?></p>
          <div class="post-info">
            <h2 class="post-title">
              <a href="<?php echo $post->permalink; ?>" title="<?php echo $post->title; ?>">
                <?php echo $post->title_out; ?>
              </a>
            </h2>

            Posted by <?php echo $post->author->username; ?>
            <?php if ( is_array( $post->tags ) ) : ?>
              <span class="entry-tags"><?php echo  ' tagged ' . $post->tags_out; ?></span>
            <?php endif; ?>
            <?php if ( $user ) : ?>
              <span class="entry-edit">
                <a href="<?php URL::out( 'admin', 'page=publish&slug=' . $post->slug); ?>" title="Edit post"> (edit)</a>
              </span>
            <?php endif; ?><br/>
              <?php if ( $post->content_type == Post::type('entry') ): ?>

                <span class="commentslink">
                  <a href="<?php echo $post->permalink; ?>" title="Comments on this post"><?php echo $post->comments->approved->count; ?>
                    <?php echo _n( 'Comment', 'Comments', $post->comments->approved->count ); ?>
                  </a>
                </span>
              <?php endif; ?>

          </div> <!-- post-info -->

          <div class="post-content">
            <?php
              echo $post->content_excerpt;
            ?>
          </div> <!-- .post-content -->
        </div> <!-- .post -->
      </div> <!-- #post-id .status -->
    <?php endforeach; ?>
    <div class="navigation">
      Page: <?php $theme->prev_page_link(); ?> <?php $theme->page_selector( null, array( 'leftSide' => 2, 'rightSide' => 2 ) ); ?> <?php $theme->next_page_link(); ?>
    </div>
  <?php else: ?>
    <h2 class="center">Not Found</h2>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>

</div> <!-- #contentleft -->


<?php $theme->display('r_sidebar'); ?>

</div> <!-- #content -->

<!-- /entry.single -->
<?php $theme->display('footer'); ?>
