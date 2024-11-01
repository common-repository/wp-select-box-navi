=== Plugin Name ===

Contributors:      guesmo
Plugin Name:       WP Select Box Navi
Plugin URI:        http://wordpress.guesmo.com/
Tags:              wp, select box, navi, navigation, responsive design, mobile devices, smartphone, tablet
Author URI:        http://www.wordpress.guesmo.com
Author:            guesmo
Donate link:       
Requires at least: 3.3.2
Tested up to:      3.5
Stable tag:        1.0
Version:           0.3
License: MIT

== Description ==
**Mobile Navigation**
This Plugin adds an select box navigation and font size support for mobile devices to your WordPress template.

**More Inforrmation**
For more information visit the [plugin website](http://wordpress.guesmo.com/ "check out the Plugin website").
http://wordpress.guesmo.com/

**Thanks to**
WP Select Box Navi uses [TinyNav.js](http://tinynav.viljamis.com/ "jQuery responsive navigation plugin"), the jQuery responsive navigation plugin. 

== Installation ==

1. **Make sure** your Theme using **wp_head();**! If not, add the function `<?php wp_head(); ?>` to the "header.php" file in your theme directory right before the closing `</head>` tag.
2. **Install the Plugin** from the dashboard or download it from wordpress.org and load the folder "wp_select_box_navi" in to the "http://www.my-blog.com/wp-content/plugins/" directory
3. **Activate the Plugin** from plugin menu in the WordPress dashboard
4. **Add the following CSS styles** to your Theme stylesheet:

	**Show or hide the default navigation**
    	
		.nav { display: none } /* hide default navi */

	-> or

		.nav { display: block } /* show default navi */


	**Show or hide the select box navigation**

		.tinynav { display: none } /* hide select box navi */
	
	-> or

		.tinynav { display: block } /* show select box navi */


  **With adding CSS Media Queries to your styles you can switch both navigations by display size**

	@media screen and (min-width: 1024px) /* show default if screen is larger than 1024px with */
	{ 
    	.nav { display: block }
    	.tinynav { display: none }
	}

	@media screen and (max-width: 1023px) /* show select box if screen is smaller than 1024px with */
	{
    	.nav { display: none }
    	.tinynav { display: block }
	} 

== Screenshots ==

== Changelog ==

**0.3** January 21, 2013 
* Supporting WordPress bookmarks
* Adding CSS for displaying select box individually by using different navigation types, like showing select box for pages and default for category navigation.
* Optimizing and cleaning code
* Adding code documentation for including custom styles and Java Script

**0.2** December 18, 2012 
* Supporting WordPress 3.5
* Cleaning up :D

== Frequently Asked Questions ==

Dont be to shy to ask @ wordpress@guesmo.com 
--------------------------------------------

No Questions jet