<?

/**
 * @wordpress-plugin
 * Plugin Name:       WP Custom Preview
 * Plugin URI:        https://github.com/colbyfayock/wp-custom-preview
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Colby Fayock
 * Author URI:        https://www.colbyfayock.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-custom-preview
 */

// If this file is called directly, abort.

// if ( !defined( 'WPINC' ) ) {
// 	die;
// }


// class WpCustomPreview {

//   public function __construct() {
//     $this->loadDependencies();
//   }

//   public function init() {
//     $wp_custom_preview_settings = new WpCustomPreviewSettings();
//     $wp_custom_preview_link = new WpCustomPreviewLink();
//   }

//   private function loadDependencies() {
//     require_once  'includes/wp-custom-preview-settings.php';
//     require_once  'includes/wp-custom-preview-link.php';
//   }

// }

// function loadWpCustomPreviewPlugin() {

//   if ( !is_admin() ) return;

//   $wp_custom_preview = new WpCustomPreview();
//   $wp_custom_preview->init();

// }

// loadWpCustomPreviewPlugin();

// add_filter( 'preview_post_link', function ( $link, \WP_Post $post ) {
//   echo 'test';
//     return 'asdf';

//  }, 10, 2 );