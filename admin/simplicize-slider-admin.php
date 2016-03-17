<?php
/**
 * Back-end functionality of the plugin.
 *
 * @package 	Simplicize-slider
 * @subpackage 	Simplicize-slider/admin
 * @author 		Ardel John S. Biscaro
 */

/***
** Register Simplicize-Slider Custom Post Type
**/
function register_simplicize_slider_cpt() {
	$labels = array(
		'name' => 'Simplicize Slider',
		'singular_name' => 'Slider Item',
		'add_new' => 'Add New Item',
		'add_new_item' => 'Add New Slider Item',
		'edit' => 'Edit',
		'edit_item' => 'Edit Slider Item',
		'new_item' => 'New Slider Item',
		'view' => 'View',
		'view_item' => 'View Slider Item',
		'search_items' => 'Search Slider Item',
		'not_found' => 'No Slider Item Item found',
		'not_found_in_trash' => 'No Slider Item found in Trash',
		'parent' => 'Parent Slider Item'		
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 25,
		'supports' => array(
			'title',
			'thumbnail',
			'editor'
		),
		'menu_icon' => 'dashicons-format-gallery',
		'has_archive' => true
	);
	
    register_post_type( 'simplicize_slider', $args );
}
add_action( 'init', 'register_simplicize_slider_cpt' );

add_image_size('simplicize_slider-img-size', '544', '238', true);

//Setting Page
function simplicize_slider_settings() {
    add_submenu_page('edit.php?post_type=simplicize_slider', 'Simplicize Slider Settings', 'Settings', 'edit_posts', basename(__FILE__), 'simplicize_slider_settings_display');
	add_action('admin_init', 'simplicize_slider_settings_store');
}
add_action('admin_menu' , 'simplicize_slider_settings');  

function simplicize_slider_settings_store() {
	register_setting('simplicize_slider_settings', 'simplicize_slider_container_height');
    register_setting('simplicize_slider_settings', 'simplicize_slider_container_width');
    register_setting('simplicize_slider_settings', 'simplicize_slider_responsive');
	register_setting('simplicize_slider_settings', 'simplicize_slider_randomstart');
}

function simplicize_slider_settings_display() { ?>
	<div class="wrap">
        <h2>Simplicize Slider Settings</h2>
        <form method="post" action="options.php">
			<fieldset>
				<?php settings_fields('simplicize_slider_settings'); ?>
				
				<p>
					<label for="simplicize_slider_container_height">Container Height:</label> <br/>
					<input type="text" name="simplicize_slider_container_height" class="small-text" placeholder="238" value="<?php echo get_option('simplicize_slider_container_height'); ?>" /> 
				</p>
				
				<p>
					<label for="simplicize_slider_container_width">Container Width:</label> <br/>
					<input type="text" name="simplicize_slider_container_width" class="small-text" placeholder="544" value="<?php echo get_option('simplicize_slider_container_width'); ?>" /> 
				</p>
				
				<p>
					<label for="simplicize_slider_responsive">Responsive:</label><br/>
					<input name="simplicize_slider_responsive" type="radio" value="1" <?php checked( '1', get_option( 'simplicize_slider_responsive' ) ); ?> />
					<span class="description">True</span><br/>
					<input name="simplicize_slider_responsive" type="radio" value="0" <?php checked( '0', get_option( 'simplicize_slider_responsive' ) ); ?> />
					<span class="description">False</span>
				</p>
				
				<p>
					<label for="simplicize_slider_randomstart">Random start:</label><br/>
					<input name="simplicize_slider_randomstart" type="radio" value="1" <?php checked( '1', get_option( 'simplicize_slider_randomstart' ) ); ?> />
					<span class="description">True</span><br/>
					<input name="simplicize_slider_randomstart" type="radio" value="0" <?php checked( '0', get_option( 'simplicize_slider_randomstart' ) ); ?> />
					<span class="description">False</span>
				</p>
				
				<p class="submit"><input type="submit" class="button-primary" value="Save Changes" /></p>
			</fieldset>
	   </form>
    </div>
<?php } 