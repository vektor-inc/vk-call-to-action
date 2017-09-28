<?php
/**
 * Plugin Name:     VK Call To Action
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     vk-call-to-action
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Vk_Call_To_Action
 */

$data = get_file_data( __FILE__, array( 'version' => 'Version' ) );

define( 'VK_CTA_URL', plugin_dir_url( __FILE__ ) );
define( 'VK_CTA_DIR', plugin_dir_path( __FILE__ ) );
define( 'VK_CTA_VERSION', $data['version'] );

function vk_cta_scripts(){
  wp_enqueue_style( 'lvk-cta-css', VK_CTA_URL.'/css/vk-call-to-action.css', array(), VK_CTA_VERSION );
}
add_action( 'wp_enqueue_scripts', 'vk_cta_scripts' );

require_once( 'inc/template-tags/template-tags.php' );
require_once( 'inc/template-tags/template-tags-veu.php' );
require_once( 'inc/call-to-action-config.php' );
require_once( 'inc/vk-admin-config.php' );
