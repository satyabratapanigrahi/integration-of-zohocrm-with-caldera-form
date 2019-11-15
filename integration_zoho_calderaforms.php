<?php
/**
*Plugin Name: Integration Zoho Caldera Forms 
*Plugin URI:  https://zetamatic.com
*Description:The integration of Caldera Forms and Zoho plugin lets you add a new Zoho Processor to Caldera form. It automatically syncs data from your Caldera form to your Zoho CRM when the form is submitted.
*Version: 0.0.1
*Author: ZetaMatic
*Author URI: https://www.nettantra.net/
*License: GPLv2 or later
* @package integration-zoho-calderaforms
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'IZCF_PLUGIN_FILE' ) ) {
	define( 'IZCF_PLUGIN_FILE', __FILE__ );
}


// Define plugin version
define( 'IZCF_VERSION', '0.0.1' );


if ( ! version_compare( PHP_VERSION, '5.6', '>=' ) ) {
	add_action( 'admin_notices', 'iczf_fail_php_version' );
} else {
	// Include the IHCF class.
	require_once dirname( __FILE__ ) . '/inc/class-izcf.php';
}


/**
 * Admin notice for minimum PHP version.
 *
 * Warning when the site doesn't have the minimum required PHP version.
 *
 * @since 0.0.1
 *
 * @return void
 */
function iczf_fail_php_version() {

	if ( isset( $_GET['activate'] ) ) {
		unset( $_GET['activate'] );
	}

	/* translators: %s: PHP version */
	$message      = sprintf( esc_html__( 'Integration of Zoho and Caldera Forms requires PHP version %s+, plugin is currently NOT RUNNING.', 'integration-zoho-calderaforms' ), '5.6' );
	$html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}
