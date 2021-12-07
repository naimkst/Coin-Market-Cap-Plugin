<?php
require WP_PLUGIN_DIR.'/codex-pro-market-cap/vendor/autoload.php';


// Adds widget: CodexPro Coin Live Ticker
class codexpro_coin_cap_latest_coin extends WP_Widget {

	function __construct() {
		parent::__construct(
			'codexpro_coin_cap_latest_coin',
			esc_html__( 'CodexPro Market Cap Latest Coin', 'textdomain' )
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Currency Slug (binance,gdax)',
			'id' => 'currency_slug',
			'type' => 'text',
			'default' => 'binance, ftx, kraken, kucoin',
		),
		array(
			'label' => 'Coin Id ( 1, 2, 3, 4)',
			'id' => 'currency_id',
			'type' => 'text',
			'default' => ''
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

	?>
		<div class="cryptocurrencies-table-area">
			<div class="container">
				<table class="cryptocurrencies-table table data-table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Price</th>
							<th>Changes  24H </th>
							<th>Changes  7D </th>
							<th>Market Cap</th>
							<th>Volume 24H</th>
							<th>Available Supply</th>
							<th>Price Graph (7D)</th>
						</tr>
					</thead>

					<tbody id="json-data">
					</tbody>
				</table>
			</div>
		</div>


    <?php
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'textdomain' );
			switch ( $widget_field['type'] ) {
				case 'select':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
					$output .= '<select id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'">';
					foreach ($widget_field['options'] as $option) {
						if ($widget_value == $option) {
							$output .= '<option value="'.$option.'" selected>'.$option.'</option>';
						} else {
							$output .= '<option value="'.$option.'">'.$option.'</option>';
						}
					}
					$output .= '</select>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'textdomain' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'textdomain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_codexpro_coin_cap_latest_coin() {
	register_widget( 'codexpro_coin_cap_latest_coin' );
}
add_action( 'widgets_init', 'register_codexpro_coin_cap_latest_coin' );