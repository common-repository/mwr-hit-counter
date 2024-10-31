=== MWR HitCounter ===
Author URI: https://miwebrentable.com
Author: Daniel Martín Ochoa
Contributors: scriptsworks
Tags: hit counter, page counter, page visit, wordpress page view, page view count, post view count, easy counter, counter, single counter
Donate link: https://www.paypal.me/miwebrentable
Requires at least: 4.4.14
Tested up to: 5.2.2
Requires PHP: 7.0
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

- This plugin allows you to add a visitor 'text-plain' counter on your website easily.
- No IP tracking control, this plugin use cookie tracking.

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/mwr-hit-counter` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Open your theme and look for the eg. : "footer.php" where will to insert the counter.
Where "start=500" will begin counting, this values can be from 0 to n positives values. 
4. Or use the "shortcode" [mwrcounter start=500] into entries or pages.

= Template code is =

<code><?php echo do_shortcode( '[mwrcounter start=500]' ); ?></code> 

= Post code is =

<code>[mwrcounter start=500]</code>

== Frequently Asked Questions ==
= In which WordPress version this Plugin is compatible? =

It is compatible from 4.4.14 to 5.2.2 WordPress version.

= When I refresh o revisit my web the counter doesn't nothing. =

It's normal because this counter do use the cookie tracking for doesn't recount the visit.

= Cookie expiration time? =

30 days left.

== Screenshots ==
1. The screenshot corresponds to shortcode insert screenshot-1.png

== Changelog ==
= 0.1 =
* Initial release.

== Upgrade Notice ==
= 0.1 =
Added plugin support

