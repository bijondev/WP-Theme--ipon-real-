<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $animation - added additionally
 * @var $animation_duration - added additionally
 * @var $animation_delay - added additionally
 * @var $animation_offset - added additionally
 * @var $align - added additionally
 * @var $white - added additionally
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_Inner
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ),
	'wpb_column',
	'agni_column_container',
	$width,
	'text-'.$align,
	$white,
	vc_shortcode_custom_css_class( $css ),
);

$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="wpb_wrapper">';
if( !empty($animation) ){
	$output .= '<div class="animate" data-animation-offset="'.$animation_offset.'" data-animation="'.$animation.'" style="animation-duration: '.$animation_duration.'s; 	animation-delay: '.$animation_delay.'s; 	-moz-animation-duration: '.$animation_duration.'s; 	-moz-animation-delay: '.$animation_delay.'s; 	-webkit-animation-duration: '.$animation_duration.'s; 	-webkit-animation-delay: '.$animation_delay.'s; ">';	
}
$output .= wpb_js_remove_wpautop($content);
if( !empty($animation) ){
	$output .= '</div>';	
}
$output .= '</div>';
$output .= '</div>';

echo $output;
