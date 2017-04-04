<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
?>
<?php
/*
Plugin Name: Listingslab Plugin
Plugin URI: http://listingslab.com/listingslab-plugin
Description: Introduces functionality specific to the listingslab namespace. Including shortcodes and API endpoints
Author: Chris Dorward
Version: 5.8
Author URI: http://listingslab.com
*/

// [LL-Shortcode]
include 'shortcodes/LL-Shortcode.php';


add_action('admin_menu', 'listingslab_create_menu');
function listingslab_create_menu() {
	add_menu_page(
		'Listingslab Settings',
		'Listingslab',
		'administrator',
		__FILE__,
		'listingslab_plugin_settings_page',
		plugins_url('/images/iconMenu.png', __FILE__),
		0
	);
	add_action( 'admin_init', 'register_listingslab_variables' );
}
function register_listingslab_variables() {
	register_setting( 'listingslab-settings', 'listingslab_link_colour' );
}
function listingslab_plugin_settings_page() {
?>
	<div class="wrap">
	<h1><img
		alt="Listingslab"
		src="<?php print plugins_url('/images/listingslab.png', __FILE__) ?>"
		width="35"
		align="bottom"
	/> Listingslab Plugin</h1>
	<form method="post" action="options.php">
	    <?php settings_fields( 'listingslab-settings' ); ?>
	    <?php do_settings_sections( 'listingslab-settings' ); ?>
	    <table class="form-table">
	        <tr valign="top">
	        <th scope="row">Link colour</th>
	        <td>#
						<input
							type="text"
							name="listingslab_link_colour"
							value="<?php echo esc_attr( get_option('listingslab_link_colour') ); ?>"
						/>
					</td>
	        </tr>
	    </table>
	    <?php submit_button(); ?>
	</form>
	</div>
<?php } ?>
