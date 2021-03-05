<?php 

/**
 * humanlikedev_pricing_table_shortcode()
 * 
 * @documentation https://codex.wordpress.org/Function_Reference/add_shortcode/
 * @documentation https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_pricing_table_shortcode' ) )){
	function humanlikedev_pricing_table_shortcode( $atts, $content = null ){
	
		extract( 
			shortcode_atts( 
				array(
					'title'            => '',
					'price'            => '',
					'currency'         => '',
					'featured'         => '',
					'footer'           => '',
					'small'            => '',
					'custom_css_class' => ''
				), $atts 
			) 
		);
		
		$output = '
			<div class="d-flex '. $custom_css_class .'">
				<div class="card flex-fill text-center shadow-lg">
		';
			
		if( $featured ){	
			$output .= '<span class="badge badge-md badge-success position-absolute"><i class="material-icons">star</i> '. $featured .'</span>';
		}
		
		$output .= '		
					<div class="card-body py-4">
						<div class="mb-3">
						
							<span class="h4 d-block">'. $title .'</span>
							
							<div class="d-flex justify-content-center align-items-center">
								<span class="h5 mb-0">'. $currency .'</span>
								<span class="h1 display-3 mb-0">'. $price .'</span>
							</div>
							
							<span class="text-muted">'. $small .'</span>
							
						</div>
						
						'. do_shortcode( $content ) .'
						
					</div>
					
					<div class="card-footer">
						<span class="text-small">'. $footer .'</span>
					</div>
				
				</div>
			</div>
		';
		
		return $output;
		
	}
	add_shortcode( 'humanlikedev_pricing_table', 'humanlikedev_pricing_table_shortcode' );
}

/**
 * humanlikedev_pricing_table_shortcode_vc()
 * 
 * @documentation https://kb.wpbakery.com/docs/inner-api/vc_map/
 * @theme Insight
 * @since 1.0.0
 * @blame Moiz Farooq
 */
if(!( function_exists( 'humanlikedev_pricing_table_shortcode_vc' ) )){
	function humanlikedev_pricing_table_shortcode_vc(){
		vc_map( 
			array(
				"icon"     => 'insight-vc-block',
				"name"     => __( "Pricing Table", 'humanlikedev' ),
				"base"     => "humanlikedev_pricing_table",
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
						"type"        => "textfield",
						"heading"     => __( "Currency", 'humanlikedev' ),
						"param_name"  => "currency"
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Featured Text", 'humanlikedev' ),
						"param_name"  => "featured"
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Small Text", 'humanlikedev' ),
						"param_name"  => "small"
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Footer Text", 'humanlikedev' ),
						"param_name"  => "footer"
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
	add_action( 'vc_before_init', 'humanlikedev_pricing_table_shortcode_vc' );
}