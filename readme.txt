=== Override Post Title with First Content Heading ===
Contributors: westonruter
Tags: search
Tested up to: 2.8
Requires at least: 2.7
Stable tag: trunk

By default, the_title() in The Loop returns post_title; if, however, this needs
to be overridden so that a custom heading is displayed, then an h2 element may be
supplied at the beginning of the post_content and this will replace the
post_title in the content.

== Description ==

By default, <code>the_title()</code> in The Loop returns <code>post_title</code>; if, however, this needs
to be overridden so that a custom heading is displayed, then an h2 element may be
supplied at the beginning of the <code>post_content</code> and this will replace the
<code>post_title</code> in the content. This is going off of the assumption that the site
title should be a <code>h1</code>, and the page title should be in an <code>h2</code>, and then page
sections are <code>h3</code>'s and below.

If the <code>$post</code> object is not passed into <code>the_title</code>
filter, then the page's <code>the_title()</code> must be called before every other
the_title() call in_the_loop()

== Changelog ==

= 2009-09-28: 0.2.4 =
* Initial release