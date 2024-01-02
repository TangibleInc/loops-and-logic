=== Loops & Logic ===
Stable tag: 4.0.0
Requires at least: 6.0
Tested up to: 6.4
Requires PHP: 7.4
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

= 4.0.0 =

Release Date: 2024-01-01

- [Documentation](https://docs.loopsandlogic.com/reference/template-system): Reference pages for developers and contributors, with technical details of how the codebase is organized.
- [Editor](https://docs.loopsandlogic.com/reference/template-system/editor/): New code editor based on CodeMirror 6 is enabled by default for template post types, Gutenberg, and ACF Template field. The old editor is still used for Elementor and Beaver Builder until integration is complete.
- Framework and Modules: Features have been organized into modules which can be independently built, documented, tested, and optionally published. This replaces the previous Plugin Framework and Interface module.
- [GitHub repository](https://github.com/tangibleinc/template-system): New home of the Template System source code and project, with better developer experience and social collaboration. Welcome to start new issues, pull requests, and discussions.
- Testing: Improve coverage of unit tests, and prepare foundation for end-to-end tests with headless browser and WordPress environment in Docker. This is an on-going effort to exercise and verify all features of the plugin.

Other improvements:

- ACF integration: Add Field tag attribute "acf_textarea" to apply formatting based on field settings
- Archive screen: Add bulk action to move selected posts to trash
- Assets edit screen: Improve documentation
- Atomic CSS: Generate CSS utility classes on demand.
  Similar to Tailwind, this feature uses a style engine called [UnoCSS](https://unocss.dev/) to generate CSS rules from utility classes found in an HTML template, every time it is saved. On the frontend, the generated styles are minified together, removing any redundant rules. Enable in plugin settings.
- Edit screen: Add Preview pane with auto-refresh
- Editor: Hyperlink extension - Add clickable link icon next to a valid URL; Improve color picker
- Import/Export
  - Add export rule to include/exclude template categories
  - Update PNG Compressor with better support for Firefox
  - Use compressed format (PNG) by default
- Show admin menu, edit screens, and template editor (Gutenberg, Elementor, Beaver) only to admins with `unfiltered_html` capability. On multisite installs, by default only network admins have this capability, not subsite admins.
- Update included libraries
  - HJSON, Select2, Chart.js, Mermaid, ..
  - Prism: Update library to 1.29.0 - Replace Clipboard.js with browser-native `navigator.clipboard`
