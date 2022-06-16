=== Loops & Logic ===
Stable tag: 3.0.0
Requires at least: 5.6
Tested up to: 6.0
Requires PHP: 7.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: loop, logic, template, query, content

Loops & Logic is a template system with content loops and conditions.

== Description ==

**Loops & Logic** is a toolset that allows you to have extensive control over the display of WordPress content & data on your site’s frontend for when your theme or builder doesn't have the options you need. This plugin gives you the power of custom PHP theme & builder module development using a simplified HTML-like syntax that will be familiar to any frontend developer.

=== Support ===

* Please see [our documentation site](https://loop.tangible.one/) for a complete description of plugin features.
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

= 2.4.4 =

Release Date: 2022-05-19

- Add variable type "math" to get/set variables for Math tag
- If tag: Add condition "query" to check if query variable exists
- Improve compatibility with Elementor v3 - Use register_controls() instead of deprecated _register_controls()
- Loop tag: Add shortcut for List loop type to pass comma-separated list with `<Loop items="..">`
- Paginator
  - Add option to scroll to top on page change
    - Set attribute `scroll_top=true`
    - Optionally, attribute `scroll_animate` can be "false", or a number for duration in milliseconds (default: 300)
  - Support ACF relationship field
  - Support `orderby=random` by passing list of IDs
- Template editor: Correctly save template category; Fix browser autocomplete changing checkbox values
- Template variable type: Pass attributes from Get tag as local variables

= 2.4.3 =

Release Date: 2022-05-12

- Add Mobile Detect module
  - Variable type "device"
    - `<Get device=type />` is mobile, tablet, or desktop
  - Device conditions
    - `<If device=mobile>`
    - `<If device=tablet>`
    - `<If device=desktop>`
    - `<If not device=desktop>`
- Attachment loop: Add field for file "size" and "type"
- Base loop
  - Filter by field - For `field_compare` parameter, use the same common comparison operators as If tag
  - Set default loop context on author and taxonomy term archive pages
- Format tag
  - Add case "lower" and "upper"
  - Consolidate case conversions: camel, kebab, snake, pascal
- Post loop: Taxonomy query
  - Add parameter `child_terms=true` to include child terms for hierarchical taxonomies
  - Improve `terms=current` to support taxonomy term loop as well as archive page
- Taxonomy term loop
  - Add alias "terms" for "include"
  - Field `posts` gets posts of any post type that belong to current term
- Test compatibility with WordPress 6.0

= 2.4.2 =

Release Date: 2022-05-03

- Improve compatibility with Local by Flywheel

= 2.4.1 =

Release Date: 2022-04-26

- ACF: Support sort/order posts in relationship field
- Base loop: Filter by multiple fields: field_2, field_value_2, ..
- Calendar loop
  - Support month given by name instead of number
  - Catch error thrown by Carbon date library if invalid date string is given
- Format tag
  - Support multiple replace values: replace_2, with_2, ..
  - Add format type "url_query" to encode URL query string
- If tag
  - Add shortcut for operator with value, such as `is=".."` instead of is `value=".."`
  - Support multiple operators with value, such as combining `more_than` and `less_than`
  - Add condition If variable="x" as shortcut for If check="{Get x}"
- Layout template type: Add location rule for matching URL route with wildcard support
- Math tag: Add modulo operator `%`
- Post loop
  - For auto-generated excerpt, wrap read more text in link to post
  - Query by multiple fields: custom_field_2, custom_field_value_2, ..
- Shortcode tag
  - Add attribute "debug" to inspect tag attributes passed
  - Improve use inside tag attribute
- Start media tags based on WP core shortcodes: Audio, Gallery, Playlist, Video
- Taxonomy term loop
  - Add query parameter children=true to get only child terms
  - Add field "posts" to get loop instance of posts that belong to current term
  - Taxonomy tag: Improve to loop current post's taxonomy terms;
  - Term tag: Shortcut to get a field from current taxonomy term
- Vidstack Player: Add required callback for permission check

= 2.4.0 =

Release Date: 2022-03-31

- Start HyperDB integration

= 2.3.9 =

Release Date: 2022-02-28

- Fix issue with backslash escape when saving precompiled CSS
- URL tag: Solve issue with getting URL query

= 2.3.7 =

Release Date: 2022-02-23

- Add Query variable type
  - Support multiple loops reusing same query
  - Set default query with variable name "default"
- Add Template Category for organizing templates
  - Add admin column and filter
  - Support import and export
- Template archive screen: Sortable post type
  - Improve table row display while being dragged/sorted
  - Disable drag/sort when Quick Edit panel is open

= 2.3.6 =

Release Date: 2022-02-16

- Loop tag: Ensure previous total is correctly set to 0 if last loop had no items
- Post loop: Add alias "tag" for taxonomy "post_tag"
- User loop: Add field "locale" for user's Language setting, with fallback to site locale
- User condition: Support multiple values for If user_role includes
- HTML module: Support passing empty string as attribute value, distinct from attribute without value
- Improve compatibility with PODS

= 2.3.5 =

Release Date: 2022-02-09

- Add ACF Time field type
- Default loop context
  - Handle case when called too early, for example before action 'wp'
  - Clone WP_Query object so it's not affected when posts rewind at the end of loop
- If tag: Add date conditionals (before/before_inclusive/after/after_inclusive) for check, field, and ACF date/date-time/time fields
- If and Field tag: Add "from_format" attribute to convert from non-standard date format
- Improve formatting ACF Date and Date/Time fields
- Improve template preview on page builder initial load
- Improve Beaver/Elementor/Gutenberg integrations
- Post loop: Pass optional attribute reverse=true to field "ancestors"

= 2.3.3 =

Release Date: 2022-02-08

- Add Async tag: Asynchronously render template via AJAX
- Add Cache tag: Cache rendered template using Transient API, which supports external object cache such as Memcached, Redis, or LiteSpeed
- Add Random tag: Generate a random number with attributes "from" (default: 1) and "to" (default: 99)
- Add Taxonomy and Term tags: Shortcut for current post's taxonomy/terms
- Add User tag: Shortcut for current user's field
- Ensure logic rules exist for all ACF field types
- Fix warning when admin menu does not include Tangible section for non-admin users
- Loop paginator
  - Refactor and consolidate common logic with async render
  - Remove deprecated method with Paginate tag
- Simplify Timer tag: start/check/stop
- Taxonomy term loop: Add field "link" to create an anchor tag with term title
- User loop: Optimize for getting current user; Add field "role" as alias of "roles"

= 2.3.2 =

Release Date: 2022-01-31

- Improve PHP 8 compatibility
- Template edit screen: Ensure post slug is passed to AJAX save
- Add Timer tag for profiling render time of template sections

= 2.3.0 =

Release Date: 2022-01-19

- Template location rules
  - Support include/exclude by taxonomy terms
  - Support extensible theme positions, such as header, footer, and parts
    - Add theme integrations: Astra, Kadence
    - Beaver Builder Theme is not designed for replacing theme positions
  - Start plugin integrations: Beaver Themer, Elementor Pro
- Template edit screen
  - Remove extra metaboxes added by WP core or other plugins/themes
  - Use AJAX save for the publish button, except for new or draft posts which require form submit and page reload
  - Ensure universal ID is passed when saving via AJAX
- Template script: Load *after* content, unlike styles which are loaded before content
- Template assets: Improve inline documentation
- Importer: Create new universal ID for duplicates in "keep both" mode
- Format tag: Correctly apply decimal=0 for format type "number"
- Post loop: Order by custom field is higher priority than normal "orderby" parameter

= 2.2.9 =

Release Date: 2021-12-22

- Universal ID - Unique and immutable across sites
  - Implement for all template types
  - Dynamic blocks in supported builders
  - Import/export
- Exporter: Save and restore settings from browser local storage
- Gutenberg integration: Disable links in blocks when inside editor preview (Elementor and Beaver already does this by default)
- Format tag: Correctly trim by length
- Form tag: Improving default content type action "create"; Add redirect on success/error
- Add ACF field type "Tangible Message" - Based on default message field, it renders a template instead of plain text
- Add build script to remove sourcemap comment from vendor libraries used for CodeMirror editor

= 2.2.7 =

Release Date: 2021-11-26

- Loop pagination: Automatically pass variables used in inner template
- Fix typo in importer message for "Layouts"
- Improve handling when block control config type is empty
- If tag: Improve handling when else node has no attributes property

= 2.2.4 =

Release Date: 2021-11-18

- Location field for Layout template: Improve updating selected rule parts on initial render
- Field tag: Add attribute "custom" to get custom field whose name overlaps with an alias, for example, "name"
- Start Form module - Work in progress
  - Add Form tag with local tags: BeforeSubmit, Success, Error, Mail
  - AJAX form handler
  - Form actions with dynamic variables and templates

= 2.2.3 =

Release Date: 2021-11-11

- Make template assets map available as Sass and JS variables (See "Assets" tab for documentation)
- Taxonomy term loop: Add query parameter "name" as alias of "include"
- Improve user access control for Template module
- New templates are assigned "universal ID", which is unique and immutable across sites

= 2.1.7 =

Release Date: 2021-11-02

- Add Exit and Catch tag
- Add variable types: local, sass, and js
- Template tag and shortcode: Pass attributes to template as local variables
- Update CodeMirror library: Relax lint rules for Sass "property-sort-order" and HTML "id-unique"
- Improve admin menu organization

= 2.1.6 =

Release Date: 2021-10-20

- Add menu loop type
- Calendar loop types
  - Add "year" loop
  - Add "locale" attribute to translate names
  - Add "format" attribute for field "date"
  - Add fields: name, short_name, month_with_zero, week, weekday

= 2.1.5 =

Release Date: 2021-10-07

- ACF fields: Add special subfields for getting field config, such as labels and choices
- Base loop: Improve handling of query argument "count"
- Template editor: Solve Gutenberg issue with keyboard shortcuts

= 2.1.4 =

Release Date: 2021-09-30

- Template editor improvements
  - Scope all CSS styles under wrapper class so editor can co-exist with other instances of CodeMirror
  - Implement line wrapping feature
  - Document common keyboard shortcuts: https://loop.tangible.one/overview/template-editor
  - Update CodeMirror add-ons and modes

= 2.1.3 =

Release Date: 2021-09-29

- Url tag: Support attribute "query" without value
- Improve welcome message; Add link to new documentation site
- Move WP Fusion integration from Pro plugin

= 2.1.2 =

Release Date: 2021-09-22

- Improve escaping outputs
- CodeMirror editor improvements: Update dependencies; Implement code folding add-on; Improve close tag add-on behavior

= 2.1.0 =

Release Date: 2021-09-15

- Importer: Ensure escape characters are preserved in template fields
- Base loop: Improve field_compare=exists to recognize loop instance

= 2.0.7 =

Release Date: 2021-09-07

- Initial release of Template Assets feature to import/export media attachments
- Clear compiled styles when Style field is empty
- Add loop type "acf_group" for ACF group field
- Add field "acf_key" to get field by ACF key
- Export: Add setting for package name
- Attachment loop: Add field "mime" for MIME type

= 2.0.5 =

Release Date: 2021-09-05

- Importer: Show links to newly created templates
- Loop default context: Improve checking if we're already inside current post content
- Beaver Builder integration: Improve checking if current post is being edited in the builder
- Add workaround to preserve escape characters in template fields

= 2.0.3 =

Release Date: 2021-09-01

- Chart tag
  - Add ticks options - percentage, before text, after text
  - Add tooltip values
  - Add data labels

= 2.0.2 =

Release Date: 2021-08-19

- Improve support for nested ACF flexible content and repeater fields
- Post Loop: Improve query by raw field value
- Base Loop: Improve filter/sort by field

= 2.0.0 =

Release Date: 2021-08-10

- Import/export templates
- Support third-party integrations
