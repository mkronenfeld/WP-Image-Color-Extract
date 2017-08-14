=== WP Image Color Palette ===
Contributors: mkronenfeld
Donate link: https://wp-styles.de
Tags: color extraction, image palette, extraction, swatches, image, images, color, colour, palette, swatches, image swatches, extract, dominant, dominance
Requires at least: 4.8
Tested up to: 4.8
Stable tag: 1.4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Gets your attachment's dominant colors.

== Description ==

= Features: =

* Extracts colors from attachment images and saves it to the post meta.
* Several php functions to receive the post meta or extract data from images on the fly.

== PHP functions ==

You can find your image swatches in the post meta. There are two global php functions to get these values:

`wpip_get_post_thumbnail_color( int|WP_Post $post )`
Gets the main rgb color from a post.

`wpip_get_post_thumbnail_colors( int|WP_Post $post )`
Gets the main rgb colors from a post.

Advanced users may also like the following functions to extract the colors from any image they want in WordPress.

`wpip_get_image_color( string $file, int $precision = 20, int $palette_length = 5 )`
Gets the main color from an image.

`wpip_get_image_colors( string $file, int $precision = 20, int $palette_length = 5 )`
Gets the image color palette.

== Installation ==

1. Visit 'Plugins > Add New'
1. Search for 'WP Image Color Palette'
1. Activate WP Image Color Palette from your Plugins page.
1. Go to “after activation” below.

=== After activation ===

1. Visit the 'Image Color Palette' page in your 'Tools' menu.
1. Check the Debug information. If everything looks good, you are ready to off.

== Frequently Asked Questions ==

= How can I get the colors from my post? =

Short: `wpip_get_post_thumbnail_colors`

You can find a list of all functions in the PHP functions section.

= Why are there no colors in my post? =

Short: Update your post (again).

The color palette for a post is generated the moment you save a post or page. So you have to save a post at least once, after the Plugin was activated.

A functionality for a bulk update is already on the roadmap.

= Why is post type XY not in the post-type list? =

Only post types with 'custom-fields' support can be selected. Check your post type with the [post_type_support](https://codex.wordpress.org/Function_Reference/post_type_supports) function.

== Changelog ==

= 1.4 =

Release Date: August 14th, 2017

* Enhancements
    * New bulk 'Update the Image Color Palette' action for your selected post type.
    * Improved the debugging section in the admin area.
        * Traffic lights status
        * Human readable error list
        * Settings dump for error reports
    * Switched the precision input type in the Admin area into a select list.
        * Decreased the default precision from 20 to 25.
    * Added global functions to the README file.
    * Added plugin assets for the WordPress.org SVN.

= 1.3.1 =

Release Date: Juli 27th, 2017

* Bugfixes
    * Fixed the Palette length field in the admin area.

= 1.3 =

Release Date: Juli 22nd, 2017

* Enhancements
    * Now the Image Color Palette plugin is really able to save the whole image palette!
        * Added the global function `wpip_get_post_thumbnail_colors`
        * Check the FAQ for more useful functions.
    * Uninstalling the plugin now removes all of its post meta and plugin option.
    * Minor performance improvements due to better conditional loading behaviour.

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

== Upgrade Notice ==

Enhancements and minor bugfixes. See https://github.com/mkronenfeld/WP-Image-Color-Palette/releases