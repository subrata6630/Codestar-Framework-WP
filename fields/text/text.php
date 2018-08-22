<?php if ( ! defined( 'ABSPATH' ) ) {
    die;
} // Cannot access pages directly.

/**
 *
 * Field: Text
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_text extends CSFramework_Options {

    public function __construct( $field, $value = '', $unique = '' ) {
        parent::__construct( $field, $value, $unique );
    }

    public function output() {

        echo wp_kses_post( $this->element_before() );
        echo '<input type="' . esc_attr($this->element_type()) . '" name="' . esc_attr( $this->element_name() ) . '" value="' . esc_attr($this->element_value()) . '"' . $this->element_class() . $this->element_attributes() . '/>';
        echo wp_kses_post( $this->element_after() );

    }

}
