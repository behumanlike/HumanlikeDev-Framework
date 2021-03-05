<?php 

/**
 * humanlikedev_breadcrumbs_shortcode()
 * 
 * @documentation https://codex.wordpress.org/Function_Reference/add_shortcode
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_breadcrumbs_shortcode' ) )){
	function humanlikedev_breadcrumbs_shortcode( $atts, $content = null ){
	
		extract( 
			shortcode_atts( 
				array(
					'custom_css_class' => ''
				), $atts 
			) 
		);

		return get_humanlikedev_breadcrumbs( 'breadcrumb p-0 bg-transparent ' . $custom_css_class );
		
	}
	add_shortcode( 'humanlikedev_breadcrumbs', 'humanlikedev_breadcrumbs_shortcode' );
}

/**
 * humanlikedev_breadcrumbs_shortcode_vc()
 * 
 * @documentation https://kb.wpbakery.com/docs/inner-api/vc_map/
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_breadcrumbs_shortcode_vc' ) )){
	function humanlikedev_breadcrumbs_shortcode_vc(){
		vc_map( 
			array(
				"icon"     => 'insight-vc-block',
				"name"     => __( "Breadcrumbs", 'humanlikedev' ),
				"base"     => "humanlikedev_breadcrumbs",
				"category" => __( 'Insight WP Theme', 'humanlikedev' ),
				"params"   => array(
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
	add_action( 'vc_before_init', 'humanlikedev_breadcrumbs_shortcode_vc' );
}