<?php
/**
 * Plugin Name:     VK Call To Action
 * Plugin URI:      https://ex-unit.nagoya
 * Description:     You can easily add Call To Action to posts & page & custom post types.
 * Author:          Vektor,Inc.
 * Author URI:      https://www.vektor-inc.co.jp
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
 define( 'PLUGIN_PATH_EXUNIT', 'vk-all-in-one-expantion-unit/vkExUnit.php' );
/*
 * If Active CTA by ExUnit
 */

 require_once( 'inc/template-tags/template-tags.php' );
 require_once( 'inc/template-tags/template-tags-veu.php' );

if ( ! veu_is_cta_active() ){
	function vk_cta_scripts(){
	  wp_enqueue_style( 'vk-cta-css', VK_CTA_URL.'/css/vk-call-to-action.css', array(), VK_CTA_VERSION );
		wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
	}
	add_action( 'wp_enqueue_scripts', 'vk_cta_scripts' );
}

require_once( 'inc/call-to-action-config.php');
require_once( 'inc/vk-admin-config.php' );
