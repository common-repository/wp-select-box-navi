<?php
/* 
Plugin Name: WP Select Box Navi
Version: 0.3
Plugin URI: http://wordpress.guesmo.com 
Description: This Plugin adds an select box navigatin for mobile devices to your WordPress template. Further more you get font size support for each device resoution.
Author: guesmo
Requires at least: 3.2
Tested up to: 3.5
Stable tag: 1.0
Licenc:  MIT
*/ 


//////////////////////////////////////////////////
// REGISTER & ENQUEUE TINYNAV JAVASCRIPT
//////////////////////////////////////////////////

function register_tiny() {                          // FUNCTION FOR REGISTER SCRIPT
   wp_register_script(                              // REGISTER SCRIPT "TINY"
     'tiny',                                        // REQUIRED: NAME FOR CUSTOM SCRIPT
     plugins_url('/js/tinynav.min.js', __FILE__),
      array('jquery'),                              // Optional: SCRIPT TYPE (jQuery)
      '1.0',                                        // Optional: VERSION
      false                                         // OPTIONAL: LOAD SCRIPT IN FOOTER
    );
}
add_action('init', 'register_tiny');                // ADD "TINY" JAVA SCRIPT REGISTRATION

function enqueue_my_scripts(){                          // FUNCTION FOR ENQUEUE SCRIPT
  wp_enqueue_script('tiny');                            // ENQUEUE SCRIPT "TINY"
}
add_action('wp_print_scripts', 'enqueue_my_scripts');   // ADD TINYNAV JAVA SCRIPT "TINY" TO "WP_PRINT_SCRIPTS"

function register_tinyopt() {                         // FUNCTION FOR REGISTER SCRIPT
   wp_register_script(                                // REGISTER SCRIPT "TINYOPT"
     'tinyopt',                                       // REQUIRED: NAME FOR CUSTOM SCRIPT
     plugins_url('/js/tinynav-option.js', __FILE__),
      array('jquery'),                                // Optional: SCRIPT TYPE (jQuery)
      '1.0',                                          // Optional: VERSION
      false                                           // OPTIONAL: LOAD SCRIPT IN FOOTER
    );
}
add_action('init', 'register_tinyopt');               // ADD "TINYOPT" JAVA SCRIPT REGISTRATION

function enqueue_tinyopt(){                           // FUNCTION FOR ENQUEUE SCRIPT
  wp_enqueue_script('tinyopt');                       // ENQUEUE SCRIPT
}
add_action('wp_print_scripts', 'enqueue_tinyopt');    // ADD TINYNAV JAVA SCRIPT "TINYOPT" TO "WP_PRINT_SCRIPTS"


//////////////////////////////////////////////////
// LOADING STYLESHEET FOR A THEME
//////////////////////////////////////////////////

function wpsbn_custom_styles()                                  // FUNCTION FOR CUSTOM STYLE
{ 
  wp_register_style( 'custom-style',                            // REGISTER CUSTOM STYLE
    get_content_url . 'plugins/wp_select_box_navi/style.css',   // GET STYLESHEET URL
    array(), 
    '20120208',                                                 // DEPENDENCIES AND VER NO.
    'all' );                                                    // MEDIA TYPE
  wp_enqueue_style( 'custom-style' );                           // ENQUEING STYLE
}
add_action('wp_enqueue_scripts', 'wpsbn_custom_styles');        // ADD CUSTOM STYLE


//////////////////////////////////////////////////
//  ADDING META TAG FOR USING SPECIFIC DEVICE 
//  FONT SIZE TO WP_HEAD
//////////////////////////////////////////////////

add_action('wp_head', 'wpsbn_add_meta');                                            // ADD META FOR FONT SIZE & SCALEABLE SITE TO WP_HEAD

function wpsbn_add_meta()                                                           // FUNCTION "WPSBN_ADD_META"
{
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';     // ECHO HTML META TAG
}


//////////////////////////////////////////////////
//  ADDING CSS CLASS "NAV" FOR WP_NAV_MENU
//////////////////////////////////////////////////

function wpsbn_remove_wp_nav_menu($pageMarkup) {
    return preg_replace(
        '~<ul id="([a-z0-9-_]+)" class="menu">~im',
        '<ul id="$1" class="nav wpsbn_navmenu">',
        $pageMarkup
    );
}

add_filter('wp_nav_menu', 'wpsbn_remove_wp_nav_menu');


//////////////////////////////////////////////////
//  ADDING CSS CLASS "NAV" FOR WP_PAGE_MENU
//////////////////////////////////////////////////

function wpsbn_remove_wp_page_menu($pageMarkup) {
    return preg_replace(
        '~<ul>~im',
        '<ul class="nav wpsbn_pagemenu">',
        $pageMarkup
    );
}
add_filter('wp_page_menu', 'wpsbn_remove_wp_page_menu');


//////////////////////////////////////////////////
//  ADDING CSS CLASS "NAV" FOR WP_LIST_PAGES
//////////////////////////////////////////////////

function wpsbn_remove_wp_list_pages($pageMarkup) {
    return '<ul class="nav wpsbn_pages">' . $pageMarkup . '</ul>';
}
add_filter('wp_list_pages', 'wpsbn_remove_wp_list_pages');


//////////////////////////////////////////////////
//  ADDING CSS CLASS "NAV" FOR WP_LIST_CATEGORIES
//////////////////////////////////////////////////

function wpsbn_remove_wp_list_categories($pageMarkup) {
    return '<ul class="nav wpsbn_cats">' . $pageMarkup . '</ul>';
}
add_filter('wp_list_categories', 'wpsbn_remove_wp_list_categories');


//////////////////////////////////////////////////
//  ADDING CSS CLASS "NAV" FOR BOOKMARKS
//////////////////////////////////////////////////

function wpsbn_remove_wp_list_bookmarks($pageMarkup) {
    return '<ul class="nav wpsbn_bookm">' . $pageMarkup . '</ul>';
}
add_filter('wp_list_bookmarks', 'wpsbn_remove_wp_list_bookmarks');

?>