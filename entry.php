<h1>
    <?php
    if ( isset($single) && $single == true ) {
        echo $post->title_out;
    } else {
    ?>
        <a href="<?php echo $post->permalink; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title_out; ?></a>
    <?php
    }
    ?>
    </h1>

    <?php
    if ( isset($first) && $first == false ) {
        echo $post->content_excerpt;
    } else {
        echo $post->content_out;
    }
    ?>

<div class="postmeta">
<?php echo $post->pubdate_out; ?>
<?php echo  ' | ' ?>
<?php if ( is_array( $post->tags ) ) : ?>
<?php echo  'Filed under ' . $post->tags_out; ?>
<?php echo  ' | ' ?>
<?php endif; ?>
<a href="<?php echo $post->permalink; ?>" title="Comments on this post">
<?php echo $post->comments->approved->count; ?> <?php echo _n( 'Comment', 'Comments', $post->comments->approved->count ); ?>
</a>
<?php if ( $user ) : ?>
<a href="<?php URL::out( 'admin', 'page=publish&slug=' . $post->slug); ?>" title="Edit post"> (edit)</a>
<?php endif; ?><br/>
</div> <!-- postmeta -->