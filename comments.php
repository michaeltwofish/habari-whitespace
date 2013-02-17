<?php // Do not delete these lines
  if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die (_t('Please do not load this page directly. Thanks!'));

    $oddcomment = 'alt';
?>

<!-- You can start editing here. -->
<div id="commentblock">

<?php if ( $comments_number= $post->comments->approved->count ): ?>
  <p id="comments"><b>
    <?php
    if ( $comments_number == 0 ) {
      echo "No Responses to \"{$post->title}\"";
    } elseif ($comments_number == 1) {
      echo "One Response to \"{$post->title}\"";
    } else {
      echo "{$comments_number} Responses to \"{$post->title}\"";
    }
    ?>
  </b>
  </p>

  <ol class="commentlist">

  <?php foreach ( $post->comments->approved as $comment ): ?>

    <li class="<?php echo $oddcomment; ?>" id="comment-<?php echo $comment->id; ?>">
      <a href="<?php echo $comment->url; ?>" rel="external"><?php echo $comment->name; ?></a> on
      <?php
      if ($comment->comment_approved == '0') { 
        _e('<em>Your comment is awaiting moderation.</em>');
      }
      ?>
        <a href="#comment-<?php echo $comment->id; ?>" title=""><?php echo $comment->date; ?></a>
       <div class="commenttext">
      <?php echo $comment->content_out; ?>
       </div>

    </li>

  <?php /* Changes every other comment to a different class */
    $oddcomment == 'alt' ? $oddcomment = '' : $oddcomment = 'alt';
  ?>

  <?php endforeach; /* end for each comment */ ?>

  </ol>

<?php
else: // no approved comments 

   if ( $post->info->comments_disabled ) {
    _e('<p class="nocomments">Comments are closed.</p>');
   } else { // comments are closed
    _e('<p>There are currently no comments.</p>');
   }

endif; ?>


<?php
if ( !$post->info->comment_disabled ):
  $commenter= User::commenter(); ?>

<p id="respond">Leave a Reply</p>

<form action="<?php URL::out('submit_feedback', array('id'=>$post->id) ); ?>" method="post" id="commentform">
  <p>
    <input type="text" name="name" id="author" value="<?php echo $commenter['name']; ?>" size="22" tabindex="1" />
    <label for="author"><small>Name</small></label>
  </p>
  <p>
    <input type="text" name="email" id="email" value="<?php echo $commenter['email']; ?>" size="22" tabindex="2" />
    <label for="email"><small>Mail (will not be published) </small></label>
  </p>
  <p>
    <input type="text" name="url" id="url" value="<?php echo $commenter['url']; ?>" size="22" tabindex="3" />
    <label for="url"><small>Website</small></label>
  </p>
  <p>
    <textarea name="content" id="comment" cols="100" rows="10" tabindex="4"></textarea>
  </p>
  <p>
    <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
  </p>
</form>

</div>
    
<?php endif; ?>