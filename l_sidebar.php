<!-- begin l_sidebar -->
<div id="l_sidebar">

    <ul id="l_sidebarwidgeted">
    <li>
        <?php if (Plugins::is_loaded('recentcomments')) { ?>
        <h3>Recent Comments</h3>
        <?php echo RecentComments::theme_show_recentcomments($theme); } ?>
    </li>

    <!-- Lifted from Michael Bishop's mzingi theme -->
    <li>
        <h3>Recent Posts</h3>
        <ul>
        <?php foreach($recent_posts as $recent_post): ?>
            <?php
            echo '<li>';
            echo '<a href="' . $recent_post->permalink .'">' . $recent_post->title_out . '</a>';
            echo '</li>';
            ?>
        <?php endforeach; ?>					
        </ul>
    </li>
    </ul>
		
</div> <!-- l_sidebar -->
