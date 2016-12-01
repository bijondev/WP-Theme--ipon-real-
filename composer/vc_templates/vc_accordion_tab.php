<?php
$output = $title = $collapsed = '';

extract(shortcode_atts(array(
	'title' => esc_html__("Section", "cookie"),
	'active' => '',
), $atts));
global $acc_id;

if( $active != 'in' ){
	$collapsed = 'collapsed';
}

$output .= "\n\t\t\t" . '<div class="panel">';
    $output .= "\n\t\t\t\t" . '<a class="panel-title h5 '.$collapsed.'" data-toggle="collapse" data-parent="#'.$acc_id.'" href="#'.sanitize_title($title).'-'.$acc_id.'">'.$title.'</a>';
    $output .= "\n\t\t\t\t" . '<div id="'.sanitize_title($title).'-'.$acc_id.'" class="panel-body collapse '.$active.'">';
        $output .= ($content=='' || $content==' ') ? esc_html__( 'Empty section. Edit page to add content here.', 'cookie' ) : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
        $output .= "\n\t\t\t\t" . '</div>';
    $output .= "\n\t\t\t" . '</div> ' . $this->endBlockComment('.wpb_accordion_section') . "\n";

echo $output;