<?php
/**
 * Plugin Name:     VK Call To Action
 * Plugin URI:      https://ex-unit.nagoya
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
/*
 * If Active CTA by ExUnit
 */

function vk_cta_is_plugin_active( $plugin_path = '' )
{
	if ( function_exists('is_plugin_active') ) {
			return is_plugin_active( $plugin_path );
	} else {
			return in_array(
					$plugin_path,
					get_option('active_plugins')
			);
	}
}


function vk_cta_is_exunit_cta_active()
{
	$plugin_path = 'vk-all-in-one-expantion-unit/vkExUnit.php';
	if ( vk_cta_is_plugin_active( $plugin_path ) ){
		$veu_common_options = get_option( 'vkExUnit_common_options' );
		if ( isset( $veu_common_options['active_call_to_action'] ) && $veu_common_options['active_call_to_action'] ){
			return true;
		}
	}
}

if ( vk_cta_is_exunit_cta_active() ){
	function vk_cta_scripts(){
	  wp_enqueue_style( 'lvk-cta-css', VK_CTA_URL.'/css/vk-call-to-action.css', array(), VK_CTA_VERSION );
	}
	add_action( 'wp_enqueue_scripts', 'vk_cta_scripts' );
}

require_once( 'inc/template-tags/template-tags.php' );
require_once( 'inc/template-tags/template-tags-veu.php' );
require_once( 'inc/call-to-action-config.php');
require_once( 'inc/vk-admin-config.php' );
