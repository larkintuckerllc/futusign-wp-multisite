<?php
/**
 * The plugin bootstrap file
 *
 * @link             https://bitbucket.org/futusign/futusign-wp-multisite
 * @since            0.1.0
 * @package          futusign_multisite
 * @wordpress-plugin
 * Plugin Name:      futusign Multisite
 * Plugin URI:       https://www.futusign.com
 * Description:      Add futusign Multisite feature
 * Version:          0.1.0
 * Author:           John Tucker
 * Author URI:       https://github.com/larkintuckerllc
 * License:          Custom
 * License URI:      https://www.futusign.com/license
 * Text Domain:      futusign-multisite
 * Domain Path:      /languages
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}
// Use version 3.1 of the update checker.
require 'plugin-update-checker/plugin-update-checker.php';
if ( ! function_exists( 'get_plugins' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
foreach( get_plugins() as $plugin_slug=>$info ) {
	if ( preg_match( '/^(futusignz-[a-z]+)/', $plugin_slug, $matches ) ) {
  	$plugin_remote_path =
			'http://futusign-wordpress.s3-website-us-east-1.amazonaws.com/' . $matches[0] .'.json';
		$abs_plugin_file = trailingslashit(WP_PLUGIN_DIR).$plugin_slug;
		$MyUpdateChecker = new PluginUpdateChecker_3_1 (
			$plugin_remote_path,
			$abs_plugin_file
		);
	}
}
