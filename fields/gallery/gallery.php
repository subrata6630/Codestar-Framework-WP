<?php if ( ! defined( 'ABSPATH' ) ) {
    die;
} // Cannot access pages directly.

/**
 *
 * Field: Gallery
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_Gallery extends CSFramework_Options {

    public function __construct( $field, $value = '', $unique = '' ) {
        parent::__construct( $field, $value, $unique );
    }

    public function output() {

        echo wp_kses_post( $this->element_before() );

        $value  = $this->element_value();
        $add    = ( ! empty( $this->field['add_title'] ) ) ? $this->field['add_title'] : esc_html__( 'Add Gallery', 'cs-framework' );
        $edit   = ( ! empty( $this->field['edit_title'] ) ) ? $this->field['edit_title'] : esc_html__( 'Edit Gallery', 'cs-framework' );
        $clear  = ( ! empty( $this->field['clear_title'] ) ) ? $this->field['clear_title'] : esc_html__( 'Clear', 'cs-framework' );
        $hidden = ( empty( $value ) ) ? ' hidden' : '';

        echo '<ul>';

        if ( ! empty( $value ) ) {

            $values = explode( ',', $value );

            foreach ( $values as $id ) {
                $attachment = wp_get_attachment_image_src( $id, 'thumbnail' );
                echo '<li><img src="' . esc_url( $attachment[0] ) . '" alt="" /></li>';
            }

        }

        echo '</ul>';
        echo '<a href="#" class="button button-primary cs-add">' . wp_kses_post( $add ) . '</a>';
        echo '<a href="#" class="button cs-edit' . esc_attr( $hidden ) . '">' . wp_kses_post( $edit ) . '</a>';
        echo '<a href="#" class="button cs-warning-primary cs-remove' . esc_attr( $hidden ) . '">' . wp_kses_post( $clear ) . '</a>';
        echo '<input type="text" name="' . esc_attr( $this->element_name() ) . '" value="' . esc_attr($value) . '"' . $this->element_class() . $this->element_attributes() . '/>';

        echo wp_kses_post( $this->element_after() );

    }

}
