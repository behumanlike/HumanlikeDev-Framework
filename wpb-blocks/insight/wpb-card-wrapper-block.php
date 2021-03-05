<?php 

/**
 * humanlikedev_card_wrapper_shortcode()
 * 
 * @documentation https://codex.wordpress.org/Function_Reference/add_shortcode/
 * @documentation https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_card_wrapper_shortcode' ) )){
	function humanlikedev_card_wrapper_shortcode( $atts, $content = null ){
	
		extract( 
			shortcode_atts( 
				array(
					'layout'           => 'normal',
					'custom_css_class' => ''
				), $atts 
			) 
		);

		if( 'normal' == $layout ){
		
			$output = '
				<div class="card justify-content-center flex-grow-1 '. $custom_css_class .'">
					<div class="card-body py-4 flex-grow-0">'. do_shortcode( $content ) .'</div>
				</div>
			';

		} elseif( 'large_padding' == $layout ){
		
			$output = '
				<div class="card justify-content-center p-lg-4 p-3 mb-lg-0 '. $custom_css_class .'">
					<div class="card-body py-3 flex-grow-0">'. do_shortcode( $content ) .'</div>
				</div>
			';

		}
		
		return $output;
		
	}
	add_shortcode( 'humanlikedev_card_wrapper', 'humanlikedev_card_wrapper_shortcode' );
}

/**
 * humanlikedev_card_wrapper_shortcode_vc()
 * 
 * @documentation https://kb.wpbakery.com/docs/inner-api/vc_map/
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_card_wrapper_shortcode_vc' ) )){

	function humanlikedev_card_wrapper_shortcode_vc(){
		vc_map( 
			array(
				"icon"                    => 'insight-vc-block',
				"name"                    => __( "Card Wrapper", 'humanlikedev' ),
				"base"                    => "humanlikedev_card_wrapper",
				"category"                => __( 'Insight WP Theme', 'humanlikedev' ),
				'as_parent'               => array( 'except' => 'humanlikedev_tabs_content' ),
				'content_element'         => true,
				'show_settings_on_create' => true,
				"js_view"                 => 'VcColumnView',
				"params"                  => array(
					array(
						"type"       => "dropdown",
						"heading"    => __( "Card Type", 'humanlikedev' ),
						"param_name" => "layout",
						"value"      => array(
							'Normal'  										=> 'normal',
							'Large Padding'  	   							=> 'large_padding',
						)
					),
				)
			) 
		);
	}
	add_action( 'vc_before_init', 'humanlikedev_card_wrapper_shortcode_vc' );
	
	if( class_exists( 'WPBakeryShortCodesContainer' ) ){
	    class WPBakeryShortCode_humanlikedev_card_wrapper extends WPBakeryShortCodesContainer {}
	}
	
}