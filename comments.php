<?php // Do not delete these lines
  if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die (_t('Please do not load this page directly. Thanks!'));

    $oddcomment = 'alt';
?>

<!-- You can start editing here. -->
<div id="commentblock">

<?php if ( $comments_number = $post->comments->approved->count ): ?>
  <p id="comments">
    <?php
    if ( $comments_number == 0 ) {
      echo "No Responses to \"{$post->title}\"";
    } elseif ($comments_number == 1) {
      echo "One Response to \"{$post->title}\"";
    } else {
      echo "{$comments_number} Responses to \"{$post->title}\"";
    }
    ?>
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
        <a href="#comment-<?php echo $comment->id; ?>"><?php echo $comment->date; ?></a>
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
  $commenter = User::commenter(); ?>

<p id="respond">Leave a Reply</p>

  <?php $post->comment_form()->out(); ?>


</div>

<?php endif; ?>
