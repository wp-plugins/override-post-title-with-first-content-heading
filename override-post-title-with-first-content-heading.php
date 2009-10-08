<?php
/*
Plugin Name: Override Post Title with First Content Heading
Plugin URI: http://wordpress.org/extend/plugins/override-post-title-with-first-content-heading/
Description: By default, <code>the_title()</code> in The Loop returns <code>post_title</code>; if, however, this needs to be overridden so that a custom heading is displayed (i.e. for SEO), then either an <code>h1</code> or <code>h2</code> element may be supplied at the beginning of the <code>post_content</code> and this will replace the <code>post_title</code> in the content. <em>Plugin developed at <a href="http://www.shepherd-interactive.com/" title="Shepherd Interactive specializes in web design and development in Portland, Oregon">Shepherd Interactive</a>.</em>
Version: 0.2.5
Author: Weston Ruter
Author URI: http://weston.ruter.net/
Copyright: 2009, Weston Ruter, Shepherd Interactive. GPL License.

GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

function override_post_title_with_first_content_heading($title, $_post = null){
	global $post, $wp_query, $content, $page, $pages;
	
	static $hasOverriden = false;
	if(is_singular() &&
	   !$hasOverriden &&
	   in_the_loop() &&
	   ( !is_object($_post) || $wp_query->post->ID == $_post->ID ) &&
	   $page == 1 &&
	   preg_match('{^\s*<h(1|2)>(.+?)</h\1>\s*(.*)}s', $pages[0], $matches)
	){
		$title = $matches[2];
		$pages[0] = $matches[3];
		$hasOverriden = true;
	}
	return $title;
}
add_filter('the_title', 'override_post_title_with_first_content_heading', 10, 2);
