<?php 

/**
 * humanlikedev_pricing_shortcode()
 * 
 * @documentation https://codex.wordpress.org/Function_Reference/add_shortcode/
 * @documentation https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_pricing_shortcode' ) )){
	function humanlikedev_pricing_shortcode( $atts, $content = null ){
	
		extract( 
			shortcode_atts( 
				array(
					'title'            => '',
					'price'            => '',
					'custom_css_class' => ''
				), $atts 
			) 
		);
		
		$output = '
			<div class="card py-3 px-xl-3 '. $custom_css_class .' pricing-card">
				<div class="card-body">
					<span class="h6 d-block">'. $title .'</span>
					<span class="d-block display-4 mb-2">'. $price .'</span>
					'. do_shortcode( $content ) .'
				</div>
			</div>
		';
		
		return $output;
		
	}
	add_shortcode( 'humanlikedev_pricing', 'humanlikedev_pricing_shortcode' );
}

/**
 * humanlikedev_pricing_shortcode_vc()
 * 
 * @documentation https://kb.wpbakery.com/docs/inner-api/vc_map/
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_pricing_shortcode_vc' ) )){
	function humanlikedev_pricing_shortcode_vc(){
		vc_map( 
			array(
				"icon"     => 'insight-vc-block',
				"name"     => __( "Pricing Cards", 'humanlikedev' ),
				"base"     => "humanlikedev_pricing",
				"category" => __( 'Insight WP Theme', 'humanlikedev' ),
				"params"   => array(
					array(
						"type"        => "textfield",
						"heading"     => __( "Card Title", 'humanlikedev' ),
						"param_name"  => "title",
						'holder'      => 'div'
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Card Price", 'humanlikedev' ),
						"param_name"  => "price",
						'holder'      => 'div'
					),
					array(
						"type"        => "textarea_html",
						"heading"     => __( "Block Content", 'humanlikedev' ),
						"param_name"  => "content"
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
	add_action( 'vc_before_init', 'humanlikedev_pricing_shortcode_vc' );
}