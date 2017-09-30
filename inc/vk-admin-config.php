<?php

/*-------------------------------------------*/
/*  Load modules
/*-------------------------------------------*/
if ( ! class_exists( 'Vk_Admin' ) )
{
	require_once( 'vk-admin/class.vk-admin.php' );
}

global $vk_call_to_action_textdomain;
$vk_call_to_action_textdomain = 'vk-call-to-action';

/*-------------------------------------------*/
/*	$admin_pages の配列にいれる識別値は下記をコメントアウト解除すればブラウザのコンソールで確認出来る
/*-------------------------------------------*/

// add_action("admin_head", 'suffix2console');
// function suffix2console() {
// 		global $hook_suffix;
// 		if (is_user_logged_in()) {
// 				$str = "<script type=\"text/javascript\">console.log('%s')</script>";
// 				printf($str, $hook_suffix);
// 		}
// }

// $admin_pages = array( 'toplevel_page_vkExUnit_setting_page', 'vk-exunit_page_vkExUnit_main_setting' );
// Vk_Admin::admin_scripts( $admin_pages );

/*-------------------------------------------*/
/*	メニューに追加
/*-------------------------------------------*/
function vk_cta_add_custom_setting() {
	$custom_page = add_options_page(
		__( 'VK Call To Action setting', 'vk-call-to-action' ),		// Name of page
		_x( 'VK Call To Action', 'label in admin menu', 'vk-call-to-action' ),				// Label in menu
		'edit_theme_options',				// Capability required　このメニューページを閲覧・使用するために最低限必要なユーザーレベルまたはユーザーの種類と権限。
		'vk_cta_options',								// ユニークなこのサブメニューページの識別子
		'vk_cta_add_setting_pages'			// メニューページのコンテンツを出力する関数
	);
	if ( ! $custom_page )
	return;
}
add_action( 'admin_menu', 'vk_cta_add_custom_setting' );

/*-------------------------------------------*/
/*	Setting Page
/*-------------------------------------------*/
function vk_cta_add_setting_pages() {
	$get_page_title = __( 'VK Call To Action Setting', 'vk-call-to-action' );
	$get_logo_html = '';
	$get_menu_html = '<li><a href="#vk_cta_call_to_action">'.__( 'Call To Action Setting', 'vk-call-to-action' ).'</a></li>';
	if ( ! vk_cta_is_plugin_active( PLUGIN_PATH_EXUNIT ) ){
		if ( get_locale() == 'ja' ){
			$url = 'https://ex-unit.nagoya/ja/about';
		} else {
			$url = 'https://ex-unit.nagoya/about';
		}

		$get_menu_html .='<li><a href="'.$url.'" target="_blank">'.__( 'More powerfull functions', 'vk-call-to-action' ).'</a></li>';
	}

	Vk_Admin::admin_page_frame( $get_page_title, 'vk_cta_the_admin_body', $get_logo_html, $get_menu_html );
}

/*-------------------------------------------*/
/*	管理画面のメインエリアを出力
/*-------------------------------------------*/
function vk_cta_the_admin_body(){
	echo '<div id="vk_cta_call_to_action">';
	Vk_Call_To_Action::render_configPage();
	echo '</div>';
}
