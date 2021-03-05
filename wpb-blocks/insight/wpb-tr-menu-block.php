<?php 

if(!( function_exists( 'humanlikedev_humanlikedev_nav_menu_shortcode' ) )){
	function humanlikedev_humanlikedev_nav_menu_shortcode( $atts, $content = null ){
	
		extract( 
			shortcode_atts( 
				array(
					'menu'					=> 'footer-navigation',
					'custom_css_class'		=> ''
				), $atts 
			) 
		);

		ob_start();

		the_widget( 'HumanlikeDev_Nav_Menu_Widget' , 'humanlikedev_nav_menu='.$menu );

		$output = ob_get_contents();
		ob_end_clean();
		
		return $output;
		
	}
	add_shortcode( 'humanlikedev_nav_menu', 'humanlikedev_humanlikedev_nav_menu_shortcode' );
}

/**
 * humanlikedev_humanlikedev_nav_menu_shortcode_vc()
 * 
 * @documentation https://kb.wpbakery.com/docs/inner-api/vc_map/
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_humanlikedev_nav_menu_shortcode_vc' ) )){
	function humanlikedev_humanlikedev_nav_menu_shortcode_vc(){
		vc_map( 
			array(
				"icon"     => 'insight-vc-block',
				"name"     => __( "Menu Widget", 'humanlikedev' ),
				"base"     => "humanlikedev_nav_menu",
				"category" => __( 'Insight WP Theme', 'humanlikedev' ),
				"params"   => array(
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Select a Menu", 'humanlikedev'),
						"param_name" => "menu",
						"value" => array_flip( humanlikedev_get_all_wordpress_menus() ),
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
	add_action( 'vc_before_init', 'humanlikedev_humanlikedev_nav_menu_shortcode_vc' );
}