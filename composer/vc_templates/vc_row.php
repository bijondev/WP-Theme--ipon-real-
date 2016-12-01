<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * //@var $full_width
 * @var $full_height
 * //@var $content_placement
 * //@var $parallax
 * //@var $parallax_image
 * @var $css
 * @var $el_id
 * //@var $video_bg
 * //@var $video_bg_url
 * //@var $video_bg_parallax
 * @var $content - shortcode content
 * @var $fullwidth - added additionally
 * @var $act_as_table - added additionally
 * @var $bg_parallax - added additionally
 * @var $data_bottom_top - added additionally
 * @var $data_center - added additionally
 * @var $data_top_bottom - added additionally
 * @var $bg_choice - added additionally
 * @var $bg_image - added additionally
 * @var $bg_color - added additionally etc.
 * //@var $bg_video_type - added additionally
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$output = $after_output = $fluid = $design_css = $fullheight = $flexrow = $columnsplacement = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

//wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

if( !empty( $fullwidth ) ){
	$fluid = '-fluid';
}

if ( ! empty( $full_height ) ) {
	$fullheight = ' vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$columnsplacement = ' vc_row-o-columns-' . $columns_placement;
	}
}

if ( ! empty( $flex_row ) ) {
	$flexrow = ' vc_row-flex';
}

if( $bg_parallax == '1' ){
	$bg_parallax = 'data-top-bottom="'.$data_top_bottom.'" data-center="'.$data_center.'" data-bottom-top="'.$data_bottom_top.'"';
	$el_class = $el_class.' parallax';
}

if( !empty($bg_color) ){
	$design_css = 'background-color: ' . $bg_color . '; ';
}
if( !empty($bg_image) ){
	$design_css .= 'background-image: url(\'' . wp_get_attachment_url($bg_image) . '\'); ';

	$design_css .= 'background-repeat:' . $bg_image_repeat . '; ';
	$design_css .= 'background-size:' . $bg_image_size . '; ';
	$design_css .= 'background-position:' . $bg_image_position . '; ';
	$design_css .= 'background-attachment:' . $bg_image_attachment . '; ';

}
if( !empty($margin_top) ){
	$design_css .= 'margin-top: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $margin_top ) ? $margin_top : $margin_top . 'px' ) . '; ';
}
if( !empty($margin_right) ){
	$design_css .= 'margin-right: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $margin_right ) ? $margin_right : $margin_right . 'px' ) . '; ';
}
if( !empty($margin_bottom) ){
	$design_css .= 'margin-bottom: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $margin_bottom ) ? $margin_bottom : $margin_bottom . 'px' ) . '; ';
}
if( !empty($margin_left) ){
	$design_css .= 'margin-left: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $margin_left ) ? $margin_left : $margin_left . 'px' ) . '; ';
}
if( !empty($padding_top) ){
	$design_css .= 'padding-top: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding_top ) ? $padding_top : $padding_top . 'px' ) . '; ';
}
if( !empty($padding_right) ){
	$design_css .= 'padding-right: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding_right ) ? $padding_right : $padding_right . 'px' ) . '; ';
}
if( !empty($padding_bottom) ){
	$design_css .= 'padding-bottom: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding_bottom ) ? $padding_bottom : $padding_bottom . 'px' ) . '; ';
}
if( !empty($padding_left) ){
	$design_css .= 'padding-left: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding_left ) ? $padding_left : $padding_left . 'px' ) . '; ';
}
if( !empty($border_top) ){
	$design_css .= 'border-top-width: ' . $border_top . 'px; ';
	if( !empty($border_style) ){
		$design_css .= 'border-top-style: ' . $border_style . '; ';
	}
}
if( !empty($border_right) ){
	$design_css .= 'border-right-width: ' . $border_right . 'px; ';
	if( !empty($border_style) ){
		$design_css .= 'border-right-style: ' . $border_style . '; ';
	}
}
if( !empty($border_bottom) ){
	$design_css .= 'border-bottom-width: ' . $border_bottom . 'px; ';
	if( !empty($border_style) ){
		$design_css .= 'border-bottom-style: ' . $border_style . '; ';
	}
}
if( !empty($border_left) ){
	$design_css .= 'border-left-width: ' . $border_left . 'px; ';
	if( !empty($border_style) ){
		$design_css .= 'border-left-style: ' . $border_style . '; ';
	}
}
if( !empty($border_color) ){
	$design_css .= 'border-color: ' . $border_color.'; ';
}
if( !empty($border_radius) ){
	$design_css .= 'border-radius: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $border_radius ) ? $border_radius : $border_radius . 'px' ) . '; ';
}

if( !empty($design_css) ){
	$design_css = 'style="'.$design_css.'"';
}

$css_classes = array(
	$el_class,
	//vc_shortcode_custom_css_class( $css ),
);
$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
if( !empty($css_class) ){
	$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
}

$output .= '<section ' . implode( ' ', $wrapper_attributes ) . ' '.$bg_parallax.' '.$design_css.'>';
$output .= '<div class="container'.$fluid.'">';
$output .= '<div class="vc_row vc_row_fluid '.$flexrow.' '.$fullheight.' '.$columnsplacement.' '.$fullwidth.' '.$act_as_table.'">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= '</section>';
//$output .= $after_output;

echo $output;