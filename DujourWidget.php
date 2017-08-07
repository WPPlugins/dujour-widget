<?php
/*
Plugin Name: Dujour Widget
Plugin URI: http://dujourapp.com/
Description: Compartilhe seus looks do dia no seu blog usando o Dujour!
Version: 0.3
Author: Dujour
Author URI: http://dujourapp.com
License: GPLv2
*/

class DujourWidget extends WP_Widget
{
	private static $widgetCount = +0;

	function DujourWidget() {
		$widget_options = array(
		'classname'		=>		'dujour-widget',
		'description' 	=>		'Compartilhe seus looks do dia no seu blog usando o Dujour!'
		);
		
		parent::WP_Widget('dujourWPwidget', 'Looks Dujour', $widget_options);
	}

	public static function printDujourWidget( $username, $width, $darkBGColor ) { ?>
		<script src='<?php echo plugins_url('/javascripts/widget-1.1.js', __FILE__); ?>'></script>

		<div id="dujour_widget<?php echo self::$widgetCount ?>"
			 data-username="<?php echo $username ?>"
			 style="width:<?php echo $width ?>; 
			 		height:<?php echo $width ?>;" >
	 		<div style="width:100%; height:100%; ">
	 			<img src="<?php echo plugins_url('/images/DujourType100.png', __FILE__); ?>"
	 			     style="display: block;
						    margin: auto;" />
	 		</div>
	 		<script async type="text/javascript">insertDujourWidget(<?php echo self::$widgetCount++ ?>, "<?php echo $darkBGColor ?>");</script><br />
	 	</div>
		<?php 
	}
	
	function widget( $args, $instance ) {
		extract ( $args, EXTR_SKIP );
		$username = ( $instance['username'] ) ? $instance['username'] : 'dujour';
		$width = ( $instance['width'] ) ? $instance['width'] : '100%';
		$darkBGColor = ( $instance['darkBGColor'] ) ? $instance['darkBGColor'] : '';
		?>
		<?php echo $before_widget ?>
		<?php echo $this->printDujourWidget( $username, $width, $darkBGColor ); ?>
		<?php 
	}
	
	function form( $instance ) {

		// Setting default values or user-inserted values.
		if (isset( $instance['username'] )) {
			$username = esc_attr( $instance['username'] );
		} else {
			$username = '';
		}

		if (isset( $instance['width'] )) {
			$width = esc_attr( $instance['width'] );
		} else {
			$width = '';
		}

		if (isset( $instance['darkBGColor'] )) {
			$darkBGColor = esc_attr( $instance['darkBGColor'] );
		} else {
			$darkBGColor = '';
		}

		// Displaying the settings panel fields
		?>

		<div style="text-align:center; width:100%;">
			<img src="<?php echo plugins_url('/images/DujourType100.png', __FILE__); ?>" /><br />
			<br />
		</div>

		<label for="<?php echo $this->get_field_id('username'); ?>">
		Nome de usuário: 
		<input id="<?php echo $this->get_field_id('username'); ?>"
				name="<?php echo $this->get_field_name('username'); ?>"
				value="<?php echo $username; ?>" />
		</label>
		<br />

		<label for="<?php echo $this->get_field_id('width'); ?>">
		Largura do Widget (em pixels ou %): 
		<input id="<?php echo $this->get_field_id('width'); ?>"
				name="<?php echo $this->get_field_name('width'); ?>"
				value="<?php echo $width; ?>" />
		</label>
		<br />

		<label for="<?php echo $this->get_field_id('darkBGColor'); ?>">
		Pano de fundo: 
		<input name="<?php echo $this->get_field_name('darkBGColor'); ?>"
				type="checkbox"
				value="dark"
				<?php if($darkBGColor=="dark") echo "checked=checked"; ?>
			> Escuro
		</label>
		<br />

		<?php 
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$simple_pattern = "/^[0-9]+?(px|%)$/";
		$complex_pattern = "/^[0-9]+?(px|%|)$/";

		$new_width = strip_tags( $new_instance['width'] );

		// Validating user data
		$validWidth = preg_match($simple_pattern, $new_width);
		if (! $validWidth) {
			if (preg_match($complex_pattern, $new_width)) {
				$new_width .= 'px';
			} else {
				$new_width = '';
			}
		}

		// Submitting new settings
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['width'] = $new_width;
		$instance['darkBGColor'] = $new_instance['darkBGColor'];

		return $instance;
	}

	// Registering widget	
	public static function dujour_widget_init() {
		register_widget("DujourWidget");
}
	
}

add_action('widgets_init', array( 'DujourWidget', 'dujour_widget_init'));