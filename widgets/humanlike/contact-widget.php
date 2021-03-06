<?php

if(!( class_exists('HumanlikeDev_Contact_Widget') )){

	class HumanlikeDev_Contact_Widget extends WP_Widget {
	
		/**
		 * Sets up a new Navigation Menu widget instance.
		 *
		 * @since 3.0.0
		 */
		public function __construct() {
			$widget_ops = array(
				'description'                 => __( 'Add a contact widget to your sidebar.' ),
				'customize_selective_refresh' => true,
			);
			parent::__construct( 'humanlikedev_contact', __( 'HumanlikeDev Contact' ), $widget_ops );
		}
	
		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			
			$defaults = array( 
				'address' => '',
				'telephone' => '',
				'hours' => '',
				'email' => '',
			);
			$instance = wp_parse_args((array) $instance, $defaults);
			extract($instance);
			
			echo $args['before_widget'];
			
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}
		
			echo '<ul class="list-unstyled">';

				if ( !empty( $instance['address'] ) ) {
					echo '
						<li class="mb-3 d-flex">
							<svg class="icon" height="24px" version="1.1" viewbox="0 0 24 24" width="24px" xmlns="http://www.w3.org/2000/svg">
							<title>Icon For Marker#1</title>
							<g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
								<rect height="24" opacity="0" width="24" x="0" y="0"></rect>
								<path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"></path>
							</g></svg>
							<div class="ml-3">
								<span>'. $instance['address'] .'</span>
							</div>
						</li>
					';
				}

				if ( !empty( $instance['telephone'] ) ) {
					echo'
						<li class="mb-3 d-flex">
							<svg class="icon" height="24px" version="1.1" viewbox="0 0 24 24" width="24px" xmlns="http://www.w3.org/2000/svg">
							<title>Icon For Call#1</title>
							<g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
								<rect height="24" opacity="0" width="24" x="0" y="0"></rect>
								<path d="M11.914857,14.1427403 L14.1188827,11.9387145 C14.7276032,11.329994 14.8785122,10.4000511 14.4935235,9.63007378 L14.3686433,9.38031323 C13.9836546,8.61033591 14.1345636,7.680393 14.7432841,7.07167248 L17.4760882,4.33886839 C17.6713503,4.14360624 17.9879328,4.14360624 18.183195,4.33886839 C18.2211956,4.37686904 18.2528214,4.42074752 18.2768552,4.46881498 L19.3808309,6.67676638 C20.2253855,8.3658756 19.8943345,10.4059034 18.5589765,11.7412615 L12.560151,17.740087 C11.1066115,19.1936265 8.95659008,19.7011777 7.00646221,19.0511351 L4.5919826,18.2463085 C4.33001094,18.1589846 4.18843095,17.8758246 4.27575484,17.613853 C4.30030124,17.5402138 4.34165566,17.4733009 4.39654309,17.4184135 L7.04781491,14.7671417 C7.65653544,14.1584211 8.58647835,14.0075122 9.35645567,14.3925008 L9.60621621,14.5173811 C10.3761935,14.9023698 11.3061364,14.7514608 11.914857,14.1427403 Z" fill="#000000"></path>
							</g></svg>
							<div class="ml-3">
								<span>'. $instance['telephone'] .'</span> <span class="d-block text-muted text-small">'. $instance['hours'] .'</span>
							</div>
						</li>
					';
				}

				if ( !empty( $instance['email'] ) ) {
					echo '
						<li class="mb-3 d-flex">
							<svg class="icon" height="24px" version="1.1" viewbox="0 0 24 24" width="24px" xmlns="http://www.w3.org/2000/svg">
							<title>Icon For Mail</title>
							<g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
								<rect height="24" opacity="0" width="24" x="0" y="0"></rect>
								<path d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
							</g></svg>
							<div class="ml-3">
								<a href="mailto:'. $instance['email'] .'">'. $instance['email'] .'</a>
							</div>
						</li>
					';					
				}

				echo'</ul>
			';
			
			echo $args['after_widget'];
		}
	
		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ) {
			
			$defaults = array(
				'title' 	=> '', 
				'address' 	=> '', 
				'telephone' => '',
				'hours' 	=> '',				
				'email' 	=> '',
			);
			$instance = wp_parse_args((array) $instance, $defaults);
			extract($instance);
		?>
		
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'humanlikedev' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'address' ); ?>">Address
				<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'telephone' ); ?>">Telephone Number
				<input class="widefat" id="<?php echo $this->get_field_id( 'telephone' ); ?>" name="<?php echo $this->get_field_name( 'telephone' ); ?>" type="text" value="<?php echo esc_attr( $telephone ); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'hours' ); ?>">Business Hours
				<input class="widefat" id="<?php echo $this->get_field_id( 'hours' ); ?>" name="<?php echo $this->get_field_name( 'hours' ); ?>" type="text" value="<?php echo esc_attr( $hours ); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'email' ); ?>">Email Address
				<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
			</p>
			
		<?php 
		}
	
		/**
		 * Processing widget options on save
		 *
		 * @param array $new_instance The new options
		 * @param array $old_instance The previous options
		 */
		public function update( $new_instance, $old_instance ) {
			return $new_instance;
		}
	}

	function humanlikedev_register_humanlikedev_contact(){
	     register_widget( 'HumanlikeDev_Contact_Widget' );
	}

	add_action( 'widgets_init', 'humanlikedev_register_humanlikedev_contact', 20 );

}