<?php
/*
Plugin Name: Override Post Title with First Content Heading
Plugin URI: 
Description: By default, <code>the_title()</code> in The Loop returns <code>post_title</code>; if, however, this needs to be overridden so that a custom heading is displayed, then an <code>h2</code> element may be supplied at the beginning of the <code>post_content</code> and this will replace the <code>post_title</code> in the content. This is going off of the assumption that the site title should be a <code>h1</code>, and the page title should be in an <code>h2</code>, and then page sections are <code>h3</code>'s and below.
Version: 0.2.4
Author: Weston Ruter
Author URI: http://weston.ruter.net/
Copyright: 2009, Weston Ruter, Shepherd Interactive. GPL 3 License.

*/

function override_post_title_with_first_content_heading($title, $_post = null){
	global $post, $wp_query, $content, $page, $pages;
	
	static $hasOverriden = false;
	if(is_singular() &&
	   !$hasOverriden &&
	   in_the_loop() &&
	   ( !is_object($_post) || $wp_query->post->ID == $_post->ID ) &&
	   $page == 1 &&
	   preg_match('{^\s*<h(\d)>(.+?)</h\1>\s*(.*)}s', $pages[0], $matches)
	){
		$title = $matches[2];
		$pages[0] = $matches[3];
		$hasOverriden = true;
	}
	return $title;
}
add_filter('the_title', 'override_post_title_with_first_content_heading', 10, 2);