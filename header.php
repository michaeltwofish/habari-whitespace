<!-- header -->
<!DOCTYPE html>

<html>

<head>
<title><?php 
	if( ( $request->display_entry || $request->display_page ) && isset( $post ) ) { 
		echo "{$post->title} - "; 
	} elseif( $request->display_entries_by_tag && isset( $posts ) ) {
		echo Controller::get_var('tag') . ' - ';
	}
	?> 
	<?php Options::out( 'title' ) ?>
</title>

<meta http-equiv="Content-Type" content="text/html" />
<meta name="generator" content="Habari" />
<link rel="edit" type="application/atom+xml" title="<?php Options::out( 'title' ); ?>" href="<?php URL::out( 'atompub_servicedocument' ); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php URL::out( 'atom_feed', array( 'index' => '1' ) ); ?>" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php URL::out( 'rsd' ); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php Site::out_url( 'theme' ); ?>/style.css" />
<?php $theme->header() ?>
</head>

<body>
<div id="wrap">
<div id="header">
<div id="headerleft">
<a href="<?php Site::out_url( 'habari' ); ?>"><?php Options::out( 'title' ); ?></a><br />
<?php Options::out( 'tagline' ); ?>
</div> <!-- #headerleft -->

<div id="headerright">
<ul>
<?php
// Menu tabs
foreach ( $nav_pages as $tab ) {
    $link = ucfirst($tab->slug);
    echo "<li><a href=\"{$tab->permalink}\" title=\"{$tab->title}\">{$link}</a></li>";
}
?>
</ul>
</div> <!-- #headerright -->
</div> <!-- #header -->

<div style="clear:both;"></div>

<div id="tagline">
<div id="taglineleft">
<p><?php echo date('l d F Y'); ?></p>
</div> <!-- taglineleft -->

<div id="taglineright">
<p>Here's a great place to put a random quote or random post title.</p>
</div> <!-- taglineright -->
</div> <!-- tagline -->

<!-- end header.php -->
