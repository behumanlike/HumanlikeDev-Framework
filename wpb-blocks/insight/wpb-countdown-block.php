<?php 

/**
 * humanlikedev_countdown_shortcode()
 * 
 * @documentation https://codex.wordpress.org/Function_Reference/add_shortcode
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_countdown_shortcode' ) )){
	function humanlikedev_countdown_shortcode( $atts, $content = null ){
	
		extract( 
			shortcode_atts( 
				array(
					'custom_css_class' 		=> '',
					'countdown_date'	 	=> ''
				), $atts 
			) 
		);

		ob_start();

		echo '<div class="'. $custom_css_class .'">';

			echo '<span class="h1 d-block" data-countdown-date="'. $countdown_date .'"></span>';

		echo '</div>';

		$output = ob_get_contents();
		ob_end_clean();

		return $output;
		
	}
	add_shortcode( 'humanlikedev_countdown', 'humanlikedev_countdown_shortcode' );
}

/**
 * humanlikedev_countdown_shortcode_vc()
 * 
 * @documentation https://kb.wpbakery.com/docs/inner-api/vc_map/
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_countdown_shortcode_vc' ) )){
	function humanlikedev_countdown_shortcode_vc(){
		vc_map( 
			array(
				"icon"     => 'insight-vc-block',
				"name"     => __( "Countdown Timer", 'humanlikedev' ),
				"base"     => "humanlikedev_countdown",
				"category" => __( 'Insight WP Theme', 'humanlikedev' ),
				"params"   => array(
					array(
						"type"        => "textfield",
						"heading"     => __( "Countdown Date", 'humanlikedev' ),
						"param_name"  => "countdown_date",
						"description" => __( 'For example 2020-10-21', 'humanlikedev' ),
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Extra CSS Class Name", 'humanlikedev' ),
						"param_name"  => "custom_css_class",
						"description" => __( '<code>FOR DEVELOPERS</code> Add a class name and refer to it in custom CSS / JS', 'humanlikedev' ),
					),
				)
			) 
		);
	}
	add_action( 'vc_before_init', 'humanlikedev_countdown_shortcode_vc' );
}