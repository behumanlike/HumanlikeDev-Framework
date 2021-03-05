<?php 

/**
 * humanlikedev_slider_shortcode()
 * 
 * @documentation https://codex.wordpress.org/Function_Reference/add_shortcode/
 * @documentation https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
 * @documentation https://developer.wordpress.org/reference/functions/wp_get_attachment_caption/
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_slider_shortcode' ) )){
	function humanlikedev_slider_shortcode( $atts, $content = null ){
	
		extract( 
			shortcode_atts( 
				array(
					'image'           => '',
					'custom_css_class' => ''
				), $atts 
			) 
		);
		
		$output          = '';
		$images_exploded = explode( ',', $image );
		
		if( is_array( $images_exploded ) ){
		
			$output = '<div class="slider-cards '. $custom_css_class .'" data-flickity="{ &quot;cellAlign&quot;: &quot;left&quot;, &quot;contain&quot;: true, &quot;imagesLoaded&quot;: true, &quot;wrapAround&quot;: true }">';
				
			foreach( $images_exploded as $slide ){
			
				$output .= '<div class="carousel-cell">'. wp_get_attachment_image( $slide, 'full', 0, array( 'class' => 'rounded' ) );
				
				if( $caption = wp_get_attachment_caption( $slide ) ){
					$output .= '<div class="card col-lg-5 col-xl-4 py-2 flex-fill"><div class="card-body">'. $caption .'</div></div>';
				}
						
				$output .= '</div>';
				
			}
				
			$output .= '</div>';
		
		}
		
		return $output;
		
	}
	add_shortcode( 'humanlikedev_slider', 'humanlikedev_slider_shortcode' );
}

/**
 * humanlikedev_slider_shortcode_vc()
 * 
 * @documentation https://kb.wpbakery.com/docs/inner-api/vc_map/
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_slider_shortcode_vc' ) )){
	function humanlikedev_slider_shortcode_vc(){
	
		vc_map( 
			array(
				"icon"     => 'insight-vc-block',
				"name"     => __( "Slider", 'humanlikedev' ),
				"base"     => "humanlikedev_slider",
				"category" => __( 'Insight WP Theme', 'humanlikedev' ),
				"params"   => array(
					array(
						"type"        => "attach_images",
						"heading"     => __( "Slider Images", 'humanlikedev' ),
						"param_name"  => "image"
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
	add_action( 'vc_before_init', 'humanlikedev_slider_shortcode_vc' );
}