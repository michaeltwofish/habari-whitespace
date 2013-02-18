<?php

/**
 * MyTheme is a custom Theme class for the Whitespace theme.
 *
 * @package Habari
 */

/**
 * @todo This stuff needs to move into the custom theme class:
 */

// Apply Format::autop() to post content...
Format::apply( 'autop', 'post_content_out' );
// Apply Format::autop() to comment content...
Format::apply( 'autop', 'comment_content_out' );
// Apply Format::tag_and_list() to post tags...
Format::apply( 'tag_and_list', 'post_tags_out' );
// Apply Format::nice_date() to post date...
Format::apply( 'nice_date', 'post_pubdate_out', 'F j, Y' );
// Apply Format::nice_date() to comment date...
Format::apply( 'nice_date', 'comment_date', 'F jS, Y' );

// Limit post length to 1 paragraph or 100 characters. As currently implemented
// in home.php and entry.multiple.php, the first post will be displayed in full
// and subsequent posts will be excerpts. search.php uses excerpts for all posts.
// Comment out this line to have full posts.
Format::apply_with_hook_params( 'more', 'post_content_excerpt', 'Read more', 100, 1 );

// We must tell Habari to use MyTheme as the custom theme class:
define( 'THEME_CLASS', 'MyTheme' );

/**
 * A custom theme for Whitespace output
 */
class MyTheme extends Theme
{

    /**
     * Add additional template variables to the template output.
     *
     *  You can assign additional output values in the template here, instead of
     *  having the PHP execute directly in the template.  The advantage is that
     *  you would easily be able to switch between template types (RawPHP/Smarty)
     *  without having to port code from one to the other.
     *
     *  You could use this area to provide "recent comments" data to the template,
     *  for instance.
     *
     *  Note that the variables added here should possibly *always* be added,
     *  especially 'user'.
     *
     *  Also, this function gets executed *after* regular data is assigned to the
     *  template.  So the values here, unless checked, will overwrite any existing
     *  values.
     */
    public function add_template_vars()
    {
        if( !$this->template_engine->assigned( 'pages' ) ) {
            $this->assign('pages', Posts::get( array( 'content_type' => 'page', 'status' => Post::status('published'), 'nolimit' => 1 ) ) );
        }
        if( !$this->template_engine->assigned( 'user' ) ) {
            $this->assign('user', User::identify() );
        }
        if( !$this->template_engine->assigned( 'page' ) ) {
            $this->assign('page', isset( $page ) ? $page : 1 );
        }
        if( !$this->template_engine->assigned( 'tags' ) ) {
            $tags= DB::get_results( 'SELECT * FROM ' . DB::table('tags') );
            $tags= array_filter($tags, create_function('$tag', 'return (Posts::count_by_tag($tag->tag_slug, "published") > 0);'));
            $this->assign('tags', $tags);
        }

        $this->assign( 'nav_pages', Posts::get( array( 'limit' => 5, 'content_type' => 'page', 'status' => 'published', 'orderby' => 'slug ASC' )));

	$this->assign( 'recent_posts', Posts::get(array ( 'limit' => 5, 'content_type' => 'entry', 'status' => 'published', 'orderby' => 'pubdate DESC' )));

        parent::add_template_vars();
    }

    public function action_form_comment( $form )
    {
      $form->cf_commenter->caption = 'Name';
      $form->cf_email->caption = 'Mail (will not be published)';
      $form->cf_url->caption = 'Website';
      $form->cf_content->caption = '';
      $form->cf_submit->caption = 'Submit Comment';
      // Swap the label and input
      $this->add_template( 'formcontrol_text', dirname(__FILE__).'/forms/formcontrol_text.php', true );
    }


}

?>
