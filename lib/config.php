<?php

namespace Roots\Sage\Config;

use Roots\Sage;

/**
 * Enable theme features
 */
add_theme_support('soil-clean-up');         // Enable clean up from Soil
add_theme_support('soil-relative-urls');    // Enable relative URLs from Soil
add_theme_support('soil-nice-search');      // Enable nice search from Soil
add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN

/**
 * Configuration values
 */
if (!defined('GOOGLE_ANALYTICS_ID')) {
  // Format: UA-XXXXX-Y (Note: Universal Analytics only)
  define('GOOGLE_ANALYTICS_ID', '');
}

if (!defined('WP_ENV')) {
  // Fallback if WP_ENV isn't defined in your WordPress config
  // Used in lib/assets.php to check for 'development' or 'production'
  define('WP_ENV', 'production');
}

/**
 * Define which pages shouldn't have the sidebar
 */
function display_sidebar() {
  static $display;

  if (!isset($display)) {
    $conditionalCheck = new Sage\ConditionalTagCheck(
      /**
       * Any of these conditional tags that return true won't show the sidebar.
       * You can also specify your own custom function as long as it returns a boolean.
       *
       * To use a function that accepts arguments, use the following format:
       *
       * ['function_name', ['arg1', 'arg2']]
       *
       * Note: The second element must be an array even if there's only 1 argument.
       *
       * Examples:
       *
       * 'is_single'
       * 'is_archive'
       * ['is_page', ['about-me']]
       * ['is_tax', ['flavor', 'mild']]
       * ['is_page_template', ['about.php']]
       * ['is_post_type_archive', [['foo', 'bar', 'baz']]]
       *
       */
      [
      'is_404',
      ]
    );

    $display = apply_filters('sage/display_sidebar', $conditionalCheck->result);
  }

  return $display;
}

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) {
  $content_width = 1140;
}
