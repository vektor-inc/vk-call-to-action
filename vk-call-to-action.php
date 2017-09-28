<?php
/**
 * Plugin Name:     Vk Call To Action
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

 define( 'VK_CTA_URL', plugin_dir_url( __FILE__ ) );
 define( 'VK_CTA_DIR', plugin_dir_path( __FILE__ ) );

 if ( ! function_exists( 'veu_content_filter_state' ) )
 {
   function veu_content_filter_state(){
     return 'content';
   }
 }
 if ( ! function_exists( 'vkExUnit_get_short_name' ) )
 {
   function vkExUnit_get_short_name(){
    $short_name = apply_filters( 'vkExUnit_get_short_name_custom','VK' );
    return $short_name;
   }
 }
 if ( ! function_exists( 'vkExUnit_get_little_short_name' ) )
 {
   function vkExUnit_get_little_short_name(){
     $little_short_name = apply_filters( 'vkExUnit_get_little_short_name_custom','VK ExUnit' );
   	return $little_short_name;
   }
 }


require_once( 'inc/call-to-action-config.php' );
require_once( 'inc/vk-admin-config.php' );
