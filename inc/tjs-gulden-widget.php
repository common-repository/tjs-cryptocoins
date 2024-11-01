<?php
	/* Add requires */
	class tjs_gulden_qr_widget extends WP_Widget {

		// constructor
		function tjs_gulden_qr_widget() {
			parent::WP_Widget(false, $name = __('Gulden QR widget', 'tjs-cryptocoin') );
			parent::__construct(
				// Base ID of your widget
				'tjs_gulden',
				// Widget name will appear in UI
				__('Gulden QR-code Widget', 'tjs-cryptocoin'),
				// Widget message
				array( 'message' => __( 'A widget to allow visitors to donate Guldens', 'tjs-cryptocoin' ), )
			);
		}

		// widget form creation
		function form($instance) {
			if ( isset( $instance[ 'title' ])) {
				$title = $instance[ 'title' ];
			} else {
				$title = __( '', 'tjs-cryptocoin' );
			}

			if ( isset( $instance[ 'message' ])) {
				$message = $instance[ 'message' ];
			} else {
				$message = __( '', 'tjs-cryptocoin' );
			}

			if ( isset( $instance[ 'address' ])) {
				$address = $instance[ 'address' ];
			} else {
				$address = __( '', 'tjs-cryptocoin' );
			} ?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget header:', 'tjs-cryptocoin' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'message' ); ?>"><?php _e( 'Message:', 'tjs-cryptocoin' ); ?></label> 
				<textarea class="widefat" id="<?php echo $this->get_field_id( 'message' ); ?>" name="<?php echo $this->get_field_name( 'message' ); ?>"><?php echo esc_attr( $message ); ?> </textarea>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:', 'tjs-cryptocoin' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
			</p>
			<?php 
		}

		// widget update
		function update($new_instance, $old_instance) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['message'] = ( ! empty( $new_instance['message'] ) ) ? strip_tags( $new_instance['message'] ) : '';
			$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
			return $instance;
		}

		// widget display
		function widget($args, $instance) {
			echo "<div class='tjs-gulden-widget'>";
			$title = apply_filters( 'widget_title', $instance['title'] );

			if ( ! empty( $title ) )
			echo "<h4 class='tjs-widget-header'>" . $title . "</h4>";

			$message = apply_filters( 'widget_message', $instance['message'] );
			if ( ! empty( $message ) )
			echo "<p class='tjs-widget-message'>" . $message . "</p>";

			$address = apply_filters( 'widget_address', $instance['address'] );
			echo "<div id='tjs-gulden-qr-code' class='tjs-qr-code'></div>";
			echo "<input id='tjs-gulden-address' class='tjs-gulden-address' onClick='this.select();' value='" . $address . "' />";
			echo "<div><a href='https://gulden.com/' class='tjs-nlg-btn'><img src='" . plugins_url( 'img/nlg-icon.png', dirname(__FILE__) ) . "'> " . __( 'Buy Guldens', 'tjs-cryptocoin' ) . "</a></div>";
			echo "</div>";
		}
	}

	add_action('widgets_init', create_function('', 'return register_widget("tjs_gulden_qr_widget");'));
?>