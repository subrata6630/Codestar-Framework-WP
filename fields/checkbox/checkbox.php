<?php if ( ! defined( 'ABSPATH' ) ) {
    die;
} // Cannot access pages directly.

/**
 *
 * Field: Checkbox
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_checkbox extends CSFramework_Options {

    public function __construct( $field, $value = '', $unique = '' ) {
        parent::__construct( $field, $value, $unique );
    }

    public function output() {

        echo wp_kses_post( $this->element_before() );

        if ( isset( $this->field['options'] ) ) {

            $options = $this->field['options'];
            $options = ( is_array( $options ) ) ? $options : array_filter( $this->element_data( $options ) );

            if ( ! empty( $options ) ) {

                echo '<ul' . esc_attr( $this->element_class() ) . '>';
                foreach ( $options as $key => $value ) {
                    echo '<li><label><input type="checkbox" name="' . esc_attr( $this->element_name( '[]' ) ) . '" value="' . esc_attr( $key ) . '"' . esc_attr( $this->element_attributes( $key ) ) . esc_attr( $this->checked( $this->element_value(), $key ) ) . '/> ' . wp_kses_post( $value ) . '</label></li>';
                }
                echo '</ul>';
            }

        } else {
            $label = ( isset( $this->field['label'] ) ) ? $this->field['label'] : '';
            echo '<label><input type="checkbox" name="' . esc_attr( $this->element_name() ) . '" value="1"' . esc_attr( $this->element_class() ) . esc_attr( $this->element_attributes() ) . checked( $this->element_value(), 1, false ) . '/> ' . wp_kses_post( $label ) . '</label>';
        }

        echo wp_kses_post( $this->element_after() );

    }

}
