=== Loops & Logic ===
Stable tag: 3.2.3
Requires at least: 6.0
Tested up to: 6.2
Requires PHP: 7.2
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: loop, logic, template, query, content

Loops & Logic is a template system with content loops and conditions.

== Description ==

**[Facebook group](https://www.facebook.com/groups/loopsandlogic) | [homepage](https://loopsandlogic.com/)| [docs](https://docs.loopsandlogic.com/) |[official support forum](https://discourse.tangible.one/)**

https://www.youtube.com/watch?v=-ObJkmhJ3qU

**Loops & Logic** is a toolset that allows you to have extensive control over the display of WordPress content & data on your site’s frontend for when your theme or builder doesn't have the options you need. This plugin gives you the power of custom PHP theme & builder module development using a simplified HTML-like syntax that will be familiar to any frontend developer.

=== Support ===

* Please see the [official plugin site](https://loopsandlogic.com/) and [the documentation](https://docs.loopsandlogic.com/) for a complete description of plugin features.
* Support & discussions can be found on [our forum located here](https://discourse.tangible.one/).

=== Key Features ===

* Use HTML templates with dynamic tags like Loop, Field, and If
* Use theme location rules to apply **custom templates** to post types, taxonomies & more (similar to Beaver Themer or Elementor Theme Builder)
* Easily **enqueue** your CSS stylesheets and Javascript anywhere using a visual location rule builder
* Seamlessly write your CSS directly in **SASS** without worrying about compilation
* Create query **loops** of any content type, such as: posts, pages, custom post types, attachments, users, taxonomies and terms
* Display built-in and custom **fields**
* Build **logic** to display things based on certain conditions, for example: creating a menu, with some links only for logged-in users, or by user role
* Create custom shortcodes to display anything from a custom field to an entire dynamic-data driven web page

=== Example Usage ===

At the core of L&L is the ability to quickly and elegantly loop through WordPress data like in this example of displaying a list of links to the three most recent posts

``<ul>
``  <Loop type=post count=3 orderby=date order=desc>
``    <li>
``      <a href="{Field url}"><Field title /></a>
``    </li>
``  </Loop>
``</ul>

Accomplishing the same thing in PHP is a little more complex:

``<?php
``$args = array(
``    'post_type' => 'post',
``    'posts_per_page' => 3,
``    'orderby' => 'date',
``    'order' => 'DESC',
``);
``$query = new WP_Query( '$args' ); ?>
``<?php if ( $query->have_posts() ) : ?>
``  <ul>
``    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
``
``      <li>
``        <a href="<?php the_permalink(); ?>">
``          <?php the_title(); ?>
``        </a>
``      </li>
``
``    <?php endwhile; ?>
``  </ul>
``<?php endif; ?>

It can be difficult to add PHP to your site if you're not a backend developer, but L&L is a breeze to include, even in a page builder layout.

Page builders like Gutenberg, Elementor, and Beaver Builder often have gaps in their capabilities that would normally require you to either develop a custom add-on or purchase a bloated add-on pack just to get the one element you need. L&L adds a template editor module directly to each builder so that you can simply describe what you want to display in L&L code and place it using the builder interface. You can even copy-paste your L&L code between page builders if you work with more than one! It's like having your own page builder addon factory.


=== Plugin & Theme Support ===

= Plugin Support: =

Loops & Logic works with the post types and custom fields added by most plugins, but plugins with special data structures like a custom tables or fields with data formats that need parsing require us to program explicit support.

= Bundled integrations: =

**✅ Advanced Custom Fields (ACF)**

L&L supports Advanced Custom Fields (ACF) field types in the core, allowing you to work with most of their field types out of the box! We also plan to support other WordPress custom field plugins such as Pods & Metabox in the future.

``<Loop acf_flexible=field_name>
``  <If field=layout value=layout_1>
``
``    Layout 1
``    <img src="{Field acf_image=field_name field=url}" />
``    <Field acf_editor=field_name />
``
``  <Else if field=layout value=layout_2 />
``
``    Layout 2
``    <Field acf_editor=field_name />
``    <img src="{Field acf_image=field_name field=url}" />
``
``  </If>
``</Loop>

**✅ Elementor**

Loops & Logic provides an Elementor widget that allows you to either write L&L code directly in the page builder widget or select from a pre-existing saved template. 

**✅ Gutenberg**

Loops & Logic provides a Gutenberg block that allows you to either write L&L code directly in the block builder block or select from a pre-existing saved template. 

**✅ Beaver Builder**

Loops & Logic provides a Beaver Builder module that allows you to either write L&L code directly in the page builder module or select from a pre-existing saved template. 

**✅ WP Grid Builder**

Loops & Logic provides a WP Grid Builder block that allows you to select from a pre-existing saved template to load in WP Grid Builder. 

**✅ WP Fusion**

The freely-included WP Fusion integration allows you to use conditional logic to protect or display different content based on a user's tags.

``<If user_field=wp_fusion_tags includes value="123">
``  User has tag ID 123
``<Else />
``  User does not have tag.
``</If>

We'll be rolling out premium addons for popular plugins in the coming months, so check out our website to see what's available!

= Premium addons coming soon: =

* WooCommerce
* Easy Digital Downloads
* Modern Tribe Events Calendar
* Gravity Forms
* LearnDash
* LifterLMS

= Theme Support: =

Everything will work with themes built according to WordPress standards.


== Installation ==

1. Install & activate in the admin: *Plugins -&gt; Add New -&gt; Upload Plugins*


== Changelog ==

= 3.2.3 =

Release Date: 2023-05-18

- Elementor integration: Enqueue dynamic module loader only when inside preview iframe
- Gutenberg integration: Improve compatibility with WP 6.2.1 - Remove the do_shortcode filter workaround that was necessary in previous versions; See https://core.trac.wordpress.org/ticket/58333#comment:59
- List and Map tag
  - Add Item/Key tag attribute "type" for value type: number, boolean, list, map
  - Improve Item/Key tag to treat single List or Map inside as direct value, instead of converting it to string
- Loop tag
  - Add attribute "post_type" as the recommended way to create a post loop with custom post type
    This makes it distinct from attribute "type", which creates an instance of a loop type (such as "post" or "user") and only falls back to post loop if there's no loop type with the same name
  - Fix pagination issue when attribute "tag" is used

= 3.2.1 =

Release Date: 2023-05-08

- Elementor integration: Ensure dynamic modules are activated inside preview iframe
- Format tag: Add attribute "remove_html" to remove HTML and make plain text
- Post loop: Improve sticky posts - Ensure "orderby" is only applied to non-sticky posts

= 3.2.0 =

Release Date: 2023-04-26

- Add JSON-LD tag: Create a map and generate script tag for [JSON Linked Data](https://json-ld.org/)
- Add Raw tag: Prevents parsing its inner content; Useful for passing literal text, such as HTML, to other tags and tag attributes
- Format tag
  - Add attributes "start_slash" and "end_slash" to add slash to URL or any string; Use "start_slash=false" and "end_slash=false" to remove slash; These can be combined in one tag
  - Improve support for replace/with text that includes HTML
- HTML module: Improve "tag-attributes" feature to support dynamic tags
- Layout template type
  - Add theme position "Document Head" for adding Meta tags, JSON-LD schema, or link tag to load CSS files
  - Add theme position "Document Foot" for adding script tag to load JavaScript files
- Loop tag
  - Add attribute "sticky" for improved sticky posts support
    - Without sticky set, treat sticky posts as normal posts; this is the default behavior (backward compatible)
    - With sticky=true, put sticky posts at the top
    - With sticky=false, exclude sticky posts
    - With sticky=only, include sticky posts only
  - Deprecate "ignore_sticky_posts" due to WP_Query applying it only on home page
- Query variable type: Support passing loop attributes via AJAX, such as for pagination
- Url tag
  - Add attribute "query=true" to include all query parameters in current URL
  - Add attributes "include" and "exclude" to selectively pass query parameters by name; Accepts comma-separated list for multiple names

= 3.1.9 =

Release Date: 2023-04-06

- Format: Improve handling of spaces for kebab and snake case
- If tag
  - Deprecate "is_not" in favor of "not", which supports all condition types and operators including "is"
  - Convert "is_not" to "not" and "is" for backward compatibility
- Improve PHP 8.2 compatibility
- Template post types: Fix drag-and-drop sort in post archive

= 3.1.8 =

Release Date: 2023-03-15

- Gutenberg integration
  - Improve content filter logic to protect template HTML
    - Ensure it applies only when inside do_blocks before do_shortcode
    - Handle edge case when a template shortcode is rendered inside an HTML attribute, and its content is a URL
    - Support block themes
  - Improve getting current post ID when inside builder

= 3.1.5 =

Release Date: 2023-03-02

- Calendar loop types
  - For week number, use Carbon method isoWeek() instead of format('W') which adds unnecessary prefix "0" (zero)
  - Month loop type: Ensure the "year" attribute is taken into consideration; Organize how the attributes "year", "quarter", "from" and "to" are handled
- Format tag: Add support for replace/with string that includes HTML
- Gutenberg integration
  - Improve content filter logic
  - Improve getting current post ID when inside builder
  - Improve workaround for Full-Site Editor bug
    https://github.com/WordPress/gutenberg/issues/46702
- Redirect tag: Disable when inside page builder, AJAX, or REST API
- Switch tag: Improve converting non-default "When" to "Else if"
- Template post types: Remove max-width to let editor take up the full available width
- WP Grid Builder integration: Improve compatibility for PHP version before 7.3

= 3.1.3 =

Release Date: 2023-02-27

- Add WP Grid Builder integration with Tangible Template widget
- Embed module: Use CSS feature for aspect-ratio, and remove padding-top workaround
- Gutenberg integration
  - Improve compatibility with Full-Site Editor, which is still in beta stage
  - Solve issue with shortcode inside pagination loop - Protect template HTML result from Gutenberg applying content filters, such as wptexturize and do_shortcode, after all blocks have been rendered
- Sass module: Solve issue with first style rule selector - Prevent compiler from adding @charset rule or "byte-order mark", which are only valid for CSS stylesheet as a file, when it detects a multibyte character within the Sass source code
- Table module: Make column filter case-insensitive, and add support for multibyte characters
- Template post types
  - Add support for user option "Disable the visual editor when writing" by preventing it from filtering template content
  - Improve generating template slug from title, including converting em dash to regular dash

= 3.1.2 =

Release Date: 2023-02-01

- Improve compatibility with PHP 8.2
- Loop: Improve logic to set current post as loop context for templates loaded inside shortcodes and builder-specific post loops, such as Elementor Loop Grid widget and Beaver Post Loop
- Plugin framework: Fix invalid hook name of ready action specific to module and version
- Post Loop: Add alias "current" (same as "today") for parameter "custom_date_field_value"
- Taxonomy Term Loop: Support multiple IDs for parameter "post"

= 3.1.1 =

Release Date: 2022-12-30

- Loop: Improve getting default loop context for search results archive
- Sass module
  - Upgrade compiler library to ScssPhp 1.11.0
    - Improve compatibility with newer CSS features such as variables, functions, selectors, media queries
    - Improve compatibility with PHP 7 and 8
    - Improve error handling
  - Remove Autoprefixer and its dependency CSS Parser; Internet Explorer no longer supported
  - Improve passing Sass variables - Handle all known value types to be compatible with new compiler
  - Convert any compiler error message to CSS comment
- JavaScript and Sass variable types: Make default value type "raw" (unquoted) instead of "string" (quoted)
- Template post types
  - Support any database table prefix including `wp_`
  - Remove default slug metabox in edit screen to support AJAX save; Related issue in WP core: [Can't change page permalink if slug metabox is removed](https://core.trac.wordpress.org/ticket/18523)

= 3.0.1 =

Release Date: 2022-10-05

- Calendar loop types
  - Improve handling in case invalid values are passed
  - Week loop: Correctly handle January which can have a week row that starts in the previous year
- HTML Hint: Add exception for Shortcode tag to allow self-closing raw tag
- Loop and Field tags: Get current post context inside builder preview when post status is other than publish
- Template editor: Improve compatibility with Beaver Builder's CSS

= 3.0.0 =

Release Date: 2022-09-13

- ACF select: Support looping field with single select value
- ACF image url field: Support size attribute
- Add feature module: Mermaid - Diagram library
- BaseLoop: Add `sort_date_format` parameter when using `sort_type=date`, to convert from date format to timestamp for sorting
- Compatibility with PHP 8.1
- Compatibility with WordPress 6.0.2
- Dynamic module assets loader - Support loading scripts and styles on demand, such as when page builders fetch and insert dynamic HTML
  - Implemented: Embed, Glider, Mermaid, Prism, Slider
  - In progress: Chart, Paginator, Table
- Gutenberg, Beaver, and Elementor integrations
  - Ensure current post as default loop context in page builder preview, saved templates, builder-specific loops, and template shortcode
  - Remove unused styles
- HTML module: Add special tag attribute named "tag-attributes" for dynamic attributes with or without value
- HTML Lint library
  - Fork and wrap in unique namespace to improve compatibility with Customizer and other plugins that may load a different version
  - Modify core/rules/tag-pair.ts to be case-sensitive for tag names
- Import & Export
  - Clear any cached field values such as compiled CSS when overwriting an existing template
  - Export all template types with orderby=menu_order, to ensure that location rules are applied in the correct priority
  - Support templates with post status other than publish: draft, future, pending, private (skip auto-draft, inherit/revision, and trash)
- If tag: user_role condition
  - Add alias "admin" for administrator
  - Support all common comparison operators
  - Support shortcut for includes: user_role=admin
- Layout template type
  - Correctly apply rule for "Singular - All post types"
  - Improve support for block themes
  - Render page content before head to support Meta tag in block themes
- List and Loop tag: Add attribute "items" to create a list from comma-separated values
- Logic module: Improve rules
  - For subject "list", add support for all common comparisons
  - Convert subject to list as expected: any_is, any_is_not, all_is, all_is_not, any_starts_with, all_starts_with, any_ends_with, all_ends_with
  - Convert value to list: in, not_in
  - For starts_with and ends_with, if subject is list then check first/last item
- Map tag: Add "type" attribute for Key tag to specify value type: number, boolean, string, map, list
- Script and Style template type: Add location rule "Nowhere" to disable loading
- Start Comment loop type
- Start developer docs: architecture, plan, design system
- Style template type: Load earlier at wp_head action priority 9, before default (10)
- Template archive view
  - Correctly show location rules for imported templates
  - Support select and copy template ID
- Template editor
  - Disable AJAX save until following issues are resolved
    - Form nonce expiring after one day
    - Reliably save the post slug
    - Show confirmation dialog on window unload only when necessary
  - Make editor full height of template
  - Remember and restore current tab in template edit screen
