=== Override Post Title with First Content Heading ===
Contributors: westonruter
Tags: title, heading, h1, h2, seo
Tested up to: 2.9
Requires at least: 2.7
Stable tag: trunk

On a singular post/page, returns the contents of the first content H1 or H2
instead of the post_title as normally. Facilitates SEO.

== Description ==

<em>This plugin is developed at
<a href="http://www.shepherd-interactive.com/" title="Shepherd Interactive
specializes in web design and development in Portland, Oregon">Shepherd
Interactive</a> for the benefit of the community. <b>No support is available.
Please post any questions to the <a href="http://wordpress.org/tags/override-post-title-with-first-content-heading?forum_id=10">support
forum</a>.</b></em>

On a singular post/page, normally in The Loop <code>the_title()</code> returns 
<code>post_title</code>; if, however, this needs to be overridden so that a
custom content heading is displayed (i.e. for SEO purposes), then an
<code>h1</code> or <code>h2</code> element may be supplied at the beginning of
the <code>post_content</code> and the contents of this heading element
will be returned by <code>the_title()</code> instead of <code>post_title</code>.

From a technical perspective, the site title in the main header should be
an <code>h1</code> element and the page/post title should in an <code>h2</code>
element within an <code>article</code>, <a href="http://www.whatwg.org/specs/web-apps/current-work/multipage/sections.html#headings-and-sections">per HTML5</a>:

<blockquote>Sections may contain headings of any rank, but authors are strongly
encouraged to either use only <code>h1</code> elements, or to use elements of the
appropriate rank for the section's nesting level.</blockquote>

This is seen in the default WordPress theme and the HTML specifications. However,
SEO places higher priority on the contents of an <code>h1</code> element, so if
every page of a site has the exact same <code>h1</code> contents (the site name),
then search engines may not be as likely to rank the page based on the unique
contents of the <code>h2</code>. It has been <a href="http://blogsessive.com/blogging-tips/blog-seo-tips-titles/">suggested</a>
therefore that the <code>h1</code> and the <code>h2</code> elements be swapped,
so that the site title appears in an <code>h2</code> and so that the unique page
title appears in the <code>h1</code>. While the specifications don't prefer this
arrangement, it is not incorrect, also per HTML5:

<blockquote>Both of the documents are semantically identical and would produce the same
outline in compliant user agents.</blockquote>

So if different heading levels are semantically equivalent, and if search
engines really place that much importance on <code>h1</code>, then SEO wins.

In both cases, content section headings should be coded with <code>h3</code> and
below.

_Technical note:_ If the <code>$post</code> object is not passed into <code>the_title</code>
filter, then the page's <code>the_title()</code> must be called before every other
<code>the_title()</code> call <code>in_the_loop()</code>

== Changelog ==

= 2009-10-08: 0.2.5 =
* Restricting first content heading searched for to be either <code>h1</code> or <code>h2</code>, for SEO purposes.

= 2009-09-28: 0.2.4 =
* Initial release