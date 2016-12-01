<?php
/**
 * Shortcode attributes
 * @var $atts
 * //@var $source
 * @var $divide_line
 * @var $divide_line_width
 * @var $divide_line_color
 * @var $text
 * //@var $link
 * @var $google_fonts
 * @var $font_container
 * @var $el_class
 * @var $css
 * @var $font_container_data - returned from $this->getAttributes
 * @var $google_fonts_data - returned from $this->getAttributes
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Custom_heading
 */

// This is needed to extract $font_container_data and $google_fonts_data
extract( $this->getAttributes( $atts ) );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

extract( $this->getStyles( $el_class, $css, $google_fonts_data, $font_container_data, $atts ) );

$settings = get_option( 'wpb_js_google_fonts_subsets' );
if ( is_array( $settings ) && ! empty( $settings ) ) {
	$subsets = '&subset=' . implode( ',', $settings );
} else {
	$subsets = '';
}

if ( isset( $google_fonts_data['values']['font_family'] ) ) {
	wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
}

if ( ! empty( $styles ) ) {
	$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
} else {
	$style = '';
}

if ( ! empty( $link ) ) {
	$link = vc_build_link( $link );
	$text = '<a href="' . esc_attr( $link['url'] ) . '"'
	        . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
	        . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
	        . '>' . $text . '</a>';
}
if( $icon != '' ){
	$icon = '<i class="'.$icon.'"></i>  -  ';
}

if( $divide_line == 'yes'  ){
	$divide_line = '<div class="divide-line text-'.$divide_line_align.' "><span style="width:'.( preg_match( '/(px|em|\%|pt|cm)$/', $divide_line_width ) ? $divide_line_width : $divide_line_width . 'px' ).'; height:'.( preg_match( '/(px|em|\%|pt|cm)$/', $divide_line_height ) ? $divide_line_height : $divide_line_height . 'px' ).'; background-color:'.$divide_line_color.'"></span></div>';
}

$css_class .= ' agni_custom_heading_content ';

$output = '';
$output .= '<div class="agni_custom_heading page-scroll">';
if ( apply_filters( 'vc_custom_heading_template_use_wrapper', false ) ) {
	$output .= '<div class="' . esc_attr( $css_class ) . '" >';
	$output .= '<' . $font_container_data['values']['tag'] . ' ' . $style . ' >';
	$output .= $icon;
	$output .= $text;
	$output .= '</' . $font_container_data['values']['tag'] . '>';
	$output .= '</div>';
	$output .= $divide_line;
} else {
	$output .= '<' . $font_container_data['values']['tag'] . ' ' . $style . ' class="' . esc_attr( $css_class ) . '">';
	$output .= $icon;
	$output .= $text;
	$output .= '</' . $font_container_data['values']['tag'] . '>';
	$output .= $divide_line;
}
$output .= '</div>';

echo $output;