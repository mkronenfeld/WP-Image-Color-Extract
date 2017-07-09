=== Plugin Name ===
Contributors: mkronenfeld
Donate link: https://wp-styles.de
Tags: color extraction, image palette, extraction, swatches, image, images, color, colour, palette, swatches, image swatches, extract, dominant, dominance
Requires at least: 4.8
Tested up to: 4.8
Stable tag: 1.2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Gets your attachment's dominant colors.

== Description ==

= Features: =

* Extracts colors from an attachment image and saves it to the post meta.

== Installation ==

=== From within WordPress ===

1. Visit 'Plugins > Add New'
2. Search for 'WP Image Color Palette'
3. Activate WP Image Color Palette from your Plugins page.
Go to “after activation” below.

=== Manually ===

1. Upload the `wp-image-color-palette` to the `/wp-content/plugins/` directory
2. Activate the WP Image Color Palette plugin through the 'Plugins' menu in WordPress
3. Go to "after activation" below.

=== After activation ===

1. Visit the 'Image Color Palette' page in your 'Tools' menu.
2. Check the Debug information. If everything looks good, you are ready to off.

== Frequently Asked Questions ==

= Where can I find the colors in my post? =

Short: In the custom fields area.

WordPress has the ability to allow post authors to assign custom fields to a post. This extra information is known as meta-data. You will find your image swatches right there.

If you don't see the custom fields widget at all you have to enable it for that particular post or page. Go to the "Screen Options" button at the top of your page and check the Custom Fields box.

= Why are there no colors in my post? =

Short: Update your post (again).

The color palette for a post is generated the moment you save a post or page. So you have to save a post at least once, after the Plugin was activated.

A functionality for a bulk update is already on the roadmap.

= Why is post type XY not in the post-type list? =

Only post types with 'custom-fields' support can be selected. Check your post type with the [post_type_support](https://codex.wordpress.org/Function_Reference/post_type_supports) function.

== Changelog ==

= 1.2 =

Release Date: Juli 9th, 2017

* Enhancements
    * Admin users can change several plugin options in the admin area.
        * Post type, default: post
        * Precision, default: 20
        * Palette length, default: 3
        * Graphics library, default: gd
    * Improved FAQ section for the WordPress.org plugin page.


= 1.1 =

Release Date: July 7th, 2017

* Enhancements
	* Added the 'Image Color Palette' settings page to the 'Tools' menu.
