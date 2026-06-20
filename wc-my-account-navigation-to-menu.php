<?php
/**
 * Plugin Name:       WooCommerce My Account navigation to menu
 * Plugin URI:        https://wordpress.org/plugins/wc-my-account-link-to-menu/
 * Description:       Ability to edit account page items using the WordPress menu.
 * Version:           1.0.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            MohammadJafar Khajeh
 * Author URI:        https://mjkhajeh.ir
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mj-wc-my-account-navigation-to-menu
 * Domain Path:       /languages
 * Requires Plugins:  woocommerce
 */

namespace MJ\WCMyAccountNavToMenu;

class Init {
	public static function init() {
		load_plugin_textdomain( 'mj-wc-my-account-navigation-to-menu', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

		register_nav_menu( 'my-account-menu', esc_html__( 'Account page menu', 'mj-wc-my-account-navigation-to-menu' ) );
	}

	public static function get_menu_items() {
		static $menu_items = null;
		if ( $menu_items === null && has_nav_menu( 'my-account-menu' ) ) {
			$locations = get_nav_menu_locations();
			$menu_obj  = wp_get_nav_menu_object( $locations['my-account-menu'] ?? 0 );
			$menu_items = $menu_obj ? wp_get_nav_menu_items( $menu_obj->name ) : [];
		}
		return $menu_items ?? [];
	}

	public static function menu_items( $items ) {
		$menu_items = self::get_menu_items();
		if ( ! empty( $menu_items ) ) {
			$items = [];
			foreach ( $menu_items as $item ) {
				$items[ $item->url ] = wp_strip_all_tags( $item->title );
			}
		}
		return $items;
	}

	public static function item_url( $url, $endpoint, $value, $permalink ) {
		static $my_account_permalink = '';
		if( !$my_account_permalink ) {
			$my_account_permalink = wc_get_page_permalink( 'myaccount' );
		}
		if( $permalink == $my_account_permalink ) {
			$menu_items = self::get_menu_items();
			$menu_links = wp_list_pluck( $menu_items, 'url' );
			if( in_array( $endpoint, $menu_links ) ) {
				$index = array_search( $endpoint, $menu_links );
				$url = $menu_links[$index];
			}
		}
		return $url;
	}
}
add_action( 'init', [Init::class, 'init'], 2 );
add_filter( 'woocommerce_account_menu_items', [Init::class, 'menu_items'] );
add_filter( 'woocommerce_get_endpoint_url', [Init::class, 'item_url'], 10, 4 );