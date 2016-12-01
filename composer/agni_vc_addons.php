<?php 

if( !function_exists('agni_remove_vc_elements') ){
	function agni_remove_vc_elements() {
		vc_remove_element("vc_message");
		vc_remove_element("vc_tweetmeme");
		vc_remove_element("vc_googleplus");
		vc_remove_element("vc_facebook");
		vc_remove_element("vc_pinterest");
		vc_remove_element("vc_flickr");
		vc_remove_element("vc_posts_slider");
		vc_remove_element("vc_basic_grid");
		vc_remove_element("vc_raw_html");
		vc_remove_element("vc_raw_js");
		vc_remove_element("vc_single_image");
		vc_remove_element("vc_images_carousel");
		vc_remove_element("vc_media_grid");
		vc_remove_element("vc_masonry_grid");
		vc_remove_element("vc_gmaps");
		vc_remove_element("vc_progress_bar");
		vc_remove_element("vc_pie");
		vc_remove_element("vc_gallery");
		vc_remove_element("vc_masonry_media_grid");
		vc_remove_element("vc_icon");
		vc_remove_element("vc_video");
		vc_remove_element("vc_wp_archives");
		vc_remove_element("vc_wp_calendar");
		vc_remove_element("vc_wp_categories");
		vc_remove_element("vc_wp_custommenu");
		vc_remove_element("vc_wp_links");
		vc_remove_element("vc_wp_meta");
		vc_remove_element("vc_wp_pages");
		vc_remove_element("vc_wp_posts");
		vc_remove_element("vc_wp_recentcomments");
		vc_remove_element("vc_wp_rss");
		vc_remove_element("vc_wp_search");
		vc_remove_element("vc_wp_tagcloud");
		vc_remove_element("vc_wp_text");
		vc_remove_element("vc_round_chart");
		vc_remove_element("vc_line_chart");
		vc_remove_element("vc_tweetmeme");
		vc_remove_element("vc_googleplus");
		vc_remove_element("vc_facebook");
		vc_remove_element("vc_pinterest");
		vc_remove_element("vc_flickr");
		vc_remove_element("vc_gmaps");
		vc_remove_element("vc_raw_html");
		vc_remove_element("vc_raw_js");
		vc_remove_element("vc_separator");
		vc_remove_element("vc_text_separator");
		vc_remove_element("vc_cta");
		vc_remove_element("vc_btn");
		vc_remove_element("vc_widget_sidebar");
		vc_remove_element("vc_toggle");
		vc_remove_element("rev_slider_vc");
		vc_remove_element("vc_tta_tour");
		vc_remove_element("vc_tta_pageable");
		//vc_remove_element("vc_tta_section");
	}
	// Hook for admin editor.
	add_action( 'vc_build_admin_page', 'agni_remove_vc_elements', 11 );
	add_action( 'vc_load_shortcode', 'agni_remove_vc_elements', 11 );
}

// Deprecated
vc_remove_element("vc_tour");
vc_remove_element("vc_button");
vc_remove_element("vc_button2");
vc_remove_element("vc_cta");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");


// Removing WooCommerce elements
if( !function_exists('agni_remove_woocommerce_elements') ){
	function agni_remove_woocommerce_elements() {
	    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	        vc_remove_element("woocommerce_cart");
			vc_remove_element("woocommerce_checkout");
			vc_remove_element("woocommerce_order_tracking");
			vc_remove_element("woocommerce_my_account");
			vc_remove_element("recent_products");
			vc_remove_element("featured_products");
			vc_remove_element("product");
			vc_remove_element("products");
			vc_remove_element("add_to_cart");
			vc_remove_element("add_to_cart_url");
			vc_remove_element("product_page");
			vc_remove_element("product_category");
			vc_remove_element("product_categories");
			vc_remove_element("sale_products");
			vc_remove_element("best_selling_products");
			vc_remove_element("top_rated_products");
			vc_remove_element("product_attribute");
	    }
	}
	// Hook for admin editor.
	add_action( 'vc_build_admin_page', 'agni_remove_woocommerce_elements', 11 );
	add_action( 'vc_load_shortcode', 'agni_remove_woocommerce_elements', 11 );
}

class AgniShortcodesFunctions {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateAgniWithVC' ) );
		
    }
 	
    public function integrateAgniWithVC() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        global $vc_column_width_list;
		$vc_column_width_list = array(
			esc_html__( '1 column - 1/12', 'cookie' ) => '1/12',
			esc_html__( '2 columns - 1/6', 'cookie' ) => '1/6',
			esc_html__( '3 columns - 1/4', 'cookie' ) => '1/4',
			esc_html__( '4 columns - 1/3', 'cookie' ) => '1/3',
			esc_html__( '5 columns - 5/12', 'cookie' ) => '5/12',
			esc_html__( '6 columns - 1/2', 'cookie' ) => '1/2',
			esc_html__( '7 columns - 7/12', 'cookie' ) => '7/12',
			esc_html__( '8 columns - 2/3', 'cookie' ) => '2/3',
			esc_html__( '9 columns - 3/4', 'cookie' ) => '3/4',
			esc_html__( '10 columns - 5/6', 'cookie' ) => '5/6',
			esc_html__( '11 columns - 11/12', 'cookie' ) => '11/12',
			esc_html__( '12 columns - 1/1', 'cookie' ) => '1/1'
		);
        $animation_attr = array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Animation', 'cookie' ),
			'param_name' => 'animation',
			'value' => array(
				'No Animation' => '',
				'bounce'	=> 'bounce',
				'flash'	=> 'flash',
				'pulse'	=> 'pulse',
				'rubberBand'	=> 'rubberBand',
				'shake'	=> 'shake',
				'swing'	=> 'swing',
				'tada'	=> 'tada',
				'wobble'	=> 'wobble',
				'jello'	=> 'jello',
				'bounceIn'	=> 'bounceIn',
				'bounceInDown'	=> 'bounceInDown',
				'bounceInLeft'	=> 'bounceInLeft',
				'bounceInRight'	=> 'bounceInRight',
				'bounceInUp'	=> 'bounceInUp',
				'bounceOut'	=> 'bounceOut',
				'bounceOutDown'	=> 'bounceOutDown',
				'bounceOutLeft'	=> 'bounceOutLeft',
				'bounceOutRight'	=> 'bounceOutRight',
				'bounceOutUp'	=> 'bounceOutUp',
				'fadeIn'	=> 'fadeIn',
				'fadeInDown'	=> 'fadeInDown',
				'fadeInDownBig'	=> 'fadeInDownBig',
				'fadeInLeft'	=> 'fadeInLeft',
				'fadeInLeftBig'	=> 'fadeInLeftBig',
				'fadeInRight'	=> 'fadeInRight',
				'fadeInRightBig'	=> 'fadeInRightBig',
				'fadeInUp'	=> 'fadeInUp',
				'fadeInUpBig'	=> 'fadeInUpBig',
				'fadeOut'	=> 'fadeOut',
				'fadeOutDown'	=> 'fadeOutDown',
				'fadeOutDownBig'	=> 'fadeOutDownBig',
				'fadeOutLeft'	=> 'fadeOutLeft',
				'fadeOutLeftBig'	=> 'fadeOutLeftBig',
				'fadeOutRight'	=> 'fadeOutRight',
				'fadeOutRightBig'	=> 'fadeOutRightBig',
				'fadeOutUp'	=> 'fadeOutUp',
				'fadeOutUpBig'	=> 'fadeOutUpBig',
				'flipInX'	=> 'flipInX',
				'flipInY'	=> 'flipInY',
				'flipOutX'	=> 'flipOutX',
				'flipOutY'	=> 'flipOutY',
				'lightSpeedIn'	=> 'lightSpeedIn',
				'lightSpeedOut'	=> 'lightSpeedOut',
				'rotateIn'	=> 'rotateIn',
				'rotateInDownLeft'	=> 'rotateInDownLeft',
				'rotateInDownRight'	=> 'rotateInDownRight',
				'rotateInUpLeft'	=> 'rotateInUpLeft',
				'rotateInUpRight'	=> 'rotateInUpRight',
				'rotateOut'	=> 'rotateOut',
				'rotateOutDownLeft'	=> 'rotateOutDownLeft',
				'rotateOutDownRight'	=> 'rotateOutDownRight',
				'rotateOutUpLeft'	=> 'rotateOutUpLeft',
				'rotateOutUpRight'	=> 'rotateOutUpRight',
				'hinge'	=> 'hinge',
				'rollIn'	=> 'rollIn',
				'rollOut'	=> 'rollOut',
				'zoomIn'	=> 'zoomIn',
				'zoomInDown'	=> 'zoomInDown',
				'zoomInLeft'	=> 'zoomInLeft',
				'zoomInRight'	=> 'zoomInRight',
				'zoomInUp'	=> 'zoomInUp',
				'zoomOut'	=> 'zoomOut',
				'zoomOutDown'	=> 'zoomOutDown',
				'zoomOutLeft'	=> 'zoomOutLeft',
				'zoomOutRight'	=> 'zoomOutRight',
				'zoomOutUp'	=> 'zoomOutUp',
				'slideInDown'	=> 'slideInDown',
				'slideInLeft'	=> 'slideInLeft',
				'slideInRight'	=> 'slideInRight',
				'slideInUp'	=> 'slideInUp',
				'slideOutDown'	=> 'slideOutDown',
				'slideOutLeft'	=> 'slideOutLeft',
				'slideOutRight'	=> 'slideOutRight',
				'slideOutUp'	=> 'slideOutUp',
			),
			'description' => esc_html__( 'Select how the content will be aligned in column', 'cookie' ),
			'group' => esc_html__( 'Animation Setting', 'cookie' )
		);

		// Icons List
		function vc_iconpicker_type_iconlist( $icons ) {
			$icon_list_array = array(
				'Ionicons' => array(
					array( 'ion-alert'    =>  	'alert' ),
					array( 'ion-alert-circled'    =>  	'alert-circled' ),
					array( 'ion-android-add'    =>  	'android-add' ),
					array( 'ion-android-add-circle'    =>  	'android-add-circle' ),
					array( 'ion-android-alarm-clock'    =>  	'android-alarm-clock' ),
					array( 'ion-android-alert'    =>  	'android-alert' ),
					array( 'ion-android-apps'    =>  	'android-apps' ),
					array( 'ion-android-archive'    =>  	'android-archive' ),
					array( 'ion-android-arrow-back'    =>  	'android-arrow-back' ),
					array( 'ion-android-arrow-down'    =>  	'android-arrow-down' ),
					array( 'ion-android-arrow-dropdown'    =>  	'android-arrow-dropdown' ),
					array( 'ion-android-arrow-dropdown-circle'    =>  	'android-arrow-dropdown-circle' ),
					array( 'ion-android-arrow-dropleft'    =>  	'android-arrow-dropleft' ),
					array( 'ion-android-arrow-dropleft-circle'    =>  	'android-arrow-dropleft-circle' ),
					array( 'ion-android-arrow-dropright'    =>  	'android-arrow-dropright' ),
					array( 'ion-android-arrow-dropright-circle'    =>  	'android-arrow-dropright-circle' ),
					array( 'ion-android-arrow-dropup'    =>  	'android-arrow-dropup' ),
					array( 'ion-android-arrow-dropup-circle'    =>  	'android-arrow-dropup-circle' ),
					array( 'ion-android-arrow-forward'    =>  	'android-arrow-forward' ),
					array( 'ion-android-arrow-up'    =>  	'android-arrow-up' ),
					array( 'ion-android-attach'    =>  	'android-attach' ),
					array( 'ion-android-bar'    =>  	'android-bar' ),
					array( 'ion-android-bicycle'    =>  	'android-bicycle' ),
					array( 'ion-android-boat'    =>  	'android-boat' ),
					array( 'ion-android-bookmark'    =>  	'android-bookmark' ),
					array( 'ion-android-bulb'    =>  	'android-bulb' ),
					array( 'ion-android-bus'    =>  	'android-bus' ),
					array( 'ion-android-calendar'    =>  	'android-calendar' ),
					array( 'ion-android-call'    =>  	'android-call' ),
					array( 'ion-android-camera'    =>  	'android-camera' ),
					array( 'ion-android-cancel'    =>  	'android-cancel' ),
					array( 'ion-android-car'    =>  	'android-car' ),
					array( 'ion-android-cart'    =>  	'android-cart' ),
					array( 'ion-android-chat'    =>  	'android-chat' ),
					array( 'ion-android-checkbox'    =>  	'android-checkbox' ),
					array( 'ion-android-checkbox-blank'    =>  	'android-checkbox-blank' ),
					array( 'ion-android-checkbox-outline'    =>  	'android-checkbox-outline' ),
					array( 'ion-android-checkbox-outline-blank'    =>  	'android-checkbox-outline-blank' ),
					array( 'ion-android-checkmark-circle'    =>  	'android-checkmark-circle' ),
					array( 'ion-android-clipboard'    =>  	'android-clipboard' ),
					array( 'ion-android-close'    =>  	'android-close' ),
					array( 'ion-android-cloud'    =>  	'android-cloud' ),
					array( 'ion-android-cloud-circle'    =>  	'android-cloud-circle' ),
					array( 'ion-android-cloud-done'    =>  	'android-cloud-done' ),
					array( 'ion-android-cloud-outline'    =>  	'android-cloud-outline' ),
					array( 'ion-android-color-palette'    =>  	'android-color-palette' ),
					array( 'ion-android-compass'    =>  	'android-compass' ),
					array( 'ion-android-contact'    =>  	'android-contact' ),
					array( 'ion-android-contacts'    =>  	'android-contacts' ),
					array( 'ion-android-contract'    =>  	'android-contract' ),
					array( 'ion-android-create'    =>  	'android-create' ),
					array( 'ion-android-delete'    =>  	'android-delete' ),
					array( 'ion-android-desktop'    =>  	'android-desktop' ),
					array( 'ion-android-document'    =>  	'android-document' ),
					array( 'ion-android-done'    =>  	'android-done' ),
					array( 'ion-android-done-all'    =>  	'android-done-all' ),
					array( 'ion-android-download'    =>  	'android-download' ),
					array( 'ion-android-drafts'    =>  	'android-drafts' ),
					array( 'ion-android-exit'    =>  	'android-exit' ),
					array( 'ion-android-expand'    =>  	'android-expand' ),
					array( 'ion-android-favorite'    =>  	'android-favorite' ),
					array( 'ion-android-favorite-outline'    =>  	'android-favorite-outline' ),
					array( 'ion-android-film'    =>  	'android-film' ),
					array( 'ion-android-folder'    =>  	'android-folder' ),
					array( 'ion-android-folder-open'    =>  	'android-folder-open' ),
					array( 'ion-android-funnel'    =>  	'android-funnel' ),
					array( 'ion-android-globe'    =>  	'android-globe' ),
					array( 'ion-android-hand'    =>  	'android-hand' ),
					array( 'ion-android-hangout'    =>  	'android-hangout' ),
					array( 'ion-android-happy'    =>  	'android-happy' ),
					array( 'ion-android-home'    =>  	'android-home' ),
					array( 'ion-android-image'    =>  	'android-image' ),
					array( 'ion-android-laptop'    =>  	'android-laptop' ),
					array( 'ion-android-list'    =>  	'android-list' ),
					array( 'ion-android-locate'    =>  	'android-locate' ),
					array( 'ion-android-lock'    =>  	'android-lock' ),
					array( 'ion-android-mail'    =>  	'android-mail' ),
					array( 'ion-android-map'    =>  	'android-map' ),
					array( 'ion-android-menu'    =>  	'android-menu' ),
					array( 'ion-android-microphone'    =>  	'android-microphone' ),
					array( 'ion-android-microphone-off'    =>  	'android-microphone-off' ),
					array( 'ion-android-more-horizontal'    =>  	'android-more-horizontal' ),
					array( 'ion-android-more-vertical'    =>  	'android-more-vertical' ),
					array( 'ion-android-navigate'    =>  	'android-navigate' ),
					array( 'ion-android-notifications'    =>  	'android-notifications' ),
					array( 'ion-android-notifications-none'    =>  	'android-notifications-none' ),
					array( 'ion-android-notifications-off'    =>  	'android-notifications-off' ),
					array( 'ion-android-open'    =>  	'android-open' ),
					array( 'ion-android-options'    =>  	'android-options' ),
					array( 'ion-android-people'    =>  	'android-people' ),
					array( 'ion-android-person'    =>  	'android-person' ),
					array( 'ion-android-person-add'    =>  	'android-person-add' ),
					array( 'ion-android-phone-landscape'    =>  	'android-phone-landscape' ),
					array( 'ion-android-phone-portrait'    =>  	'android-phone-portrait' ),
					array( 'ion-android-pin'    =>  	'android-pin' ),
					array( 'ion-android-plane'    =>  	'android-plane' ),
					array( 'ion-android-playstore'    =>  	'android-playstore' ),
					array( 'ion-android-print'    =>  	'android-print' ),
					array( 'ion-android-radio-button-off'    =>  	'android-radio-button-off' ),
					array( 'ion-android-radio-button-on'    =>  	'android-radio-button-on' ),
					array( 'ion-android-refresh'    =>  	'android-refresh' ),
					array( 'ion-android-remove'    =>  	'android-remove' ),
					array( 'ion-android-remove-circle'    =>  	'android-remove-circle' ),
					array( 'ion-android-restaurant'    =>  	'android-restaurant' ),
					array( 'ion-android-sad'    =>  	'android-sad' ),
					array( 'ion-android-search'    =>  	'android-search' ),
					array( 'ion-android-send'    =>  	'android-send' ),
					array( 'ion-android-settings'    =>  	'android-settings' ),
					array( 'ion-android-share'    =>  	'android-share' ),
					array( 'ion-android-share-alt'    =>  	'android-share-alt' ),
					array( 'ion-android-star'    =>  	'android-star' ),
					array( 'ion-android-star-half'    =>  	'android-star-half' ),
					array( 'ion-android-star-outline'    =>  	'android-star-outline' ),
					array( 'ion-android-stopwatch'    =>  	'android-stopwatch' ),
					array( 'ion-android-subway'    =>  	'android-subway' ),
					array( 'ion-android-sunny'    =>  	'android-sunny' ),
					array( 'ion-android-sync'    =>  	'android-sync' ),
					array( 'ion-android-textsms'    =>  	'android-textsms' ),
					array( 'ion-android-time'    =>  	'android-time' ),
					array( 'ion-android-train'    =>  	'android-train' ),
					array( 'ion-android-unlock'    =>  	'android-unlock' ),
					array( 'ion-android-upload'    =>  	'android-upload' ),
					array( 'ion-android-volume-down'    =>  	'android-volume-down' ),
					array( 'ion-android-volume-mute'    =>  	'android-volume-mute' ),
					array( 'ion-android-volume-off'    =>  	'android-volume-off' ),
					array( 'ion-android-volume-up'    =>  	'android-volume-up' ),
					array( 'ion-android-walk'    =>  	'android-walk' ),
					array( 'ion-android-warning'    =>  	'android-warning' ),
					array( 'ion-android-watch'    =>  	'android-watch' ),
					array( 'ion-android-wifi'    =>  	'android-wifi' ),
					array( 'ion-aperture'    =>  	'aperture' ),
					array( 'ion-archive'    =>  	'archive' ),
					array( 'ion-arrow-down-a'    =>  	'arrow-down-a' ),
					array( 'ion-arrow-down-b'    =>  	'arrow-down-b' ),
					array( 'ion-arrow-down-c'    =>  	'arrow-down-c' ),
					array( 'ion-arrow-expand'    =>  	'arrow-expand' ),
					array( 'ion-arrow-graph-down-left'    =>  	'arrow-graph-down-left' ),
					array( 'ion-arrow-graph-down-right'    =>  	'arrow-graph-down-right' ),
					array( 'ion-arrow-graph-up-left'    =>  	'arrow-graph-up-left' ),
					array( 'ion-arrow-graph-up-right'    =>  	'arrow-graph-up-right' ),
					array( 'ion-arrow-left-a'    =>  	'arrow-left-a' ),
					array( 'ion-arrow-left-b'    =>  	'arrow-left-b' ),
					array( 'ion-arrow-left-c'    =>  	'arrow-left-c' ),
					array( 'ion-arrow-move'    =>  	'arrow-move' ),
					array( 'ion-arrow-resize'    =>  	'arrow-resize' ),
					array( 'ion-arrow-return-left'    =>  	'arrow-return-left' ),
					array( 'ion-arrow-return-right'    =>  	'arrow-return-right' ),
					array( 'ion-arrow-right-a'    =>  	'arrow-right-a' ),
					array( 'ion-arrow-right-b'    =>  	'arrow-right-b' ),
					array( 'ion-arrow-right-c'    =>  	'arrow-right-c' ),
					array( 'ion-arrow-shrink'    =>  	'arrow-shrink' ),
					array( 'ion-arrow-swap'    =>  	'arrow-swap' ),
					array( 'ion-arrow-up-a'    =>  	'arrow-up-a' ),
					array( 'ion-arrow-up-b'    =>  	'arrow-up-b' ),
					array( 'ion-arrow-up-c'    =>  	'arrow-up-c' ),
					array( 'ion-asterisk'    =>  	'asterisk' ),
					array( 'ion-at'    =>  	'at' ),
					array( 'ion-backspace'    =>  	'backspace' ),
					array( 'ion-backspace-outline'    =>  	'backspace-outline' ),
					array( 'ion-bag'    =>  	'bag' ),
					array( 'ion-battery-charging'    =>  	'battery-charging' ),
					array( 'ion-battery-empty'    =>  	'battery-empty' ),
					array( 'ion-battery-full'    =>  	'battery-full' ),
					array( 'ion-battery-half'    =>  	'battery-half' ),
					array( 'ion-battery-low'    =>  	'battery-low' ),
					array( 'ion-beaker'    =>  	'beaker' ),
					array( 'ion-beer'    =>  	'beer' ),
					array( 'ion-bluetooth'    =>  	'bluetooth' ),
					array( 'ion-bonfire'    =>  	'bonfire' ),
					array( 'ion-bookmark'    =>  	'bookmark' ),
					array( 'ion-bowtie'    =>  	'bowtie' ),
					array( 'ion-briefcase'    =>  	'briefcase' ),
					array( 'ion-bug'    =>  	'bug' ),
					array( 'ion-calculator'    =>  	'calculator' ),
					array( 'ion-calendar'    =>  	'calendar' ),
					array( 'ion-camera'    =>  	'camera' ),
					array( 'ion-card'    =>  	'card' ),
					array( 'ion-cash'    =>  	'cash' ),
					array( 'ion-chatbox'    =>  	'chatbox' ),
					array( 'ion-chatbox-working'    =>  	'chatbox-working' ),
					array( 'ion-chatboxes'    =>  	'chatboxes' ),
					array( 'ion-chatbubble'    =>  	'chatbubble' ),
					array( 'ion-chatbubble-working'    =>  	'chatbubble-working' ),
					array( 'ion-chatbubbles'    =>  	'chatbubbles' ),
					array( 'ion-checkmark'    =>  	'checkmark' ),
					array( 'ion-checkmark-circled'    =>  	'checkmark-circled' ),
					array( 'ion-checkmark-round'    =>  	'checkmark-round' ),
					array( 'ion-chevron-down'    =>  	'chevron-down' ),
					array( 'ion-chevron-left'    =>  	'chevron-left' ),
					array( 'ion-chevron-right'    =>  	'chevron-right' ),
					array( 'ion-chevron-up'    =>  	'chevron-up' ),
					array( 'ion-clipboard'    =>  	'clipboard' ),
					array( 'ion-clock'    =>  	'clock' ),
					array( 'ion-close'    =>  	'close' ),
					array( 'ion-close-circled'    =>  	'close-circled' ),
					array( 'ion-close-round'    =>  	'close-round' ),
					array( 'ion-closed-captioning'    =>  	'closed-captioning' ),
					array( 'ion-cloud'    =>  	'cloud' ),
					array( 'ion-code'    =>  	'code' ),
					array( 'ion-code-download'    =>  	'code-download' ),
					array( 'ion-code-working'    =>  	'code-working' ),
					array( 'ion-coffee'    =>  	'coffee' ),
					array( 'ion-compass'    =>  	'compass' ),
					array( 'ion-compose'    =>  	'compose' ),
					array( 'ion-connection-bars'    =>  	'connection-bars' ),
					array( 'ion-contrast'    =>  	'contrast' ),
					array( 'ion-crop'    =>  	'crop' ),
					array( 'ion-cube'    =>  	'cube' ),
					array( 'ion-disc'    =>  	'disc' ),
					array( 'ion-document'    =>  	'document' ),
					array( 'ion-document-text'    =>  	'document-text' ),
					array( 'ion-drag'    =>  	'drag' ),
					array( 'ion-earth'    =>  	'earth' ),
					array( 'ion-easel'    =>  	'easel' ),
					array( 'ion-edit'    =>  	'edit' ),
					array( 'ion-egg'    =>  	'egg' ),
					array( 'ion-eject'    =>  	'eject' ),
					array( 'ion-email'    =>  	'email' ),
					array( 'ion-email-unread'    =>  	'email-unread' ),
					array( 'ion-erlenmeyer-flask'    =>  	'erlenmeyer-flask' ),
					array( 'ion-erlenmeyer-flask-bubbles'    =>  	'erlenmeyer-flask-bubbles' ),
					array( 'ion-eye'    =>  	'eye' ),
					array( 'ion-eye-disabled'    =>  	'eye-disabled' ),
					array( 'ion-female'    =>  	'female' ),
					array( 'ion-filing'    =>  	'filing' ),
					array( 'ion-film-marker'    =>  	'film-marker' ),
					array( 'ion-fireball'    =>  	'fireball' ),
					array( 'ion-flag'    =>  	'flag' ),
					array( 'ion-flame'    =>  	'flame' ),
					array( 'ion-flash'    =>  	'flash' ),
					array( 'ion-flash-off'    =>  	'flash-off' ),
					array( 'ion-folder'    =>  	'folder' ),
					array( 'ion-fork'    =>  	'fork' ),
					array( 'ion-fork-repo'    =>  	'fork-repo' ),
					array( 'ion-forward'    =>  	'forward' ),
					array( 'ion-funnel'    =>  	'funnel' ),
					array( 'ion-gear-a'    =>  	'gear-a' ),
					array( 'ion-gear-b'    =>  	'gear-b' ),
					array( 'ion-grid'    =>  	'grid' ),
					array( 'ion-hammer'    =>  	'hammer' ),
					array( 'ion-happy'    =>  	'happy' ),
					array( 'ion-happy-outline'    =>  	'happy-outline' ),
					array( 'ion-headphone'    =>  	'headphone' ),
					array( 'ion-heart'    =>  	'heart' ),
					array( 'ion-heart-broken'    =>  	'heart-broken' ),
					array( 'ion-help'    =>  	'help' ),
					array( 'ion-help-buoy'    =>  	'help-buoy' ),
					array( 'ion-help-circled'    =>  	'help-circled' ),
					array( 'ion-home'    =>  	'home' ),
					array( 'ion-icecream'    =>  	'icecream' ),
					array( 'ion-image'    =>  	'image' ),
					array( 'ion-images'    =>  	'images' ),
					array( 'ion-information'    =>  	'information' ),
					array( 'ion-information-circled'    =>  	'information-circled' ),
					array( 'ion-ionic'    =>  	'ionic' ),
					array( 'ion-ios-alarm'    =>  	'ios-alarm' ),
					array( 'ion-ios-alarm-outline'    =>  	'ios-alarm-outline' ),
					array( 'ion-ios-albums'    =>  	'ios-albums' ),
					array( 'ion-ios-albums-outline'    =>  	'ios-albums-outline' ),
					array( 'ion-ios-americanfootball'    =>  	'ios-americanfootball' ),
					array( 'ion-ios-americanfootball-outline'    =>  	'ios-americanfootball-outline' ),
					array( 'ion-ios-analytics'    =>  	'ios-analytics' ),
					array( 'ion-ios-analytics-outline'    =>  	'ios-analytics-outline' ),
					array( 'ion-ios-arrow-back'    =>  	'ios-arrow-back' ),
					array( 'ion-ios-arrow-down'    =>  	'ios-arrow-down' ),
					array( 'ion-ios-arrow-forward'    =>  	'ios-arrow-forward' ),
					array( 'ion-ios-arrow-left'    =>  	'ios-arrow-left' ),
					array( 'ion-ios-arrow-right'    =>  	'ios-arrow-right' ),
					array( 'ion-ios-arrow-thin-down'    =>  	'ios-arrow-thin-down' ),
					array( 'ion-ios-arrow-thin-left'    =>  	'ios-arrow-thin-left' ),
					array( 'ion-ios-arrow-thin-right'    =>  	'ios-arrow-thin-right' ),
					array( 'ion-ios-arrow-thin-up'    =>  	'ios-arrow-thin-up' ),
					array( 'ion-ios-arrow-up'    =>  	'ios-arrow-up' ),
					array( 'ion-ios-at'    =>  	'ios-at' ),
					array( 'ion-ios-at-outline'    =>  	'ios-at-outline' ),
					array( 'ion-ios-barcode'    =>  	'ios-barcode' ),
					array( 'ion-ios-barcode-outline'    =>  	'ios-barcode-outline' ),
					array( 'ion-ios-baseball'    =>  	'ios-baseball' ),
					array( 'ion-ios-baseball-outline'    =>  	'ios-baseball-outline' ),
					array( 'ion-ios-basketball'    =>  	'ios-basketball' ),
					array( 'ion-ios-basketball-outline'    =>  	'ios-basketball-outline' ),
					array( 'ion-ios-bell'    =>  	'ios-bell' ),
					array( 'ion-ios-bell-outline'    =>  	'ios-bell-outline' ),
					array( 'ion-ios-body'    =>  	'ios-body' ),
					array( 'ion-ios-body-outline'    =>  	'ios-body-outline' ),
					array( 'ion-ios-bolt'    =>  	'ios-bolt' ),
					array( 'ion-ios-bolt-outline'    =>  	'ios-bolt-outline' ),
					array( 'ion-ios-book'    =>  	'ios-book' ),
					array( 'ion-ios-book-outline'    =>  	'ios-book-outline' ),
					array( 'ion-ios-bookmarks'    =>  	'ios-bookmarks' ),
					array( 'ion-ios-bookmarks-outline'    =>  	'ios-bookmarks-outline' ),
					array( 'ion-ios-box'    =>  	'ios-box' ),
					array( 'ion-ios-box-outline'    =>  	'ios-box-outline' ),
					array( 'ion-ios-briefcase'    =>  	'ios-briefcase' ),
					array( 'ion-ios-briefcase-outline'    =>  	'ios-briefcase-outline' ),
					array( 'ion-ios-browsers'    =>  	'ios-browsers' ),
					array( 'ion-ios-browsers-outline'    =>  	'ios-browsers-outline' ),
					array( 'ion-ios-calculator'    =>  	'ios-calculator' ),
					array( 'ion-ios-calculator-outline'    =>  	'ios-calculator-outline' ),
					array( 'ion-ios-calendar'    =>  	'ios-calendar' ),
					array( 'ion-ios-calendar-outline'    =>  	'ios-calendar-outline' ),
					array( 'ion-ios-camera'    =>  	'ios-camera' ),
					array( 'ion-ios-camera-outline'    =>  	'ios-camera-outline' ),
					array( 'ion-ios-cart'    =>  	'ios-cart' ),
					array( 'ion-ios-cart-outline'    =>  	'ios-cart-outline' ),
					array( 'ion-ios-chatboxes'    =>  	'ios-chatboxes' ),
					array( 'ion-ios-chatboxes-outline'    =>  	'ios-chatboxes-outline' ),
					array( 'ion-ios-chatbubble'    =>  	'ios-chatbubble' ),
					array( 'ion-ios-chatbubble-outline'    =>  	'ios-chatbubble-outline' ),
					array( 'ion-ios-checkmark'    =>  	'ios-checkmark' ),
					array( 'ion-ios-checkmark-empty'    =>  	'ios-checkmark-empty' ),
					array( 'ion-ios-checkmark-outline'    =>  	'ios-checkmark-outline' ),
					array( 'ion-ios-circle-filled'    =>  	'ios-circle-filled' ),
					array( 'ion-ios-circle-outline'    =>  	'ios-circle-outline' ),
					array( 'ion-ios-clock'    =>  	'ios-clock' ),
					array( 'ion-ios-clock-outline'    =>  	'ios-clock-outline' ),
					array( 'ion-ios-close'    =>  	'ios-close' ),
					array( 'ion-ios-close-empty'    =>  	'ios-close-empty' ),
					array( 'ion-ios-close-outline'    =>  	'ios-close-outline' ),
					array( 'ion-ios-cloud'    =>  	'ios-cloud' ),
					array( 'ion-ios-cloud-download'    =>  	'ios-cloud-download' ),
					array( 'ion-ios-cloud-download-outline'    =>  	'ios-cloud-download-outline' ),
					array( 'ion-ios-cloud-outline'    =>  	'ios-cloud-outline' ),
					array( 'ion-ios-cloud-upload'    =>  	'ios-cloud-upload' ),
					array( 'ion-ios-cloud-upload-outline'    =>  	'ios-cloud-upload-outline' ),
					array( 'ion-ios-cloudy'    =>  	'ios-cloudy' ),
					array( 'ion-ios-cloudy-night'    =>  	'ios-cloudy-night' ),
					array( 'ion-ios-cloudy-night-outline'    =>  	'ios-cloudy-night-outline' ),
					array( 'ion-ios-cloudy-outline'    =>  	'ios-cloudy-outline' ),
					array( 'ion-ios-cog'    =>  	'ios-cog' ),
					array( 'ion-ios-cog-outline'    =>  	'ios-cog-outline' ),
					array( 'ion-ios-color-filter'    =>  	'ios-color-filter' ),
					array( 'ion-ios-color-filter-outline'    =>  	'ios-color-filter-outline' ),
					array( 'ion-ios-color-wand'    =>  	'ios-color-wand' ),
					array( 'ion-ios-color-wand-outline'    =>  	'ios-color-wand-outline' ),
					array( 'ion-ios-compose'    =>  	'ios-compose' ),
					array( 'ion-ios-compose-outline'    =>  	'ios-compose-outline' ),
					array( 'ion-ios-contact'    =>  	'ios-contact' ),
					array( 'ion-ios-contact-outline'    =>  	'ios-contact-outline' ),
					array( 'ion-ios-copy'    =>  	'ios-copy' ),
					array( 'ion-ios-copy-outline'    =>  	'ios-copy-outline' ),
					array( 'ion-ios-crop'    =>  	'ios-crop' ),
					array( 'ion-ios-crop-strong'    =>  	'ios-crop-strong' ),
					array( 'ion-ios-download'    =>  	'ios-download' ),
					array( 'ion-ios-download-outline'    =>  	'ios-download-outline' ),
					array( 'ion-ios-drag'    =>  	'ios-drag' ),
					array( 'ion-ios-email'    =>  	'ios-email' ),
					array( 'ion-ios-email-outline'    =>  	'ios-email-outline' ),
					array( 'ion-ios-eye'    =>  	'ios-eye' ),
					array( 'ion-ios-eye-outline'    =>  	'ios-eye-outline' ),
					array( 'ion-ios-fastforward'    =>  	'ios-fastforward' ),
					array( 'ion-ios-fastforward-outline'    =>  	'ios-fastforward-outline' ),
					array( 'ion-ios-filing'    =>  	'ios-filing' ),
					array( 'ion-ios-filing-outline'    =>  	'ios-filing-outline' ),
					array( 'ion-ios-film'    =>  	'ios-film' ),
					array( 'ion-ios-film-outline'    =>  	'ios-film-outline' ),
					array( 'ion-ios-flag'    =>  	'ios-flag' ),
					array( 'ion-ios-flag-outline'    =>  	'ios-flag-outline' ),
					array( 'ion-ios-flame'    =>  	'ios-flame' ),
					array( 'ion-ios-flame-outline'    =>  	'ios-flame-outline' ),
					array( 'ion-ios-flask'    =>  	'ios-flask' ),
					array( 'ion-ios-flask-outline'    =>  	'ios-flask-outline' ),
					array( 'ion-ios-flower'    =>  	'ios-flower' ),
					array( 'ion-ios-flower-outline'    =>  	'ios-flower-outline' ),
					array( 'ion-ios-folder'    =>  	'ios-folder' ),
					array( 'ion-ios-folder-outline'    =>  	'ios-folder-outline' ),
					array( 'ion-ios-football'    =>  	'ios-football' ),
					array( 'ion-ios-football-outline'    =>  	'ios-football-outline' ),
					array( 'ion-ios-game-controller-a'    =>  	'ios-game-controller-a' ),
					array( 'ion-ios-game-controller-a-outline'    =>  	'ios-game-controller-a-outline' ),
					array( 'ion-ios-game-controller-b'    =>  	'ios-game-controller-b' ),
					array( 'ion-ios-game-controller-b-outline'    =>  	'ios-game-controller-b-outline' ),
					array( 'ion-ios-gear'    =>  	'ios-gear' ),
					array( 'ion-ios-gear-outline'    =>  	'ios-gear-outline' ),
					array( 'ion-ios-glasses'    =>  	'ios-glasses' ),
					array( 'ion-ios-glasses-outline'    =>  	'ios-glasses-outline' ),
					array( 'ion-ios-grid-view'    =>  	'ios-grid-view' ),
					array( 'ion-ios-grid-view-outline'    =>  	'ios-grid-view-outline' ),
					array( 'ion-ios-heart'    =>  	'ios-heart' ),
					array( 'ion-ios-heart-outline'    =>  	'ios-heart-outline' ),
					array( 'ion-ios-help'    =>  	'ios-help' ),
					array( 'ion-ios-help-empty'    =>  	'ios-help-empty' ),
					array( 'ion-ios-help-outline'    =>  	'ios-help-outline' ),
					array( 'ion-ios-home'    =>  	'ios-home' ),
					array( 'ion-ios-home-outline'    =>  	'ios-home-outline' ),
					array( 'ion-ios-infinite'    =>  	'ios-infinite' ),
					array( 'ion-ios-infinite-outline'    =>  	'ios-infinite-outline' ),
					array( 'ion-ios-information'    =>  	'ios-information' ),
					array( 'ion-ios-information-empty'    =>  	'ios-information-empty' ),
					array( 'ion-ios-information-outline'    =>  	'ios-information-outline' ),
					array( 'ion-ios-ionic-outline'    =>  	'ios-ionic-outline' ),
					array( 'ion-ios-keypad'    =>  	'ios-keypad' ),
					array( 'ion-ios-keypad-outline'    =>  	'ios-keypad-outline' ),
					array( 'ion-ios-lightbulb'    =>  	'ios-lightbulb' ),
					array( 'ion-ios-lightbulb-outline'    =>  	'ios-lightbulb-outline' ),
					array( 'ion-ios-list'    =>  	'ios-list' ),
					array( 'ion-ios-list-outline'    =>  	'ios-list-outline' ),
					array( 'ion-ios-location'    =>  	'ios-location' ),
					array( 'ion-ios-location-outline'    =>  	'ios-location-outline' ),
					array( 'ion-ios-locked'    =>  	'ios-locked' ),
					array( 'ion-ios-locked-outline'    =>  	'ios-locked-outline' ),
					array( 'ion-ios-loop'    =>  	'ios-loop' ),
					array( 'ion-ios-loop-strong'    =>  	'ios-loop-strong' ),
					array( 'ion-ios-medical'    =>  	'ios-medical' ),
					array( 'ion-ios-medical-outline'    =>  	'ios-medical-outline' ),
					array( 'ion-ios-medkit'    =>  	'ios-medkit' ),
					array( 'ion-ios-medkit-outline'    =>  	'ios-medkit-outline' ),
					array( 'ion-ios-mic'    =>  	'ios-mic' ),
					array( 'ion-ios-mic-off'    =>  	'ios-mic-off' ),
					array( 'ion-ios-mic-outline'    =>  	'ios-mic-outline' ),
					array( 'ion-ios-minus'    =>  	'ios-minus' ),
					array( 'ion-ios-minus-empty'    =>  	'ios-minus-empty' ),
					array( 'ion-ios-minus-outline'    =>  	'ios-minus-outline' ),
					array( 'ion-ios-monitor'    =>  	'ios-monitor' ),
					array( 'ion-ios-monitor-outline'    =>  	'ios-monitor-outline' ),
					array( 'ion-ios-moon'    =>  	'ios-moon' ),
					array( 'ion-ios-moon-outline'    =>  	'ios-moon-outline' ),
					array( 'ion-ios-more'    =>  	'ios-more' ),
					array( 'ion-ios-more-outline'    =>  	'ios-more-outline' ),
					array( 'ion-ios-musical-note'    =>  	'ios-musical-note' ),
					array( 'ion-ios-musical-notes'    =>  	'ios-musical-notes' ),
					array( 'ion-ios-navigate'    =>  	'ios-navigate' ),
					array( 'ion-ios-navigate-outline'    =>  	'ios-navigate-outline' ),
					array( 'ion-ios-nutrition'    =>  	'ios-nutrition' ),
					array( 'ion-ios-nutrition-outline'    =>  	'ios-nutrition-outline' ),
					array( 'ion-ios-paper'    =>  	'ios-paper' ),
					array( 'ion-ios-paper-outline'    =>  	'ios-paper-outline' ),
					array( 'ion-ios-paperplane'    =>  	'ios-paperplane' ),
					array( 'ion-ios-paperplane-outline'    =>  	'ios-paperplane-outline' ),
					array( 'ion-ios-partlysunny'    =>  	'ios-partlysunny' ),
					array( 'ion-ios-partlysunny-outline'    =>  	'ios-partlysunny-outline' ),
					array( 'ion-ios-pause'    =>  	'ios-pause' ),
					array( 'ion-ios-pause-outline'    =>  	'ios-pause-outline' ),
					array( 'ion-ios-paw'    =>  	'ios-paw' ),
					array( 'ion-ios-paw-outline'    =>  	'ios-paw-outline' ),
					array( 'ion-ios-people'    =>  	'ios-people' ),
					array( 'ion-ios-people-outline'    =>  	'ios-people-outline' ),
					array( 'ion-ios-person'    =>  	'ios-person' ),
					array( 'ion-ios-person-outline'    =>  	'ios-person-outline' ),
					array( 'ion-ios-personadd'    =>  	'ios-personadd' ),
					array( 'ion-ios-personadd-outline'    =>  	'ios-personadd-outline' ),
					array( 'ion-ios-photos'    =>  	'ios-photos' ),
					array( 'ion-ios-photos-outline'    =>  	'ios-photos-outline' ),
					array( 'ion-ios-pie'    =>  	'ios-pie' ),
					array( 'ion-ios-pie-outline'    =>  	'ios-pie-outline' ),
					array( 'ion-ios-pint'    =>  	'ios-pint' ),
					array( 'ion-ios-pint-outline'    =>  	'ios-pint-outline' ),
					array( 'ion-ios-play'    =>  	'ios-play' ),
					array( 'ion-ios-play-outline'    =>  	'ios-play-outline' ),
					array( 'ion-ios-plus'    =>  	'ios-plus' ),
					array( 'ion-ios-plus-empty'    =>  	'ios-plus-empty' ),
					array( 'ion-ios-plus-outline'    =>  	'ios-plus-outline' ),
					array( 'ion-ios-pricetag'    =>  	'ios-pricetag' ),
					array( 'ion-ios-pricetag-outline'    =>  	'ios-pricetag-outline' ),
					array( 'ion-ios-pricetags'    =>  	'ios-pricetags' ),
					array( 'ion-ios-pricetags-outline'    =>  	'ios-pricetags-outline' ),
					array( 'ion-ios-printer'    =>  	'ios-printer' ),
					array( 'ion-ios-printer-outline'    =>  	'ios-printer-outline' ),
					array( 'ion-ios-pulse'    =>  	'ios-pulse' ),
					array( 'ion-ios-pulse-strong'    =>  	'ios-pulse-strong' ),
					array( 'ion-ios-rainy'    =>  	'ios-rainy' ),
					array( 'ion-ios-rainy-outline'    =>  	'ios-rainy-outline' ),
					array( 'ion-ios-recording'    =>  	'ios-recording' ),
					array( 'ion-ios-recording-outline'    =>  	'ios-recording-outline' ),
					array( 'ion-ios-redo'    =>  	'ios-redo' ),
					array( 'ion-ios-redo-outline'    =>  	'ios-redo-outline' ),
					array( 'ion-ios-refresh'    =>  	'ios-refresh' ),
					array( 'ion-ios-refresh-empty'    =>  	'ios-refresh-empty' ),
					array( 'ion-ios-refresh-outline'    =>  	'ios-refresh-outline' ),
					array( 'ion-ios-reload'    =>  	'ios-reload' ),
					array( 'ion-ios-reverse-camera'    =>  	'ios-reverse-camera' ),
					array( 'ion-ios-reverse-camera-outline'    =>  	'ios-reverse-camera-outline' ),
					array( 'ion-ios-rewind'    =>  	'ios-rewind' ),
					array( 'ion-ios-rewind-outline'    =>  	'ios-rewind-outline' ),
					array( 'ion-ios-rose'    =>  	'ios-rose' ),
					array( 'ion-ios-rose-outline'    =>  	'ios-rose-outline' ),
					array( 'ion-ios-search'    =>  	'ios-search' ),
					array( 'ion-ios-search-strong'    =>  	'ios-search-strong' ),
					array( 'ion-ios-settings'    =>  	'ios-settings' ),
					array( 'ion-ios-settings-strong'    =>  	'ios-settings-strong' ),
					array( 'ion-ios-shuffle'    =>  	'ios-shuffle' ),
					array( 'ion-ios-shuffle-strong'    =>  	'ios-shuffle-strong' ),
					array( 'ion-ios-skipbackward'    =>  	'ios-skipbackward' ),
					array( 'ion-ios-skipbackward-outline'    =>  	'ios-skipbackward-outline' ),
					array( 'ion-ios-skipforward'    =>  	'ios-skipforward' ),
					array( 'ion-ios-skipforward-outline'    =>  	'ios-skipforward-outline' ),
					array( 'ion-ios-snowy'    =>  	'ios-snowy' ),
					array( 'ion-ios-speedometer'    =>  	'ios-speedometer' ),
					array( 'ion-ios-speedometer-outline'    =>  	'ios-speedometer-outline' ),
					array( 'ion-ios-star'    =>  	'ios-star' ),
					array( 'ion-ios-star-half'    =>  	'ios-star-half' ),
					array( 'ion-ios-star-outline'    =>  	'ios-star-outline' ),
					array( 'ion-ios-stopwatch'    =>  	'ios-stopwatch' ),
					array( 'ion-ios-stopwatch-outline'    =>  	'ios-stopwatch-outline' ),
					array( 'ion-ios-sunny'    =>  	'ios-sunny' ),
					array( 'ion-ios-sunny-outline'    =>  	'ios-sunny-outline' ),
					array( 'ion-ios-telephone'    =>  	'ios-telephone' ),
					array( 'ion-ios-telephone-outline'    =>  	'ios-telephone-outline' ),
					array( 'ion-ios-tennisball'    =>  	'ios-tennisball' ),
					array( 'ion-ios-tennisball-outline'    =>  	'ios-tennisball-outline' ),
					array( 'ion-ios-thunderstorm'    =>  	'ios-thunderstorm' ),
					array( 'ion-ios-thunderstorm-outline'    =>  	'ios-thunderstorm-outline' ),
					array( 'ion-ios-time'    =>  	'ios-time' ),
					array( 'ion-ios-time-outline'    =>  	'ios-time-outline' ),
					array( 'ion-ios-timer'    =>  	'ios-timer' ),
					array( 'ion-ios-timer-outline'    =>  	'ios-timer-outline' ),
					array( 'ion-ios-toggle'    =>  	'ios-toggle' ),
					array( 'ion-ios-toggle-outline'    =>  	'ios-toggle-outline' ),
					array( 'ion-ios-trash'    =>  	'ios-trash' ),
					array( 'ion-ios-trash-outline'    =>  	'ios-trash-outline' ),
					array( 'ion-ios-undo'    =>  	'ios-undo' ),
					array( 'ion-ios-undo-outline'    =>  	'ios-undo-outline' ),
					array( 'ion-ios-unlocked'    =>  	'ios-unlocked' ),
					array( 'ion-ios-unlocked-outline'    =>  	'ios-unlocked-outline' ),
					array( 'ion-ios-upload'    =>  	'ios-upload' ),
					array( 'ion-ios-upload-outline'    =>  	'ios-upload-outline' ),
					array( 'ion-ios-videocam'    =>  	'ios-videocam' ),
					array( 'ion-ios-videocam-outline'    =>  	'ios-videocam-outline' ),
					array( 'ion-ios-volume-high'    =>  	'ios-volume-high' ),
					array( 'ion-ios-volume-low'    =>  	'ios-volume-low' ),
					array( 'ion-ios-wineglass'    =>  	'ios-wineglass' ),
					array( 'ion-ios-wineglass-outline'    =>  	'ios-wineglass-outline' ),
					array( 'ion-ios-world'    =>  	'ios-world' ),
					array( 'ion-ios-world-outline'    =>  	'ios-world-outline' ),
					array( 'ion-ipad'    =>  	'ipad' ),
					array( 'ion-iphone'    =>  	'iphone' ),
					array( 'ion-ipod'    =>  	'ipod' ),
					array( 'ion-jet'    =>  	'jet' ),
					array( 'ion-key'    =>  	'key' ),
					array( 'ion-knife'    =>  	'knife' ),
					array( 'ion-laptop'    =>  	'laptop' ),
					array( 'ion-leaf'    =>  	'leaf' ),
					array( 'ion-levels'    =>  	'levels' ),
					array( 'ion-lightbulb'    =>  	'lightbulb' ),
					array( 'ion-link'    =>  	'link' ),
					array( 'ion-load-a'    =>  	'load-a' ),
					array( 'ion-load-b'    =>  	'load-b' ),
					array( 'ion-load-c'    =>  	'load-c' ),
					array( 'ion-load-d'    =>  	'load-d' ),
					array( 'ion-location'    =>  	'location' ),
					array( 'ion-lock-combination'    =>  	'lock-combination' ),
					array( 'ion-locked'    =>  	'locked' ),
					array( 'ion-log-in'    =>  	'log-in' ),
					array( 'ion-log-out'    =>  	'log-out' ),
					array( 'ion-loop'    =>  	'loop' ),
					array( 'ion-magnet'    =>  	'magnet' ),
					array( 'ion-male'    =>  	'male' ),
					array( 'ion-man'    =>  	'man' ),
					array( 'ion-map'    =>  	'map' ),
					array( 'ion-medkit'    =>  	'medkit' ),
					array( 'ion-merge'    =>  	'merge' ),
					array( 'ion-mic-a'    =>  	'mic-a' ),
					array( 'ion-mic-b'    =>  	'mic-b' ),
					array( 'ion-mic-c'    =>  	'mic-c' ),
					array( 'ion-minus'    =>  	'minus' ),
					array( 'ion-minus-circled'    =>  	'minus-circled' ),
					array( 'ion-minus-round'    =>  	'minus-round' ),
					array( 'ion-model-s'    =>  	'model-s' ),
					array( 'ion-monitor'    =>  	'monitor' ),
					array( 'ion-more'    =>  	'more' ),
					array( 'ion-mouse'    =>  	'mouse' ),
					array( 'ion-music-note'    =>  	'music-note' ),
					array( 'ion-navicon'    =>  	'navicon' ),
					array( 'ion-navicon-round'    =>  	'navicon-round' ),
					array( 'ion-navigate'    =>  	'navigate' ),
					array( 'ion-network'    =>  	'network' ),
					array( 'ion-no-smoking'    =>  	'no-smoking' ),
					array( 'ion-nuclear'    =>  	'nuclear' ),
					array( 'ion-outlet'    =>  	'outlet' ),
					array( 'ion-paintbrush'    =>  	'paintbrush' ),
					array( 'ion-paintbucket'    =>  	'paintbucket' ),
					array( 'ion-paper-airplane'    =>  	'paper-airplane' ),
					array( 'ion-paperclip'    =>  	'paperclip' ),
					array( 'ion-pause'    =>  	'pause' ),
					array( 'ion-person'    =>  	'person' ),
					array( 'ion-person-add'    =>  	'person-add' ),
					array( 'ion-person-stalker'    =>  	'person-stalker' ),
					array( 'ion-pie-graph'    =>  	'pie-graph' ),
					array( 'ion-pin'    =>  	'pin' ),
					array( 'ion-pinpoint'    =>  	'pinpoint' ),
					array( 'ion-pizza'    =>  	'pizza' ),
					array( 'ion-plane'    =>  	'plane' ),
					array( 'ion-planet'    =>  	'planet' ),
					array( 'ion-play'    =>  	'play' ),
					array( 'ion-playstation'    =>  	'playstation' ),
					array( 'ion-plus'    =>  	'plus' ),
					array( 'ion-plus-circled'    =>  	'plus-circled' ),
					array( 'ion-plus-round'    =>  	'plus-round' ),
					array( 'ion-podium'    =>  	'podium' ),
					array( 'ion-pound'    =>  	'pound' ),
					array( 'ion-power'    =>  	'power' ),
					array( 'ion-pricetag'    =>  	'pricetag' ),
					array( 'ion-pricetags'    =>  	'pricetags' ),
					array( 'ion-printer'    =>  	'printer' ),
					array( 'ion-pull-request'    =>  	'pull-request' ),
					array( 'ion-qr-scanner'    =>  	'qr-scanner' ),
					array( 'ion-quote'    =>  	'quote' ),
					array( 'ion-radio-waves'    =>  	'radio-waves' ),
					array( 'ion-record'    =>  	'record' ),
					array( 'ion-refresh'    =>  	'refresh' ),
					array( 'ion-reply'    =>  	'reply' ),
					array( 'ion-reply-all'    =>  	'reply-all' ),
					array( 'ion-ribbon-a'    =>  	'ribbon-a' ),
					array( 'ion-ribbon-b'    =>  	'ribbon-b' ),
					array( 'ion-sad'    =>  	'sad' ),
					array( 'ion-sad-outline'    =>  	'sad-outline' ),
					array( 'ion-scissors'    =>  	'scissors' ),
					array( 'ion-search'    =>  	'search' ),
					array( 'ion-settings'    =>  	'settings' ),
					array( 'ion-share'    =>  	'share' ),
					array( 'ion-shuffle'    =>  	'shuffle' ),
					array( 'ion-skip-backward'    =>  	'skip-backward' ),
					array( 'ion-skip-forward'    =>  	'skip-forward' ),
					array( 'ion-social-android'    =>  	'social-android' ),
					array( 'ion-social-android-outline'    =>  	'social-android-outline' ),
					array( 'ion-social-angular'    =>  	'social-angular' ),
					array( 'ion-social-angular-outline'    =>  	'social-angular-outline' ),
					array( 'ion-social-apple'    =>  	'social-apple' ),
					array( 'ion-social-apple-outline'    =>  	'social-apple-outline' ),
					array( 'ion-social-bitcoin'    =>  	'social-bitcoin' ),
					array( 'ion-social-bitcoin-outline'    =>  	'social-bitcoin-outline' ),
					array( 'ion-social-buffer'    =>  	'social-buffer' ),
					array( 'ion-social-buffer-outline'    =>  	'social-buffer-outline' ),
					array( 'ion-social-chrome'    =>  	'social-chrome' ),
					array( 'ion-social-chrome-outline'    =>  	'social-chrome-outline' ),
					array( 'ion-social-codepen'    =>  	'social-codepen' ),
					array( 'ion-social-codepen-outline'    =>  	'social-codepen-outline' ),
					array( 'ion-social-css3'    =>  	'social-css3' ),
					array( 'ion-social-css3-outline'    =>  	'social-css3-outline' ),
					array( 'ion-social-designernews'    =>  	'social-designernews' ),
					array( 'ion-social-designernews-outline'    =>  	'social-designernews-outline' ),
					array( 'ion-social-dribbble'    =>  	'social-dribbble' ),
					array( 'ion-social-dribbble-outline'    =>  	'social-dribbble-outline' ),
					array( 'ion-social-dropbox'    =>  	'social-dropbox' ),
					array( 'ion-social-dropbox-outline'    =>  	'social-dropbox-outline' ),
					array( 'ion-social-euro'    =>  	'social-euro' ),
					array( 'ion-social-euro-outline'    =>  	'social-euro-outline' ),
					array( 'ion-social-facebook'    =>  	'social-facebook' ),
					array( 'ion-social-facebook-outline'    =>  	'social-facebook-outline' ),
					array( 'ion-social-foursquare'    =>  	'social-foursquare' ),
					array( 'ion-social-foursquare-outline'    =>  	'social-foursquare-outline' ),
					array( 'ion-social-freebsd-devil'    =>  	'social-freebsd-devil' ),
					array( 'ion-social-github'    =>  	'social-github' ),
					array( 'ion-social-github-outline'    =>  	'social-github-outline' ),
					array( 'ion-social-google'    =>  	'social-google' ),
					array( 'ion-social-google-outline'    =>  	'social-google-outline' ),
					array( 'ion-social-googleplus'    =>  	'social-googleplus' ),
					array( 'ion-social-googleplus-outline'    =>  	'social-googleplus-outline' ),
					array( 'ion-social-hackernews'    =>  	'social-hackernews' ),
					array( 'ion-social-hackernews-outline'    =>  	'social-hackernews-outline' ),
					array( 'ion-social-html5'    =>  	'social-html5' ),
					array( 'ion-social-html5-outline'    =>  	'social-html5-outline' ),
					array( 'ion-social-instagram'    =>  	'social-instagram' ),
					array( 'ion-social-instagram-outline'    =>  	'social-instagram-outline' ),
					array( 'ion-social-javascript'    =>  	'social-javascript' ),
					array( 'ion-social-javascript-outline'    =>  	'social-javascript-outline' ),
					array( 'ion-social-linkedin'    =>  	'social-linkedin' ),
					array( 'ion-social-linkedin-outline'    =>  	'social-linkedin-outline' ),
					array( 'ion-social-markdown'    =>  	'social-markdown' ),
					array( 'ion-social-nodejs'    =>  	'social-nodejs' ),
					array( 'ion-social-octocat'    =>  	'social-octocat' ),
					array( 'ion-social-pinterest'    =>  	'social-pinterest' ),
					array( 'ion-social-pinterest-outline'    =>  	'social-pinterest-outline' ),
					array( 'ion-social-python'    =>  	'social-python' ),
					array( 'ion-social-reddit'    =>  	'social-reddit' ),
					array( 'ion-social-reddit-outline'    =>  	'social-reddit-outline' ),
					array( 'ion-social-rss'    =>  	'social-rss' ),
					array( 'ion-social-rss-outline'    =>  	'social-rss-outline' ),
					array( 'ion-social-sass'    =>  	'social-sass' ),
					array( 'ion-social-skype'    =>  	'social-skype' ),
					array( 'ion-social-skype-outline'    =>  	'social-skype-outline' ),
					array( 'ion-social-snapchat'    =>  	'social-snapchat' ),
					array( 'ion-social-snapchat-outline'    =>  	'social-snapchat-outline' ),
					array( 'ion-social-tumblr'    =>  	'social-tumblr' ),
					array( 'ion-social-tumblr-outline'    =>  	'social-tumblr-outline' ),
					array( 'ion-social-tux'    =>  	'social-tux' ),
					array( 'ion-social-twitch'    =>  	'social-twitch' ),
					array( 'ion-social-twitch-outline'    =>  	'social-twitch-outline' ),
					array( 'ion-social-twitter'    =>  	'social-twitter' ),
					array( 'ion-social-twitter-outline'    =>  	'social-twitter-outline' ),
					array( 'ion-social-usd'    =>  	'social-usd' ),
					array( 'ion-social-usd-outline'    =>  	'social-usd-outline' ),
					array( 'ion-social-vimeo'    =>  	'social-vimeo' ),
					array( 'ion-social-vimeo-outline'    =>  	'social-vimeo-outline' ),
					array( 'ion-social-whatsapp'    =>  	'social-whatsapp' ),
					array( 'ion-social-whatsapp-outline'    =>  	'social-whatsapp-outline' ),
					array( 'ion-social-windows'    =>  	'social-windows' ),
					array( 'ion-social-windows-outline'    =>  	'social-windows-outline' ),
					array( 'ion-social-wordpress'    =>  	'social-wordpress' ),
					array( 'ion-social-wordpress-outline'    =>  	'social-wordpress-outline' ),
					array( 'ion-social-yahoo'    =>  	'social-yahoo' ),
					array( 'ion-social-yahoo-outline'    =>  	'social-yahoo-outline' ),
					array( 'ion-social-yen'    =>  	'social-yen' ),
					array( 'ion-social-yen-outline'    =>  	'social-yen-outline' ),
					array( 'ion-social-youtube'    =>  	'social-youtube' ),
					array( 'ion-social-youtube-outline'    =>  	'social-youtube-outline' ),
					array( 'ion-soup-can'    =>  	'soup-can' ),
					array( 'ion-soup-can-outline'    =>  	'soup-can-outline' ),
					array( 'ion-speakerphone'    =>  	'speakerphone' ),
					array( 'ion-speedometer'    =>  	'speedometer' ),
					array( 'ion-spoon'    =>  	'spoon' ),
					array( 'ion-star'    =>  	'star' ),
					array( 'ion-stats-bars'    =>  	'stats-bars' ),
					array( 'ion-steam'    =>  	'steam' ),
					array( 'ion-stop'    =>  	'stop' ),
					array( 'ion-thermometer'    =>  	'thermometer' ),
					array( 'ion-thumbsdown'    =>  	'thumbsdown' ),
					array( 'ion-thumbsup'    =>  	'thumbsup' ),
					array( 'ion-toggle'    =>  	'toggle' ),
					array( 'ion-toggle-filled'    =>  	'toggle-filled' ),
					array( 'ion-transgender'    =>  	'transgender' ),
					array( 'ion-trash-a'    =>  	'trash-a' ),
					array( 'ion-trash-b'    =>  	'trash-b' ),
					array( 'ion-trophy'    =>  	'trophy' ),
					array( 'ion-tshirt'    =>  	'tshirt' ),
					array( 'ion-tshirt-outline'    =>  	'tshirt-outline' ),
					array( 'ion-umbrella'    =>  	'umbrella' ),
					array( 'ion-university'    =>  	'university' ),
					array( 'ion-unlocked'    =>  	'unlocked' ),
					array( 'ion-upload'    =>  	'upload' ),
					array( 'ion-usb'    =>  	'usb' ),
					array( 'ion-videocamera'    =>  	'videocamera' ),
					array( 'ion-volume-high'    =>  	'volume-high' ),
					array( 'ion-volume-low'    =>  	'volume-low' ),
					array( 'ion-volume-medium'    =>  	'volume-medium' ),
					array( 'ion-volume-mute'    =>  	'volume-mute' ),
					array( 'ion-wand'    =>  	'wand' ),
					array( 'ion-waterdrop'    =>  	'waterdrop' ),
					array( 'ion-wifi'    =>  	'wifi' ),
					array( 'ion-wineglass'    =>  	'wineglass' ),
					array( 'ion-woman'    =>  	'woman' ),
					array( 'ion-wrench'    =>  	'wrench' ),
					array( 'ion-xbox'    =>  	'xbox' ),
				),
				'FontAwesome' => array(
					array( 'fa fa-glass' 	=>    'glass' ), 
					array( 'fa fa-music' 	=>    'music' ), 
					array( 'fa fa-search' 	=>    'search' ), 
					array( 'fa fa-envelope-o' 	=>    'envelope-o' ), 
					array( 'fa fa-heart' 	=>    'heart' ), 
					array( 'fa fa-star' 	=>    'star' ), 
					array( 'fa fa-star-o' 	=>    'star-o' ), 
					array( 'fa fa-user' 	=>    'user' ), 
					array( 'fa fa-film' 	=>    'film' ), 
					array( 'fa fa-th-large' 	=>    'th-large' ), 
					array( 'fa fa-th' 	=>    'th' ), 
					array( 'fa fa-th-list' 	=>    'th-list' ), 
					array( 'fa fa-check' 	=>    'check' ), 
					array( 'fa fa-remove'	=>    'remove' ),
					array( 'fa fa-close'	=>    'close' ),
					array( 'fa fa-times' 	=>    'times' ), 
					array( 'fa fa-search-plus' 	=>    'search-plus' ), 
					array( 'fa fa-search-minus' 	=>    'search-minus' ), 
					array( 'fa fa-power-off' 	=>    'power-off' ), 
					array( 'fa fa-signal' 	=>    'signal' ), 
					array( 'fa fa-gear'	=>    'gear' ),
					array( 'fa fa-cog' 	=>    'cog' ), 
					array( 'fa fa-trash-o' 	=>    'trash-o' ), 
					array( 'fa fa-home' 	=>    'home' ), 
					array( 'fa fa-file-o' 	=>    'file-o' ), 
					array( 'fa fa-clock-o' 	=>    'clock-o' ), 
					array( 'fa fa-road' 	=>    'road' ), 
					array( 'fa fa-download' 	=>    'download' ), 
					array( 'fa fa-arrow-circle-o-down' 	=>    'arrow-circle-o-down' ), 
					array( 'fa fa-arrow-circle-o-up' 	=>    'arrow-circle-o-up' ), 
					array( 'fa fa-inbox' 	=>    'inbox' ), 
					array( 'fa fa-play-circle-o' 	=>    'play-circle-o' ), 
					array( 'fa fa-rotate-right'	=>    'rotate-right' ),
					array( 'fa fa-repeat' 	=>    'repeat' ), 
					array( 'fa fa-refresh' 	=>    'refresh' ), 
					array( 'fa fa-list-alt' 	=>    'list-alt' ), 
					array( 'fa fa-lock' 	=>    'lock' ), 
					array( 'fa fa-flag' 	=>    'flag' ), 
					array( 'fa fa-headphones' 	=>    'headphones' ), 
					array( 'fa fa-volume-off' 	=>    'volume-off' ), 
					array( 'fa fa-volume-down' 	=>    'volume-down' ), 
					array( 'fa fa-volume-up' 	=>    'volume-up' ), 
					array( 'fa fa-qrcode' 	=>    'qrcode' ), 
					array( 'fa fa-barcode' 	=>    'barcode' ), 
					array( 'fa fa-tag' 	=>    'tag' ), 
					array( 'fa fa-tags' 	=>    'tags' ), 
					array( 'fa fa-book' 	=>    'book' ), 
					array( 'fa fa-bookmark' 	=>    'bookmark' ), 
					array( 'fa fa-print' 	=>    'print' ), 
					array( 'fa fa-camera' 	=>    'camera' ), 
					array( 'fa fa-font' 	=>    'font' ), 
					array( 'fa fa-bold' 	=>    'bold' ), 
					array( 'fa fa-italic' 	=>    'italic' ), 
					array( 'fa fa-text-height' 	=>    'text-height' ), 
					array( 'fa fa-text-width' 	=>    'text-width' ), 
					array( 'fa fa-align-left' 	=>    'align-left' ), 
					array( 'fa fa-align-center' 	=>    'align-center' ), 
					array( 'fa fa-align-right' 	=>    'align-right' ), 
					array( 'fa fa-align-justify' 	=>    'align-justify' ), 
					array( 'fa fa-list' 	=>    'list' ), 
					array( 'fa fa-dedent'	=>    'dedent' ),
					array( 'fa fa-outdent' 	=>    'outdent' ), 
					array( 'fa fa-indent' 	=>    'indent' ), 
					array( 'fa fa-video-camera' 	=>    'video-camera' ), 
					array( 'fa fa-photo'	=>    'photo' ),
					array( 'fa fa-image'	=>    'image' ),
					array( 'fa fa-picture-o' 	=>    'picture-o' ), 
					array( 'fa fa-pencil' 	=>    'pencil' ), 
					array( 'fa fa-map-marker' 	=>    'map-marker' ), 
					array( 'fa fa-adjust' 	=>    'adjust' ), 
					array( 'fa fa-tint' 	=>    'tint' ), 
					array( 'fa fa-edit'	=>    'edit' ),
					array( 'fa fa-pencil-square-o' 	=>    'pencil-square-o' ), 
					array( 'fa fa-share-square-o' 	=>    'share-square-o' ), 
					array( 'fa fa-check-square-o' 	=>    'check-square-o' ), 
					array( 'fa fa-arrows' 	=>    'arrows' ), 
					array( 'fa fa-step-backward' 	=>    'step-backward' ), 
					array( 'fa fa-fast-backward' 	=>    'fast-backward' ), 
					array( 'fa fa-backward' 	=>    'backward' ), 
					array( 'fa fa-play' 	=>    'play' ), 
					array( 'fa fa-pause' 	=>    'pause' ), 
					array( 'fa fa-stop' 	=>    'stop' ), 
					array( 'fa fa-forward' 	=>    'forward' ), 
					array( 'fa fa-fast-forward' 	=>    'fast-forward' ), 
					array( 'fa fa-step-forward' 	=>    'step-forward' ), 
					array( 'fa fa-eject' 	=>    'eject' ), 
					array( 'fa fa-chevron-left' 	=>    'chevron-left' ), 
					array( 'fa fa-chevron-right' 	=>    'chevron-right' ), 
					array( 'fa fa-plus-circle' 	=>    'plus-circle' ), 
					array( 'fa fa-minus-circle' 	=>    'minus-circle' ), 
					array( 'fa fa-times-circle' 	=>    'times-circle' ), 
					array( 'fa fa-check-circle' 	=>    'check-circle' ), 
					array( 'fa fa-question-circle' 	=>    'question-circle' ), 
					array( 'fa fa-info-circle' 	=>    'info-circle' ), 
					array( 'fa fa-crosshairs' 	=>    'crosshairs' ), 
					array( 'fa fa-times-circle-o' 	=>    'times-circle-o' ), 
					array( 'fa fa-check-circle-o' 	=>    'check-circle-o' ), 
					array( 'fa fa-ban' 	=>    'ban' ), 
					array( 'fa fa-arrow-left' 	=>    'arrow-left' ), 
					array( 'fa fa-arrow-right' 	=>    'arrow-right' ), 
					array( 'fa fa-arrow-up' 	=>    'arrow-up' ), 
					array( 'fa fa-arrow-down' 	=>    'arrow-down' ), 
					array( 'fa fa-mail-forward'	=>    'mail-forward' ),
					array( 'fa fa-share' 	=>    'share' ), 
					array( 'fa fa-expand' 	=>    'expand' ), 
					array( 'fa fa-compress' 	=>    'compress' ), 
					array( 'fa fa-plus' 	=>    'plus' ), 
					array( 'fa fa-minus' 	=>    'minus' ), 
					array( 'fa fa-asterisk' 	=>    'asterisk' ), 
					array( 'fa fa-exclamation-circle' 	=>    'exclamation-circle' ), 
					array( 'fa fa-gift' 	=>    'gift' ), 
					array( 'fa fa-leaf' 	=>    'leaf' ), 
					array( 'fa fa-fire' 	=>    'fire' ), 
					array( 'fa fa-eye' 	=>    'eye' ), 
					array( 'fa fa-eye-slash' 	=>    'eye-slash' ), 
					array( 'fa fa-warning'	=>    'warning' ),
					array( 'fa fa-exclamation-triangle' 	=>    'exclamation-triangle' ), 
					array( 'fa fa-plane' 	=>    'plane' ), 
					array( 'fa fa-calendar' 	=>    'calendar' ), 
					array( 'fa fa-random' 	=>    'random' ), 
					array( 'fa fa-comment' 	=>    'comment' ), 
					array( 'fa fa-magnet' 	=>    'magnet' ), 
					array( 'fa fa-chevron-up' 	=>    'chevron-up' ), 
					array( 'fa fa-chevron-down' 	=>    'chevron-down' ), 
					array( 'fa fa-retweet' 	=>    'retweet' ), 
					array( 'fa fa-shopping-cart' 	=>    'shopping-cart' ), 
					array( 'fa fa-folder' 	=>    'folder' ), 
					array( 'fa fa-folder-open' 	=>    'folder-open' ), 
					array( 'fa fa-arrows-v' 	=>    'arrows-v' ), 
					array( 'fa fa-arrows-h' 	=>    'arrows-h' ), 
					array( 'fa fa-bar-chart-o'	=>    'bar-chart-o' ),
					array( 'fa fa-bar-chart' 	=>    'bar-chart' ), 
					array( 'fa fa-twitter-square' 	=>    'twitter-square' ), 
					array( 'fa fa-facebook-square' 	=>    'facebook-square' ), 
					array( 'fa fa-camera-retro' 	=>    'camera-retro' ), 
					array( 'fa fa-key' 	=>    'key' ), 
					array( 'fa fa-gears'	=>    'gears' ),
					array( 'fa fa-cogs' 	=>    'cogs' ), 
					array( 'fa fa-comments' 	=>    'comments' ), 
					array( 'fa fa-thumbs-o-up' 	=>    'thumbs-o-up' ), 
					array( 'fa fa-thumbs-o-down' 	=>    'thumbs-o-down' ), 
					array( 'fa fa-star-half' 	=>    'star-half' ), 
					array( 'fa fa-heart-o' 	=>    'heart-o' ), 
					array( 'fa fa-sign-out' 	=>    'sign-out' ), 
					array( 'fa fa-linkedin-square' 	=>    'linkedin-square' ), 
					array( 'fa fa-thumb-tack' 	=>    'thumb-tack' ), 
					array( 'fa fa-external-link' 	=>    'external-link' ), 
					array( 'fa fa-sign-in' 	=>    'sign-in' ), 
					array( 'fa fa-trophy' 	=>    'trophy' ), 
					array( 'fa fa-github-square' 	=>    'github-square' ), 
					array( 'fa fa-upload' 	=>    'upload' ), 
					array( 'fa fa-lemon-o' 	=>    'lemon-o' ), 
					array( 'fa fa-phone' 	=>    'phone' ), 
					array( 'fa fa-square-o' 	=>    'square-o' ), 
					array( 'fa fa-bookmark-o' 	=>    'bookmark-o' ), 
					array( 'fa fa-phone-square' 	=>    'phone-square' ), 
					array( 'fa fa-twitter' 	=>    'twitter' ), 
					array( 'fa fa-facebook-f'	=>    'facebook-f' ),
					array( 'fa fa-facebook' 	=>    'facebook' ), 
					array( 'fa fa-github' 	=>    'github' ), 
					array( 'fa fa-unlock' 	=>    'unlock' ), 
					array( 'fa fa-credit-card' 	=>    'credit-card' ), 
					array( 'fa fa-feed'	=>    'feed' ),
					array( 'fa fa-rss' 	=>    'rss' ), 
					array( 'fa fa-hdd-o' 	=>    'hdd-o' ), 
					array( 'fa fa-bullhorn' 	=>    'bullhorn' ), 
					array( 'fa fa-bell' 	=>    'bell' ), 
					array( 'fa fa-certificate' 	=>    'certificate' ), 
					array( 'fa fa-hand-o-right' 	=>    'hand-o-right' ), 
					array( 'fa fa-hand-o-left' 	=>    'hand-o-left' ), 
					array( 'fa fa-hand-o-up' 	=>    'hand-o-up' ), 
					array( 'fa fa-hand-o-down' 	=>    'hand-o-down' ), 
					array( 'fa fa-arrow-circle-left' 	=>    'arrow-circle-left' ), 
					array( 'fa fa-arrow-circle-right' 	=>    'arrow-circle-right' ), 
					array( 'fa fa-arrow-circle-up' 	=>    'arrow-circle-up' ), 
					array( 'fa fa-arrow-circle-down' 	=>    'arrow-circle-down' ), 
					array( 'fa fa-globe' 	=>    'globe' ), 
					array( 'fa fa-wrench' 	=>    'wrench' ), 
					array( 'fa fa-tasks' 	=>    'tasks' ), 
					array( 'fa fa-filter' 	=>    'filter' ), 
					array( 'fa fa-briefcase' 	=>    'briefcase' ), 
					array( 'fa fa-arrows-alt' 	=>    'arrows-alt' ), 
					array( 'fa fa-group'	=>    'group' ),
					array( 'fa fa-users' 	=>    'users' ), 
					array( 'fa fa-chain'	=>    'chain' ),
					array( 'fa fa-link' 	=>    'link' ), 
					array( 'fa fa-cloud' 	=>    'cloud' ), 
					array( 'fa fa-flask' 	=>    'flask' ), 
					array( 'fa fa-cut'	=>    'cut' ),
					array( 'fa fa-scissors' 	=>    'scissors' ), 
					array( 'fa fa-copy'	=>    'copy' ),
					array( 'fa fa-files-o' 	=>    'files-o' ), 
					array( 'fa fa-paperclip' 	=>    'paperclip' ), 
					array( 'fa fa-save'	=>    'save' ),
					array( 'fa fa-floppy-o' 	=>    'floppy-o' ), 
					array( 'fa fa-square' 	=>    'square' ), 
					array( 'fa fa-navicon'	=>    'navicon' ),
					array( 'fa fa-reorder'	=>    'reorder' ),
					array( 'fa fa-bars' 	=>    'bars' ), 
					array( 'fa fa-list-ul' 	=>    'list-ul' ), 
					array( 'fa fa-list-ol' 	=>    'list-ol' ), 
					array( 'fa fa-strikethrough' 	=>    'strikethrough' ), 
					array( 'fa fa-underline' 	=>    'underline' ), 
					array( 'fa fa-table' 	=>    'table' ), 
					array( 'fa fa-magic' 	=>    'magic' ), 
					array( 'fa fa-truck' 	=>    'truck' ), 
					array( 'fa fa-pinterest' 	=>    'pinterest' ), 
					array( 'fa fa-pinterest-square' 	=>    'pinterest-square' ), 
					array( 'fa fa-google-plus-square' 	=>    'google-plus-square' ), 
					array( 'fa fa-google-plus' 	=>    'google-plus' ), 
					array( 'fa fa-money' 	=>    'money' ), 
					array( 'fa fa-caret-down' 	=>    'caret-down' ), 
					array( 'fa fa-caret-up' 	=>    'caret-up' ), 
					array( 'fa fa-caret-left' 	=>    'caret-left' ), 
					array( 'fa fa-caret-right' 	=>    'caret-right' ), 
					array( 'fa fa-columns' 	=>    'columns' ), 
					array( 'fa fa-unsorted'	=>    'unsorted' ),
					array( 'fa fa-sort' 	=>    'sort' ), 
					array( 'fa fa-sort-down'	=>    'sort-down' ),
					array( 'fa fa-sort-desc' 	=>    'sort-desc' ), 
					array( 'fa fa-sort-up'	=>    'sort-up' ),
					array( 'fa fa-sort-asc' 	=>    'sort-asc' ), 
					array( 'fa fa-envelope' 	=>    'envelope' ), 
					array( 'fa fa-linkedin' 	=>    'linkedin' ), 
					array( 'fa fa-rotate-left'	=>    'rotate-left' ),
					array( 'fa fa-undo' 	=>    'undo' ), 
					array( 'fa fa-legal'	=>    'legal' ),
					array( 'fa fa-gavel' 	=>    'gavel' ), 
					array( 'fa fa-dashboard'	=>    'dashboard' ),
					array( 'fa fa-tachometer' 	=>    'tachometer' ), 
					array( 'fa fa-comment-o' 	=>    'comment-o' ), 
					array( 'fa fa-comments-o' 	=>    'comments-o' ), 
					array( 'fa fa-flash'	=>    'flash' ),
					array( 'fa fa-bolt' 	=>    'bolt' ), 
					array( 'fa fa-sitemap' 	=>    'sitemap' ), 
					array( 'fa fa-umbrella' 	=>    'umbrella' ), 
					array( 'fa fa-paste'	=>    'paste' ),
					array( 'fa fa-clipboard' 	=>    'clipboard' ), 
					array( 'fa fa-lightbulb-o' 	=>    'lightbulb-o' ), 
					array( 'fa fa-exchange' 	=>    'exchange' ), 
					array( 'fa fa-cloud-download' 	=>    'cloud-download' ), 
					array( 'fa fa-cloud-upload' 	=>    'cloud-upload' ), 
					array( 'fa fa-user-md' 	=>    'user-md' ), 
					array( 'fa fa-stethoscope' 	=>    'stethoscope' ), 
					array( 'fa fa-suitcase' 	=>    'suitcase' ), 
					array( 'fa fa-bell-o' 	=>    'bell-o' ), 
					array( 'fa fa-coffee' 	=>    'coffee' ), 
					array( 'fa fa-cutlery' 	=>    'cutlery' ), 
					array( 'fa fa-file-text-o' 	=>    'file-text-o' ), 
					array( 'fa fa-building-o' 	=>    'building-o' ), 
					array( 'fa fa-hospital-o' 	=>    'hospital-o' ), 
					array( 'fa fa-ambulance' 	=>    'ambulance' ), 
					array( 'fa fa-medkit' 	=>    'medkit' ), 
					array( 'fa fa-fighter-jet' 	=>    'fighter-jet' ), 
					array( 'fa fa-beer' 	=>    'beer' ), 
					array( 'fa fa-h-square' 	=>    'h-square' ), 
					array( 'fa fa-plus-square' 	=>    'plus-square' ), 
					array( 'fa fa-angle-double-left' 	=>    'angle-double-left' ), 
					array( 'fa fa-angle-double-right' 	=>    'angle-double-right' ), 
					array( 'fa fa-angle-double-up' 	=>    'angle-double-up' ), 
					array( 'fa fa-angle-double-down' 	=>    'angle-double-down' ), 
					array( 'fa fa-angle-left' 	=>    'angle-left' ), 
					array( 'fa fa-angle-right' 	=>    'angle-right' ), 
					array( 'fa fa-angle-up' 	=>    'angle-up' ), 
					array( 'fa fa-angle-down' 	=>    'angle-down' ), 
					array( 'fa fa-desktop' 	=>    'desktop' ), 
					array( 'fa fa-laptop' 	=>    'laptop' ), 
					array( 'fa fa-tablet' 	=>    'tablet' ), 
					array( 'fa fa-mobile-phone'	=>    'mobile-phone' ),
					array( 'fa fa-mobile' 	=>    'mobile' ), 
					array( 'fa fa-circle-o' 	=>    'circle-o' ), 
					array( 'fa fa-quote-left' 	=>    'quote-left' ), 
					array( 'fa fa-quote-right' 	=>    'quote-right' ), 
					array( 'fa fa-spinner' 	=>    'spinner' ), 
					array( 'fa fa-circle' 	=>    'circle' ), 
					array( 'fa fa-mail-reply'	=>    'mail-reply' ),
					array( 'fa fa-reply' 	=>    'reply' ), 
					array( 'fa fa-github-alt' 	=>    'github-alt' ), 
					array( 'fa fa-folder-o' 	=>    'folder-o' ), 
					array( 'fa fa-folder-open-o' 	=>    'folder-open-o' ), 
					array( 'fa fa-smile-o' 	=>    'smile-o' ), 
					array( 'fa fa-frown-o' 	=>    'frown-o' ), 
					array( 'fa fa-meh-o' 	=>    'meh-o' ), 
					array( 'fa fa-gamepad' 	=>    'gamepad' ), 
					array( 'fa fa-keyboard-o' 	=>    'keyboard-o' ), 
					array( 'fa fa-flag-o' 	=>    'flag-o' ), 
					array( 'fa fa-flag-checkered' 	=>    'flag-checkered' ), 
					array( 'fa fa-terminal' 	=>    'terminal' ), 
					array( 'fa fa-code' 	=>    'code' ), 
					array( 'fa fa-mail-reply-all'	=>    'mail-reply-all' ),
					array( 'fa fa-reply-all' 	=>    'reply-all' ), 
					array( 'fa fa-star-half-empty'	=>    'star-half-empty' ),
					array( 'fa fa-star-half-full'	=>    'star-half-full' ),
					array( 'fa fa-star-half-o' 	=>    'star-half-o' ), 
					array( 'fa fa-location-arrow' 	=>    'location-arrow' ), 
					array( 'fa fa-crop' 	=>    'crop' ), 
					array( 'fa fa-code-fork' 	=>    'code-fork' ), 
					array( 'fa fa-unlink'	=>    'unlink' ),
					array( 'fa fa-chain-broken' 	=>    'chain-broken' ), 
					array( 'fa fa-question' 	=>    'question' ), 
					array( 'fa fa-info' 	=>    'info' ), 
					array( 'fa fa-exclamation' 	=>    'exclamation' ), 
					array( 'fa fa-superscript' 	=>    'superscript' ), 
					array( 'fa fa-subscript' 	=>    'subscript' ), 
					array( 'fa fa-eraser' 	=>    'eraser' ), 
					array( 'fa fa-puzzle-piece' 	=>    'puzzle-piece' ), 
					array( 'fa fa-microphone' 	=>    'microphone' ), 
					array( 'fa fa-microphone-slash' 	=>    'microphone-slash' ), 
					array( 'fa fa-shield' 	=>    'shield' ), 
					array( 'fa fa-calendar-o' 	=>    'calendar-o' ), 
					array( 'fa fa-fire-extinguisher' 	=>    'fire-extinguisher' ), 
					array( 'fa fa-rocket' 	=>    'rocket' ), 
					array( 'fa fa-maxcdn' 	=>    'maxcdn' ), 
					array( 'fa fa-chevron-circle-left' 	=>    'chevron-circle-left' ), 
					array( 'fa fa-chevron-circle-right' 	=>    'chevron-circle-right' ), 
					array( 'fa fa-chevron-circle-up' 	=>    'chevron-circle-up' ), 
					array( 'fa fa-chevron-circle-down' 	=>    'chevron-circle-down' ), 
					array( 'fa fa-html5' 	=>    'html5' ), 
					array( 'fa fa-css3' 	=>    'css3' ), 
					array( 'fa fa-anchor' 	=>    'anchor' ), 
					array( 'fa fa-unlock-alt' 	=>    'unlock-alt' ), 
					array( 'fa fa-bullseye' 	=>    'bullseye' ), 
					array( 'fa fa-ellipsis-h' 	=>    'ellipsis-h' ), 
					array( 'fa fa-ellipsis-v' 	=>    'ellipsis-v' ), 
					array( 'fa fa-rss-square' 	=>    'rss-square' ), 
					array( 'fa fa-play-circle' 	=>    'play-circle' ), 
					array( 'fa fa-ticket' 	=>    'ticket' ), 
					array( 'fa fa-minus-square' 	=>    'minus-square' ), 
					array( 'fa fa-minus-square-o' 	=>    'minus-square-o' ), 
					array( 'fa fa-level-up' 	=>    'level-up' ), 
					array( 'fa fa-level-down' 	=>    'level-down' ), 
					array( 'fa fa-check-square' 	=>    'check-square' ), 
					array( 'fa fa-pencil-square' 	=>    'pencil-square' ), 
					array( 'fa fa-external-link-square' 	=>    'external-link-square' ), 
					array( 'fa fa-share-square' 	=>    'share-square' ), 
					array( 'fa fa-compass' 	=>    'compass' ), 
					array( 'fa fa-toggle-down'	=>    'toggle-down' ),
					array( 'fa fa-caret-square-o-down' 	=>    'caret-square-o-down' ), 
					array( 'fa fa-toggle-up'	=>    'toggle-up' ),
					array( 'fa fa-caret-square-o-up' 	=>    'caret-square-o-up' ), 
					array( 'fa fa-toggle-right'	=>    'toggle-right' ),
					array( 'fa fa-caret-square-o-right' 	=>    'caret-square-o-right' ), 
					array( 'fa fa-euro'	=>    'euro' ),
					array( 'fa fa-eur' 	=>    'eur' ), 
					array( 'fa fa-gbp' 	=>    'gbp' ), 
					array( 'fa fa-dollar'	=>    'dollar' ),
					array( 'fa fa-usd' 	=>    'usd' ), 
					array( 'fa fa-rupee'	=>    'rupee' ),
					array( 'fa fa-inr' 	=>    'inr' ), 
					array( 'fa fa-cny'	=>    'cny' ),
					array( 'fa fa-rmb'	=>    'rmb' ),
					array( 'fa fa-yen'	=>    'yen' ),
					array( 'fa fa-jpy' 	=>    'jpy' ), 
					array( 'fa fa-ruble'	=>    'ruble' ),
					array( 'fa fa-rouble'	=>    'rouble' ),
					array( 'fa fa-rub' 	=>    'rub' ), 
					array( 'fa fa-won'	=>    'won' ),
					array( 'fa fa-krw' 	=>    'krw' ), 
					array( 'fa fa-bitcoin'	=>    'bitcoin' ),
					array( 'fa fa-btc' 	=>    'btc' ), 
					array( 'fa fa-file' 	=>    'file' ), 
					array( 'fa fa-file-text' 	=>    'file-text' ), 
					array( 'fa fa-sort-alpha-asc' 	=>    'sort-alpha-asc' ), 
					array( 'fa fa-sort-alpha-desc' 	=>    'sort-alpha-desc' ), 
					array( 'fa fa-sort-amount-asc' 	=>    'sort-amount-asc' ), 
					array( 'fa fa-sort-amount-desc' 	=>    'sort-amount-desc' ), 
					array( 'fa fa-sort-numeric-asc' 	=>    'sort-numeric-asc' ), 
					array( 'fa fa-sort-numeric-desc' 	=>    'sort-numeric-desc' ), 
					array( 'fa fa-thumbs-up' 	=>    'thumbs-up' ), 
					array( 'fa fa-thumbs-down' 	=>    'thumbs-down' ), 
					array( 'fa fa-youtube-square' 	=>    'youtube-square' ), 
					array( 'fa fa-youtube' 	=>    'youtube' ), 
					array( 'fa fa-xing' 	=>    'xing' ), 
					array( 'fa fa-xing-square' 	=>    'xing-square' ), 
					array( 'fa fa-youtube-play' 	=>    'youtube-play' ), 
					array( 'fa fa-dropbox' 	=>    'dropbox' ), 
					array( 'fa fa-stack-overflow' 	=>    'stack-overflow' ), 
					array( 'fa fa-instagram' 	=>    'instagram' ), 
					array( 'fa fa-flickr' 	=>    'flickr' ), 
					array( 'fa fa-adn' 	=>    'adn' ), 
					array( 'fa fa-bitbucket' 	=>    'bitbucket' ), 
					array( 'fa fa-bitbucket-square' 	=>    'bitbucket-square' ), 
					array( 'fa fa-tumblr' 	=>    'tumblr' ), 
					array( 'fa fa-tumblr-square' 	=>    'tumblr-square' ), 
					array( 'fa fa-long-arrow-down' 	=>    'long-arrow-down' ), 
					array( 'fa fa-long-arrow-up' 	=>    'long-arrow-up' ), 
					array( 'fa fa-long-arrow-left' 	=>    'long-arrow-left' ), 
					array( 'fa fa-long-arrow-right' 	=>    'long-arrow-right' ), 
					array( 'fa fa-apple' 	=>    'apple' ), 
					array( 'fa fa-windows' 	=>    'windows' ), 
					array( 'fa fa-android' 	=>    'android' ), 
					array( 'fa fa-linux' 	=>    'linux' ), 
					array( 'fa fa-dribbble' 	=>    'dribbble' ), 
					array( 'fa fa-skype' 	=>    'skype' ), 
					array( 'fa fa-foursquare' 	=>    'foursquare' ), 
					array( 'fa fa-trello' 	=>    'trello' ), 
					array( 'fa fa-female' 	=>    'female' ), 
					array( 'fa fa-male' 	=>    'male' ), 
					array( 'fa fa-gittip'	=>    'gittip' ),
					array( 'fa fa-gratipay' 	=>    'gratipay' ), 
					array( 'fa fa-sun-o' 	=>    'sun-o' ), 
					array( 'fa fa-moon-o' 	=>    'moon-o' ), 
					array( 'fa fa-archive' 	=>    'archive' ), 
					array( 'fa fa-bug' 	=>    'bug' ), 
					array( 'fa fa-vk' 	=>    'vk' ), 
					array( 'fa fa-weibo' 	=>    'weibo' ), 
					array( 'fa fa-renren' 	=>    'renren' ), 
					array( 'fa fa-pagelines' 	=>    'pagelines' ), 
					array( 'fa fa-stack-exchange' 	=>    'stack-exchange' ), 
					array( 'fa fa-arrow-circle-o-right' 	=>    'arrow-circle-o-right' ), 
					array( 'fa fa-arrow-circle-o-left' 	=>    'arrow-circle-o-left' ), 
					array( 'fa fa-toggle-left'	=>    'toggle-left' ),
					array( 'fa fa-caret-square-o-left' 	=>    'caret-square-o-left' ), 
					array( 'fa fa-dot-circle-o' 	=>    'dot-circle-o' ), 
					array( 'fa fa-wheelchair' 	=>    'wheelchair' ), 
					array( 'fa fa-vimeo-square' 	=>    'vimeo-square' ), 
					array( 'fa fa-turkish-lira'	=>    'turkish-lira' ),
					array( 'fa fa-try' 	=>    'try' ), 
					array( 'fa fa-plus-square-o' 	=>    'plus-square-o' ), 
					array( 'fa fa-space-shuttle' 	=>    'space-shuttle' ), 
					array( 'fa fa-slack' 	=>    'slack' ), 
					array( 'fa fa-envelope-square' 	=>    'envelope-square' ), 
					array( 'fa fa-wordpress' 	=>    'wordpress' ), 
					array( 'fa fa-openid' 	=>    'openid' ), 
					array( 'fa fa-institution'	=>    'institution' ),
					array( 'fa fa-bank'	=>    'bank' ),
					array( 'fa fa-university' 	=>    'university' ), 
					array( 'fa fa-mortar-board'	=>    'mortar-board' ),
					array( 'fa fa-graduation-cap' 	=>    'graduation-cap' ), 
					array( 'fa fa-yahoo' 	=>    'yahoo' ), 
					array( 'fa fa-google' 	=>    'google' ), 
					array( 'fa fa-reddit' 	=>    'reddit' ), 
					array( 'fa fa-reddit-square' 	=>    'reddit-square' ), 
					array( 'fa fa-stumbleupon-circle' 	=>    'stumbleupon-circle' ), 
					array( 'fa fa-stumbleupon' 	=>    'stumbleupon' ), 
					array( 'fa fa-delicious' 	=>    'delicious' ), 
					array( 'fa fa-digg' 	=>    'digg' ), 
					array( 'fa fa-pied-piper-pp' 	=>    'pied-piper-pp' ), 
					array( 'fa fa-pied-piper-alt' 	=>    'pied-piper-alt' ), 
					array( 'fa fa-drupal' 	=>    'drupal' ), 
					array( 'fa fa-joomla' 	=>    'joomla' ), 
					array( 'fa fa-language' 	=>    'language' ), 
					array( 'fa fa-fax' 	=>    'fax' ), 
					array( 'fa fa-building' 	=>    'building' ), 
					array( 'fa fa-child' 	=>    'child' ), 
					array( 'fa fa-paw' 	=>    'paw' ), 
					array( 'fa fa-spoon' 	=>    'spoon' ), 
					array( 'fa fa-cube' 	=>    'cube' ), 
					array( 'fa fa-cubes' 	=>    'cubes' ), 
					array( 'fa fa-behance' 	=>    'behance' ), 
					array( 'fa fa-behance-square' 	=>    'behance-square' ), 
					array( 'fa fa-steam' 	=>    'steam' ), 
					array( 'fa fa-steam-square' 	=>    'steam-square' ), 
					array( 'fa fa-recycle' 	=>    'recycle' ), 
					array( 'fa fa-automobile'	=>    'automobile' ),
					array( 'fa fa-car' 	=>    'car' ), 
					array( 'fa fa-cab'	=>    'cab' ),
					array( 'fa fa-taxi' 	=>    'taxi' ), 
					array( 'fa fa-tree' 	=>    'tree' ), 
					array( 'fa fa-spotify' 	=>    'spotify' ), 
					array( 'fa fa-deviantart' 	=>    'deviantart' ), 
					array( 'fa fa-soundcloud' 	=>    'soundcloud' ), 
					array( 'fa fa-database' 	=>    'database' ), 
					array( 'fa fa-file-pdf-o' 	=>    'file-pdf-o' ), 
					array( 'fa fa-file-word-o' 	=>    'file-word-o' ), 
					array( 'fa fa-file-excel-o' 	=>    'file-excel-o' ), 
					array( 'fa fa-file-powerpoint-o' 	=>    'file-powerpoint-o' ), 
					array( 'fa fa-file-photo-o'	=>    'file-photo-o' ),
					array( 'fa fa-file-picture-o'	=>    'file-picture-o' ),
					array( 'fa fa-file-image-o' 	=>    'file-image-o' ), 
					array( 'fa fa-file-zip-o'	=>    'file-zip-o' ),
					array( 'fa fa-file-archive-o' 	=>    'file-archive-o' ), 
					array( 'fa fa-file-sound-o'	=>    'file-sound-o' ),
					array( 'fa fa-file-audio-o' 	=>    'file-audio-o' ), 
					array( 'fa fa-file-movie-o'	=>    'file-movie-o' ),
					array( 'fa fa-file-video-o' 	=>    'file-video-o' ), 
					array( 'fa fa-file-code-o' 	=>    'file-code-o' ), 
					array( 'fa fa-vine' 	=>    'vine' ), 
					array( 'fa fa-codepen' 	=>    'codepen' ), 
					array( 'fa fa-jsfiddle' 	=>    'jsfiddle' ), 
					array( 'fa fa-life-bouy'	=>    'life-bouy' ),
					array( 'fa fa-life-buoy'	=>    'life-buoy' ),
					array( 'fa fa-life-saver'	=>    'life-saver' ),
					array( 'fa fa-support'	=>    'support' ),
					array( 'fa fa-life-ring' 	=>    'life-ring' ), 
					array( 'fa fa-circle-o-notch' 	=>    'circle-o-notch' ), 
					array( 'fa fa-ra'	=>    'ra' ),
					array( 'fa fa-resistance'	=>    'resistance' ),
					array( 'fa fa-rebel' 	=>    'rebel' ), 
					array( 'fa fa-ge'	=>    'ge' ),
					array( 'fa fa-empire' 	=>    'empire' ), 
					array( 'fa fa-git-square' 	=>    'git-square' ), 
					array( 'fa fa-git' 	=>    'git' ), 
					array( 'fa fa-y-combinator-square'	=>    'y-combinator-square' ),
					array( 'fa fa-yc-square'	=>    'yc-square' ),
					array( 'fa fa-hacker-news' 	=>    'hacker-news' ), 
					array( 'fa fa-tencent-weibo' 	=>    'tencent-weibo' ), 
					array( 'fa fa-qq' 	=>    'qq' ), 
					array( 'fa fa-wechat'	=>    'wechat' ),
					array( 'fa fa-weixin' 	=>    'weixin' ), 
					array( 'fa fa-send'	=>    'send' ),
					array( 'fa fa-paper-plane' 	=>    'paper-plane' ), 
					array( 'fa fa-send-o'	=>    'send-o' ),
					array( 'fa fa-paper-plane-o' 	=>    'paper-plane-o' ), 
					array( 'fa fa-history' 	=>    'history' ), 
					array( 'fa fa-circle-thin' 	=>    'circle-thin' ), 
					array( 'fa fa-header' 	=>    'header' ), 
					array( 'fa fa-paragraph' 	=>    'paragraph' ), 
					array( 'fa fa-sliders' 	=>    'sliders' ), 
					array( 'fa fa-share-alt' 	=>    'share-alt' ), 
					array( 'fa fa-share-alt-square' 	=>    'share-alt-square' ), 
					array( 'fa fa-bomb' 	=>    'bomb' ), 
					array( 'fa fa-soccer-ball-o'	=>    'soccer-ball-o' ),
					array( 'fa fa-futbol-o' 	=>    'futbol-o' ), 
					array( 'fa fa-tty' 	=>    'tty' ), 
					array( 'fa fa-binoculars' 	=>    'binoculars' ), 
					array( 'fa fa-plug' 	=>    'plug' ), 
					array( 'fa fa-slideshare' 	=>    'slideshare' ), 
					array( 'fa fa-twitch' 	=>    'twitch' ), 
					array( 'fa fa-yelp' 	=>    'yelp' ), 
					array( 'fa fa-newspaper-o' 	=>    'newspaper-o' ), 
					array( 'fa fa-wifi' 	=>    'wifi' ), 
					array( 'fa fa-calculator' 	=>    'calculator' ), 
					array( 'fa fa-paypal' 	=>    'paypal' ), 
					array( 'fa fa-google-wallet' 	=>    'google-wallet' ), 
					array( 'fa fa-cc-visa' 	=>    'cc-visa' ), 
					array( 'fa fa-cc-mastercard' 	=>    'cc-mastercard' ), 
					array( 'fa fa-cc-discover' 	=>    'cc-discover' ), 
					array( 'fa fa-cc-amex' 	=>    'cc-amex' ), 
					array( 'fa fa-cc-paypal' 	=>    'cc-paypal' ), 
					array( 'fa fa-cc-stripe' 	=>    'cc-stripe' ), 
					array( 'fa fa-bell-slash' 	=>    'bell-slash' ), 
					array( 'fa fa-bell-slash-o' 	=>    'bell-slash-o' ), 
					array( 'fa fa-trash' 	=>    'trash' ), 
					array( 'fa fa-copyright' 	=>    'copyright' ), 
					array( 'fa fa-at' 	=>    'at' ), 
					array( 'fa fa-eyedropper' 	=>    'eyedropper' ), 
					array( 'fa fa-paint-brush' 	=>    'paint-brush' ), 
					array( 'fa fa-birthday-cake' 	=>    'birthday-cake' ), 
					array( 'fa fa-area-chart' 	=>    'area-chart' ), 
					array( 'fa fa-pie-chart' 	=>    'pie-chart' ), 
					array( 'fa fa-line-chart' 	=>    'line-chart' ), 
					array( 'fa fa-lastfm' 	=>    'lastfm' ), 
					array( 'fa fa-lastfm-square' 	=>    'lastfm-square' ), 
					array( 'fa fa-toggle-off' 	=>    'toggle-off' ), 
					array( 'fa fa-toggle-on' 	=>    'toggle-on' ), 
					array( 'fa fa-bicycle' 	=>    'bicycle' ), 
					array( 'fa fa-bus' 	=>    'bus' ), 
					array( 'fa fa-ioxhost' 	=>    'ioxhost' ), 
					array( 'fa fa-angellist' 	=>    'angellist' ), 
					array( 'fa fa-cc' 	=>    'cc' ), 
					array( 'fa fa-shekel'	=>    'shekel' ),
					array( 'fa fa-sheqel'	=>    'sheqel' ),
					array( 'fa fa-ils' 	=>    'ils' ), 
					array( 'fa fa-meanpath' 	=>    'meanpath' ), 
					array( 'fa fa-buysellads' 	=>    'buysellads' ), 
					array( 'fa fa-connectdevelop' 	=>    'connectdevelop' ), 
					array( 'fa fa-dashcube' 	=>    'dashcube' ), 
					array( 'fa fa-forumbee' 	=>    'forumbee' ), 
					array( 'fa fa-leanpub' 	=>    'leanpub' ), 
					array( 'fa fa-sellsy' 	=>    'sellsy' ), 
					array( 'fa fa-shirtsinbulk' 	=>    'shirtsinbulk' ), 
					array( 'fa fa-simplybuilt' 	=>    'simplybuilt' ), 
					array( 'fa fa-skyatlas' 	=>    'skyatlas' ), 
					array( 'fa fa-cart-plus' 	=>    'cart-plus' ), 
					array( 'fa fa-cart-arrow-down' 	=>    'cart-arrow-down' ), 
					array( 'fa fa-diamond' 	=>    'diamond' ), 
					array( 'fa fa-ship' 	=>    'ship' ), 
					array( 'fa fa-user-secret' 	=>    'user-secret' ), 
					array( 'fa fa-motorcycle' 	=>    'motorcycle' ), 
					array( 'fa fa-street-view' 	=>    'street-view' ), 
					array( 'fa fa-heartbeat' 	=>    'heartbeat' ), 
					array( 'fa fa-venus' 	=>    'venus' ), 
					array( 'fa fa-mars' 	=>    'mars' ), 
					array( 'fa fa-mercury' 	=>    'mercury' ), 
					array( 'fa fa-intersex'	=>    'intersex' ),
					array( 'fa fa-transgender' 	=>    'transgender' ), 
					array( 'fa fa-transgender-alt' 	=>    'transgender-alt' ), 
					array( 'fa fa-venus-double' 	=>    'venus-double' ), 
					array( 'fa fa-mars-double' 	=>    'mars-double' ), 
					array( 'fa fa-venus-mars' 	=>    'venus-mars' ), 
					array( 'fa fa-mars-stroke' 	=>    'mars-stroke' ), 
					array( 'fa fa-mars-stroke-v' 	=>    'mars-stroke-v' ), 
					array( 'fa fa-mars-stroke-h' 	=>    'mars-stroke-h' ), 
					array( 'fa fa-neuter' 	=>    'neuter' ), 
					array( 'fa fa-genderless' 	=>    'genderless' ), 
					array( 'fa fa-facebook-official' 	=>    'facebook-official' ), 
					array( 'fa fa-pinterest-p' 	=>    'pinterest-p' ), 
					array( 'fa fa-whatsapp' 	=>    'whatsapp' ), 
					array( 'fa fa-server' 	=>    'server' ), 
					array( 'fa fa-user-plus' 	=>    'user-plus' ), 
					array( 'fa fa-user-times' 	=>    'user-times' ), 
					array( 'fa fa-hotel'	=>    'hotel' ),
					array( 'fa fa-bed' 	=>    'bed' ), 
					array( 'fa fa-viacoin' 	=>    'viacoin' ), 
					array( 'fa fa-train' 	=>    'train' ), 
					array( 'fa fa-subway' 	=>    'subway' ), 
					array( 'fa fa-medium' 	=>    'medium' ), 
					array( 'fa fa-yc'	=>    'yc' ),
					array( 'fa fa-y-combinator' 	=>    'y-combinator' ), 
					array( 'fa fa-optin-monster' 	=>    'optin-monster' ), 
					array( 'fa fa-opencart' 	=>    'opencart' ), 
					array( 'fa fa-expeditedssl' 	=>    'expeditedssl' ), 
					array( 'fa fa-battery-4'	=>    'battery-4' ),
					array( 'fa fa-battery-full' 	=>    'battery-full' ), 
					array( 'fa fa-battery-3'	=>    'battery-3' ),
					array( 'fa fa-battery-three-quarters' 	=>    'battery-three-quarters' ), 
					array( 'fa fa-battery-2'	=>    'battery-2' ),
					array( 'fa fa-battery-half' 	=>    'battery-half' ), 
					array( 'fa fa-battery-1'	=>    'battery-1' ),
					array( 'fa fa-battery-quarter' 	=>    'battery-quarter' ), 
					array( 'fa fa-battery-0'	=>    'battery-0' ),
					array( 'fa fa-battery-empty' 	=>    'battery-empty' ), 
					array( 'fa fa-mouse-pointer' 	=>    'mouse-pointer' ), 
					array( 'fa fa-i-cursor' 	=>    'i-cursor' ), 
					array( 'fa fa-object-group' 	=>    'object-group' ), 
					array( 'fa fa-object-ungroup' 	=>    'object-ungroup' ), 
					array( 'fa fa-sticky-note' 	=>    'sticky-note' ), 
					array( 'fa fa-sticky-note-o' 	=>    'sticky-note-o' ), 
					array( 'fa fa-cc-jcb' 	=>    'cc-jcb' ), 
					array( 'fa fa-cc-diners-club' 	=>    'cc-diners-club' ), 
					array( 'fa fa-clone' 	=>    'clone' ), 
					array( 'fa fa-balance-scale' 	=>    'balance-scale' ), 
					array( 'fa fa-hourglass-o' 	=>    'hourglass-o' ), 
					array( 'fa fa-hourglass-1'	=>    'hourglass-1' ),
					array( 'fa fa-hourglass-start' 	=>    'hourglass-start' ), 
					array( 'fa fa-hourglass-2'	=>    'hourglass-2' ),
					array( 'fa fa-hourglass-half' 	=>    'hourglass-half' ), 
					array( 'fa fa-hourglass-3'	=>    'hourglass-3' ),
					array( 'fa fa-hourglass-end' 	=>    'hourglass-end' ), 
					array( 'fa fa-hourglass' 	=>    'hourglass' ), 
					array( 'fa fa-hand-grab-o'	=>    'hand-grab-o' ),
					array( 'fa fa-hand-rock-o' 	=>    'hand-rock-o' ), 
					array( 'fa fa-hand-stop-o'	=>    'hand-stop-o' ),
					array( 'fa fa-hand-paper-o' 	=>    'hand-paper-o' ), 
					array( 'fa fa-hand-scissors-o' 	=>    'hand-scissors-o' ), 
					array( 'fa fa-hand-lizard-o' 	=>    'hand-lizard-o' ), 
					array( 'fa fa-hand-spock-o' 	=>    'hand-spock-o' ), 
					array( 'fa fa-hand-pointer-o' 	=>    'hand-pointer-o' ), 
					array( 'fa fa-hand-peace-o' 	=>    'hand-peace-o' ), 
					array( 'fa fa-trademark' 	=>    'trademark' ), 
					array( 'fa fa-registered' 	=>    'registered' ), 
					array( 'fa fa-creative-commons' 	=>    'creative-commons' ), 
					array( 'fa fa-gg' 	=>    'gg' ), 
					array( 'fa fa-gg-circle' 	=>    'gg-circle' ), 
					array( 'fa fa-tripadvisor' 	=>    'tripadvisor' ), 
					array( 'fa fa-odnoklassniki' 	=>    'odnoklassniki' ), 
					array( 'fa fa-odnoklassniki-square' 	=>    'odnoklassniki-square' ), 
					array( 'fa fa-get-pocket' 	=>    'get-pocket' ), 
					array( 'fa fa-wikipedia-w' 	=>    'wikipedia-w' ), 
					array( 'fa fa-safari' 	=>    'safari' ), 
					array( 'fa fa-chrome' 	=>    'chrome' ), 
					array( 'fa fa-firefox' 	=>    'firefox' ), 
					array( 'fa fa-opera' 	=>    'opera' ), 
					array( 'fa fa-internet-explorer' 	=>    'internet-explorer' ), 
					array( 'fa fa-tv'	=>    'tv' ),
					array( 'fa fa-television' 	=>    'television' ), 
					array( 'fa fa-contao' 	=>    'contao' ), 
					array( 'fa fa-500px' 	=>    '500px' ), 
					array( 'fa fa-amazon' 	=>    'amazon' ), 
					array( 'fa fa-calendar-plus-o' 	=>    'calendar-plus-o' ), 
					array( 'fa fa-calendar-minus-o' 	=>    'calendar-minus-o' ), 
					array( 'fa fa-calendar-times-o' 	=>    'calendar-times-o' ), 
					array( 'fa fa-calendar-check-o' 	=>    'calendar-check-o' ), 
					array( 'fa fa-industry' 	=>    'industry' ), 
					array( 'fa fa-map-pin' 	=>    'map-pin' ), 
					array( 'fa fa-map-signs' 	=>    'map-signs' ), 
					array( 'fa fa-map-o' 	=>    'map-o' ), 
					array( 'fa fa-map' 	=>    'map' ), 
					array( 'fa fa-commenting' 	=>    'commenting' ), 
					array( 'fa fa-commenting-o' 	=>    'commenting-o' ), 
					array( 'fa fa-houzz' 	=>    'houzz' ), 
					array( 'fa fa-vimeo' 	=>    'vimeo' ), 
					array( 'fa fa-black-tie' 	=>    'black-tie' ), 
					array( 'fa fa-fonticons' 	=>    'fonticons' ), 
					array( 'fa fa-reddit-alien' 	=>    'reddit-alien' ), 
					array( 'fa fa-edge' 	=>    'edge' ), 
					array( 'fa fa-credit-card-alt' 	=>    'credit-card-alt' ), 
					array( 'fa fa-codiepie' 	=>    'codiepie' ), 
					array( 'fa fa-modx' 	=>    'modx' ), 
					array( 'fa fa-fort-awesome' 	=>    'fort-awesome' ), 
					array( 'fa fa-usb' 	=>    'usb' ), 
					array( 'fa fa-product-hunt' 	=>    'product-hunt' ), 
					array( 'fa fa-mixcloud' 	=>    'mixcloud' ), 
					array( 'fa fa-scribd' 	=>    'scribd' ), 
					array( 'fa fa-pause-circle' 	=>    'pause-circle' ), 
					array( 'fa fa-pause-circle-o' 	=>    'pause-circle-o' ), 
					array( 'fa fa-stop-circle' 	=>    'stop-circle' ), 
					array( 'fa fa-stop-circle-o' 	=>    'stop-circle-o' ), 
					array( 'fa fa-shopping-bag' 	=>    'shopping-bag' ), 
					array( 'fa fa-shopping-basket' 	=>    'shopping-basket' ), 
					array( 'fa fa-hashtag' 	=>    'hashtag' ), 
					array( 'fa fa-bluetooth' 	=>    'bluetooth' ), 
					array( 'fa fa-bluetooth-b' 	=>    'bluetooth-b' ), 
					array( 'fa fa-percent' 	=>    'percent' ), 
					array( 'fa fa-gitlab' 	=>    'gitlab' ), 
					array( 'fa fa-wpbeginner' 	=>    'wpbeginner' ), 
					array( 'fa fa-wpforms' 	=>    'wpforms' ), 
					array( 'fa fa-envira' 	=>    'envira' ), 
					array( 'fa fa-universal-access' 	=>    'universal-access' ), 
					array( 'fa fa-wheelchair-alt' 	=>    'wheelchair-alt' ), 
					array( 'fa fa-question-circle-o' 	=>    'question-circle-o' ), 
					array( 'fa fa-blind' 	=>    'blind' ), 
					array( 'fa fa-audio-description' 	=>    'audio-description' ), 
					array( 'fa fa-volume-control-phone' 	=>    'volume-control-phone' ), 
					array( 'fa fa-braille' 	=>    'braille' ), 
					array( 'fa fa-assistive-listening-systems' 	=>    'assistive-listening-systems' ), 
					array( 'fa fa-asl-interpreting'	=>    'asl-interpreting' ),
					array( 'fa fa-american-sign-language-interpreting' 	=>    'american-sign-language-interpreting' ), 
					array( 'fa fa-deafness'	=>    'deafness' ),
					array( 'fa fa-hard-of-hearing'	=>    'hard-of-hearing' ),
					array( 'fa fa-deaf' 	=>    'deaf' ), 
					array( 'fa fa-glide' 	=>    'glide' ), 
					array( 'fa fa-glide-g' 	=>    'glide-g' ), 
					array( 'fa fa-signing'	=>    'signing' ),
					array( 'fa fa-sign-language' 	=>    'sign-language' ), 
					array( 'fa fa-low-vision' 	=>    'low-vision' ), 
					array( 'fa fa-viadeo' 	=>    'viadeo' ), 
					array( 'fa fa-viadeo-square' 	=>    'viadeo-square' ), 
					array( 'fa fa-snapchat' 	=>    'snapchat' ), 
					array( 'fa fa-snapchat-ghost' 	=>    'snapchat-ghost' ), 
					array( 'fa fa-snapchat-square' 	=>    'snapchat-square' ), 
					array( 'fa fa-pied-piper' 	=>    'pied-piper' ), 
					array( 'fa fa-first-order' 	=>    'first-order' ), 
					array( 'fa fa-yoast' 	=>    'yoast' ), 
					array( 'fa fa-themeisle' 	=>    'themeisle' ), 
					array( 'fa fa-google-plus-circle'	=>    'google-plus-circle' ),
					array( 'fa fa-google-plus-official' 	=>    'google-plus-official' ), 
					array( 'fa fa-fa'	=>    'fa' ),
					array( 'fa fa-font-awesome' 	=>    'font-awesome' ), 

				),
				'Pe Icon 7 Stroke' => array(
					array( 'pe-7s-add-user'    =>	  'add-user' ),
					array( 'pe-7s-airplay'    =>	  'airplay' ),
					array( 'pe-7s-alarm'    =>	  'alarm' ),
					array( 'pe-7s-album'    =>	  'album' ),
					array( 'pe-7s-albums'    =>	  'albums' ),
					array( 'pe-7s-anchor'    =>	  'anchor' ),
					array( 'pe-7s-angle-down-circle'    =>	  'angle-down-circle' ),
					array( 'pe-7s-angle-down'    =>	  'angle-down' ),
					array( 'pe-7s-angle-left-circle'    =>	  'angle-left-circle' ),
					array( 'pe-7s-angle-left'    =>	  'angle-left' ),
					array( 'pe-7s-angle-right-circle'    =>	  'angle-right-circle' ),
					array( 'pe-7s-angle-right'    =>	  'angle-right' ),
					array( 'pe-7s-angle-up-circle'    =>	  'angle-up-circle' ),
					array( 'pe-7s-angle-up'    =>	  'angle-up' ),
					array( 'pe-7s-arc'    =>	  'arc' ),
					array( 'pe-7s-attention'    =>	  'attention' ),
					array( 'pe-7s-back-2'    =>	  'back-2' ),
					array( 'pe-7s-back'    =>	  'back' ),
					array( 'pe-7s-ball'    =>	  'ball' ),
					array( 'pe-7s-bandaid'    =>	  'bandaid' ),
					array( 'pe-7s-battery'    =>	  'battery' ),
					array( 'pe-7s-bell'    =>	  'bell' ),
					array( 'pe-7s-bicycle'    =>	  'bicycle' ),
					array( 'pe-7s-bluetooth'    =>	  'bluetooth' ),
					array( 'pe-7s-bookmarks'    =>	  'bookmarks' ),
					array( 'pe-7s-bottom-arrow'    =>	  'bottom-arrow' ),
					array( 'pe-7s-box1'    =>	  'box1' ),
					array( 'pe-7s-box2'    =>	  'box2' ),
					array( 'pe-7s-browser'    =>	  'browser' ),
					array( 'pe-7s-calculator'    =>	  'calculator' ),
					array( 'pe-7s-call'    =>	  'call' ),
					array( 'pe-7s-camera'    =>	  'camera' ),
					array( 'pe-7s-car'    =>	  'car' ),
					array( 'pe-7s-cart'    =>	  'cart' ),
					array( 'pe-7s-cash'    =>	  'cash' ),
					array( 'pe-7s-chat'    =>	  'chat' ),
					array( 'pe-7s-check'    =>	  'check' ),
					array( 'pe-7s-clock'    =>	  'clock' ),
					array( 'pe-7s-close-circle'    =>	  'close-circle' ),
					array( 'pe-7s-close'    =>	  'close' ),
					array( 'pe-7s-cloud-download'    =>	  'cloud-download' ),
					array( 'pe-7s-cloud-upload'    =>	  'cloud-upload' ),
					array( 'pe-7s-cloud'    =>	  'cloud' ),
					array( 'pe-7s-coffee'    =>	  'coffee' ),
					array( 'pe-7s-comment'    =>	  'comment' ),
					array( 'pe-7s-compass'    =>	  'compass' ),
					array( 'pe-7s-config'    =>	  'config' ),
					array( 'pe-7s-copy-file'    =>	  'copy-file' ),
					array( 'pe-7s-credit'    =>	  'credit' ),
					array( 'pe-7s-crop'    =>	  'crop' ),
					array( 'pe-7s-culture'    =>	  'culture' ),
					array( 'pe-7s-cup'    =>	  'cup' ),
					array( 'pe-7s-date'    =>	  'date' ),
					array( 'pe-7s-delete-user'    =>	  'delete-user' ),
					array( 'pe-7s-diamond'    =>	  'diamond' ),
					array( 'pe-7s-disk'    =>	  'disk' ),
					array( 'pe-7s-diskette'    =>	  'diskette' ),
					array( 'pe-7s-display1'    =>	  'display1' ),
					array( 'pe-7s-display2'    =>	  'display2' ),
					array( 'pe-7s-door-lock'    =>	  'door-lock' ),
					array( 'pe-7s-download'    =>	  'download' ),
					array( 'pe-7s-drawer'    =>	  'drawer' ),
					array( 'pe-7s-drop'    =>	  'drop' ),
					array( 'pe-7s-edit'    =>	  'edit' ),
					array( 'pe-7s-exapnd2'    =>	  'exapnd2' ),
					array( 'pe-7s-expand1'    =>	  'expand1' ),
					array( 'pe-7s-eyedropper'    =>	  'eyedropper' ),
					array( 'pe-7s-female'    =>	  'female' ),
					array( 'pe-7s-file'    =>	  'file' ),
					array( 'pe-7s-film'    =>	  'film' ),
					array( 'pe-7s-filter'    =>	  'filter' ),
					array( 'pe-7s-flag'    =>	  'flag' ),
					array( 'pe-7s-folder'    =>	  'folder' ),
					array( 'pe-7s-gift'    =>	  'gift' ),
					array( 'pe-7s-glasses'    =>	  'glasses' ),
					array( 'pe-7s-gleam'    =>	  'gleam' ),
					array( 'pe-7s-global'    =>	  'global' ),
					array( 'pe-7s-graph'    =>	  'graph' ),
					array( 'pe-7s-graph1'    =>	  'graph1' ),
					array( 'pe-7s-graph2'    =>	  'graph2' ),
					array( 'pe-7s-graph3'    =>	  'graph3' ),
					array( 'pe-7s-gym'    =>	  'gym' ),
					array( 'pe-7s-hammer'    =>	  'hammer' ),
					array( 'pe-7s-headphones'    =>	  'headphones' ),
					array( 'pe-7s-helm'    =>	  'helm' ),
					array( 'pe-7s-help1'    =>	  'help1' ),
					array( 'pe-7s-help2'    =>	  'help2' ),
					array( 'pe-7s-home'    =>	  'home' ),
					array( 'pe-7s-hourglass'    =>	  'hourglass' ),
					array( 'pe-7s-id'    =>	  'id' ),
					array( 'pe-7s-info'    =>	  'info' ),
					array( 'pe-7s-joy'    =>	  'joy' ),
					array( 'pe-7s-junk'    =>	  'junk' ),
					array( 'pe-7s-key'    =>	  'key' ),
					array( 'pe-7s-keypad'    =>	  'keypad' ),
					array( 'pe-7s-leaf'    =>	  'leaf' ),
					array( 'pe-7s-left-arrow'    =>	  'left-arrow' ),
					array( 'pe-7s-less'    =>	  'less' ),
					array( 'pe-7s-light'    =>	  'light' ),
					array( 'pe-7s-like'    =>	  'like' ),
					array( 'pe-7s-like2'    =>	  'like2' ),
					array( 'pe-7s-link'    =>	  'link' ),
					array( 'pe-7s-lintern'    =>	  'lintern' ),
					array( 'pe-7s-lock'    =>	  'lock' ),
					array( 'pe-7s-look'    =>	  'look' ),
					array( 'pe-7s-loop'    =>	  'loop' ),
					array( 'pe-7s-magic-wand'    =>	  'magic-wand' ),
					array( 'pe-7s-magnet'    =>	  'magnet' ),
					array( 'pe-7s-mail-open-file'    =>	  'mail-open-file' ),
					array( 'pe-7s-mail-open'    =>	  'mail-open' ),
					array( 'pe-7s-mail'    =>	  'mail' ),
					array( 'pe-7s-male'    =>	  'male' ),
					array( 'pe-7s-map-2'    =>	  'map-2' ),
					array( 'pe-7s-map-marker'    =>	  'map-marker' ),
					array( 'pe-7s-map'    =>	  'map' ),
					array( 'pe-7s-medal'    =>	  'medal' ),
					array( 'pe-7s-menu'    =>	  'menu' ),
					array( 'pe-7s-micro'    =>	  'micro' ),
					array( 'pe-7s-monitor'    =>	  'monitor' ),
					array( 'pe-7s-moon'    =>	  'moon' ),
					array( 'pe-7s-more'    =>	  'more' ),
					array( 'pe-7s-mouse'    =>	  'mouse' ),
					array( 'pe-7s-music'    =>	  'music' ),
					array( 'pe-7s-musiclist'    =>	  'musiclist' ),
					array( 'pe-7s-mute'    =>	  'mute' ),
					array( 'pe-7s-network'    =>	  'network' ),
					array( 'pe-7s-news-paper'    =>	  'news-paper' ),
					array( 'pe-7s-next-2'    =>	  'next-2' ),
					array( 'pe-7s-next'    =>	  'next' ),
					array( 'pe-7s-note'    =>	  'note' ),
					array( 'pe-7s-note2'    =>	  'note2' ),
					array( 'pe-7s-notebook'    =>	  'notebook' ),
					array( 'pe-7s-paint-bucket'    =>	  'paint-bucket' ),
					array( 'pe-7s-paint'    =>	  'paint' ),
					array( 'pe-7s-paper-plane'    =>	  'paper-plane' ),
					array( 'pe-7s-paperclip'    =>	  'paperclip' ),
					array( 'pe-7s-pen'    =>	  'pen' ),
					array( 'pe-7s-pendrive'    =>	  'pendrive' ),
					array( 'pe-7s-phone'    =>	  'phone' ),
					array( 'pe-7s-photo-gallery'    =>	  'photo-gallery' ),
					array( 'pe-7s-photo'    =>	  'photo' ),
					array( 'pe-7s-piggy'    =>	  'piggy' ),
					array( 'pe-7s-pin'    =>	  'pin' ),
					array( 'pe-7s-plane'    =>	  'plane' ),
					array( 'pe-7s-play'    =>	  'play' ),
					array( 'pe-7s-plug'    =>	  'plug' ),
					array( 'pe-7s-plugin'    =>	  'plugin' ),
					array( 'pe-7s-plus'    =>	  'plus' ),
					array( 'pe-7s-portfolio'    =>	  'portfolio' ),
					array( 'pe-7s-power'    =>	  'power' ),
					array( 'pe-7s-prev'    =>	  'prev' ),
					array( 'pe-7s-print'    =>	  'print' ),
					array( 'pe-7s-radio'    =>	  'radio' ),
					array( 'pe-7s-refresh-2'    =>	  'refresh-2' ),
					array( 'pe-7s-refresh-cloud'    =>	  'refresh-cloud' ),
					array( 'pe-7s-refresh'    =>	  'refresh' ),
					array( 'pe-7s-repeat'    =>	  'repeat' ),
					array( 'pe-7s-ribbon'    =>	  'ribbon' ),
					array( 'pe-7s-right-arrow'    =>	  'right-arrow' ),
					array( 'pe-7s-rocket'    =>	  'rocket' ),
					array( 'pe-7s-safe'    =>	  'safe' ),
					array( 'pe-7s-science'    =>	  'science' ),
					array( 'pe-7s-scissors'    =>	  'scissors' ),
					array( 'pe-7s-search'    =>	  'search' ),
					array( 'pe-7s-server'    =>	  'server' ),
					array( 'pe-7s-settings'    =>	  'settings' ),
					array( 'pe-7s-share'    =>	  'share' ),
					array( 'pe-7s-shield'    =>	  'shield' ),
					array( 'pe-7s-shopbag'    =>	  'shopbag' ),
					array( 'pe-7s-shuffle'    =>	  'shuffle' ),
					array( 'pe-7s-signal'    =>	  'signal' ),
					array( 'pe-7s-smile'    =>	  'smile' ),
					array( 'pe-7s-speaker'    =>	  'speaker' ),
					array( 'pe-7s-star'    =>	  'star' ),
					array( 'pe-7s-stopwatch'    =>	  'stopwatch' ),
					array( 'pe-7s-study'    =>	  'study' ),
					array( 'pe-7s-sun'    =>	  'sun' ),
					array( 'pe-7s-switch'    =>	  'switch' ),
					array( 'pe-7s-target'    =>	  'target' ),
					array( 'pe-7s-ticket'    =>	  'ticket' ),
					array( 'pe-7s-timer'    =>	  'timer' ),
					array( 'pe-7s-tools'    =>	  'tools' ),
					array( 'pe-7s-trash'    =>	  'trash' ),
					array( 'pe-7s-umbrella'    =>	  'umbrella' ),
					array( 'pe-7s-unlock'    =>	  'unlock' ),
					array( 'pe-7s-up-arrow'    =>	  'up-arrow' ),
					array( 'pe-7s-upload'    =>	  'upload' ),
					array( 'pe-7s-usb'    =>	  'usb' ),
					array( 'pe-7s-user-female'    =>	  'user-female' ),
					array( 'pe-7s-user'    =>	  'user' ),
					array( 'pe-7s-users'    =>	  'users' ),
					array( 'pe-7s-vector'    =>	  'vector' ),
					array( 'pe-7s-video'    =>	  'video' ),
					array( 'pe-7s-voicemail'    =>	  'voicemail' ),
					array( 'pe-7s-volume'    =>	  'volume' ),
					array( 'pe-7s-volume1'    =>	  'volume1' ),
					array( 'pe-7s-volume2'    =>	  'volume2' ),
					array( 'pe-7s-wallet'    =>	  'wallet' ),
					array( 'pe-7s-way'    =>	  'way' ),
					array( 'pe-7s-wine'    =>	  'wine' ),
					array( 'pe-7s-world'    =>	  'world' ),
					array( 'pe-7s-wristwatch'    =>	  'wristwatch' ),
				),
				'Pe Icon 7 Filled' => array(
					array( 'pe-7f-add-user'   => 	'add-user' ),
					array( 'pe-7f-airplay'   => 	'airplay' ),
					array( 'pe-7f-alarm'   => 	'alarm' ),
					array( 'pe-7f-album'   => 	'album' ),
					array( 'pe-7f-albums'   => 	'albums' ),
					array( 'pe-7f-anchor'   => 	'anchor' ),
					array( 'pe-7f-angle-down'   => 	'angle-down' ),
					array( 'pe-7f-angle-left'   => 	'angle-left' ),
					array( 'pe-7f-angle-right'   => 	'angle-right' ),
					array( 'pe-7f-angle-up'   => 	'angle-up' ),
					array( 'pe-7f-arc'   => 	'arc' ),
					array( 'pe-7f-attention'   => 	'attention' ),
					array( 'pe-7f-back-2'   => 	'back-2' ),
					array( 'pe-7f-back'   => 	'back' ),
					array( 'pe-7f-ball'   => 	'ball' ),
					array( 'pe-7f-bandaid'   => 	'bandaid' ),
					array( 'pe-7f-battery'   => 	'battery' ),
					array( 'pe-7f-bell'   => 	'bell' ),
					array( 'pe-7f-bicycle'   => 	'bicycle' ),
					array( 'pe-7f-bluetooth'   => 	'bluetooth' ),
					array( 'pe-7f-bookmarks'   => 	'bookmarks' ),
					array( 'pe-7f-bottom-arrow'   => 	'bottom-arrow' ),
					array( 'pe-7f-box'   => 	'box' ),
					array( 'pe-7f-box1'   => 	'box1' ),
					array( 'pe-7f-browser'   => 	'browser' ),
					array( 'pe-7f-calculator'   => 	'calculator' ),
					array( 'pe-7f-call'   => 	'call' ),
					array( 'pe-7f-camera'   => 	'camera' ),
					array( 'pe-7f-car'   => 	'car' ),
					array( 'pe-7f-cart'   => 	'cart' ),
					array( 'pe-7f-cash'   => 	'cash' ),
					array( 'pe-7f-chat'   => 	'chat' ),
					array( 'pe-7f-check'   => 	'check' ),
					array( 'pe-7f-clock'   => 	'clock' ),
					array( 'pe-7f-close'   => 	'close' ),
					array( 'pe-7f-cloud-download'   => 	'cloud-download' ),
					array( 'pe-7f-cloud-upload'   => 	'cloud-upload' ),
					array( 'pe-7f-cloud'   => 	'cloud' ),
					array( 'pe-7f-coffee'   => 	'coffee' ),
					array( 'pe-7f-comment'   => 	'comment' ),
					array( 'pe-7f-compass'   => 	'compass' ),
					array( 'pe-7f-config'   => 	'config' ),
					array( 'pe-7f-copy-file'   => 	'copy-file' ),
					array( 'pe-7f-credit'   => 	'credit' ),
					array( 'pe-7f-crop'   => 	'crop' ),
					array( 'pe-7f-culture'   => 	'culture' ),
					array( 'pe-7f-cup'   => 	'cup' ),
					array( 'pe-7f-date'   => 	'date' ),
					array( 'pe-7f-delete-user'   => 	'delete-user' ),
					array( 'pe-7f-diamond'   => 	'diamond' ),
					array( 'pe-7f-disk'   => 	'disk' ),
					array( 'pe-7f-diskette'   => 	'diskette' ),
					array( 'pe-7f-display1'   => 	'display1' ),
					array( 'pe-7f-display2'   => 	'display2' ),
					array( 'pe-7f-door-lock'   => 	'door-lock' ),
					array( 'pe-7f-download'   => 	'download' ),
					array( 'pe-7f-drawer'   => 	'drawer' ),
					array( 'pe-7f-drop'   => 	'drop' ),
					array( 'pe-7f-edit'   => 	'edit' ),
					array( 'pe-7f-expand'   => 	'expand' ),
					array( 'pe-7f-expand1'   => 	'expand1' ),
					array( 'pe-7f-eyedropper'   => 	'eyedropper' ),
					array( 'pe-7f-female'   => 	'female' ),
					array( 'pe-7f-file'   => 	'file' ),
					array( 'pe-7f-film'   => 	'film' ),
					array( 'pe-7f-filter'   => 	'filter' ),
					array( 'pe-7f-flag'   => 	'flag' ),
					array( 'pe-7f-folder'   => 	'folder' ),
					array( 'pe-7f-gift'   => 	'gift' ),
					array( 'pe-7f-glasses'   => 	'glasses' ),
					array( 'pe-7f-gleam'   => 	'gleam' ),
					array( 'pe-7f-global'   => 	'global' ),
					array( 'pe-7f-graph'   => 	'graph' ),
					array( 'pe-7f-graph1'   => 	'graph1' ),
					array( 'pe-7f-graph2'   => 	'graph2' ),
					array( 'pe-7f-graph3'   => 	'graph3' ),
					array( 'pe-7f-gym'   => 	'gym' ),
					array( 'pe-7f-hammer'   => 	'hammer' ),
					array( 'pe-7f-headphones'   => 	'headphones' ),
					array( 'pe-7f-helm'   => 	'helm' ),
					array( 'pe-7f-help1'   => 	'help1' ),
					array( 'pe-7f-help2'   => 	'help2' ),
					array( 'pe-7f-home'   => 	'home' ),
					array( 'pe-7f-hourglass'   => 	'hourglass' ),
					array( 'pe-7f-id'   => 	'id' ),
					array( 'pe-7f-info'   => 	'info' ),
					array( 'pe-7f-joy'   => 	'joy' ),
					array( 'pe-7f-junk'   => 	'junk' ),
					array( 'pe-7f-key'   => 	'key' ),
					array( 'pe-7f-keypad'   => 	'keypad' ),
					array( 'pe-7f-leaf'   => 	'leaf' ),
					array( 'pe-7f-left-arrow'   => 	'left-arrow' ),
					array( 'pe-7f-less'   => 	'less' ),
					array( 'pe-7f-light'   => 	'light' ),
					array( 'pe-7f-like'   => 	'like' ),
					array( 'pe-7f-like2'   => 	'like2' ),
					array( 'pe-7f-link'   => 	'link' ),
					array( 'pe-7f-lintern'   => 	'lintern' ),
					array( 'pe-7f-lock'   => 	'lock' ),
					array( 'pe-7f-look'   => 	'look' ),
					array( 'pe-7f-loop'   => 	'loop' ),
					array( 'pe-7f-magic-wand'   => 	'magic-wand' ),
					array( 'pe-7f-magnet'   => 	'magnet' ),
					array( 'pe-7f-mail-open-file'   => 	'mail-open-file' ),
					array( 'pe-7f-mail-open'   => 	'mail-open' ),
					array( 'pe-7f-mail'   => 	'mail' ),
					array( 'pe-7f-male'   => 	'male' ),
					array( 'pe-7f-map-2'   => 	'map-2' ),
					array( 'pe-7f-map-marker'   => 	'map-marker' ),
					array( 'pe-7f-map'   => 	'map' ),
					array( 'pe-7f-medal'   => 	'medal' ),
					array( 'pe-7f-menu'   => 	'menu' ),
					array( 'pe-7f-micro'   => 	'micro' ),
					array( 'pe-7f-monitor'   => 	'monitor' ),
					array( 'pe-7f-moon'   => 	'moon' ),
					array( 'pe-7f-more'   => 	'more' ),
					array( 'pe-7f-mouse'   => 	'mouse' ),
					array( 'pe-7f-music'   => 	'music' ),
					array( 'pe-7f-musiclist'   => 	'musiclist' ),
					array( 'pe-7f-mute'   => 	'mute' ),
					array( 'pe-7f-network'   => 	'network' ),
					array( 'pe-7f-news-paper'   => 	'news-paper' ),
					array( 'pe-7f-next-2'   => 	'next-2' ),
					array( 'pe-7f-next'   => 	'next' ),
					array( 'pe-7f-note'   => 	'note' ),
					array( 'pe-7f-note2'   => 	'note2' ),
					array( 'pe-7f-notebook'   => 	'notebook' ),
					array( 'pe-7f-paint-bucket'   => 	'paint-bucket' ),
					array( 'pe-7f-paint'   => 	'paint' ),
					array( 'pe-7f-paper-plane'   => 	'paper-plane' ),
					array( 'pe-7f-paperclip'   => 	'paperclip' ),
					array( 'pe-7f-pen'   => 	'pen' ),
					array( 'pe-7f-pendrive'   => 	'pendrive' ),
					array( 'pe-7f-phone'   => 	'phone' ),
					array( 'pe-7f-photo-gallery'   => 	'photo-gallery' ),
					array( 'pe-7f-photo'   => 	'photo' ),
					array( 'pe-7f-piggy'   => 	'piggy' ),
					array( 'pe-7f-pin'   => 	'pin' ),
					array( 'pe-7f-plane'   => 	'plane' ),
					array( 'pe-7f-play'   => 	'play' ),
					array( 'pe-7f-plug'   => 	'plug' ),
					array( 'pe-7f-plugin'   => 	'plugin' ),
					array( 'pe-7f-plus'   => 	'plus' ),
					array( 'pe-7f-portfolio'   => 	'portfolio' ),
					array( 'pe-7f-power'   => 	'power' ),
					array( 'pe-7f-prev'   => 	'prev' ),
					array( 'pe-7f-print'   => 	'print' ),
					array( 'pe-7f-radio'   => 	'radio' ),
					array( 'pe-7f-refresh-2'   => 	'refresh-2' ),
					array( 'pe-7f-refresh-cloud'   => 	'refresh-cloud' ),
					array( 'pe-7f-refresh'   => 	'refresh' ),
					array( 'pe-7f-repeat'   => 	'repeat' ),
					array( 'pe-7f-ribbon'   => 	'ribbon' ),
					array( 'pe-7f-right-arrow'   => 	'right-arrow' ),
					array( 'pe-7f-rocket'   => 	'rocket' ),
					array( 'pe-7f-safe'   => 	'safe' ),
					array( 'pe-7f-science'   => 	'science' ),
					array( 'pe-7f-scissors'   => 	'scissors' ),
					array( 'pe-7f-search'   => 	'search' ),
					array( 'pe-7f-server'   => 	'server' ),
					array( 'pe-7f-settings'   => 	'settings' ),
					array( 'pe-7f-share'   => 	'share' ),
					array( 'pe-7f-shield'   => 	'shield' ),
					array( 'pe-7f-shopbag'   => 	'shopbag' ),
					array( 'pe-7f-shuffle'   => 	'shuffle' ),
					array( 'pe-7f-signal'   => 	'signal' ),
					array( 'pe-7f-smile'   => 	'smile' ),
					array( 'pe-7f-speaker'   => 	'speaker' ),
					array( 'pe-7f-star'   => 	'star' ),
					array( 'pe-7f-stopwatch'   => 	'stopwatch' ),
					array( 'pe-7f-study'   => 	'study' ),
					array( 'pe-7f-sun'   => 	'sun' ),
					array( 'pe-7f-switch'   => 	'switch' ),
					array( 'pe-7f-target'   => 	'target' ),
					array( 'pe-7f-ticket'   => 	'ticket' ),
					array( 'pe-7f-timer'   => 	'timer' ),
					array( 'pe-7f-tools'   => 	'tools' ),
					array( 'pe-7f-trash'   => 	'trash' ),
					array( 'pe-7f-umbrella'   => 	'umbrella' ),
					array( 'pe-7f-unlock'   => 	'unlock' ),
					array( 'pe-7f-up-arrow'   => 	'up-arrow' ),
					array( 'pe-7f-upload'   => 	'upload' ),
					array( 'pe-7f-usb'   => 	'usb' ),
					array( 'pe-7f-user-female'   => 	'user-female' ),
					array( 'pe-7f-user'   => 	'user' ),
					array( 'pe-7f-users'   => 	'users' ),
					array( 'pe-7f-vector'   => 	'vector' ),
					array( 'pe-7f-video'   => 	'video' ),
					array( 'pe-7f-voicemail'   => 	'voicemail' ),
					array( 'pe-7f-volume'   => 	'volume' ),
					array( 'pe-7f-volume1'   => 	'volume1' ),
					array( 'pe-7f-volume2'   => 	'volume2' ),
					array( 'pe-7f-wallet'   => 	'wallet' ),
					array( 'pe-7f-way'   => 	'way' ),
					array( 'pe-7f-wine'   => 	'wine' ),
					array( 'pe-7f-world'   => 	'world' ),
					array( 'pe-7f-wristwatch'   => 	'wristwatch' ),
				)
			);

			return array_merge( $icons, $icon_list_array );
		}

		add_filter( 'vc_iconpicker-type-iconlist', 'vc_iconpicker_type_iconlist' );

		// Row
		$row_settings_update = array (
		  'weight' => '99',
		  'icon' => 'ion-ios-plus-outline'
		);
		vc_map_update( 'vc_row', $row_settings_update );
		// Column Text
		$column_text_settings_update = array (
		  'weight' => '99',
		  'icon' => 'ion-ios-paper-outline'
		);
		vc_map_update( 'vc_column_text', $column_text_settings_update );

		// Custom Heading
		$custom_heading_settings_update = array (
		  'weight' => '96',
		  'icon' => 'ion-ios-glasses-outline'
		);
		vc_map_update( 'vc_custom_heading', $custom_heading_settings_update );
		// Empty space
		$space_settings_update = array (
		  'weight' => '94',
		  'icon' => 'ion-ios-minus-empty'
		);
		vc_map_update( 'vc_empty_space', $space_settings_update );
		
		// Tab
		$tab_settings_update = array (
		  'weight' => '68',
		  'icon' => 'ion-ios-browsers-outline'
		);
		vc_map_update( 'vc_tta_tabs', $tab_settings_update );
		vc_map_update( 'vc_tabs', $tab_settings_update );
		// Accordion
		$accordion_settings_update = array (
		  'weight' => '67',
		  'icon' => 'ion-ios-drag'
		);
		vc_map_update( 'vc_tta_accordion', $accordion_settings_update );
		vc_map_update( 'vc_accordion', $accordion_settings_update );
		

		if( defined( 'WPCF7_PLUGIN' ) ){
			// Contact Form 7
			$contact_form_settings_update = array (
			  'weight' => '66',
			  'icon' => 'ion-ios-paperplane-outline'
			);
			vc_map_update( 'contact-form-7', $contact_form_settings_update );
		}
		
		if( class_exists( 'RevSlider' ) ){
			// Revolution slider
			$rev_settings_update = array (
			  'weight' => '65',
			  'icon' => 'ion-ios-loop'
			);
			//vc_map_update( 'rev_slider_vc', $rev_settings_update );
			vc_remove_element("rev_slider_vc");
			vc_map_update( 'rev_slider', $rev_settings_update );
		}


		vc_remove_param( "vc_row", "css" );
		vc_remove_param( "vc_row", "full_width" );
		vc_remove_param( "vc_row", "content_placement" );
		vc_remove_param( "vc_row", "video_bg" );
		vc_remove_param( "vc_row", "video_bg_url" );
		vc_remove_param( "vc_row", "video_bg_parallax" );
		vc_remove_param( "vc_row", "parallax" );
		vc_remove_param( "vc_row", "parallax_image" );
		vc_remove_param( "vc_row", "gap" );
		vc_remove_param( "vc_row", "equal_height" );
		vc_remove_param( "vc_row", "parallax_speed_video" );
		vc_remove_param( "vc_row", "parallax_speed_bg" );

		vc_add_param( "vc_row", array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Row stretch', 'cookie' ),
			'param_name' => 'fullwidth',
			'weight' => '1',
			'value' => array(
				esc_html__( 'Default(container)', 'cookie' ) => '',
				esc_html__( 'Fullwidth content', 'cookie' ) => 'has-fullwidth-column',
				esc_html__( 'Fullwidth content w/o padding', 'cookie' ) => 'has-fullwidth-column-no-padding row',
			),
			'description' => esc_html__( 'choose any one to display the content on this paricular row. This option affect only the content not the background.', 'cookie' ),
			'std' => '',
		));
		vc_add_param( "vc_row", array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Act as a Table', 'cookie' ),
			'param_name' => 'act_as_table',
			'weight' => '1',
			'description' => esc_html__( 'It makes all the columns with equal height', 'cookie' ),
			'value' => array( esc_html__( 'Enable', 'cookie' ) => 'act_as_table' ),
		));
		

		$row_bg_attr = array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Background Choice', 'cookie' ),
				'param_name' => 'bg_choice',
				'weight' => '1',
				'value' => array(
					esc_html__( 'Background Color', 'cookie' ) => '1',
					esc_html__( 'Background Image', 'cookie' ) => '2',
					//esc_html__( 'Background Video', 'cookie' ) => '3',
				),
				'description' => esc_html__( 'choose any one to display the content on this paricular row. This option affect only the content not the background.', 'cookie' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Background Color', 'cookie' ),
				'param_name' => 'bg_color',
				'description' => esc_html__( 'select the background color for this row section', 'cookie' ),
				'dependency' => array( 'element' => 'bg_choice', 'value' => '1' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Background Image', 'cookie' ),
				'param_name' => 'bg_image',
				'description' => esc_html__( 'Select background image for your row', 'cookie' ),
				'dependency' => array( 'element' => 'bg_choice', 'value' => '2' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Background Repeat', 'cookie' ),
				'param_name' => 'bg_image_repeat',
				'value' => array(
					 esc_html__( 'Repeat', 'cookie' ) => 'repeat',
					 esc_html__('No Repeat', 'cookie') => 'no-repeat'
					),
				'description' => esc_html__( 'Select how the background image will be repeated', 'cookie' ),
				'dependency' => array( 'element' => 'bg_image', 'not_empty' => true),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'std' => 'repeat',
				'edit_field_class' => 'vc_col-md-6 vc_column',
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Background Size', 'cookie' ),
				'param_name' => 'bg_image_size',
				'value' => array(
					 esc_html__('Cover', 'cookie') => 'cover',
					 esc_html__( 'Auto', 'cookie' ) => 'auto'
					),
				'description' => esc_html__( 'Select how the background image will be repeated', 'cookie' ),
				'dependency' => array( 'element' => 'bg_image', 'not_empty' => true),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'std' => 'cover',
				'edit_field_class' => 'vc_col-md-6 vc_column'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Background Position', 'cookie' ),
				'param_name' => 'bg_image_position',
				'value' => array(
					 esc_html__( 'center center', 'cookie' ) => 'center center',
					 esc_html__( 'left top', 'cookie') => 'left top',
					 esc_html__( 'left center', 'cookie' ) => 'left center',
					 esc_html__( 'left bottom', 'cookie' ) => 'left bottom',
					 esc_html__( 'right top', 'cookie' ) => 'right top',
					 esc_html__( 'right center', 'cookie' ) => 'right center',
					 esc_html__( 'right bottom', 'cookie' ) => 'right bottom',
					 esc_html__( 'center top', 'cookie' ) => 'center top',
					 esc_html__( 'center bottom', 'cookie' ) => 'center bottom',
				),
				'description' => esc_html__( 'Select how the background image will be repeated', 'cookie' ),
				'dependency' => array( 'element' => 'bg_image', 'not_empty' => true),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'std' => 'center center',
				'edit_field_class' => 'vc_col-md-6 vc_column'
			),

			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Background attachment', 'cookie' ),
				'param_name' => 'bg_image_attachment',
				'value' => array(
					 esc_html__( 'Scroll', 'cookie' ) => 'scroll',
					 esc_html__( 'Fixed', 'cookie' ) => 'fixed',
					),
				'description' => esc_html__( 'Select how the background image will be attached', 'cookie' ),
				'dependency' => array( 'element' => 'bg_image', 'not_empty' => true),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'std' => 'scroll',
				'edit_field_class' => 'vc_col-md-6 vc_column'
			),

		);
		vc_add_params( "vc_row", $row_bg_attr );

		$row_space_attr = array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Top margin', 'cookie' ),
				'param_name' => 'margin_top',
				'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Right margin', 'cookie' ),
				'param_name' => 'margin_right',
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Bottom margin', 'cookie' ),
				'param_name' => 'margin_bottom',
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Left margin', 'cookie' ),
				'param_name' => 'margin_left',
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Top padding', 'cookie' ),
				'param_name' => 'padding_top',
				'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Right padding', 'cookie' ),
				'param_name' => 'padding_right',
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Bottom padding', 'cookie' ),
				'param_name' => 'padding_bottom',
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Left padding', 'cookie' ),
				'param_name' => 'padding_left',
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Top border', 'cookie' ),
				'param_name' => 'border_top',
				'description' => esc_html__( 'enter just number and it will use pixels.', 'cookie' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Right border', 'cookie' ),
				'param_name' => 'border_right',
				'description' => esc_html__( 'enter just number and it will use pixels.', 'cookie' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Bottom border', 'cookie' ),
				'param_name' => 'border_bottom',
				'description' => esc_html__( 'enter just number and it will use pixels.', 'cookie' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Left border', 'cookie' ),
				'param_name' => 'border_left',
				'description' => esc_html__( 'enter just number and it will use pixels.', 'cookie' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Border Color', 'cookie' ),
				'param_name' => 'border_color',
				'description' => esc_html__( 'select the border color for this row section', 'cookie' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-6 vc_column'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Border Style', 'cookie' ),
				'param_name' => 'border_style',
				'value' => array(
					 esc_html__( 'No style', 'cookie' ) => '',
					 esc_html__( 'Solid', 'cookie' ) => 'solid',
					 esc_html__( 'Dashed', 'cookie' ) => 'dashed',
					 esc_html__( 'Dotted', 'cookie' ) => 'dotted',
					 esc_html__( 'Double', 'cookie' ) => 'double',
					),
				'description' => esc_html__( 'Select the border style', 'cookie' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-6 vc_column'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Border radius', 'cookie' ),
				'param_name' => 'border_radius',
				'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
				'group' => esc_html__( 'Design Settings', 'cookie' ),
				'edit_field_class' => 'vc_col-md-3 vc_column'
			),
		);
		vc_add_params( "vc_row", $row_space_attr );

		$row_parallax_attr = array(
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Background Parallax', 'cookie' ),
				'param_name' => 'bg_parallax',
				'description' => esc_html__( 'This parallax effect is purly based on skrollr. You can refer at https://github.com/Prinzhorn/skrollr', 'cookie' ),
				'value' => array( esc_html__( 'Enable', 'cookie' ) => '1' ),
				'group' => esc_html__( 'Parallax Setting', 'cookie' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Element\'s Top at the Bottom.', 'cookie' ),
				'param_name' => 'data_bottom_top',
				'description' => esc_html__( 'type the background values when the element\'s top at the bottom. for ex. background-color: rgba(255, 255, 255, 1);', 'cookie' ),
				'group' => esc_html__( 'Parallax Setting', 'cookie' ),
				'std' => 'background-position: 0px -200px',
				'dependency' => array( 'element' => 'bg_parallax', 'value' => '1' ),
				
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Element\'s center at the center.', 'cookie' ),
				'param_name' => 'data_center',
				'description' => esc_html__( 'type the background values when the element\'s center at the center.', 'cookie' ),
				'group' => esc_html__( 'Parallax Setting', 'cookie' ),
				'std' => 'background-position: 0px 0px',
				'dependency' => array( 'element' => 'bg_parallax', 'value' => '1' ),
				
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Element\'s bottom reach the Top.', 'cookie' ),
				'param_name' => 'data_top_bottom',
				'description' => esc_html__( 'type the background values when the element\'s bottom at the Top.', 'cookie' ),
				'group' => esc_html__( 'Parallax Setting', 'cookie' ),
				'std' => 'background-position: 0px 200px;',
				'dependency' => array( 'element' => 'bg_parallax', 'value' => '1' ),
				
			)
		);
		vc_add_params( "vc_row", $row_parallax_attr );

		vc_remove_param( "vc_row_inner", "gap" );
		vc_remove_param( "vc_row_inner", "content_placement" );
		vc_remove_param( "vc_row_inner", "equal_height" );
		//vc_remove_param( "vc_row_inner", "disable_element" );

		$animation_attr = array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Animation', 'cookie' ),
			'param_name' => 'animation',
			'value' => array(
				'No Animation' => '',
				'bounce'	=> 'bounce',
				'flash'	=> 'flash',
				'pulse'	=> 'pulse',
				'rubberBand'	=> 'rubberBand',
				'shake'	=> 'shake',
				'swing'	=> 'swing',
				'tada'	=> 'tada',
				'wobble'	=> 'wobble',
				'jello'	=> 'jello',
				'bounceIn'	=> 'bounceIn',
				'bounceInDown'	=> 'bounceInDown',
				'bounceInLeft'	=> 'bounceInLeft',
				'bounceInRight'	=> 'bounceInRight',
				'bounceInUp'	=> 'bounceInUp',
				'bounceOut'	=> 'bounceOut',
				'bounceOutDown'	=> 'bounceOutDown',
				'bounceOutLeft'	=> 'bounceOutLeft',
				'bounceOutRight'	=> 'bounceOutRight',
				'bounceOutUp'	=> 'bounceOutUp',
				'fadeIn'	=> 'fadeIn',
				'fadeInDown'	=> 'fadeInDown',
				'fadeInDownBig'	=> 'fadeInDownBig',
				'fadeInLeft'	=> 'fadeInLeft',
				'fadeInLeftBig'	=> 'fadeInLeftBig',
				'fadeInRight'	=> 'fadeInRight',
				'fadeInRightBig'	=> 'fadeInRightBig',
				'fadeInUp'	=> 'fadeInUp',
				'fadeInUpBig'	=> 'fadeInUpBig',
				'fadeOut'	=> 'fadeOut',
				'fadeOutDown'	=> 'fadeOutDown',
				'fadeOutDownBig'	=> 'fadeOutDownBig',
				'fadeOutLeft'	=> 'fadeOutLeft',
				'fadeOutLeftBig'	=> 'fadeOutLeftBig',
				'fadeOutRight'	=> 'fadeOutRight',
				'fadeOutRightBig'	=> 'fadeOutRightBig',
				'fadeOutUp'	=> 'fadeOutUp',
				'fadeOutUpBig'	=> 'fadeOutUpBig',
				'flipInX'	=> 'flipInX',
				'flipInY'	=> 'flipInY',
				'flipOutX'	=> 'flipOutX',
				'flipOutY'	=> 'flipOutY',
				'lightSpeedIn'	=> 'lightSpeedIn',
				'lightSpeedOut'	=> 'lightSpeedOut',
				'rotateIn'	=> 'rotateIn',
				'rotateInDownLeft'	=> 'rotateInDownLeft',
				'rotateInDownRight'	=> 'rotateInDownRight',
				'rotateInUpLeft'	=> 'rotateInUpLeft',
				'rotateInUpRight'	=> 'rotateInUpRight',
				'rotateOut'	=> 'rotateOut',
				'rotateOutDownLeft'	=> 'rotateOutDownLeft',
				'rotateOutDownRight'	=> 'rotateOutDownRight',
				'rotateOutUpLeft'	=> 'rotateOutUpLeft',
				'rotateOutUpRight'	=> 'rotateOutUpRight',
				'hinge'	=> 'hinge',
				'rollIn'	=> 'rollIn',
				'rollOut'	=> 'rollOut',
				'zoomIn'	=> 'zoomIn',
				'zoomInDown'	=> 'zoomInDown',
				'zoomInLeft'	=> 'zoomInLeft',
				'zoomInRight'	=> 'zoomInRight',
				'zoomInUp'	=> 'zoomInUp',
				'zoomOut'	=> 'zoomOut',
				'zoomOutDown'	=> 'zoomOutDown',
				'zoomOutLeft'	=> 'zoomOutLeft',
				'zoomOutRight'	=> 'zoomOutRight',
				'zoomOutUp'	=> 'zoomOutUp',
				'slideInDown'	=> 'slideInDown',
				'slideInLeft'	=> 'slideInLeft',
				'slideInRight'	=> 'slideInRight',
				'slideInUp'	=> 'slideInUp',
				'slideOutDown'	=> 'slideOutDown',
				'slideOutLeft'	=> 'slideOutLeft',
				'slideOutRight'	=> 'slideOutRight',
				'slideOutUp'	=> 'slideOutUp',
			),
			'description' => esc_html__( 'Select how the content will be aligned in column', 'cookie' ),
			'group' => esc_html__( 'Animation Setting', 'cookie' )
		);

		// Column 
		$col_animation_attr = array(
			$animation_attr,
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Animation Delay', 'cookie' ),
				'param_name' => 'animation_delay',
				'group' => esc_html__( 'Animation Setting', 'cookie' ),
				'dependency' => array( 'element' => 'animation', 'not_empty' => true)
				
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Animation Duration', 'cookie' ),
				'param_name' => 'animation_duration',
				'group' => esc_html__( 'Animation Setting', 'cookie' ),
				'dependency' => array( 'element' => 'animation', 'not_empty' => true)
				
			), 
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Animation Offset', 'cookie' ),
				'param_name' => 'animation_offset',
				'description' => esc_html__( 'You can use "simply number" or "%" to denote the offset. for ex. 90%. It will trigger the animation only when the element reach 90% from the top.', 'cookie' ),
				'group' => esc_html__( 'Animation Setting', 'cookie' ),
				'dependency' => array( 'element' => 'animation', 'not_empty' => true)
			),
		);
		$col_general_attr = array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Text alignment', 'cookie' ),
				'param_name' => 'align',
				'weight' => '1',
				'value' => array(
					 esc_html__( 'left', 'cookie' ) => 'left',
					 esc_html__( 'right', 'cookie' ) => 'right',
					 esc_html__('center', 'cookie') => 'center'
					),
				'description' => esc_html__( 'Select how the content will be aligned in column', 'cookie' )
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'White content', 'cookie' ),
				'param_name' => 'white',
				'weight' => '2',
				'description' => esc_html__( 'if you want to switch your content/text color to white. check this.', 'cookie' ),
				'value' => array( esc_html__( 'Yes', 'cookie' ) => 'white' )
			),
		);

		vc_add_params( "vc_column", $col_animation_attr );
		vc_add_params( "vc_column", $col_general_attr );
		vc_add_params( "vc_column_inner", $col_animation_attr );
		vc_add_params( "vc_column_inner", $col_general_attr );

		/* VC Custom Heading */
		vc_remove_param( "vc_custom_heading", "source" );

		vc_add_param( "vc_custom_heading", array(
			'type' => 'iconpicker',
			'heading' => __( 'Choose Icon', 'fortune' ),
			'param_name' => 'icon',
			'value' => '',
			'settings' => array(
				'type' => 'iconlist',
				'iconsPerPage' => 3000,
			),
			'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
			'std' => ''
		));
		vc_add_param( "vc_custom_heading", array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Divide Line', 'cookie' ),
			'description' => esc_html__( 'This will bring the small line below to the title.' , 'cookie' ),
			'param_name' => 'divide_line',
			'weight' => '1',
			'value' => array( esc_html__( 'Yes', 'cookie' ) => 'yes' ),
			'std' => '',
		));
		vc_add_param( "vc_custom_heading", array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Divide Line Width', 'cookie' ),
			'param_name' => 'divide_line_width',
			'weight' => '1',
			'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.' , 'cookie' ),
			'dependency' => array( 'element' => 'divide_line', 'value' => 'yes' ),
			'std' => '90'
		));
		vc_add_param( "vc_custom_heading", array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Divide Line Height', 'cookie' ),
			'param_name' => 'divide_line_height',
			'weight' => '1',
			'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
			'dependency' => array( 'element' => 'divide_line', 'value' => 'yes' ),
			'std' => '1'
		));
		vc_add_param( "vc_custom_heading", array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Divide Line Color', 'cookie' ),
			'param_name' => 'divide_line_color',
			'weight' => '1',
			'dependency' => array( 'element' => 'divide_line', 'value' => 'yes' ),
			'std' => '#22e3e5',
		));
		vc_add_param( "vc_custom_heading", array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Divide Line alignment', 'cookie' ),
			'param_name' => 'divide_line_align',
			'weight' => '1',
			'value' => array(
				 esc_html__('center', 'cookie') => 'center',
				 esc_html__( 'left', 'cookie' ) => 'left',						 
				 esc_html__( 'right', 'cookie' ) => 'right'
				),
			'description' => esc_html__( 'Select how the divide line will be aligned', 'cookie' ),
			'dependency' => array( 'element' => 'divide_line', 'value' => 'yes' ),
			'std' => 'left'
		));

		// tabs @deprecated
		vc_add_param("vc_tab", array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Active', 'cookie' ),
			'param_name' => 'active',
			'description' => esc_html__( 'If you want this tab active.. than check it!!..', 'cookie' ),
			'value' => array( esc_html__( 'Yes', 'cookie' ) => 'active' )
		));

		vc_remove_param("vc_tabs", "interval");
		vc_remove_param("vc_tabs", "title");
		vc_add_param("vc_tabs", array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Tab Style', 'cookie' ),
			'param_name' => 'style',
			'weight' => '1',
			'value' => array(
				 esc_html__('Style 1', 'cookie') => '1',
				 esc_html__('Style 2', 'cookie' ) => '2',						 
				 esc_html__('Style 3', 'cookie' ) => '3'
				),
			'description' => esc_html__( 'Select any of one style to display different type of tab', 'cookie' ),
			'std' => '1'
		));
		vc_add_param( "vc_tabs", array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Alignment', 'cookie' ),
			'param_name' => 'alignment',
			'weight' => '1',
			'value' => array(
				 esc_html__('center', 'cookie') => 'center',
				 esc_html__( 'left', 'cookie' ) => 'left',						 
				 esc_html__( 'right', 'cookie' ) => 'right'
				),
			'description' => esc_html__( 'Select how the tabs will be aligned', 'cookie' ),
			'std' => 'left'
		));

		// Accordions  @deprecated
		// accordion & toggle
		vc_remove_param("vc_accordion_tab", "el_id");
		vc_add_param("vc_accordion_tab", array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Active', 'cookie' ),
			'param_name' => 'active',
			'description' => esc_html__( 'If you want this tab .. than check it!!..', 'cookie' ),
			'value' => array( esc_html__( 'Yes', 'cookie' ) => 'in' )
		));

		vc_remove_param("vc_accordion", "interval");
		vc_remove_param("vc_accordion", "collapsible");
		vc_remove_param("vc_accordion", "active_tab");
		vc_remove_param("vc_accordion", "disable_keyboard");
		vc_remove_param("vc_accordion", "title");
		vc_add_param("vc_accordion", array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Accordion Style', 'cookie' ),
			'param_name' => 'style',
			'weight' => '1',
			'value' => array(
				 esc_html__('Style 1', 'cookie') => '1',
				 esc_html__('Style 2', 'cookie' ) => '2',						 
				 esc_html__('Style 3', 'cookie' ) => '3'
				),
			'description' => esc_html__( 'Select any of one style to display different type of accordion', 'cookie' ),
			'std' => '1'
		));
		vc_add_param( "vc_accordion", array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Alignment', 'cookie' ),
			'param_name' => 'alignment',
			'weight' => '1',
			'value' => array(
				 esc_html__('center', 'cookie') => 'center',
				 esc_html__( 'left', 'cookie' ) => 'left',						 
				 esc_html__( 'right', 'cookie' ) => 'right'
				),
			'description' => esc_html__( 'Select how the toggles will be aligned', 'cookie' ),
			'std' => 'left'
		));
		vc_add_param("vc_accordion", array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Not an Accordion', 'cookie' ),
			'param_name' => 'choice',
			'description' => esc_html__( 'If you want to keep it as a toggle .. than check it!!..', 'cookie' ),
			'value' => array( esc_html__( 'Yes', 'cookie' ) => 'yes' )
		));

        /*
        Add your Visual Composer logic here.
        Lets call vc_map function to "register" our custom shortcode within Visual Composer interface.

        More info: http://kb.wpbakery.com/index.php?title=Vc_map
        */

		// Section heading
		vc_map( array(
			'name' => esc_html__( 'Section heading', 'cookie' ),
			'base' => 'agni_section_heading',
			'icon' => 'ion-ios-compose-outline',
			'weight' => '97',
			'category' => esc_html__( 'Typography', 'cookie' ),
			'description' => esc_html__( 'various headings for your section row', 'cookie' ),
			'params' => array(
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Choose Icon', 'fortune' ),
					'param_name' => 'icon',
					'value' => '',
					'settings' => array(
						'type' => 'iconlist',
						'iconsPerPage' => 3000,
					),
					'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
					'std' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Icon Size', 'cookie' ),
					'param_name' => 'icon_size',
					'description' => esc_html__( 'don\'t include "px" string' , 'cookie' ),
					'dependency' => array( 'element' => 'icon', 'not_empty' => true ),
					'std' => '60'
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Icon Color', 'cookie' ),
					'param_name' => 'icon_color',
					'description' => esc_html__('This will apply if the heading has divide line!!..', 'cookie' ),
					'dependency' => array( 'element' => 'icon', 'not_empty' => true ),
					'std' => '#22e3e5',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Heading Text', 'cookie' ),
					'param_name' => 'heading',
					'description' => esc_html__( 'Type or Enter your heading', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Heading Font Size', 'cookie' ),
					'param_name' => 'heading_size',
					'description' => esc_html__( 'simply type the number, do not include "px"' , 'cookie' ),
					'dependency' => array( 'element' => 'heading', 'not_empty' => true ),
					'std' => '48'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Sub Heading Text', 'cookie' ),
					'param_name' => 'sub_heading',
					'description' => esc_html__( 'Type or Enter your heading', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Sub Heading Font Size', 'cookie' ),
					'param_name' => 'sub_heading_size',
					'description' => esc_html__( 'simply type the number, do not include "px"' , 'cookie' ),
					'dependency' => array( 'element' => 'sub_heading', 'not_empty' => true ),
					'std' => '18'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Additional Text', 'cookie' ),
					'param_name' => 'additional',
					'description' => esc_html__( 'Additional text for your heading!!.. if any', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Additional Font Size', 'cookie' ),
					'param_name' => 'additional_size',
					'description' => esc_html__( 'simply type the number, do not include "px"' , 'cookie' ),
					'dependency' => array( 'element' => 'additional', 'not_empty' => true ),
					'std' => '22'
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Divide Line', 'cookie' ),
					'param_name' => 'divide_line',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'yes' ),
					'std' => 'yes',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Divide Line Width', 'cookie' ),
					'param_name' => 'divide_line_width',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'divide_line', 'value' => 'yes' ),
					'std' => '90'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Divide Line Height', 'cookie' ),
					'param_name' => 'divide_line_height',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'divide_line', 'value' => 'yes' ),
					'std' => '1'
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Divide Line Color', 'cookie' ),
					'param_name' => 'divide_line_color',
					'description' => esc_html__('This will apply if the heading has divide line!!..', 'cookie' ),
					'dependency' => array( 'element' => 'divide_line', 'value' => 'yes' ),
					'std' => '#22e3e5',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Header alignment', 'cookie' ),
					'param_name' => 'align',
					'value' => array(
						 esc_html__( 'left', 'cookie' ) => 'left',
						 esc_html__('center', 'cookie') => 'center',
						 esc_html__( 'Right', 'cookie' ) => 'right',
						),
					'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
					'std' => 'left',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Display Order', 'cookie' ),
					'param_name' => 'display_order',
					'value' => array(
						 esc_html__( 'Icon, Headings, Divide line, Addtional', 'cookie' ) => 'ihda',
						 esc_html__( 'Headings, Divide line, Additional, Icon', 'cookie' ) => 'hdai',
						 esc_html__( 'Additional, Headings, Divide line, Icon', 'cookie' ) => 'ahdi',
						 esc_html__( 'Divide line, Headings, Additional, Icon', 'cookie' ) => 'dhai',
						 esc_html__( 'Icon, Divide line, Headings, Additional', 'cookie' ) => 'idha',
						),
					'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
					'std' => 'ihda',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		) );
		
		// Blockquote
		vc_map( array(
			'name' => esc_html__( 'Blockquote', 'cookie' ),
			'base' => 'agni_blockquote',
			'icon' => 'ion-ios-heart-outline',
			'weight' => '96',
			'category' => esc_html__( 'Typography', 'cookie' ),
			'description' => esc_html__( 'Blockquote text for the content', 'cookie' ),
			'params' => array(
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Reverse Blockquote', 'cookie' ),
					'param_name' => 'reverse',
					'description' => esc_html__( 'If you want a fullwidth container.. than check it!!..', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'yes' )
				),
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Quote Text', 'cookie' ),
					'param_name' => 'content',
					'value' => '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>'
				),

				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Background Color', 'cookie' ),
					'param_name' => 'background_color',
					'description' => esc_html__('set the background color for the blockquote!!..', 'cookie' ),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Color', 'cookie' ),
					'param_name' => 'color',
					'description' => esc_html__('set the color for the blockquote!!..', 'cookie' ),
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));
		
		// Dropcap
		vc_map( array(
			'name' => esc_html__( 'Dropcap', 'cookie' ),
			'base' => 'agni_dropcap',
			'icon' => 'ion-ios-information-outline',
			'weight' => '95',
			'category' => esc_html__( 'Typography', 'cookie' ),
			'description' => esc_html__( 'Dropcap letter for your  paragraph text!!..', 'cookie' ),
			'params' => array(
				
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Quote Text', 'cookie' ),
					'param_name' => 'content',
					'value' => 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Dropcap style', 'cookie' ),
					'param_name' => 'dropcap_style',
					'value' => array(
						 esc_html__( 'Background', 'cookie' ) => 'background',
						 esc_html__( 'Bordered', 'cookie' ) => 'bordered',
						),
					'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
					'std' => 'background',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Radius', 'cookie' ),
					'param_name' => 'radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Dropcap Background Color', 'cookie' ),
					'param_name' => 'background_color',
					'description' => esc_html__('choose the dropdown background color.', 'cookie' ),
					'dependency' => array( 'element' => 'dropcap_style', 'value' => 'background' ),
					'std' => '#000000',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Dropcap Border Color', 'cookie' ),
					'param_name' => 'border_color',
					'description' => esc_html__('choose the dropdown border color.', 'cookie' ),
					'dependency' => array( 'element' => 'dropcap_style', 'value' => 'bordered' ),
					'std' => '#000000',
				),

				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Dropcap Text Color', 'cookie' ),
					'param_name' => 'color',
					'description' => esc_html__('This will apply if the heading has divide line!!..', 'cookie' ),
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));
		
		// Seperator
		vc_map( array(
			'name' => esc_html__( 'separator', 'cookie' ),
			'base' => 'agni_separator',
			'icon' => 'ion-ios-infinite-outline',
			'weight' => '94',
			'category' => esc_html__( 'Typography', 'cookie' ),
			'description' => esc_html__( 'separator for your content', 'cookie' ),
			'params' => array(
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'separator Choice', 'cookie' ),
					'param_name' => 'choice',
					'value' => array(
						 esc_html__('Default', 'cookie') => '',
						 esc_html__( 'With text', 'cookie' ) => 'text',	
						),
					'description' => esc_html__( 'Select how the separator will be shown', 'cookie' )
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Text', 'cookie' ),
					'param_name' => 'text',
					'description' => esc_html__( 'Text inside the separator!!..', 'cookie' ),
					'dependency' => array( 'element' => 'choice', 'value' => 'text' )
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Width', 'cookie' ),
					'param_name' => 'width',
					'description' => esc_html__( 'Width of the separator!!.. in percentage %.. for.eg. 50', 'cookie' ),
					'std' => '100'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Border style', 'cookie' ),
					'param_name' => 'style',
					'value' => array(
						 esc_html__('Solid', 'cookie') => 'solid',
						 esc_html__( 'Dashed', 'cookie' ) => 'dashed',	
						 esc_html__( 'Dotted', 'cookie' ) => 'dotted',	
						),
					'description' => esc_html__( 'Select how the separator will be shown', 'cookie' ),
					'std' => 'solid'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Separator alignment', 'cookie' ),
					'param_name' => 'align',
					'value' => array(
						 esc_html__('center', 'cookie') => 'center',
						 esc_html__( 'left', 'cookie' ) => 'left',						 
						 esc_html__( 'right', 'cookie' ) => 'right'
						),
					'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
					'std' => 'center'
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'separator Color', 'cookie' ),
					'param_name' => 'color',
					'description' => esc_html__('pick your color for separator!!..', 'cookie' )
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'separator Background Color', 'cookie' ),
					'param_name' => 'background_color',
					'description' => esc_html__('pick your background color for separator!!..', 'cookie' )
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));
		
		// Call to Action
		vc_map( array(
			'name' => esc_html__( 'Call to Action', 'cookie' ),
			'base' => 'agni_call_to_action',
			'icon' => 'ion-ios-bolt-outline',
			'weight' => '93',
			'category' => esc_html__( 'Content', 'cookie' ),
			'description' => esc_html__( 'Simple call to action section', 'cookie' ),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose the style', 'cookie' ),
					'param_name' => 'type',
					'value' => array(	
						 esc_html__( 'Style 1(Default)', 'cookie') => '1',
						 esc_html__( 'Style 2', 'cookie') => '2'
					),
					'std' => '1'
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Choose Icon', 'fortune' ),
					'param_name' => 'icon',
					'value' => '',
					'settings' => array(
						'type' => 'iconlist',
						'iconsPerPage' => 3000,
					),
					'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Icon Top margin', 'cookie' ),
					'param_name' => 'icon_margin_top',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon', 'not_empty' => true ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Icon Right margin', 'cookie' ),
					'param_name' => 'icon_margin_right',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon', 'not_empty' => true ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Icon Bottom margin', 'cookie' ),
					'param_name' => 'icon_margin_bottom',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon', 'not_empty' => true ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Text', 'cookie' ),
					'param_name' => 'quote',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Additional Text', 'cookie' ),
					'param_name' => 'additional_quote',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Value', 'cookie' ),
					'class' => 'wpb_button',
					'param_name' => 'value',
					'description' => esc_html__( 'Value for the button.', 'cookie' ),
					'std' => 'Button'
				),
				array(
					'type' => 'href',
					'heading' => esc_html__( 'Button URL', 'cookie' ),
					'param_name' => 'url',
					'description' => esc_html__( 'URL for the button.', 'cookie' ),
					'std' => '#'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Target', 'cookie' ),
					'param_name' => 'target',
					'value' => array(	
						esc_html__( 'Same window', 'cookie' ) => '_self',
						esc_html__( 'New window', 'cookie' ) => "_blank"
					),
					'std' => '_self'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'button style', 'cookie' ),
					'param_name' => 'style',
					'value' => array(	
						 esc_html__( 'Default', 'cookie') => '',
						 esc_html__( 'Bordered', 'cookie') => 'alt'
					),
					'description' => esc_html__( 'Select the button style.', 'cookie' ),
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose button type', 'cookie' ),
					'param_name' => 'choice',
					'value' => array(	
						 esc_html__( 'Default', 'cookie') => 'default',
						 esc_html__( 'Primary', 'cookie') => 'primary',
						 esc_html__( 'Accent', 'cookie') => 'accent',
						 esc_html__( 'White', 'cookie') => 'white'
					),
					'description' => esc_html__( 'Select the button type...', 'cookie' ),
					'std' => 'default'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose the size of button', 'cookie' ),
					'param_name' => 'size',
					'value' => array(	
						 esc_html__( 'Default', 'cookie') => '',
						 esc_html__( 'Large', 'cookie') => 'lg',
						 esc_html__( 'Small', 'cookie' ) => 'sm',
						 esc_html__( 'Extra Small', 'cookie' ) => 'xs',
						 esc_html__( 'Block', 'cookie' ) => 'block',
					),
					'description' => esc_html__( 'Select the size of the button..', 'cookie' )
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Top margin', 'cookie' ),
					'param_name' => 'button_margin_top',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'std' => '10'
					
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Bottom margin', 'cookie' ),
					'param_name' => 'button_margin_bottom',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));
		
		// Icons
		vc_map( array(
			'name' => esc_html__( 'Icon', 'cookie' ),
			'base' => 'agni_icon',
			'icon' => 'ion-ios-star-outline',
			'weight' => '92',
			'category' => esc_html__( 'Content', 'cookie' ),
			'description' => esc_html__( 'Icon( Ionicons, Fontawesome )', 'cookie' ),
			'params' => array(
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Choose Icon', 'fortune' ),
					'param_name' => 'icon',
					'value' => '',
					'settings' => array(
						'type' => 'iconlist',
						'iconsPerPage' => 3000,
					),
					'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
					'std' => 'pe-7s-diamond'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Size', 'cookie' ),
					'param_name' => 'size',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels. for ex.24', 'cookie' ),
					'std' => '32',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon style', 'cookie' ),
					'param_name' => 'icon_style',
					'value' => array(
						 esc_html__( 'Default', 'cookie' ) => '',
						 esc_html__( 'Background', 'cookie' ) => 'background',
						 esc_html__( 'Bordered', 'cookie' ) => 'border',
						),
					'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
					'std' => '',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Width', 'cookie' ),
					'param_name' => 'width',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '72',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Height', 'cookie' ),
					'param_name' => 'height',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '72',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Radius', 'cookie' ),
					'param_name' => 'radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '50%',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Background Color', 'cookie' ),
					'param_name' => 'background_color',
					'description' => esc_html__('choose the dropdown background color.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => 'background' ),
					'std' => '#f0f1f2',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Border Color', 'cookie' ),
					'param_name' => 'border_color',
					'description' => esc_html__('choose the dropdown border color.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => 'border' ),
					'std' => '#000000',
				),

				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Icon Color', 'cookie' ),
					'param_name' => 'color',
					'description' => esc_html__('This will apply if the heading has divide line!!..', 'cookie' ),
					'std' => '#000000',
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon style on hover', 'cookie' ),
					'param_name' => 'hover_icon_style',
					'value' => array(
						 esc_html__( 'Default', 'cookie' ) => '',
						 esc_html__( 'Background', 'cookie' ) => 'background',
						 esc_html__( 'Bordered', 'cookie' ) => 'border',
						),
					'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Radius on hover', 'cookie' ),
					'param_name' => 'hover_radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'hover_icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '50%',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Background Color on hover', 'cookie' ),
					'param_name' => 'hover_background_color',
					'description' => esc_html__('choose the dropdown background color.', 'cookie' ),
					'dependency' => array( 'element' => 'hover_icon_style', 'value' => 'background' ),
					'std' => '#22e3e5',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Border Color on hover', 'cookie' ),
					'param_name' => 'hover_border_color',
					'description' => esc_html__('choose the dropdown border color.', 'cookie' ),
					'dependency' => array( 'element' => 'hover_icon_style', 'value' => 'border' ),
					'std' => '#000000',
				),

				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Icon Color on hover', 'cookie' ),
					'param_name' => 'hover_color',
					'description' => esc_html__('This will apply if the heading has divide line!', 'cookie' ),
					'std' => '#ffffff',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element.', 'cookie' )
				),
			)
		
		));
		
		// Service Box
		vc_map( array(
			'name' => esc_html__( 'Service Box', 'cookie' ),
			'base' => 'agni_service',
			'icon' => 'ion-ios-wineglass-outline',
			'weight' => '91',
			'category' => esc_html__( 'Content', 'cookie' ),
			'description' => esc_html__( 'various Service boxes', 'cookie' ),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Service Choice', 'cookie' ),
					'param_name' => 'choice',
					'value' => array(
						 esc_html__( 'Style 1(Default)', 'cookie' ) => '1',
						 esc_html__( 'Style 2', 'cookie' ) => '2',	
						 esc_html__( 'Style 3', 'cookie' ) => '3',
						 esc_html__( 'Style 4', 'cookie' ) => '4',
						 esc_html__( 'Style 5', 'cookie' ) => '5',
						 esc_html__( 'Style 6', 'cookie' ) => '6',
						// esc_html__( 'Style 7', 'cookie' ) => '7',
						),
					'description' => esc_html__( 'Select the service!!..', 'cookie' ),
					'std' => '1'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose Icon/Text', 'cookie' ),
					'param_name' => 'text_i_icon',
					'description' => esc_html__( 'it is will show as a first on every service element', 'cookie' ),
					'value' => array(
						 esc_html__( 'Icon', 'cookie' ) => '1',
						 esc_html__( 'Text', 'cookie' ) => '2',
					),
					'std' => '1'
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Choose Icon', 'fortune' ),
					'param_name' => 'icon',
					'value' => '',
					'settings' => array(
						'type' => 'iconlist',
						'iconsPerPage' => 3000,
					),
					'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
					'dependency' => array( 'element' => 'text_i_icon', 'value' => '1' ),
					'std' => ''
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon style', 'cookie' ),
					'param_name' => 'icon_style',
					'value' => array(
						 esc_html__( 'Default', 'cookie' ) => '',
						 esc_html__( 'Background', 'cookie' ) => 'background',
						 esc_html__( 'Bordered', 'cookie' ) => 'border',
						),
					'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
					'dependency' => array( 'element' => 'text_i_icon', 'value' => '1' ),
					'std' => '',
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Radius', 'cookie' ),
					'param_name' => 'radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Background Color', 'cookie' ),
					'param_name' => 'background_color',
					'description' => esc_html__('choose the dropdown background color.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => 'background' ),
					'std' => '#f0f1f2',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Border Color', 'cookie' ),
					'param_name' => 'border_color',
					'description' => esc_html__('choose the dropdown border color.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => 'border' ),
					'std' => '#000000',
				),

				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Icon Color', 'cookie' ),
					'param_name' => 'color',
					'description' => esc_html__('This will apply if the heading has divide line!!..', 'cookie' ),
					'dependency' => array( 'element' => 'text_i_icon', 'value' => '1' ),
					'std' => '#000000',
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon style on hover', 'cookie' ),
					'param_name' => 'hover_icon_style',
					'value' => array(
						 esc_html__( 'Default', 'cookie' ) => '',
						 esc_html__( 'Background', 'cookie' ) => 'background',
						 esc_html__( 'Bordered', 'cookie' ) => 'border',
						),
					'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Radius on hover', 'cookie' ),
					'param_name' => 'hover_radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'hover_icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Background Color on hover', 'cookie' ),
					'param_name' => 'hover_background_color',
					'description' => esc_html__('choose the dropdown background color.', 'cookie' ),
					'dependency' => array( 'element' => 'hover_icon_style', 'value' => 'background' ),
					'std' => '#22e3e5',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Border Color on hover', 'cookie' ),
					'param_name' => 'hover_border_color',
					'description' => esc_html__('choose the dropdown border color.', 'cookie' ),
					'dependency' => array( 'element' => 'hover_icon_style', 'value' => 'border' ),
					'std' => '#000000',
				),

				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Icon Color on hover', 'cookie' ),
					'param_name' => 'hover_color',
					'description' => esc_html__('This will apply if the heading has divide line!', 'cookie' ),
					'dependency' => array( 'element' => 'text_i_icon', 'value' => '1' ),
					'std' => '#000000',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter the Letters', 'cookie' ),
					'param_name' => 'text',
					'description' => esc_html__( 'Type your letter/number which you want to use. please don\'t use more the two letter, it may break the layout. ', 'cookie' ),
					'dependency' => array( 'element' => 'text_i_icon', 'value' => '2' ),
				),
									
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Service Title', 'cookie' ),
					'param_name' => 'title',
					//'description' => esc_html__( 'extra class for the element!!..', 'cookie' ),
					'value' => esc_html__( 'Service Title', 'cookie' )
				),
				
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Service Description', 'cookie' ),
					'param_name' => 'content',
					'value' => 'Description about your services.',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Alignment', 'cookie' ),
					'param_name' => 'align',
					'value' => array(
						 esc_html__('center', 'cookie') => 'center',
						 esc_html__( 'left', 'cookie' ) => 'left',						 
						 esc_html__( 'right', 'cookie' ) => 'right'
						),
					'description' => esc_html__( 'Select how the servicebox will be aligned', 'cookie' ),
					'dependency' => array( 'element' => 'choice', 'value' => array('1', '4') ),
					'std' => 'left'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Alignment', 'cookie' ),
					'param_name' => 'service_3_align',
					'value' => array(
						 esc_html__( 'left', 'cookie' ) => 'left',						 
						 esc_html__( 'right', 'cookie' ) => 'right'
						),
					'description' => esc_html__( 'Select how the servicebox will be aligned', 'cookie' ),
					'dependency' => array( 'element' => 'choice', 'value' => array('3') ),
					'std' => 'left'
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));
		
		// Service Boxes
		vc_map( array(
			'name' => esc_html__( 'Service Boxes', 'cookie' ),
			'base' => 'agni_service_boxes',
			'icon' => 'ion-ios-wineglass',
			'weight' => '90',
			'category' => esc_html__( 'Content', 'cookie' ),
			'description' => esc_html__( 'various Service boxes', 'cookie' ),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Service Choice', 'cookie' ),
					'param_name' => 'choice',
					'value' => array(
						 esc_html__( 'Style 1(Default)', 'cookie' ) => '1',
						 esc_html__( 'Style 2', 'cookie' ) => '2',	
						 esc_html__( 'Style 3', 'cookie' ) => '3',
						 esc_html__( 'Style 4', 'cookie' ) => '4',
						 esc_html__( 'Style 5', 'cookie' ) => '5',
						 esc_html__( 'Style 6', 'cookie' ) => '6',
						// esc_html__( 'Style 7', 'cookie' ) => '7',
						),
					'description' => esc_html__( 'Select the service!!..', 'cookie' ),
					'std' => '1'
				),
	            array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Values', 'cookie' ),
					'param_name' => 'values',
					'value' => urlencode( json_encode( array(
						array(
							'text_i_icon' => '1',
							'icon' => 'ion-ios-check',
							'icon_style' => '',
							'radius' => '',
							'border_color' => '#000000',
							'background_color' => '#f0f1f2',
							'color' => '#000000',
							'hover_icon_style' => '',
							'hover_radius' => '',
							'hover_border_color' => '#000000',
							'hover_background_color' => '#22e3e5',
							'hover_color' => '#000000', 
							'text' => '',
							'title' => esc_html__('Service', 'cookie' ),
							'content' => esc_html__('Service description', 'cookie' ),
						),
						array(
							//'title' => esc_html__( 'Two', 'cookie' ),

							'text_i_icon' => '1',
							'icon' => 'ion-ios-check',
							'icon_style' => '',
							'radius' => '',
							'border_color' => '#000000',
							'background_color' => '#f0f1f2',
							'color' => '#000000',
							'hover_icon_style' => '',
							'hover_radius' => '',
							'hover_border_color' => '#000000',
							'hover_background_color' => '#22e3e5',
							'hover_color' => '#000000', 
							'text' => '',
							'title' => esc_html__('Service', 'cookie' ),
							'content' => esc_html__('Service description', 'cookie' ),
						)
					) ) ),
					'params' => array(
						
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Choose Icon/Text', 'cookie' ),
							'param_name' => 'text_i_icon',
							'description' => esc_html__( 'it is will show as a first on every service element', 'cookie' ),
							'value' => array(
								 esc_html__( 'Icon', 'cookie' ) => '1',
								 esc_html__( 'Text', 'cookie' ) => '2',
							),
							'std' => '1'
						),
						array(
							'type' => 'iconpicker',
							'heading' => __( 'Choose Icon', 'fortune' ),
							'param_name' => 'icon',
							'value' => '',
							'settings' => array(
								'type' => 'iconlist',
								'iconsPerPage' => 3000,
							),
							'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
							'dependency' => array( 'element' => 'text_i_icon', 'value' => '1' ),
							'std' => ''
						),

						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Icon style', 'cookie' ),
							'param_name' => 'icon_style',
							'value' => array(
								 esc_html__( 'Default', 'cookie' ) => '',
								 esc_html__( 'Background', 'cookie' ) => 'background',
								 esc_html__( 'Bordered', 'cookie' ) => 'border',
								),
							'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
							'dependency' => array( 'element' => 'text_i_icon', 'value' => '1' ),
							'std' => '',
						),
						
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Radius', 'cookie' ),
							'param_name' => 'radius',
							'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
							'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
							'std' => '0',
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Background Color', 'cookie' ),
							'param_name' => 'background_color',
							'description' => esc_html__('choose the dropdown background color.', 'cookie' ),
							'dependency' => array( 'element' => 'icon_style', 'value' => 'background' ),
							'std' => '#f0f1f2',
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Border Color', 'cookie' ),
							'param_name' => 'border_color',
							'description' => esc_html__('choose the dropdown border color.', 'cookie' ),
							'dependency' => array( 'element' => 'icon_style', 'value' => 'border' ),
							'std' => '#000000',
						),

						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Icon Color', 'cookie' ),
							'param_name' => 'color',
							'description' => esc_html__('This will apply if the heading has divide line!!..', 'cookie' ),
							'dependency' => array( 'element' => 'text_i_icon', 'value' => '1' ),
							'std' => '#000000',
						),
						
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Icon style on hover', 'cookie' ),
							'param_name' => 'hover_icon_style',
							'value' => array(
								 esc_html__( 'Default', 'cookie' ) => '',
								 esc_html__( 'Background', 'cookie' ) => 'background',
								 esc_html__( 'Bordered', 'cookie' ) => 'border',
								),
							'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
							'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
							'std' => '',
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Radius on hover', 'cookie' ),
							'param_name' => 'hover_radius',
							'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
							'dependency' => array( 'element' => 'hover_icon_style', 'value' => array( 'border', 'background' ) ),
							'std' => '0',
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Background Color on hover', 'cookie' ),
							'param_name' => 'hover_background_color',
							'description' => esc_html__('choose the dropdown background color.', 'cookie' ),
							'dependency' => array( 'element' => 'hover_icon_style', 'value' => 'background' ),
							'std' => '#22e3e5',
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Border Color on hover', 'cookie' ),
							'param_name' => 'hover_border_color',
							'description' => esc_html__('choose the dropdown border color.', 'cookie' ),
							'dependency' => array( 'element' => 'hover_icon_style', 'value' => 'border' ),
							'std' => '#000000',
						),

						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Icon Color on hover', 'cookie' ),
							'param_name' => 'hover_color',
							'description' => esc_html__('This will apply if the heading has divide line!!..', 'cookie' ),
							'dependency' => array( 'element' => 'text_i_icon', 'value' => '1' ),
							'std' => '#000000',
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Enter the Letters', 'cookie' ),
							'param_name' => 'text',
							'description' => esc_html__( 'Type your letter/number which you want to use. please don\'t use more the two letter, it may break the layout. ', 'cookie' ),
							'dependency' => array( 'element' => 'text_i_icon', 'value' => '2' ),
						),
											
						
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Service Title', 'cookie' ),
							'param_name' => 'title',
							'value' => esc_html__( 'Service', 'cookie' )
							//'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
						),
						
						array(
							'type' => 'textarea',
							'heading' => esc_html__( 'Service description', 'cookie' ),
							'param_name' => 'content',
							'value' => 'Description about your services!!..',
						),
					),
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Alignment', 'cookie' ),
					'param_name' => 'align',
					'value' => array(
						 esc_html__('center', 'cookie') => 'center',
						 esc_html__( 'left', 'cookie' ) => 'left',						 
						 esc_html__( 'right', 'cookie' ) => 'right'
						),
					'description' => esc_html__( 'Select how the servicebox will be aligned', 'cookie' ),
					'dependency' => array( 'element' => 'choice', 'value' => array('1', '4') ),
					'std' => 'left'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Alignment', 'cookie' ),
					'param_name' => 'service_3_align',
					'value' => array(
						 esc_html__( 'left', 'cookie' ) => 'left',						 
						 esc_html__( 'right', 'cookie' ) => 'right'
						),
					'description' => esc_html__( 'Select how the servicebox will be aligned', 'cookie' ),
					'dependency' => array( 'element' => 'choice', 'value' => array('3') ),
					'std' => 'left'
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Display type', 'cookie' ),
					'param_name' => 'type',
					'value' => array(	
						 esc_html__( 'Carousel', 'cookie') => '1',
						 esc_html__( 'Grid', 'cookie') => '2',
					),
					'description' => esc_html__( 'you can choose your desire type, it allows you to decide whether you need carousel or not. Note: Please use grid, if you\'re using only one slide.', 'cookie' ),
					'std' => '1'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Number of Column', 'cookie' ),
					'param_name' => 'column_count',
					'value' => array(	
						 esc_html__( '1 column', 'cookie') => '1',
						 esc_html__( '2 columns', 'cookie') => '2',
						 esc_html__( '3 columns', 'cookie') => '3',
						 esc_html__( '4 columns', 'cookie' ) => '4',
					),
					'description' => esc_html__( 'Choose the column on desktop screen. it will adjust the columns count on responsive screens automatically.', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '1' ),
					'std' => '3'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Items per Column', 'cookie' ),
					'param_name' => 'column_items',
					'value' => array(	
						 esc_html__( '1', 'cookie') => '1',
						 esc_html__( '2', 'cookie') => '2',
						 esc_html__( '3', 'cookie') => '3',
						 esc_html__( '4', 'cookie' ) => '4',
					),
					'description' => esc_html__( 'Choose the no. of items to show vertically on each column.', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '1' ),
					'std' => '1'
				),

				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Autoplay', 'cookie' ),
					'param_name' => 'service_autoplay',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'carousel Options', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '1' ),
					'std'  => '1'
				),	
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Timeout duration', 'cookie' ),
					'param_name' => 'service_autoplay_timeout',
					'description' => esc_html__( 'Enter the duration of each slide Transition', 'cookie' ),
					'group' => esc_html__( 'carousel Options', 'cookie' ),
					'std' => '5000',
					'dependency' => array( 'element' => 'service_autoplay', 'value' => '1' )
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Pause on Hover', 'cookie' ),
					'param_name' => 'service_autoplay_hover',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'carousel Options', 'cookie' ),
					'std'  => '1',
					'dependency' => array( 'element' => 'service_autoplay', 'value' => '1' )
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Loop', 'cookie' ),
					'param_name' => 'service_loop',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'carousel Options', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '1' ),
					'std'  => '1'
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Pagination', 'cookie' ),
					'param_name' => 'service_pagination',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'carousel Options', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '1' ),
					'std'  => '1'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Width', 'cookie' ),
					'param_name' => 'width',
					'value' => $vc_column_width_list,
					'group' => esc_html__( 'Responsive Options', 'cookie' ),
					'description' => esc_html__( 'Select column width.', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '2' ),
					'std' => '1/1'
				),
				array(
					'type' => 'column_offset',
					'heading' => esc_html__( 'Responsiveness', 'cookie' ),
					'param_name' => 'offset',
					'group' => esc_html__( 'Responsive Options', 'cookie' ),
					'description' => esc_html__( 'Adjust column for different screen sizes. Control width, offset and visibility settings.', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '2' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));

		// Features Box
		vc_map( array(
			'name' => esc_html__( 'Features', 'cookie' ),
			'base' => 'agni_features',
			'icon' => 'ion-ios-color-wand-outline',
			'weight' => '89',
			'category' => esc_html__( 'Content', 'cookie' ),
			'description' => esc_html__( 'various features boxes', 'cookie' ),
			'params' => array(
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'cookie' ),
					'param_name' => 'img_url',
					'value' => '',
					'description' => esc_html__( 'Select image from media library.', 'cookie' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'cookie' ),
					'param_name' => 'title',
					//'description' => esc_html__( 'extra class for the element!!..', 'cookie' ),
					'value' => ''
				),
				array(
					'type' => 'href',
					'heading' => esc_html__( 'Ttile URL', 'cookie' ),
					'param_name' => 'title_url',
					'description' => esc_html__( 'URL for the title, leave it empty for Non linked title.', 'cookie' ),
					'dependency' => array( 'element' => 'title', 'not_empty' => true ),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Title Color', 'cookie' ),
					'param_name' => 'title_color',
					'description' => esc_html__( 'set the color for title', 'cookie' ),
					'dependency' => array( 'element' => 'title', 'not_empty' => true ),
				),	
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Value', 'cookie' ),
					'param_name' => 'value',
					'description' => esc_html__( 'Value for the button!!..', 'cookie' ),
					'std' => ''
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Choose Icon', 'fortune' ),
					'param_name' => 'icon',
					'value' => '',
					'settings' => array(
						'type' => 'iconlist',
						'iconsPerPage' => 3000,
					),
					'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
					'dependency' => array( 'element' => 'value', 'not_empty' => true )
				),
				array(
					'type' => 'href',
					'heading' => esc_html__( 'Button URL', 'cookie' ),
					'param_name' => 'url',
					'dependency' => array( 'element' => 'value', 'not_empty' => true ),
					'description' => esc_html__( 'URL for the button!!..', 'cookie' ),
					'std' => '#'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Target', 'cookie' ),
					'param_name' => 'target',
					'value' => array(	
						esc_html__( 'Same window', 'cookie' ) => '_self',
						esc_html__( 'New window', 'cookie' ) => "_blank"
					),
					'dependency' => array( 'element' => 'value', 'not_empty' => true ),
					'std' => '_self'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'button style', 'cookie' ),
					'param_name' => 'style',
					'value' => array(	
						 esc_html__( 'Default', 'cookie') => '',
						 esc_html__( 'Bordered', 'cookie') => 'alt'
					),
					'description' => esc_html__( 'Select the button style...', 'cookie' ),
					'dependency' => array( 'element' => 'value', 'not_empty' => true ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Radius', 'cookie' ),
					'param_name' => 'radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'value', 'not_empty' => true ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Button type', 'cookie' ),
					'param_name' => 'choice',
					'value' => array(	
						 esc_html__( 'Default', 'cookie') => 'default',
						 esc_html__( 'Primary', 'cookie') => 'primary',
						 esc_html__( 'Accent', 'cookie') => 'accent',
						 esc_html__( 'White', 'cookie') => 'white'
					),
					'dependency' => array( 'element' => 'value', 'not_empty' => true ),
					'description' => esc_html__( 'Select the button type...', 'cookie' ),
					'std' => 'default'
				),

				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Show content always', 'cookie' ),
					'param_name' => 'hovered',
					'description' => esc_html__( 'Show the content always, no need for hover', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => ' feature-box-hovered' )
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Background Color', 'cookie' ),
					'param_name' => 'bg_color',
					'description' => esc_html__( 'set the background color/opacity for the content background', 'cookie' ),
				),	
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));
		
		// Pricing Table
		vc_map( array(
			'name' => esc_html__( 'Pricing Table', 'cookie' ),
			'base' => 'agni_pricingtable',
			'icon' => 'ion-ios-pricetags-outline',
			'weight' => '88',
			'category' => esc_html__( 'Content', 'cookie' ),
			'description' => esc_html__( 'Pricing column for many purpose', 'cookie' ),
			'params' => array(
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Heading of the table', 'cookie' ),
					'param_name' => 'heading',
					'description' => esc_html__( 'title or heading of the pricing table!!..', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Currency Symbol', 'cookie' ),
					'param_name' => 'currency',
					'description' => esc_html__( 'currency value of the pricing table\'s price.. for.eg $', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Charge', 'cookie' ),
					'param_name' => 'price',
					'description' => esc_html__( 'Price or charge for the subscribers. for.eg 99', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Interval', 'cookie' ),
					'param_name' => 'interval',
					'description' => esc_html__( 'title or heading of the pricing table. for.eg mo.', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button value', 'cookie' ),
					'param_name' => 'value',
					'description' => esc_html__( 'value of the pricing button.. for.eg Sign Up', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Link', 'cookie' ),
					'param_name' => 'link',
					'description' => esc_html__( 'link of the pricing button..', 'cookie' )
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Featured Column', 'cookie' ),
					'param_name' => 'featured',
					'description' => esc_html__( 'Is this column featured.. then check it', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => ' pricing-recommanded' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Featured Column Style', 'cookie' ),
					'param_name' => 'featured_style',
					'value' => array(
						 esc_html__( 'Style 1(Default)', 'cookie' ) => '1',
						 esc_html__( 'Style 2', 'cookie' ) => '2',	
						),
					'description' => esc_html__( 'Select the style to display the featured pricing table!!..', 'cookie' ),
					'dependency' => array( 'element' => 'featured', 'value' =>' pricing-recommanded' ),
					'std' => '1'
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Choose Icon', 'fortune' ),
					'param_name' => 'icon',
					'value' => '',
					'settings' => array(
						'type' => 'iconlist',
						'iconsPerPage' => 3000,
					),
					'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
					'dependency' => array( 'element' => 'featured', 'value' =>' pricing-recommanded' ),
					'std' => ''
				),
				
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Background Color', 'cookie' ),
					'param_name' => 'bg_color',
					'description' => esc_html__( 'select the background color for this pricing table', 'cookie' ),
				),	
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Service description', 'cookie' ),
					'param_name' => 'content',
					'value' => '<br><li>Content</li><li>Content</li><li>Content</li><li>Content</li></br>',
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element.', 'cookie' )
				),
			)
		
		));
		
		// Milestone
		vc_map( array(
			'name' => esc_html__( 'Milestone', 'cookie' ),
			'base' => 'agni_milestone',
			'icon' => 'ion-ios-paw-outline',
			'weight' => '87',
			'category' => esc_html__( 'Content', 'cookie' ),
			'description' => esc_html__( 'Milestone content', 'cookie' ),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Milestone Style', 'cookie' ),
					'param_name' => 'style',
					'value' => array(
						 esc_html__( 'Style 1(Default)', 'cookie' ) => '1',
						 esc_html__( 'Style 2', 'cookie' ) => '2',	
						),
					'std' => '1'
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Choose Icon', 'fortune' ),
					'param_name' => 'icon',
					'value' => '',
					'settings' => array(
						'type' => 'iconlist',
						'iconsPerPage' => 3000,
					),
					'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Icon Font Size', 'cookie' ),
					'param_name' => 'icon_size',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon', 'not_empty' => true ),
					'std' => '30'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number count', 'cookie' ),
					'param_name' => 'mile',
					'description' => esc_html__( 'Number count for the milestone..  for.eg 99', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number count Font Size', 'cookie' ),
					'param_name' => 'mile_font_size',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'std' => '60'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number Seperator', 'cookie' ),
					'param_name' => 'mile_separator',
					'description' => esc_html__( 'You can use any letter, number or special characters. just keep empty for no seperator.', 'cookie' ),
					'std' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number prefix', 'cookie' ),
					'param_name' => 'mile_prefix',
					'description' => esc_html__( 'You can use any letter, number or special characters. just keep empty for no prefix.', 'cookie' ),
					'std' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number suffix', 'cookie' ),
					'param_name' => 'mile_suffix',
					'description' => esc_html__( 'You can use any letter, number or special characters. just keep empty for no suffix.', 'cookie' ),
					'std' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Mile text', 'cookie' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Number count for the milestone.. for.eg coffee cups', 'cookie' )
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'White Text', 'cookie' ),
					'param_name' => 'white',
					'description' => esc_html__( 'This option makes your content white.. it may helpful for dark backgrounds', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'white' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Alignment', 'cookie' ),
					'param_name' => 'align',
					'value' => array(
						 esc_html__('center', 'cookie') => 'center',
						 esc_html__( 'left', 'cookie' ) => 'left',						 
						 esc_html__( 'right', 'cookie' ) => 'right'
						),
					'dependency' => array( 'element' => 'style', 'value' => '1' ),
					'std' => 'center'
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Count Animation', 'cookie' ),
					'param_name' => 'count',
					'description' => esc_html__( 'if you want the count animation enable it.', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'std' => '1'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Animation Offset', 'cookie' ),
					'param_name' => 'animation_offset',
					'description' => esc_html__( 'You can use "simply number" or "%" to denote the offset. for ex. 90%. It will trigger the counter only when the element reach 90% from the top.', 'cookie' ),
					'group' => esc_html__( 'Animation Setting', 'cookie' ),
					'dependency' => array( 'element' => 'count', 'value' => '1' ),
					'std' => '90%'
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));
		
		// Progress Bar
		vc_map( array(
			'name' => esc_html__( 'Progress Bar', 'cookie' ),
			'base' => 'agni_progressbar',
			'icon' => 'ion-ios-settings',
			'weight' => '86',
			'category' => esc_html__( 'Graphic', 'cookie' ),
			'description' => esc_html__( 'Progress bar for your site!!..', 'cookie' ),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Progress bar Style', 'cookie' ),
					'param_name' => 'style',
					'value' => array(
						 esc_html__( 'Style 1(Default)', 'cookie' ) => '1',
						 esc_html__( 'Style 2', 'cookie' ) => '2',	
						),
					'std' => '1'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Percentage', 'cookie' ),
					'param_name' => 'percentage',
					'description' => esc_html__( 'Progress bar completion percentage for eg. 80', 'cookie' )
				),				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'cookie' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Progress bar title', 'cookie' )
				),	
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Track Color', 'cookie' ),
					'param_name' => 'track_color',
					'description' => esc_html__( 'select the progress bar color', 'cookie' ),
				),	
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Bar Color', 'cookie' ),
					'param_name' => 'bar_color',
					'description' => esc_html__( 'select the progress bar color', 'cookie' ),
				),	
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Animation Offset', 'cookie' ),
					'param_name' => 'animation_offset',
					'description' => esc_html__( 'You can use "simply number" or "%" to denote the offset. for ex. 90%. It will trigger the progressbar only when the element reach 90% from the top.', 'cookie' ),
					'group' => esc_html__( 'Animation Setting', 'cookie' ),
					'std' => '90%'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));

		// Circle Bar
		vc_map( array(
			'name' => esc_html__( 'Circle Bar', 'cookie' ),
			'base' => 'agni_circlebar',
			'icon' => 'ion-ios-pie-outline',
			'weight' => '85',
			'category' => esc_html__( 'Graphic', 'cookie' ),
			'description' => esc_html__( 'Circle bar for your site!!..', 'cookie' ),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Circle bar Style', 'cookie' ),
					'param_name' => 'style',
					'value' => array(
						 esc_html__( 'Style 1(Default)', 'cookie' ) => '1',
						 esc_html__( 'Style 2', 'cookie' ) => '2',	
						),
					'description' => esc_html__( 'choose Style 2 to show icon instead of percentage', 'cookie' ),
					'std' => '1'
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Choose Icon', 'fortune' ),
					'param_name' => 'icon',
					'value' => '',
					'settings' => array(
						'type' => 'iconlist',
						'iconsPerPage' => 3000,
					),
					'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
					'dependency' => array( 'element' => 'style', 'value' => '2' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Percentage to Fill', 'cookie' ),
					'param_name' => 'percentage',
					'description' => esc_html__( 'Circle bar completion percentage', 'cookie' ),
					'std' => '75'
				),
								
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Size', 'cookie' ),
					'param_name' => 'size',
					'description' => esc_html__( 'size of circle bar..  for.eg 160', 'cookie' ),
					'std' => '160'
				),
				
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Track Color', 'cookie' ),
					'param_name' => 'track_color',
					'description' => esc_html__( 'select the track color for the circle bar. if you don\'t want to use color just leave it blank. ', 'cookie' ),
				),
				
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Bar Color', 'cookie' ),
					'param_name' => 'bar_color',
					'description' => esc_html__( 'select the bar color for the circle bar. if you don\'t want  to use color just leave it blank. ', 'cookie' ),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Scale Color', 'cookie' ),
					'param_name' => 'scale_color',
					'description' => esc_html__( 'select the scale color for the circle bar. if you don\'t want  to use color just leave it blank.', 'cookie' ),
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Scale Length', 'cookie' ),
					'param_name' => 'scale_length',
					'description' => esc_html__( 'scale length for circle bar.  for.eg 15', 'cookie' ),
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Line Width', 'cookie' ),
					'param_name' => 'line_width',
					'description' => esc_html__( 'Line length for circle bar.  for.eg 4', 'cookie' ),
					'std' => '4'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Line Cap', 'cookie' ),
					'param_name' => 'line_cap',
					'description' => esc_html__( 'butt, round and square.. are the options for line cap', 'cookie' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Alignment', 'cookie' ),
					'param_name' => 'align',
					'value' => array(
						 esc_html__('center', 'cookie') => 'center',
						 esc_html__( 'left', 'cookie' ) => 'left',						 
						 esc_html__( 'right', 'cookie' ) => 'right'
						),
					'std' => 'center'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose Animation', 'cookie' ),
					'param_name' => 'animation',
					'value' => array(
						'linear'=>'linear',
						'swing'=>'swing',
						'easeInQuad'=>'easeInQuad',
						'easeOutQuad' => 'easeOutQuad',
						'easeInOutQuad'=>'easeInOutQuad',
						'easeInCubic'=>'easeInCubic',
						'easeOutCubic'=>'easeOutCubic',
						'easeInOutCubic'=>'easeInOutCubic',
						'easeInQuart'=>'easeInQuart',
						'easeOutQuart'=>'easeOutQuart',
						'easeInOutQuart'=>'easeInOutQuart',
						'easeInQuint'=>'easeInQuint',
						'easeOutQuint'=>'easeOutQuint',
						'easeInOutQuint'=>'easeInOutQuint',
						'easeInExpo'=>'easeInExpo',
						'easeOutExpo'=>'easeOutExpo',
						'easeInOutExpo'=>'easeInOutExpo',
						'easeInSine'=>'easeInSine',
						'easeOutSine'=>'easeOutSine',
						'easeInOutSine'=>'easeInOutSine',
						'easeInCirc'=>'easeInCirc',
						'easeOutCirc'=>'easeOutCirc',
						'easeInOutCirc'=>'easeInOutCirc',
						'easeInElastic'=>'easeInElastic',
						'easeOutElastic'=>'easeOutElastic',
						'easeInOutElastic'=>'easeInOutElastic',
						'easeInBack'=>'easeInBack',
						'easeOutBack'=>'easeOutBack',
						'easeInOutBack'=>'easeInOutBack',
						'easeInBounce'=>'easeInBounce',
						'easeOutBounce'=>'easeOutBounce',
						'easeInOutBounce'=>'easeInOutBounce',
					
					),
					'description' => esc_html__( 'Select the animation which you want!!..', 'cookie' ),
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Animation Offset', 'cookie' ),
					'param_name' => 'animation_offset',
					'description' => esc_html__( 'You can use "simply number" or "%" to denote the offset. for ex. 90%. It will trigger the counter only when the element reach 90% from the top.', 'cookie' ),
					'group' => esc_html__( 'Animation Setting', 'cookie' ),
					'std' => '90%'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));
		
		// List
		vc_map( array(
			'name' => esc_html__( 'List', 'cookie' ),
			'base' => 'agni_list',
			'icon' => 'ion-ios-list-outline',
			'weight' => '84',
			'category' => esc_html__( 'Content', 'cookie' ),
			'description' => esc_html__( 'List with icons ( Ionicons, Fontawesome )', 'cookie' ),
			'params' => array(
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Choose Icon', 'fortune' ),
					'param_name' => 'icon',
					'value' => '',
					'settings' => array(
						'type' => 'iconlist',
						'iconsPerPage' => 3000,
					),
					'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon style', 'cookie' ),
					'param_name' => 'icon_style',
					'value' => array(
						 esc_html__( 'Default', 'cookie' ) => '',
						 esc_html__( 'Background', 'cookie' ) => 'background',
						 esc_html__( 'Bordered', 'cookie' ) => 'border',
						),
					'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
					'std' => '',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Radius', 'cookie' ),
					'param_name' => 'radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'not_empty' => true ),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Icon Background Color', 'cookie' ),
					'param_name' => 'background_color',
					'description' => esc_html__('This will apply if the heading has divide line.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => 'background' ),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Icon Border Color', 'cookie' ),
					'param_name' => 'border_color',
					'description' => esc_html__('This will apply if the heading has divide line.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => 'border' ),
				),

				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Icon Text Color', 'cookie' ),
					'param_name' => 'color',
					'description' => esc_html__('This will apply if the heading has divide line.', 'cookie' ),
				),
				
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'List items', 'cookie' ),
					'param_name' => 'content',
					'value' => '<li>List item</li><li>List item</li><li>List item</li>',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element.', 'cookie' )
				),
				
			)
		
		));
		
		// Button
		vc_map( array(
			'name' => esc_html__( 'Button', 'cookie' ),
			'base' => 'agni_button',
			'icon' => 'ion-ios-circle-outline',
			'weight' => '83',
			'category' => esc_html__( 'Content', 'cookie' ),
			'description' => esc_html__( 'Various Button for eg. success, block', 'cookie' ),
			'params' => array(
								
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Value', 'cookie' ),
					'class' => 'wpb_button',
					'param_name' => 'value',
					'description' => esc_html__( 'Value for the button.', 'cookie' ),
					'std' => 'Button'
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Choose Icon', 'fortune' ),
					'param_name' => 'icon',
					'value' => '',
					'settings' => array(
						'type' => 'iconlist',
						'iconsPerPage' => 3000,
					),
					'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
				),
				array(
					'type' => 'href',
					'heading' => esc_html__( 'Button URL', 'cookie' ),
					'param_name' => 'url',
					'description' => esc_html__( 'URL for the button.', 'cookie' ),
					'std' => '#'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Target', 'cookie' ),
					'param_name' => 'target',
					'value' => array(	
						esc_html__( 'Same window', 'cookie' ) => '_self',
						esc_html__( 'New window', 'cookie' ) => "_blank"
					),
					'std' => '_self'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'button style', 'cookie' ),
					'param_name' => 'style',
					'value' => array(	
						 esc_html__( 'Background(Default)', 'cookie') => '',
						 esc_html__( 'Bordered', 'cookie') => 'alt'
					),
					'description' => esc_html__( 'Select the button style...', 'cookie' ),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Radius', 'cookie' ),
					'param_name' => 'radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose button type', 'cookie' ),
					'param_name' => 'choice',
					'value' => array(	
						 esc_html__( 'Default', 'cookie') => 'default',
						 esc_html__( 'Primary', 'cookie') => 'primary',
						 esc_html__( 'Accent', 'cookie') => 'accent',
						 esc_html__( 'White', 'cookie') => 'white'
					),
					'description' => esc_html__( 'Select the button type...', 'cookie' ),
					'std' => 'default'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose the size of button', 'cookie' ),
					'param_name' => 'size',
					'value' => array(	
						 esc_html__( 'Default', 'cookie') => '',
						 esc_html__( 'Large', 'cookie') => 'lg',
						 esc_html__( 'Small', 'cookie' ) => 'sm',
						 esc_html__( 'Extra Small', 'cookie' ) => 'xs',
						 esc_html__( 'Block', 'cookie' ) => 'block',
					),
					'description' => esc_html__( 'Select the size of the button..', 'cookie' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Button Alignment', 'cookie' ),
					'param_name' => 'alignment',
					'value' => array(	
						 esc_html__( 'Left', 'cookie') => 'left',
						 esc_html__( 'Center', 'cookie') => 'center',
						 esc_html__( 'Right', 'cookie' ) => 'right',
					),
					'description' => esc_html__( 'Select the Alignment of the button..', 'cookie' ),
					'std' => 'left',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Top margin', 'cookie' ),
					'param_name' => 'margin_top',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Left margin', 'cookie' ),
					'param_name' => 'margin_left',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Bottom margin', 'cookie' ),
					'param_name' => 'margin_bottom',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Right margin', 'cookie' ),
					'param_name' => 'margin_right',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));
		
		// Alerts
		vc_map( array(
			'name' => esc_html__( 'Alerts', 'cookie' ),
			'base' => 'agni_alerts',
			'icon' => 'ion-ios-alarm-outline',
			'weight' => '82',
			'category' => esc_html__( 'Content', 'cookie' ),
			'description' => esc_html__( 'List with icons ( Ionicons, Fontawesome )', 'cookie' ),
			'params' => array(
								
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose the style', 'cookie' ),
					'param_name' => 'choice',
					'value' => array(	
						 esc_html__( 'Success', 'cookie') => 'success',
						 esc_html__( 'Danger', 'cookie') => 'danger',
						 esc_html__( 'Warning', 'cookie' ) => 'warning',
						 esc_html__( 'Info', 'cookie' ) => 'info',
					),
					'description' => esc_html__( 'Choose the releavant alert message type. ', 'cookie' )
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Dismissable alert', 'cookie' ),
					'param_name' => 'dismissable',
					'description' => esc_html__( 'if you want the close button. just check this.', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'yes' )
				),
				
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__( 'Alert Message', 'cookie' ),
					'param_name' => 'content',
					'value' => 'Nam convallis velit ac nibh imperdiet, eget euismod eros consequat.',
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));
		
		// Image
		vc_map( array(
			'name' => esc_html__( 'Image', 'cookie' ),
			'base' => 'agni_image',
			'icon' => 'ion-ios-camera-outline',
			'weight' => '81',
			'category' => esc_html__( 'Content', 'cookie' ),
			'description' => esc_html__( 'Simple image with CSS animation', 'cookie' ),
			'params' => array(
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'cookie' ),
					'param_name' => 'img_url',
					'value' => '',
					'description' => esc_html__( 'Select image from media library.', 'cookie' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image size', 'cookie' ),
					'param_name' => 'img_size',
					'value' => 'full',
					'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'cookie' ),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Add caption?', 'cookie' ),
					'param_name' => 'img_caption',
					'description' => esc_html__( 'Add image caption.', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'yes' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Image alignment', 'cookie' ),
					'param_name' => 'alignment',
					'value' => array(
						esc_html__( 'Left', 'cookie' ) => 'left',
						esc_html__( 'Right', 'cookie' ) => 'right',
						esc_html__( 'Center', 'cookie' ) => 'center'
					),
					'description' => esc_html__( 'Select image alignment.', 'cookie' ),
					'std' => 'left'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Image style', 'cookie' ),
					'param_name' => 'img_style',
					'value' => array(
						 esc_html__( 'None', 'cookie' ) => '',
						 esc_html__( 'Background', 'cookie' ) => 'background',
						 esc_html__( 'Bordered', 'cookie' ) => 'bordered',
						),
					'std' => '',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Background Color', 'cookie' ),
					'param_name' => 'background_color',
					'description' => esc_html__('choose the background color for image.', 'cookie' ),
					'dependency' => array( 'element' => 'img_style', 'value' => 'background' ),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Border Color', 'cookie' ),
					'param_name' => 'border_color',
					'description' => esc_html__('choose the border color for image.', 'cookie' ),
					'dependency' => array( 'element' => 'img_style', 'value' => 'bordered' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Radius', 'cookie' ),
					'param_name' => 'radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'On click action', 'cookie' ),
					'param_name' => 'img_link',
					'value' => array(
						esc_html__( 'None', 'cookie' ) => '1',
						esc_html__( 'Attachment Image', 'cookie' ) => '2',
						esc_html__( 'Lightbox', 'cookie' ) => '3',
						esc_html__( 'Custom link', 'cookie' ) => '4',
						//esc_html__( 'Zoom', 'cookie' ) => '5',
					),
					'description' => esc_html__( 'Select action for click action.', 'cookie' ),
					'std' => ''
				),
				array(
					'type' => 'href',
					'heading' => esc_html__( 'Image link', 'cookie' ),
					'param_name' => 'img_custom_link',
					'description' => esc_html__( 'Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'cookie' ),
					'dependency' => array(
						'element' => 'img_link',
						'value' => '4',
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'On click target', 'cookie' ),
					'param_name' => 'img_custom_link_target',
					'value' => array(
						esc_html__( 'Same Window', 'cookie' ) => '_self',
						esc_html__( 'New Window', 'cookie' ) => '_blank',
					),
					'description' => esc_html__( 'Select target for click action.', 'cookie' ),
					'dependency' => array( 'element' => 'img_link', 'value' => '4' ),
					'std' => ''
				),
				$animation_attr,
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Animation Delay', 'cookie' ),
					'param_name' => 'animation_delay',
					'group' => esc_html__( 'Animation Setting', 'cookie' ),
					'dependency' => array( 'element' => 'animation', 'not_empty' => true)
				), 
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Animation Duration', 'cookie' ),
					'param_name' => 'animation_duration',
					'group' => esc_html__( 'Animation Setting', 'cookie' ),
					'dependency' => array( 'element' => 'animation', 'not_empty' => true )
				), 
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Animation Offset', 'cookie' ),
					'param_name' => 'animation_offset',
					'description' => esc_html__( 'You can use "simply number" or "%" to denote the offset. for ex. 90%. It will trigger the animation only when the element reach 90% from the top.', 'cookie' ),
					'group' => esc_html__( 'Animation Setting', 'cookie' ),
					'dependency' => array( 'element' => 'animation', 'not_empty' => true )
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Parallax', 'cookie' ),
					'param_name' => 'parallax',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'Parallax Setting', 'cookie' ),
					'std' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Parallax Start value', 'cookie' ),
					'description' => esc_html__( 'Enter your starting value of parallax for ex. transform:translateY(0px);', 'cookie' ),
					'param_name' => 'parallax_start',
					'group' => esc_html__( 'Parallax Setting', 'cookie' ),
					'dependency' => array( 'element' => 'parallax', 'value' => '1' ),
					'std' => 'transform:translateY(0px);'
				), 
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Parallax End value', 'cookie' ),
					'description' => esc_html__( 'Enter your end value of parallax for ex. transform:translateY(-100px);', 'cookie' ),
					'param_name' => 'parallax_end',
					'group' => esc_html__( 'Parallax Setting', 'cookie' ),
					'dependency' => array( 'element' => 'parallax', 'value' => '1' ),
					'std' => 'transform:translateY(-100px);'
				), 
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'cookie' )
				),
			)
		) );
		
		// Gallery
		global $vc_column_width_list;
		vc_map( array(
			'name' => esc_html__( 'Gallery', 'cookie' ),
			'base' => 'agni_gallery',
			'icon' => 'ion-ios-albums-outline',
			'weight' => '80',
			'category' => esc_html__( 'Media', 'cookie' ),
			'description' => esc_html__( 'group of image with lightbox gallery.', 'cookie' ),
			'params' => array(
				
				array(
					'type' => 'attach_images',
					'heading' => esc_html__( 'Select Image', 'cookie' ),
					'param_name' => 'img_url',
					'description' => esc_html__( 'Select the image', 'cookie' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Image size', 'cookie' ),
					'param_name' => 'img_size',
					'description' => esc_html__( 'choose image size', 'cookie' ),
					'value' => array(	
						 esc_html__( 'thumbnail', 'cookie') => 'thumbnail',
						 esc_html__( 'medium', 'cookie') => 'medium',
						 esc_html__( 'large', 'cookie') => 'large',
						 esc_html__( 'Full', 'cookie') => 'full',
						 esc_html__( 'Grid Thumbnail(640 width)', 'cookie') => 'cookie-grid-thumbnail',
						 esc_html__( 'Standard Thumbnail(1080 width)', 'cookie') => 'cookie-standard-thumbnail',
					),
					'std' => 'full'
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Add caption?', 'cookie' ),
					'param_name' => 'img_caption',
					'description' => esc_html__( 'Add image caption.', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'yes' ),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Lightbox', 'cookie' ),
					'param_name' => 'lightbox',
					'description' => esc_html__( 'if you want the lightbox. just enable this!.', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'custom-gallery' )
				),	
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'No Gutter', 'cookie' ),
					'param_name' => 'no_gutter',
					'description' => esc_html__( 'if you don\'t want the gutter. just enable this!.', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'gallery-column-has-no-padding' ),
					'std' => ''

				),	
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Display type', 'cookie' ),
					'param_name' => 'type',
					'value' => array(	
						 esc_html__( 'Carousel', 'cookie') => '1',
						 esc_html__( 'Grid', 'cookie') => '2',
					),
					'description' => esc_html__( 'you can choose your desire type, it allows you to decide whether you need carousel or not. ', 'cookie' ),
					'std' => '2'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Number of Columns', 'cookie' ),
					'param_name' => 'column',
					'value' => array(	
						 esc_html__( '1 column', 'cookie' ) => '1',
						 esc_html__( '2 columns', 'cookie' ) => '2',
						 esc_html__( '3 columns', 'cookie' ) => '3',
						 esc_html__( '4 columns', 'cookie' ) => '4',
						 esc_html__( '5 columns', 'cookie' ) => '5',
						 esc_html__( '6 columns', 'cookie' ) => '6',
					),
					'description' => esc_html__( 'Choose the column on desktop screen. it will adjust the columns count on responsive screens automatically.', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '1' ),
					'std' => '3'
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Autoplay', 'cookie' ),
					'param_name' => 'gallery_autoplay',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'carousel Options', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '1' ),
					'std'  => '1'
				),	
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Timeout duration', 'cookie' ),
					'param_name' => 'gallery_autoplay_timeout',
					'description' => esc_html__( 'Enter the duration of each slide Transition', 'cookie' ),
					'group' => esc_html__( 'carousel Options', 'cookie' ),
					'std' => '5000',
					'dependency' => array( 'element' => 'gallery_autoplay', 'value' => '1' )
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Pause on Hover', 'cookie' ),
					'param_name' => 'gallery_autoplay_hover',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'carousel Options', 'cookie' ),
					'std'  => '1',
					'dependency' => array( 'element' => 'gallery_autoplay', 'value' => '1' )
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Loop', 'cookie' ),
					'param_name' => 'gallery_loop',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'carousel Options', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '1' ),
					'std'  => '1'
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Pagination', 'cookie' ),
					'param_name' => 'gallery_pagination',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'carousel Options', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '1' ),
					'std'  => '1'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Width', 'cookie' ),
					'param_name' => 'width',
					'value' => $vc_column_width_list,
					'group' => esc_html__( 'Responsive Options', 'cookie' ),
					'description' => esc_html__( 'Select column width for every individual images.', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '2' ),
					'std' => '1/1'
				),
				array(
					'type' => 'column_offset',
					'heading' => esc_html__( 'Responsiveness', 'cookie' ),
					'param_name' => 'offset',
					'group' => esc_html__( 'Responsive Options', 'cookie' ),
					'description' => esc_html__( 'Adjust column for different screen sizes. Control width, offset and visibility settings.', 'cookie' ),
					'dependency' => array( 'element' => 'type', 'value' => '2' ),
				),			
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element.', 'cookie' )
				)
			)
		
		));
		
		// Video
		vc_map( array(
			'name' => esc_html__( 'Video', 'cookie' ),
			'base' => 'agni_video',
			'icon' => 'ion-ios-play-outline',
			'weight' => '79',
			'category' => esc_html__( 'Media', 'cookie' ),
			'description' => esc_html__( 'Youtube, Vimeo, etc.. any embedded video', 'cookie' ),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose Video Type', 'cookie' ),
					'param_name' => 'video_type',
					'value' => array(	
						 esc_html__( 'Youtube Video', 'cookie') => '1',
						 esc_html__( 'Self Hosted Video', 'cookie') => '2',
						 esc_html__( 'Lightbox Video', 'cookie') => '3',
						 esc_html__( 'Embed Video', 'cookie') => '4',
					),
					'description' => esc_html__( 'if you want ordinary youtube or vimeo video container. then choose Default. ', 'cookie' ),
					'std' => '1'
				),
				
				array(
					'type' => 'href',
					'heading' => esc_html__( 'URL', 'cookie' ),
					'param_name' => 'url',
					'description' => esc_html__( 'Youtube URL of the Video', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '1' ),
				),
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Fallback Image', 'cookie' ),
					'param_name' => 'fallback',
					'value' => '',
					'description' => esc_html__( 'This player will not work on mobile device. so you set the fallback image here', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '1' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Overlay Opacity', 'cookie' ),
					'param_name' => 'overlay_opacity',
					'value' => '0.6',
					'description' => esc_html__( 'Set your opacity amount range from 0 to 1', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '1' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Video Height', 'cookie' ),
					'param_name' => 'youtube_height',
					'description' => esc_html__( 'height of video container!.. for eg.450', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '1' ),
					'std' => '360'
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Auto Play', 'cookie' ),
					'param_name' => 'auto_play',
					'description' => esc_html__( 'video starts automatically..', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'true' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '1' ),
					'std' => 'true'
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Loop', 'cookie' ),
					'param_name' => 'loop',
					'description' => esc_html__( 'It repeat the video once completed!.', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'true' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '1' ),
					'std' => 'true'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Volume level', 'cookie' ),
					'param_name' => 'vol',
					'description' => esc_html__( 'Set a default volume level of the video..for eg. 50', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '1' ),
					'std' => '50'
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Mute', 'cookie' ),
					'param_name' => 'mute',
					'description' => esc_html__( 'Muted video', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'true' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '1' ),
					'std' => 'true'
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Start at', 'cookie' ),
					'param_name' => 'start_at',
					'value' => '0',
					'description' => esc_html__( 'Starting from N second.. for eg. 20 ', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '1' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Stop at', 'cookie' ),
					'param_name' => 'stop_at',
					'value' => '30',
					'description' => esc_html__( 'Starting from N second.. for eg. 30 ', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '1' ),
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose the quality', 'cookie' ),
					'param_name' => 'quality',
					'value' => array(	
						 esc_html__( 'Default(small)', 'cookie') => 'default',
						 esc_html__( 'Medium', 'cookie') => 'medium',
						 esc_html__( 'Large', 'cookie') => 'large',
						 esc_html__( '720p', 'cookie' ) => 'hd720',
						 esc_html__( '1080p', 'cookie' ) => 'hd1080',
						 esc_html__( 'High', 'cookie' ) => 'highres',
					),
					'description' => esc_html__( 'Choose the releavant resolution quality!!.. ', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '1' ),
					'std' => 'default'
				),
				array(
					'type' => 'href',
					'heading' => esc_html__( 'Video URL', 'cookie' ),
					'param_name' => 'self_url',
					'description' => esc_html__( 'To find media url go to "Media" menu at left side panel and click on your(desire) media file. now you can find url at right side panel. copy/paste the url here', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '2' ),
				),
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Poster Image', 'cookie' ),
					'param_name' => 'self_poster',
					'value' => '',
					'description' => esc_html__( 'This poster will be shown before video get started.', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '2' ),
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose the player', 'cookie' ),
					'param_name' => 'self_player',
					'value' => array(	
						 esc_html__( 'Default(HTML 5 player)', 'cookie') => '1',
						 esc_html__( 'WordPress player', 'cookie') => '2',
					),
					'description' => esc_html__( 'Choose the style which you would like to have. ', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '2' ),
					'std' => '1'
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Auto Play', 'cookie' ),
					'param_name' => 'self_auto_play',
					'description' => esc_html__( 'video starts automatically..', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'on' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '2' ),
					'std' => 'on'
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Loop', 'cookie' ),
					'param_name' => 'self_loop',
					'description' => esc_html__( 'It repeat the video once completed!.', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'on' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '2' ),
					'std' => 'on'
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Mute', 'cookie' ),
					'param_name' => 'self_mute',
					'description' => esc_html__( 'it will Mute the video(volume 0)', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'on' ),
					'dependency' => array( 'element' => 'self_player', 'value' => '1' ),
					'std' => 'on'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Preload', 'cookie' ),
					'param_name' => 'self_preload',
					'value' => array(	
						 esc_html__( 'metadata', 'cookie') => 'metadata',
						 esc_html__( 'none', 'cookie') => 'none',
						 esc_html__( 'auto', 'cookie') => 'auto',
					),
					'dependency' => array( 'element' => 'self_player', 'value' => '2' ),
					'std' => 'metadata'
				),
				array(
					'type' => 'href',
					'heading' => esc_html__( 'URL', 'cookie' ),
					'param_name' => 'iframe_url',
					'description' => esc_html__( 'Youtube/Vimeo URL of the Video', 'cookie' ),
					'dependency' => array( 'element' => 'video_type', 'value' => '3' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Link Style to open Lightbox', 'cookie' ),
					'param_name' => 'iframe_style',
					'value' => array(	
						 esc_html__( 'Button', 'cookie') => '1',
						 esc_html__( 'Icon', 'cookie') => '2',
					),
					'dependency' => array( 'element' => 'video_type', 'value' => '3' ),
					'std' => '1'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Value', 'cookie' ),
					'class' => 'wpb_button',
					'param_name' => 'button_value',
					'description' => esc_html__( 'Value for the button!!..', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '1' ),
					'std' => 'Button'
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Choose Icon', 'fortune' ),
					'param_name' => 'icon',
					'value' => '',
					'settings' => array(
						'type' => 'iconlist',
						'iconsPerPage' => 3000,
					),
					'description' => wp_kses( __( '<small>Select the icon which you want <strong><a href="http://ionicons.com/">Ionicons</a>, <a href="http://fortawesome.github.io/Font-Awesome/icons/">FontAwesome</a>, <a href="http://themes-pixeden.com/font-demos/7-stroke/index.html">Pe Icon 7 Stroke</a>, <a href="http://themes-pixeden.com/font-demos/7-filled/index.html">Pe Icon 7 Filled</a> supported.</strong></small>.', 'fortune' ), array( 'small' => array(), 'strong' => array(), 'a' => array( 'href' => array() ) ) ),
					'dependency' => array( 'element' => 'video_type', 'value' => '3' ),
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'button style', 'cookie' ),
					'param_name' => 'button_style',
					'value' => array(	
						 esc_html__( 'Background(Default)', 'cookie') => '',
						 esc_html__( 'Bordered', 'cookie') => 'alt'
					),
					'description' => esc_html__( 'Select the button style...', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '1' ),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Radius', 'cookie' ),
					'param_name' => 'button_radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '1' ),
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose button type', 'cookie' ),
					'param_name' => 'button_choice',
					'value' => array(	
						 esc_html__( 'Default', 'cookie') => 'default',
						 esc_html__( 'Primary', 'cookie') => 'primary',
						 esc_html__( 'Accent', 'cookie') => 'accent',
						 esc_html__( 'White', 'cookie') => 'white'
					),
					'description' => esc_html__( 'Select the button type...', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '1' ),
					'std' => 'default'
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose the size of button', 'cookie' ),
					'param_name' => 'button_size',
					'value' => array(	
						 esc_html__( 'Default', 'cookie') => '',
						 esc_html__( 'Large', 'cookie') => 'lg',
						 esc_html__( 'Small', 'cookie' ) => 'sm',
						 esc_html__( 'Extra Small', 'cookie' ) => 'xs',
						 esc_html__( 'Block', 'cookie' ) => 'block',
					),
					'description' => esc_html__( 'Select the size of the button..', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '1' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Button Alignment', 'cookie' ),
					'param_name' => 'button_alignment',
					'value' => array(	
						 esc_html__( 'Left', 'cookie') => 'left',
						 esc_html__( 'Center', 'cookie') => 'center',
						 esc_html__( 'Right', 'cookie' ) => 'right',
					),
					'description' => esc_html__( 'Select the Alignment of the button..', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '1' ),
					'std' => 'left',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Top margin', 'cookie' ),
					'param_name' => 'margin_top',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '1' ),
					
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Left margin', 'cookie' ),
					'param_name' => 'margin_left',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '1' ),
					
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Bottom margin', 'cookie' ),
					'param_name' => 'margin_bottom',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '1' ),
					
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Right margin', 'cookie' ),
					'param_name' => 'margin_right',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '1' ),
					
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Size', 'cookie' ),
					'param_name' => 'size',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels. for ex.24', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '2' ),
					'std' => '32',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon style', 'cookie' ),
					'param_name' => 'icon_style',
					'value' => array(
						 esc_html__( 'Default', 'cookie' ) => '',
						 esc_html__( 'Background', 'cookie' ) => 'background',
						 esc_html__( 'Bordered', 'cookie' ) => 'border',
						),
					'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '2' ),
					'std' => '',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Width', 'cookie' ),
					'param_name' => 'width',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '72',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Height', 'cookie' ),
					'param_name' => 'height',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '72',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Radius', 'cookie' ),
					'param_name' => 'radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '50%',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Background Color', 'cookie' ),
					'param_name' => 'background_color',
					'description' => esc_html__('choose the dropdown background color.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => 'background' ),
					'std' => '#f0f1f2',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Border Color', 'cookie' ),
					'param_name' => 'border_color',
					'description' => esc_html__('choose the dropdown border color.', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => 'border' ),
					'std' => '#000000',
				),

				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Icon Color', 'cookie' ),
					'param_name' => 'color',
					'description' => esc_html__('This will apply if the heading has divide line.', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '2' ),
					'std' => '#000000',
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon style on hover', 'cookie' ),
					'param_name' => 'hover_icon_style',
					'value' => array(
						 esc_html__( 'Default', 'cookie' ) => '',
						 esc_html__( 'Background', 'cookie' ) => 'background',
						 esc_html__( 'Bordered', 'cookie' ) => 'border',
						),
					'description' => esc_html__( 'Select how the heading will be aligned', 'cookie' ),
					'dependency' => array( 'element' => 'icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Radius on hover', 'cookie' ),
					'param_name' => 'hover_radius',
					'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'cookie' ),
					'dependency' => array( 'element' => 'hover_icon_style', 'value' => array( 'border', 'background' ) ),
					'std' => '50%',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Background Color on hover', 'cookie' ),
					'param_name' => 'hover_background_color',
					'description' => esc_html__('choose the dropdown background color.', 'cookie' ),
					'dependency' => array( 'element' => 'hover_icon_style', 'value' => 'background' ),
					'std' => '#22e3e5',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Border Color on hover', 'cookie' ),
					'param_name' => 'hover_border_color',
					'description' => esc_html__('choose the dropdown border color.', 'cookie' ),
					'dependency' => array( 'element' => 'hover_icon_style', 'value' => 'border' ),
					'std' => '#000000',
				),

				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Icon Color on hover', 'cookie' ),
					'param_name' => 'hover_color',
					'description' => esc_html__('This will apply if the heading has divide line!!..', 'cookie' ),
					'dependency' => array( 'element' => 'iframe_style', 'value' => '2' ),
					'std' => '#ffffff',
				),
				
				array(
					'type' => 'textarea_safe',
					'heading' => esc_html__( 'Video embed iframe', 'cookie' ),
					'param_name' => 'embed',
					'description' => esc_html__('Your embeded URL to display a video.. all video source supported', 'cookie'),
					'dependency' => array( 'element' => 'video_type', 'value' => '4' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'ID', 'cookie' ),
					'param_name' => 'id',
					'description' => esc_html__( 'this id is mandatory to use more than one youtube video on your page.', 'cookie' )
				),
			)
		
		));
		
		// Gmap
		vc_map( array(
			'name' => esc_html__( 'Gmap', 'cookie' ),
			'base' => 'agni_gmap',
			'icon' => 'ion-ios-location-outline',
			'weight' => '78',
			'category' => esc_html__( 'Graphic', 'cookie' ),
			'description' => esc_html__( 'Google Map', 'cookie' ),
			'params' => array(
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Height', 'cookie' ),
					'param_name' => 'height',
					'description' => esc_html__( 'Height of the map!!.. don\'t include px', 'cookie' ),
					'std' => '400'
				),

				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Map Marker', 'cookie' ),
					'param_name' => 'google_map_icon',
					'value' => '',
					'description' => esc_html__( 'Select image from media library. icon size should be 48x48', 'cookie' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Google Map Latitude', 'cookie' ),
					'param_name' => 'google_map_lat',
					'description' => esc_html__( 'enter your latitude value for ex. 10.010509 ', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Google Map Longitude', 'cookie' ),
					'param_name' => 'google_map_lng',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Address Line 1', 'cookie' ),
					'param_name' => 'google_address_1',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Address Line 2', 'cookie' ),
					'param_name' => 'google_address_2',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Address Line 3', 'cookie' ),
					'param_name' => 'google_address_3',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Google Map Latitude 2', 'cookie' ),
					'param_name' => 'google_map_lat_2',
					'description' => esc_html__( 'enter your latitude value for ex. 10.010509 ', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Google Map Longitude 2', 'cookie' ),
					'param_name' => 'google_map_lng_2',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Address Line 1', 'cookie' ),
					'param_name' => 'google_address_1_2',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Address Line 2', 'cookie' ),
					'param_name' => 'google_address_2_2',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Address Line 3', 'cookie' ),
					'param_name' => 'google_address_3_2',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose Zoom level', 'cookie' ),
					'param_name' => 'zoom',
					'value' => array(	
						 esc_html__( '1', 'cookie') => '1',
						 esc_html__( '3', 'cookie') => '3',
						 esc_html__( '5', 'cookie') => '5',
						 esc_html__( '7', 'cookie') => '7',
						 esc_html__( '9', 'cookie') => '9',
						 esc_html__( '11', 'cookie') => '11',
						 esc_html__( '12', 'cookie') => '12',
						 esc_html__( '13', 'cookie') => '13',
						 esc_html__( '14', 'cookie') => '14',
						 esc_html__( '15', 'cookie') => '15',
						 esc_html__( '16', 'cookie') => '16',
						 esc_html__( '17', 'cookie') => '17',
						 esc_html__( '18', 'cookie') => '18',
						 esc_html__( '19', 'cookie') => '19',
						 esc_html__( '20', 'cookie') => '20',
					),
					'std' => '16'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Choose Map Style', 'cookie' ),
					'param_name' => 'style',
					'value' => array(	
						 esc_html__( 'Style 1', 'cookie') => '1',
						 esc_html__( 'Style 2', 'cookie') => '2',
						 esc_html__( 'Style 3', 'cookie') => '3',
						 esc_html__( 'Style 4', 'cookie') => '4',
					),
					'std' => '1'
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Map Accent Color', 'cookie' ),
					'param_name' => 'color',
					'description' => esc_html__('choose the color for water in the map.', 'cookie' ),
					'dependency' => array( 'element' => 'style', 'value' => '3' ),
					'std' => '#22e3e5',
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Disable Dragging in Mobile', 'cookie' ),
					'param_name' => 'drag',
					'description' => esc_html__( 'it will disable the dragging at mobile devices', 'cookie' ),
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'ID', 'cookie' ),
					'param_name' => 'id',
					'description' => esc_html__( 'ID is mandatory to show more than one map.', 'cookie' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));

		// Countdown
		vc_map( array(
			'name' => esc_html__( 'Countdown', 'cookie' ),
			'base' => 'agni_countdown',
			'icon' => 'ion-ios-timer-outline',
			'weight' => '77',
			'category' => esc_html__( 'Graphic', 'cookie' ),
			'description' => esc_html__( 'counter for Comingsoon/any page.', 'cookie' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Date', 'cookie' ),
					'param_name' => 'date',
					'description' => esc_html__( 'you can type your deadline. for ex. 20 January 2016 10:45:00', 'cookie' ),
					'std' => '20 January 2016 10:45:00'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element.', 'cookie' )
				),
			)
		
		));
		
		// Custom Slider
		vc_map( array(
			'name' => esc_html__( 'Custom Slider', 'cookie' ),
			'base' => 'agni_custom_slider',
			'icon' => 'ion-ios-monitor-outline',
			'weight' => '73',
			'category' => esc_html__( 'Media', 'cookie' ),
			'description' => esc_html__( 'Custom slider for making simple gallery and slider', 'cookie' ),
			'params' => array(
				array(
					'type' => 'attach_images',
					'heading' => esc_html__( 'Select Image', 'cookie' ),
					'param_name' => 'source',
					'description' => esc_html__( 'Select the image for slider', 'cookie' )
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Show Caption', 'cookie' ),
					'param_name' => 'caption',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => 'has-caption' ),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Autoplay', 'cookie' ),
					'param_name' => 'custom_slider_autoplay',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'Slider Options', 'cookie' ),
					'std'  => '1',
				),	
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Timeout duration', 'cookie' ),
					'param_name' => 'custom_slider_autoplay_timeout',
					'description' => esc_html__( 'Enter the duration of each slide Transition', 'cookie' ),
					'group' => esc_html__( 'Slider Options', 'cookie' ),
					'std' => '4000',
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Pause on Hover', 'cookie' ),
					'param_name' => 'custom_slider_autoplay_hover',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'Slider Options', 'cookie' ),
					'std'  => '1',
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Slide Speed', 'cookie' ),
					'param_name' => 'custom_slider_autoplay_speed',
					'description' => esc_html__( 'Enter the speed of each slide Transition', 'cookie' ),
					'group' => esc_html__( 'Slider Options', 'cookie' ),
					'std' => '700',
				),
				
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Loop', 'cookie' ),
					'param_name' => 'custom_slider_loop',
					'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
					'group' => esc_html__( 'Slider Options', 'cookie' ),
					'std'  => '1'
				),
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra Class', 'cookie' ),
					'param_name' => 'class',
					'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
				),
			)
		
		));

		if(is_plugin_active( 'agni-framework-plugin/agni_framework.php')){
			// Team
			$team_options = '';
			$team_categories = get_terms('team_types');
			foreach ($team_categories as $category) {
				$team_options[$category->name] = $category->slug;
			}
			
			// Client
			$client_options = '';
			$client_categories = get_terms('client_types');
			foreach ($client_categories as $category) {
				$client_options[$category->name] = $category->slug;
			}
			
			// Testimonials
			$test_options = '';
			$test_categories = get_terms('quote_types');
			foreach ($test_categories as $category) {
				$test_options[$category->name] = $category->slug;
			}
			
			// Posts & Portfolio
			$blog_options = $portfolio_options = '';
			$blog_categories = get_categories();
			foreach ($blog_categories as $category) {
				$blog_options[$category->name] = $category->slug;
			}
			
			$portfolio_categories = get_terms('types');		
			foreach ($portfolio_categories as $category) {
				$portfolio_options[$category->name] = $category->slug;
			}

			vc_map( array(
				'name' => esc_html__( 'Team', 'cookie' ),
				'base' => 'agni_team',
				'icon' => 'ion-ios-people-outline',
				'weight' => '76',
				'category' => esc_html__( 'carousel', 'cookie' ),
				'description' => esc_html__( 'display team by getting the team member post type', 'cookie' ),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Number of members to display', 'cookie' ),
						'param_name' => 'posts',
						'description' => esc_html__( 'Mention the number of posts that you want to display!!.. -1 for infinite posts', 'cookie' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order', 'cookie' ),
						'param_name' => 'order',
						'value' => array(	
							 esc_html__( 'Descending ', 'cookie') => 'DESC',
							 esc_html__( 'Ascending', 'cookie') => 'ASC',
						),
						'std' => 'DESC'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order by', 'cookie' ),
						'param_name' => 'order_by',
						'value' => array(						
							 esc_html__( 'None', 'cookie') => 'none',
							 esc_html__( 'Post ID', 'cookie') => 'id',
							 esc_html__( 'Post author', 'cookie') => 'author',
							 esc_html__( 'Post title', 'cookie') => 'title',
							 esc_html__( 'Post slug', 'cookie') => 'name',
							 esc_html__( 'Date', 'cookie') => 'date',
							 esc_html__( 'Last modified date', 'cookie') => 'modified',
							 esc_html__( 'Random', 'cookie') => 'rand',
							 esc_html__( 'Comments number', 'cookie') => 'comment_count',
							 esc_html__( 'Menu order', 'cookie') => 'menu_order',
						),
						'std' => 'date'
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Team Categories', 'cookie' ),
						'param_name' => 'team_categories',
						'value' => $team_options,
						'description' => esc_html__( 'Categories of Team', 'cookie' )
					),
					
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Style', 'cookie' ),
						'param_name' => 'style',
						'value' => array(	
							 esc_html__( 'Style 1', 'cookie') => '1',
							 esc_html__( 'Style 2', 'cookie') => '2',
						),
						'description' => esc_html__( 'Various Team display style.. ', 'cookie' ),
						'std' => '1'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Display type', 'cookie' ),
						'param_name' => 'type',
						'value' => array(	
							 esc_html__( 'Carousel', 'cookie') => '1',
							 esc_html__( 'Grid', 'cookie') => '2',
						),
						'description' => esc_html__( 'you can choose your desire type, it allows you to decide whether you need carousel or not. ', 'cookie' ),
						'std' => '1'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Number of Columns', 'cookie' ),
						'param_name' => 'column',
						'value' => array(	
							 esc_html__( '2 columns', 'cookie') => '2',
							 esc_html__( '3 columns', 'cookie') => '3',
							 esc_html__( '4 columns', 'cookie' ) => '4',
						),
						'description' => esc_html__( 'Choose the column on desktop screen. it will adjust the columns count on responsive screens automatically.', 'cookie' ),
						//'dependency' => array( 'element' => 'type', 'value' => '2' ),
						'std' => '3'
					),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra Class', 'cookie' ),
						'param_name' => 'class',
						'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
					),

					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Autoplay', 'cookie' ),
						'param_name' => 'team_autoplay',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'type', 'value' => '1' ),
						'std'  => '1'
					),	
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Timeout duration', 'cookie' ),
						'param_name' => 'team_autoplay_timeout',
						'description' => esc_html__( 'Enter the duration of each slide Transition', 'cookie' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'std' => '5000',
						'dependency' => array( 'element' => 'team_autoplay', 'value' => '1' )
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Pause on Hover', 'cookie' ),
						'param_name' => 'team_autoplay_hover',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'std'  => '1',
						'dependency' => array( 'element' => 'team_autoplay', 'value' => '1' )
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Loop', 'cookie' ),
						'param_name' => 'team_loop',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'type', 'value' => '1' ),
						'std'  => '1'
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Pagination', 'cookie' ),
						'param_name' => 'team_pagination',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'type', 'value' => '1' ),
						'std'  => '1'
					),
				)
			
			));
			
			vc_map( array(
				'name' => esc_html__( 'Clients', 'cookie' ),
				'base' => 'agni_clients',
				'icon' => 'ion-ios-personadd-outline',
				'weight' => '75',
				'category' => esc_html__( 'carousel', 'cookie' ),
				'description' => esc_html__( 'display clients by getting the clients post type', 'cookie' ),
				'params' => array(
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Number of clients to display', 'cookie' ),
						'param_name' => 'posts',
						'description' => esc_html__( 'Mention the number of posts that you want to display!!.. -1 for infinite posts', 'cookie' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order', 'cookie' ),
						'param_name' => 'order',
						'value' => array(	
							 esc_html__( 'Descending ', 'cookie') => 'DESC',
							 esc_html__( 'Ascending', 'cookie') => 'ASC',
						),
						'std' => 'DESC'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order by', 'cookie' ),
						'param_name' => 'order_by',
						'value' => array(						
							 esc_html__( 'None', 'cookie') => 'none',
							 esc_html__( 'Post ID', 'cookie') => 'id',
							 esc_html__( 'Post author', 'cookie') => 'author',
							 esc_html__( 'Post title', 'cookie') => 'title',
							 esc_html__( 'Post slug', 'cookie') => 'name',
							 esc_html__( 'Date', 'cookie') => 'date',
							 esc_html__( 'Last modified date', 'cookie') => 'modified',
							 esc_html__( 'Random', 'cookie') => 'rand',
							 esc_html__( 'Comments number', 'cookie') => 'comment_count',
							 esc_html__( 'Menu order', 'cookie') => 'menu_order',
						),
						'std' => 'date'
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Client Categories', 'cookie' ),
						'param_name' => 'client_categories',
						'value' => $client_options,
						'description' => esc_html__( 'Categories of Clients', 'cookie' )
					),
					
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Style', 'cookie' ),
						'param_name' => 'style',
						'value' => array(	
							 esc_html__( 'Style 1', 'cookie') => '1',
							 esc_html__( 'Style 2', 'cookie') => '2',
						),
						'description' => esc_html__( 'Various Team display style.. ', 'cookie' ),
						'std' => '1'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Display type', 'cookie' ),
						'param_name' => 'type',
						'value' => array(	
							 esc_html__( 'Carousel', 'cookie') => '1',
							 esc_html__( 'Grid', 'cookie') => '2',
						),
						'description' => esc_html__( 'you can choose your desire type, it allows you to decide whether you need carousel or not. ', 'cookie' ),
						'std' => '1'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Number of Columns', 'cookie' ),
						'param_name' => 'column',
						'value' => array(	
							 esc_html__( '2 columns', 'cookie') => '2',
							 esc_html__( '3 columns', 'cookie') => '3',
							 esc_html__( '4 columns', 'cookie' ) => '4',
						),
						'description' => esc_html__( 'Choose the column on desktop screen. it will adjust the columns count on responsive screens automatically.', 'cookie' ),
						//'dependency' => array( 'element' => 'type', 'value' => '2' ),
						'std' => '4'
					),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra Class', 'cookie' ),
						'param_name' => 'class',
						'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
					),
					
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Autoplay', 'cookie' ),
						'param_name' => 'clients_autoplay',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'type', 'value' => '1' ),
						'std'  => '1',
					),	
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Timeout duration', 'cookie' ),
						'param_name' => 'clients_autoplay_timeout',
						'description' => esc_html__( 'Enter the duration of each slide Transition', 'cookie' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'std' => '4000',
						'dependency' => array( 'element' => 'clients_autoplay', 'value' => '1' )
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Pause on Hover', 'cookie' ),
						'param_name' => 'clients_autoplay_hover',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'std'  => '1',
						'dependency' => array( 'element' => 'clients_autoplay', 'value' => '1' )
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Loop', 'cookie' ),
						'param_name' => 'clients_loop',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'type', 'value' => '1' ),
						'std'  => '1'
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Pagination', 'cookie' ),
						'param_name' => 'clients_pagination',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'type', 'value' => '1' ),
						'std'  => '1'
					),
					
				)
			
			));
			
			vc_map( array(
				'name' => esc_html__( 'Testimonials', 'cookie' ),
				'base' => 'agni_testimonials',
				'icon' => 'ion-ios-chatboxes-outline',
				'weight' => '74',
				'category' => esc_html__( 'carousel', 'cookie' ),
				'description' => esc_html__( 'display testimonials by getting the testimonials post type', 'cookie' ),
				'params' => array(
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Number of members to display', 'cookie' ),
						'param_name' => 'posts',
						'description' => esc_html__( 'Mention the number of posts that you want to display!!.. -1 for infinite posts', 'cookie' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order', 'cookie' ),
						'param_name' => 'order',
						'value' => array(	
							 esc_html__( 'Descending ', 'cookie') => 'DESC',
							 esc_html__( 'Ascending', 'cookie') => 'ASC',
						),
						'std' => 'DESC'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order by', 'cookie' ),
						'param_name' => 'order_by',
						'value' => array(						
							 esc_html__( 'None', 'cookie') => 'none',
							 esc_html__( 'Post ID', 'cookie') => 'id',
							 esc_html__( 'Post author', 'cookie') => 'author',
							 esc_html__( 'Post title', 'cookie') => 'title',
							 esc_html__( 'Post slug', 'cookie') => 'name',
							 esc_html__( 'Date', 'cookie') => 'date',
							 esc_html__( 'Last modified date', 'cookie') => 'modified',
							 esc_html__( 'Random', 'cookie') => 'rand',
							 esc_html__( 'Comments number', 'cookie') => 'comment_count',
							 esc_html__( 'Menu order', 'cookie') => 'menu_order',
						),
						'std' => 'date'
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Testimonial Categories', 'cookie' ),
						'param_name' => 'testimonial_categories',
						'value' => $test_options,
						'description' => esc_html__( 'Categories of Testimonials', 'cookie' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Display type', 'cookie' ),
						'param_name' => 'type',
						'value' => array(	
							 esc_html__( 'Carousel', 'cookie') => '1',
							 esc_html__( 'Grid', 'cookie') => '2',
						),
						'description' => esc_html__( 'you can choose your desire type, it allows you to decide whether you need carousel or not. ', 'cookie' ),
						'std' => '1'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Number of Columns', 'cookie' ),
						'param_name' => 'column',
						'value' => array(	
							 esc_html__( '1 columns', 'cookie' ) => '1',
							 esc_html__( '2 columns', 'cookie') => '2',
							 esc_html__( '3 columns', 'cookie') => '3',
						),
						'description' => esc_html__( 'Choose the column on desktop screen. it will adjust the columns count on responsive screens automatically.', 'cookie' ),
						//'dependency' => array( 'element' => 'type', 'value' => '2' ),
						'std' => '1'
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Circle Avatar', 'cookie' ),
						'param_name' => 'circle_avatar',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'std'  => '',
					),	
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Alignment', 'cookie' ),
						'param_name' => 'alignment',
						'value' => array(	
							 esc_html__( 'Left', 'cookie' ) => 'left',
							 esc_html__( 'Center', 'cookie') => 'center',
							 esc_html__( 'Right', 'cookie') => 'right',
						),
						'description' => esc_html__( 'Choose your testimonials alignment', 'cookie' ),
						//'dependency' => array( 'element' => 'type', 'value' => '2' ),
						'std' => 'left'
					),
									
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra Class', 'cookie' ),
						'param_name' => 'class',
						'description' => esc_html__( 'extra class for the element!!..', 'cookie' )
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Autoplay', 'cookie' ),
						'param_name' => 'testimonial_autoplay',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'type', 'value' => '1' ),
						'std'  => '1',
					),	
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Timeout duration', 'cookie' ),
						'param_name' => 'testimonial_autoplay_timeout',
						'description' => esc_html__( 'Enter the duration of each slide Transition', 'cookie' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'std' => '4000',
						'dependency' => array( 'element' => 'testimonial_autoplay', 'value' => '1' )
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Pause on Hover', 'cookie' ),
						'param_name' => 'testimonial_autoplay_hover',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'std'  => '1',
						'dependency' => array( 'element' => 'testimonial_autoplay', 'value' => '1' )
					),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Slide Speed', 'cookie' ),
						'param_name' => 'testimonial_autoplay_speed',
						'description' => esc_html__( 'Enter the speed of each slide Transition', 'cookie' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'type', 'value' => '1' ),
						'std' => '700',
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Loop', 'cookie' ),
						'param_name' => 'testimonial_loop',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'type', 'value' => '1' ),
						'std'  => '1'
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Pagination', 'cookie' ),
						'param_name' => 'testimonial_pagination',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'type', 'value' => '1' ),
						'std'  => '1'
					),
					
				)
			
			));

			vc_map( array(
				'name' => esc_html__( 'Posts, Portfolio', 'cookie' ),
				'base' => 'agni_posts',
				'icon' => 'ion-ios-eye-outline',
				'weight' => '72',
				'category' => esc_html__( 'Content', 'cookie' ),
				'description' => esc_html__( 'Choose the post & portfolio post type to show the loop!!', 'cookie' ),
				'params' => array(

					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Select the post type', 'cookie' ),
						'param_name' => 'posttype',
						'value' => array(	
							esc_html__( 'Posts', 'cookie') => 'post',
							esc_html__( 'Portfolio', 'cookie') => 'portfolio',
							esc_html__( 'Carousel Posts', 'cookie') => 'carousel-post',
							esc_html__( 'Carousel Portfolio', 'cookie') => 'carousel-portfolio',
						),
						'description' => esc_html__( 'Display the post from the various post types..', 'cookie' ),
						'std' => 'post'
					),

					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Blog layout Style', 'cookie' ),
						'param_name' => 'blog_layout',
						'value' => array(	
							esc_html__( 'Standard', 'cookie') => 'standard',
							esc_html__( 'Grid', 'cookie') => 'grid',
							esc_html__( 'First Starndard rest Grid', 'cookie') => 'standard-grid',
							esc_html__( 'Modern', 'cookie') => 'modern',
						),
						'description' => esc_html__( 'Various layout style for blog.. ', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => 'post' ),
						'std' => 'standard'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Blog Carousel layout Style', 'cookie' ),
						'param_name' => 'blog_carousel_layout',
						'value' => array(	
							esc_html__( 'Grid', 'cookie') => 'grid',
							esc_html__( 'Modern', 'cookie') => 'modern',
						),
						'description' => esc_html__( 'Various layout style for blog.. ', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => 'carousel-post' ),
						'std' => 'modern'
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Fullwidth Carousel', 'cookie' ),
						'param_name' => 'blog_carousel_fullwidth',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'dependency' => array( 'element' => 'posttype', 'value' => 'carousel-post' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Number of Columns', 'cookie' ),
						'param_name' => 'carousel_column',
						'value' => array(	
							 esc_html__( '1 columns', 'cookie' ) => '1',
							 esc_html__( '2 columns', 'cookie') => '2',
							 esc_html__( '3 columns', 'cookie') => '3',
							 esc_html__( '4 columns', 'cookie') => '4',
							 esc_html__( '5 columns', 'cookie') => '5',
						),
						'description' => esc_html__( 'Choose the column on desktop screen. it will adjust the columns count on responsive screens automatically.', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('carousel-post', 'carousel-portfolio') ),
						'std' => '3'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Blog Grid layout', 'cookie' ),
						'param_name' => 'blog_grid_layout',
						'value' => array(	
							esc_html__( 'FitRows(Default Grid)', 'cookie') => 'fitRows',
							esc_html__( 'Masonry', 'cookie') => 'masonry',
						),
						'description' => esc_html__( 'Various grid style for blog.. ', 'cookie' ),
						'dependency' => array( 'element' => 'blog_layout', 'value' => array( 'grid', 'standard-grid', 'modern' ) ),
						'std' => 'fitRows'
					),

					/*array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Blog gutter', 'cookie' ),
						'param_name' => 'blog_gutter',
						'description' => esc_html__( 'if you need a space between items check this box.', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('carousel-post') ),
					),*/

		            array(
		                'type' => 'dropdown',
						'heading' => esc_html__( 'Blog Sidebar', 'cookie' ),
						'param_name' => 'blog_sidebar',
						'value' => array(	
							esc_html__( 'No Sidebar', 'cookie') => 'no-sidebar',
							esc_html__( 'Right Sidebar', 'cookie') => 'has-sidebar',
							esc_html__( 'Left Sidebar', 'cookie') => 'has-sidebar left',
						),
						'description' => esc_html__( 'Sidebar for blog.. ', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => 'post' ),
						'std' => 'has-sidebar'
		            ),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Categories', 'cookie' ),
						'param_name' => 'blog_categories',
						'value' => $blog_options,
						'description' => esc_html__( 'Categories of post post type. ignore this to show all', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('post', 'carousel-post') )
					),

					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Portfolio layout Style', 'cookie' ),
						'param_name' => 'portfolio_layout',
						'value' => array(	
							esc_html__( '1 Column', 'cookie') => '1',
							esc_html__( '2 Column', 'cookie') => '2',
							esc_html__( '3 Column', 'cookie') => '3',
							esc_html__( '4 Column', 'cookie') => '4',
							esc_html__( '5 Column', 'cookie') => '5',
						),
						'description' => esc_html__( 'Various layout style for portfolio.. ', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => 'portfolio' ),
						'std' => '3'
					),

					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Fullwidth Portfolio', 'cookie' ),
						'param_name' => 'portfolio_fullwidth',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'description' => esc_html__( 'Kindly set your row as fullwidth to get the fullwidth portfolio. ', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('portfolio', 'carousel-portfolio') )
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Portfolio gutter', 'cookie' ),
						'param_name' => 'portfolio_gutter',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'description' => esc_html__( 'if you need a space between items check this box. ', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('portfolio', 'carousel-portfolio') )
					),

		            array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Portfolio layout Style', 'cookie' ),
						'param_name' => 'portfolio_grid',
						'value' => array(	
							 esc_html__( 'Grid', 'cookie') => 'fitRows',
							 esc_html__( 'Masonry', 'cookie') => 'masonry',
						),
						'description' => esc_html__( 'Various layout style for portfolio.. ', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => 'portfolio' ),
						'std' => 'fitRows'
					),

		            array(
		                'type' => 'dropdown',
		                'heading' => esc_html__('Portfolio Hover style', 'cookie'),
		                'param_name' => 'portfolio_hover_style',
		                'value' => array(
		                    esc_html__('Style 1', 'cookie') => '1',
		                    esc_html__('Style 2', 'cookie') => '2',
		                    esc_html__('Style 3', 'cookie') => '3',
		                    esc_html__('Style 4', 'cookie') => '4',
		                    esc_html__('Style 5', 'cookie') => '5',
		                    esc_html__('Style 6', 'cookie') => '6',
		                    esc_html__('Style 7', 'cookie') => '7',
		                    esc_html__('Style 8', 'cookie') => '8',
		                    esc_html__('Style 9', 'cookie') => '9',
		                    esc_html__('Style 10', 'cookie') => '10',
		                    esc_html__('Style 11', 'cookie') => '11',
		                    esc_html__('Style 12', 'cookie') => '12',
		                    //esc_html__('Style 13(Ajax)', 'cookie') => '13',
		                    //esc_html__('Style 14(Ajax)', 'cookie') => '14',
		                    esc_html__('Style 15', 'cookie') => '15',
		                    esc_html__('Style 16', 'cookie') => '16',
		                ), //Must provide key => value pairs for select options
		                'description' => esc_html__( 'Various hover style for portfolio.. ', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('portfolio', 'carousel-portfolio') ),
		                'std' => '1'
		            ),

					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Portfolio Bottom Caption', 'cookie' ),
						'param_name' => 'portfolio_bottom_caption',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('portfolio', 'carousel-portfolio') ),
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Portfolio Filter', 'cookie' ),
						'param_name' => 'portfolio_filter',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'dependency' => array( 'element' => 'posttype', 'value' => 'portfolio' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Portfolio Filter Order', 'cookie' ),
						'param_name' => 'portfolio_filter_order',
						'value' => array(	
							 esc_html__( 'Ascending', 'cookie') => 'ASC',
							 esc_html__( 'Descending ', 'cookie') => 'DESC',
						),
						'dependency' => array( 'element' => 'portfolio_filter', 'value' => '1' ),
						'std' => 'ASC'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Portfolio Filter Order by', 'cookie' ),
						'param_name' => 'portfolio_filter_order_by',
						'value' => array(						
							 esc_html__( 'None', 'cookie') => 'none',
							 esc_html__( 'Name', 'cookie') => 'name',
							 esc_html__( 'Slug', 'cookie') => 'slug',
							 esc_html__( 'Term Group', 'cookie') => 'term_group',
							 esc_html__( 'Term ID', 'cookie') => 'term_id',
							 esc_html__( 'ID', 'cookie') => 'id',
							 esc_html__( 'Description', 'cookie') => 'description',
						),
						'dependency' => array( 'element' => 'portfolio_filter', 'value' => '1' ),
						'std' => 'name'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Portfolio Filter alignment', 'cookie' ),
						'param_name' => 'portfolio_filter_align',
						'value' => array(
							 esc_html__( 'left', 'cookie' ) => 'left',	
							 esc_html__('center', 'cookie') => 'center',					 
							 esc_html__( 'right', 'cookie' ) => 'right',
							),
						'description' => esc_html__( 'Select the filter style to be aligned', 'cookie' ),
						'dependency' => array( 'element' => 'portfolio_filter', 'value' => '1' ),
						'std' => 'left'
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Portfolio Categories', 'cookie' ),
						'param_name' => 'portfolio_categories',
						'value' => $portfolio_options,
						'description' => esc_html__( 'Categories of portfolio post type', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('portfolio', 'carousel-portfolio') )
					),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Number of Posts to display', 'cookie' ),
						'param_name' => 'posts_per_page',
						'description' => esc_html__( 'Mention the number of posts that you want to display!!.. -1 for infinite posts', 'cookie' ),
						'std' => '5'
					),
					
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order', 'cookie' ),
						'param_name' => 'order',
						'value' => array(	
							 esc_html__( 'Descending ', 'cookie') => 'DESC',
							 esc_html__( 'Ascending', 'cookie') => 'ASC',
						),
						'std' => 'DESC'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order by', 'cookie' ),
						'param_name' => 'order_by',
						'value' => array(						
							 esc_html__( 'None', 'cookie') => 'none',
							 esc_html__( 'Post ID', 'cookie') => 'id',
							 esc_html__( 'Post author', 'cookie') => 'author',
							 esc_html__( 'Post title', 'cookie') => 'title',
							 esc_html__( 'Post slug', 'cookie') => 'name',
							 esc_html__( 'Date', 'cookie') => 'date',
							 esc_html__( 'Last modified date', 'cookie') => 'modified',
							 esc_html__( 'Random', 'cookie') => 'rand',
							 esc_html__( 'Comments number', 'cookie') => 'comment_count',
							 esc_html__( 'Menu order', 'cookie') => 'menu_order',
						),
						'std' => 'date'
					),
					
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Pagination style', 'cookie' ),
						'param_name' => 'pagination',
						'description' => esc_html__( 'Choose your pagination style', 'cookie' ),
						'value' => array( 
							esc_html__( 'No pagination', 'cookie' ) =>  '0',
		                 	esc_html__( 'Number', 'cookie' ) => '2',
		                 	esc_html__( 'Infinite', 'cookie' ) => '3',
		                 	esc_html__( 'Infinite with Load More', 'cookie' ) => '4' 
						),
						'std' => '0',
						'dependency' => array( 'element' => 'posttype', 'value' => array('post', 'portfolio') )
					),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Posts to exclude', 'cookie' ),
						'param_name' => 'post_not_in',
						'description' => esc_html__( 'Mention the posts id to excludes for.eg.401', 'cookie' )
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Ignore Sticky', 'cookie' ),
						'param_name' => 'ignore_sticky',
						'description' => esc_html__( 'Just check this if you want to ignore sticky posts..', 'cookie' ),
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'dependency' => array( 'element' => 'posttype', 'value' => 'post' )
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Autoplay', 'cookie' ),
						'param_name' => 'posttype_autoplay',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('carousel-post', 'carousel-portfolio') ),
						'std'  => '1',
					),	
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Timeout duration', 'cookie' ),
						'param_name' => 'posttype_autoplay_timeout',
						'description' => esc_html__( 'Enter the duration of each slide Transition', 'cookie' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'std' => '4000',
						'dependency' => array( 'element' => 'posttype_autoplay', 'value' => '1' )
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Pause on Hover', 'cookie' ),
						'param_name' => 'posttype_autoplay_hover',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'std'  => '1',
						'dependency' => array( 'element' => 'posttype_autoplay', 'value' => '1' )
					),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Slide Speed', 'cookie' ),
						'param_name' => 'posttype_autoplay_speed',
						'description' => esc_html__( 'Enter the speed of each slide Transition', 'cookie' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('carousel-post', 'carousel-portfolio') ),
						'std' => '700',
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Loop', 'cookie' ),
						'param_name' => 'posttype_loop',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('carousel-post', 'carousel-portfolio') ),
						'std'  => '1'
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Pagination', 'cookie' ),
						'param_name' => 'posttype_pagination',
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'group' => esc_html__( 'carousel Options', 'cookie' ),
						'dependency' => array( 'element' => 'posttype', 'value' => array('carousel-post', 'carousel-portfolio') ),
						'std'  => '1'
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Animation', 'cookie' ),
						'param_name' => 'animation',
						'group' => esc_html__( 'Animation Setting', 'cookie' ),
						'value' => array( esc_html__( 'Yes', 'cookie' ) => '1' ),
						'dependency' => array( 'element' => 'posttype', 'value' => 'portfolio' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Animation style', 'cookie' ),
						'param_name' => 'animation_style',
						'description' => esc_html__( 'Choose your animation style', 'cookie' ),
						'value' => array( 
		                 	esc_html__('fadeIn', 'cookie') => 'fadeIn',
		                    esc_html__('fadeInDown', 'cookie') => 'fadeInDown',
		                    esc_html__('fadeInUp', 'cookie') => 'fadeInUp',
		                    esc_html__('fadeInRight', 'cookie') => 'fadeInRight',
		                    esc_html__('fadeInLeft', 'cookie') => 'fadeInLeft',
		                    esc_html__('flipInX', 'cookie') => 'flipInX',
		                    esc_html__('flipInY', 'cookie') => 'flipInY',
		                    esc_html__('zoomIn', 'cookie') => 'zoomIn',
						),
						'std' => 'fadeInUp',
						'group' => esc_html__( 'Animation Setting', 'cookie' ),
						'dependency' => array( 'element' => 'animation', 'value' => '1' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Animation Offset', 'cookie' ),
						'param_name' => 'animation_offset',
						'description' => esc_html__( 'Animation will be triggered only when portfolio reaches particular percentage on viewport. for eg. 90', 'cookie' ),
						'std' => '90',
						'group' => esc_html__( 'Animation Setting', 'cookie' ),
						'dependency' => array( 'element' => 'animation', 'value' => '1' )
					),
					
				)
			
			));		
		}	

		//WooCommerce Product List
		if( class_exists( 'WooCommerce' ) ){
			$product_options = '';
			$product_categories = get_terms('product_cat');		
			foreach ($product_categories as $category) {
				$product_options[$category->name] = $category->slug;
			}

			vc_map( array(
				'name' => esc_html__('WooCommerce Products', 'cookie'),
				'base' => 'agni_woo_products',
				'icon' => 'ion-ios-cart-outline',
				'weight' => '70',
				'category' => esc_html__('WooCommerce', 'cookie'),
				'description' => esc_html__('Setup your product to display.', 'cookie'),
				'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Product Type', 'cookie'),
						'param_name' => 'product_type',
						'value' => array(
							esc_html__( 'All', 'cookie') => 'all',
							esc_html__( 'Sale', 'cookie') => 'sale',
							esc_html__( 'Featured', 'cookie') => 'featured',
							esc_html__( 'Best Selling', 'cookie') => 'best_selling',
							esc_html__( 'Top Rated', 'cookie') => 'toprated',
						),
						'save_always' => true,
						'description' => esc_html__('Please select the type of products you would like to display.', 'cookie'),
						'std' => 'all'
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__('Product Categories', 'cookie'),
						'param_name' => 'product_categories',
						'admin_label' => true,
						'value' => $product_options,
						'save_always' => true,
						'description' => esc_html__('choose your desired Categories', 'cookie')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Number Of Columns', 'cookie'),
						'param_name' => 'product_layout',
						'value' => array(
							esc_html__( '2 Column', 'cookie') => '2',
							esc_html__( '3 Column', 'cookie') => '3',
							esc_html__( '4 Column', 'cookie') => '4',
						),
						'save_always' => true,
						'description' => esc_html__('Please select the number of columns you would like to display.', 'cookie'),
						'std' => '3'
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Number of Products to display', 'cookie'),
						'param_name' => 'posts_per_page',
						'admin_label' => true,
						'description' => esc_html__('Mention the number of posts that you want to display!!.. -1 for infinite posts', 'cookie'),
						'std' => '3'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order', 'cookie' ),
						'param_name' => 'order',
						'value' => array(	
							 esc_html__( 'Descending ', 'cookie') => 'DESC',
							 esc_html__( 'Ascending', 'cookie') => 'ASC',
						),
						'std' => 'DESC'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order by', 'cookie' ),
						'param_name' => 'order_by',
						'value' => array(						
							 esc_html__( 'None', 'cookie') => 'none',
							 esc_html__( 'Post ID', 'cookie') => 'id',
							 esc_html__( 'Post author', 'cookie') => 'author',
							 esc_html__( 'Post title', 'cookie') => 'title',
							 esc_html__( 'Post slug', 'cookie') => 'name',
							 esc_html__( 'Date', 'cookie') => 'date',
							 esc_html__( 'Last modified date', 'cookie') => 'modified',
							 esc_html__( 'Random', 'cookie') => 'rand',
							 esc_html__( 'Comments number', 'cookie') => 'comment_count',
							 esc_html__( 'Menu order', 'cookie') => 'menu_order',
						),
						'std' => 'date'
					),

				)
			));
		}
	
    }

    /*
    Shortcode logic how it should be rendered
    */
   	public static function agni_section_heading( $atts = null, $content = null ) {
      	
		$icon = $heading = $additional = $divide_line = '';
		$atts = shortcode_atts( array(
			//'heading_style'  => '1',
			'icon'  => '',
			'icon_size' => '60',
			'icon_color' => '#22e3e5',
			'heading' => '',
			'heading_size' => '48',
			'sub_heading' => '',
			'sub_heading_size' => '18',
			'additional' => '',
			'additional_size' => '22',
			'divide_line' => 'yes',
			'divide_line_width' => '90',
			'divide_line_height' => '1',
			'divide_line_color' => '#22e3e5',
			'align' => 'left',
			'display_order' => 'ihda',
			'class'  => ''
		), $atts, 'agni_section_heading' );

		if( !empty($atts['icon']) ){
			$icon = '<i class="section-heading-icon '.$atts['icon'].'" style="font-size:'.$atts['icon_size'].'px; color:'.$atts['icon_color'].'"></i>';
		}
		if( !empty($atts['heading']) ){
			$heading = '<h2 class="heading" style="font-size:'.$atts['heading_size'].'px">'.$atts['heading'].'</h2>';
		}
		if( !empty($atts['sub_heading']) ){
			$heading .= '<div class="sub-heading" style="font-size:'.$atts['sub_heading_size'].'px">'.$atts['sub_heading'].'</div>';
		}
		if( !empty($atts['additional']) ){
			$additional = '<p class="additional-heading" style="font-size:'.$atts['additional_size'].'px">'.$atts['additional'].'</p>';
		}

		if( $atts['divide_line'] == 'yes'  ){
			$divide_line = '<div class="divide-line text-'.$atts['align'].'"><span style="width:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['divide_line_width'] ) ? $atts['divide_line_width'] : $atts['divide_line_width'] . 'px' ).'; height:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['divide_line_height'] ) ? $atts['divide_line_height'] : $atts['divide_line_height'] . 'px' ).'; background-color:'.$atts['divide_line_color'].'"></span></div>';
		}

		$output = '<div class="'.$atts['class'].' section-heading text-'.$atts['align'].' '.$atts['display_order'].'">';
		switch( $atts['display_order'] ){
			case 'hdai' :
				$output .= $heading . $divide_line . $additional . $icon ;
				break;
			case 'ahdi' :
				$output .= $additional . $heading . $divide_line . $icon ;
				break;
			case 'dhai' :
				$output .= $divide_line . $heading . $additional . $icon ;
				break;
			case 'idha' :
				$output .= $icon . $divide_line . $heading . $additional ;
				break;
			default :
				$output .= $icon . $heading . $divide_line . $additional ;
		}
		$output .= '</div>';
		
		return $output;
    }
	
	// Blockquote
	public static function agni_blockquote( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'reverse' => 'no',
				'color' => '',
				'background_color' => '',
				'class'=> ''
			), $atts, 'blockquote' );
		
		$output = $reverse_class = $style = '';
		if( $atts['reverse'] == 'yes' ){
			$reverse_class= '-reverse';	
		}

		if( !empty($atts['color']) ){
			$style = 'style="color:'.$atts['color'].' "';
		}

		if( !empty($atts['background_color']) ){
			$output = '<div class="blockquote-container" style="background-color: '.$atts['background_color'].'" >';
		}

		$output .= '<blockquote class="'.$atts['class'].' blockquote'.$reverse_class.'" '.$style .'>' . wpb_js_remove_wpautop($content, true) . '</blockquote>';	
		if( !empty($atts['background_color']) ){
			$output .= '</div>';
		}
		return $output;
	}

	// Dropcap
	public static function agni_dropcap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'dropcap_style' => 'background',
				'radius' => '',
				'border_color' => '#000000',
				'background_color' => '#000000',
				'color' => '',
				'class' => ''
			), $atts, 'dropcap' );
		
		$output = do_shortcode( $content );

		$radius = '';
		if( !empty($atts['radius']) ){
			$radius = 'border-radius:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['radius'] ) ? $atts['radius'] : $atts['radius'] . 'px' ).';';
		}

		if( $atts['dropcap_style'] == 'background' ){
			$dropcap_style = 'style="'.$radius.' background-color:'.$atts['background_color'].'; color:'.$atts['color'].'"';
		}
		else{
			$dropcap_style = 'style="'.$radius.' border-color:'.$atts['border_color'].'; color:'.$atts['color'].'"';
		}
		$output = '<p class="'.$atts['class'].' dropcap"><span '.$dropcap_style.'>'.$output[0].'</span>'. substr( $output, 1 ) .'</p>';
		return $output;
	}
	
	// separator
	public static function agni_separator( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(		
				'choice' => '',
				'text' => '',
				'width' => '100',
				'align' => 'center',
				'style' => 'solid',
				'color' => '',
				'background_color' => '',
				'class' => ''
			), $atts, 'separator' );
		
		$text = $bg = $color = '';

		if( !empty($atts['color']) ){
			$color = 'style="color:'.$atts['color'].';"';
		}

		if( $atts['text'] != '' ){
			$text = '<p '.$color.'>'.$atts['text'].'</p>';			
		}
		if( !empty($atts['background_color']) ){
			$bg = 'background-color:'.$atts['background_color'].';';
		}
		$output = '<div class="'.$atts['class'].' separator separator_'.$atts['align'].'" style="width:'.$atts['width'].'%; '.$bg.'">
					<span class="sep_holder sep_holder_l"><span style="border-top-style:'.$atts['style'].'; border-color:'.$atts['color'].'" class="sep_line"></span></span>
					'.$text.'
					<span class="sep_holder sep_holder_r"><span style="border-top-style:'.$atts['style'].'; border-color:'.$atts['color'].'" class="sep_line"></span></span>
				</div>';
		
		return $output;
	}
	
	// call to action
	
	public static function agni_call_to_action( $atts, $content=null ){
		$atts=shortcode_atts(array(
			'type' => '1',
			'icon' =>'',
			'icon_margin_top'       => '',
			'icon_margin_right'       => '',
			'icon_margin_bottom'       => '',
			'quote' =>'Call to action',
			'additional_quote' =>'Call to action additional text',			
			'value'  => 'Button',
			'url'        => '#',
			'target'        => '_self',
			'style'		=> '',
			'choice'       => 'primary',
			'size'       => '',
			'button_margin_top'       => '10',
			'button_margin_bottom'       => '',	
			'class'=>''
		), $atts, 'agni_call_to_action');
		
		
		$size = $style = $heading = $additional = $button = $button_margin = $icon_margin = $icon = '';	


		if( !empty($atts['icon_margin_top']) || !empty( $atts['icon_margin_bottom'] ) || !empty( $atts['icon_margin_right'] ) ){
			$icon_margin = 'style="';
			$icon_margin .= ( !empty($atts['icon_margin_top']) ) ? 'margin-top: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['icon_margin_top'] ) ? $atts['icon_margin_top'] : $atts['icon_margin_top'] . 'px' ) . '; ' : '';
			$icon_margin .= ( !empty($atts['icon_margin_right']) ) ? 'margin-right: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['icon_margin_right'] ) ? $atts['icon_margin_right'] : $atts['icon_margin_right'] . 'px' ) . '; ' : '';
			$icon_margin .= ( !empty($atts['icon_margin_bottom']) ) ? 'margin-bottom: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['icon_margin_bottom'] ) ? $atts['icon_margin_bottom'] : $atts['icon_margin_bottom'] . 'px' ) . '; ' : '';
			$icon_margin .= '"';
		}
		
		if( $atts['icon'] != '' ){
			$icon = '<div class="call-to-action-icon" '.$icon_margin.'><i class="'.$atts['icon'].'"></i></div>';
		}

		if( $atts['size'] != '' ){
			$size = 'btn-'.$atts['size'].'';	
		}
		if( $atts['style'] != '' ){
			$style = 'btn-'.$atts['style'];	
		}
		if( !empty($atts['button_margin_top']) || !empty( $atts['button_margin_bottom'] ) ){
			$button_margin = 'style="';
			$button_margin .= ( !empty($atts['button_margin_top']) ) ? 'margin-top: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['button_margin_top'] ) ? $atts['button_margin_top'] : $atts['button_margin_top'] . 'px' ) . '; ' : '';
			$button_margin .= ( !empty($atts['button_margin_bottom']) ) ? 'margin-bottom: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['button_margin_bottom'] ) ? $atts['button_margin_bottom'] : $atts['button_margin_bottom'] . 'px' ) . '; ' : '';
			$button_margin .= '"';
		}
		
		if( !empty( $atts['quote'] ) ){
			$heading = '<h4 class="call-to-action-heading">'.$atts['quote'].'</h4>';
		}
		if( !empty( $atts['additional_quote'] ) ){
			$additional = '<p class="call-to-action-additonal">'.$atts['additional_quote'].'</p>';
		}
		if( !empty( $atts['value'] ) ){
			$button = '<a class="btn '.$style.' btn-'.$atts['choice'].' '.$size.' call-to-action-button" target="'.$atts['target'].'" href="'.$atts['url'].'" '.$button_margin.'> '.$atts['value'].'</a>';
		}

		$output = '<div class="'.$atts['class'].' call-to-action call-to-action-style-'.$atts['type'].'">'.$icon.'<div class="call-to-action-description">' . $heading . $additional .'</div>'. $button .'</div>';	
			
		return $output;
	}
	
	//icon
	public static function agni_icon($atts=null, $content=null ){
		$atts = shortcode_atts(array(
			'icon' => 'pe-7s-diamond',
			'size' =>'32',
			'icon_style' => '',
			'width' =>'72',
			'height' => '72',
			'radius' => '50%',
			'border_color' => '#000000',
			'background_color' => '#f0f1f2',
			'color' => '#000000',
			'hover_icon_style' => '',
			'hover_radius' => '50%',
			'hover_border_color' => '#000000',
			'hover_background_color' => '#22e3e5',
			'hover_color' => '#ffffff', 
			'class'=>'',
		), $atts);

		$icon_style = $radius = $width = $height = $font_size = $icon_has = $icon_transparent = '';
		if( !empty($atts['radius']) ){
			$radius = 'border-radius:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['radius'] ) ? $atts['radius'] : $atts['radius'] . 'px' ).'; ';
		}
		if( !empty($atts['size']) ){
			$font_size = 'font-size:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['size'] ) ? $atts['size'] : $atts['size'] . 'px' ).'; ';
		}
		if( !empty($atts['width']) ){
			$width = 'width:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['width'] ) ? $atts['width'] : $atts['width'] . 'px' ).'; ';
		}
		if( !empty($atts['height']) ){
			$height = 'height:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['height'] ) ? $atts['height'] : $atts['height'] . 'px' ).'; ';
		}

		$icon_style = 'style="'.$font_size.$radius.'color:'.$atts['color'].'; ';
		if( $atts['icon_style'] == 'background' ){
			$icon_style .= ''.$width.$height.''.$atts['icon_style'].'-color:'.$atts[$atts['icon_style'].'_color'].';  border-color:'.$atts[$atts['icon_style'].'_color'].';';
			$icon_has = 'icon-has-'.$atts['icon_style'].'';
		}
		if( $atts['icon_style'] == 'border' ){
			$icon_style .= ''.$width.$height.''.$atts['icon_style'].'-color:'.$atts[$atts['icon_style'].'_color'].'; ';
			$icon_has = 'icon-has-'.$atts['icon_style'].'';
		}
		$icon_style .= '"';

		//hover style
		$hover_icon_style = $hover_radius = $hover_icon_has ='';
		if( !empty($atts['hover_radius']) ){
			$hover_radius = 'border-radius:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['hover_radius'] ) ? $atts['hover_radius'] : $atts['hover_radius'] . 'px' ).'; ';
		}

		$hover_icon_style = 'style="'.$hover_radius.'color:'.$atts['hover_color'].'; ';
		if( $atts['hover_icon_style'] != '' ){
			$hover_icon_style .= ''.$atts['hover_icon_style'].'-color:'.$atts['hover_'.$atts['hover_icon_style'].'_color'].'; ';
			$hover_icon_has = 'hover-icon-has-'.$atts['hover_icon_style'].'';
		}
		$hover_icon_style .= '"';

		if( $icon_has == 'icon-has-border' && $hover_icon_has == 'hover-icon-has-background' ){ 
			$icon_transparent = 'icon-background-transparent';
		}
		$output = '<span class="'.$atts['class'].' agni-icon '.$icon_transparent.'" '.$hover_icon_style.'><i class="'.$atts['icon'].' '.$icon_has.' '.$hover_icon_has.'" '.$icon_style.'></i></span>';

		return $output;
		
	}
	
		
	// Services
	public static function agni_service($atts=null, $content=null ){
		$atts = shortcode_atts(array(
			'choice' => '1',
			'text_i_icon' => '1',
			'icon' => '',
			'icon_style' => '',
			'radius' => '',
			'border_color' => '#000000',
			'background_color' => '#f0f1f2',
			'color' => '#000000',
			'hover_icon_style' => '',
			'hover_radius' => '',
			'hover_border_color' => '#000000',
			'hover_background_color' => '#22e3e5',
			'hover_color' => '#000000', 
			'text' => '',
			'title' => 'Service Title',
			'content' => 'Description about your services.',
			'align' => 'left',
			'service_3_align' => 'left',
			'class'=>'',
		), $atts);
		
		$output = $service_has = $icon = '';
		

		if( $atts['text_i_icon'] == '1' ){
			$icon_style = $radius = $icon_has = $icon_transparent = '';
			if( !empty($atts['radius']) ){
				$radius = 'border-radius:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['radius'] ) ? $atts['radius'] : $atts['radius'] . 'px' ).'; ';
			}
			
			$icon_style = 'style="'.$radius.'color:'.$atts['color'].'; ';
			if( $atts['icon_style'] == 'background' ){
				$icon_style .= ''.$atts['icon_style'].'-color:'.$atts[$atts['icon_style'].'_color'].';  border-color:'.$atts[$atts['icon_style'].'_color'].';';
				$icon_has = 'icon-has-'.$atts['icon_style'].'';
				$service_has = 'service-icon-has-'.$atts['icon_style'].'';
			}
			if( $atts['icon_style'] == 'border' ){
				$icon_style .= ''.$atts['icon_style'].'-color:'.$atts[$atts['icon_style'].'_color'].'; ';
				$icon_has = 'icon-has-'.$atts['icon_style'].'';
				$service_has = 'service-icon-has-'.$atts['icon_style'].'';
			}
			$icon_style .= '"';

			//hover style
			$hover_icon_style = $hover_radius = $hover_icon_has ='';
			if( !empty($atts['hover_radius']) ){
				$hover_radius = 'border-radius:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['hover_radius'] ) ? $atts['hover_radius'] : $atts['hover_radius'] . 'px' ).'; ';
			}

			$hover_icon_style = 'style="'.$hover_radius.'color:'.$atts['hover_color'].'; ';
			if( $atts['hover_icon_style'] != '' ){
				$hover_icon_style .= ''.$atts['hover_icon_style'].'-color:'.$atts['hover_'.$atts['hover_icon_style'].'_color'].'; ';
				$hover_icon_has = 'hover-icon-has-'.$atts['hover_icon_style'].'';
			}
			$hover_icon_style .= '"';

			if( $icon_has == 'icon-has-border' && $hover_icon_has == 'hover-icon-has-background' ){ 
				$icon_transparent = 'icon-background-transparent';
			}
			$icon = '<span class="'.$atts['class'].' agni-icon '.$icon_transparent.'" '.$hover_icon_style.'><i class="'.$atts['icon'].' '.$icon_has.' '.$hover_icon_has.'" '.$icon_style.'></i></span>';
			}
		else{
			$icon = ( $atts['text'] != '' )? '<h5 class="service-box-text">'.$atts['text'].'</h5>' : '';
		}
		switch( $atts['choice'] ){
			case '1':
				$output = '<div class="'.$atts['class'].' service-box service-box-style-'.$atts['choice'].' text-'.$atts['align'].' '.$service_has.'">
					'.$icon.'
					<h4 class="heading">'.$atts['title'].'</h4>
					<div class="divide-line text-'.$atts['align'].'"><span></span></div>
					'.wpb_js_remove_wpautop($content, true).'
				</div>';
				break;
			case '2':			
				$output = '<div class="'.$atts['class'].' service-box service-box-style-'.$atts['choice'].' '.$service_has.'">
					<div class="service-box-style-'.$atts['choice'].'-icon">
						'.$icon.'
					</div>
					<div class="service-box-style-'.$atts['choice'].'-text">
						<h5 class="heading">'.$atts['title'].'</h5>
						<div class="divide-line text-'.$atts['align'].'"><span></span></div>
						'.wpb_js_remove_wpautop($content, true).'
					</div>
				</div>';
				break;				
			case '3': 
			case '5': 
				$heading_class = ( $atts['choice'] == '3' )? '6' : '5';
				$output = '<div class="'.$atts['class'].' service-box service-box-style-'.$atts['choice'].' text-'.$atts['service_3_align'].' '.$service_has.'">
					<div class="service-box-style-'.$atts['choice'].'-icon">
						'.$icon.'
					</div>
					<div class="service-box-style-'.$atts['choice'].'-text">
						<h'.$heading_class.' class="heading">'.$atts['title'].'</h'.$heading_class.'>
						'.wpb_js_remove_wpautop($content, true).'
					</div>
				</div>';
				break;
			case '4': 			
				$output = '<div class="'.$atts['class'].' service-box service-box-style-'.$atts['choice'].' text-'.$atts['align'].' '.$service_has.'">						
					<div class="service-box-style-'.$atts['choice'].'-icon">
						'.$icon.'
						<div class="divide-line text-'.$atts['align'].'"><span></span></div>
						<h5>'.$atts['title'].'</h5>
					</div>
					<div class="service-box-style-'.$atts['choice'].'-text">
						<div>'.wpb_js_remove_wpautop($content, true).'</div>
					</div>
				</div>';
				break;
			case '6': 			
				$output = '<div class="'.$atts['class'].' service-box service-box-style-'.$atts['choice'].' text-'.$atts['align'].' '.$service_has.'">
					'.$icon.'
					<h5 class="heading">'.$atts['title'].'</h5>
					<div class="divide-line text-'.$atts['align'].'"><span></span></div>
					'.wpb_js_remove_wpautop($content, true).'
				</div>';
				break;
			
		}
		
		return $output;
		
	}

	// Service Boxes
	public static function agni_service_boxes($atts=null, $content=null ){
		$atts = vc_map_get_attributes( 'agni_service_boxes', $atts );
		extract( $atts );

		$values = vc_param_group_parse_atts( $atts['values'] );
		$data = array();

		$width = wpb_translateColumnWidthToSpan( $width );
		$width = vc_column_offset_class_merge( $offset, $width );

		$output = '';

		$carousel = $type;
		$service_autoplay = ( $atts['service_autoplay'] == '1' )?'true':'false';
		$service_autoplay_timeout = $atts['service_autoplay_timeout'];
		$service_autoplay_hover = ( $atts['service_autoplay_hover'] == '1' )?'true':'false';
		$service_loop = ( $atts['service_loop'] == '1' )?'true':'false';
		$service_pagination = ( $atts['service_pagination'] == '1' )?'true':'false';
		if( $carousel != '1' ){
			$css_classes = array(
				$class,
				'wpb_column',
				'vc_column_container',
				'agni_column',
				'service-box-column',
				$width,
			);
			$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'agni_service_boxes', $atts ) );
			$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
		}
		else{
			$css_classes = array(
				$class,
				'service-box-column',
			);
			$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'agni_service_boxes', $atts ) );
			$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
		}

		if( $carousel == '1' ){
			switch( $column_count ){
				case '1' :
					$column_count = 'data-service-0="1" data-service-768="1" data-service-992="1" data-service-1200="1"';
					break;
				case '2' :
					$column_count = 'data-service-0="1" data-service-768="1" data-service-992="2" data-service-1200="2"';
					break;
				case '3' :
					$column_count = 'data-service-0="1" data-service-768="2" data-service-992="3" data-service-1200="3"';
					break;
				case '4' :
					$column_count = 'data-service-0="1" data-service-768="3" data-service-992="4" data-service-1200="4"';
					break;
			}
		}

		foreach ( $values as $k => $v ) {
			$data[] = array(
				//'label' => $v['title'],
				'text_i_icon' => $v['text_i_icon'],
				'icon' => ( isset($v['icon']) ) ? $v['icon'] : '',
				'icon_style' => ( isset($v['icon_style']) ) ? $v['icon_style'] : '',
				'radius' => ( isset( $v['radius']) ) ? $v['radius'] : '',
				'border_color' => ( isset( $v['border_color'] ) ) ? $v['border_color'] : '',
				'background_color' => ( isset( $v['background_color'] ) ) ? $v['background_color'] : '',
				'color' => ( isset( $v['color'] ) ) ? $v['color'] : '',
				'hover_icon_style' =>( isset( $v['hover_icon_style']) ) ? $v['hover_icon_style'] : '',
				'hover_radius' => ( isset( $v['hover_radius']) ) ? $v['hover_radius'] : '',
				'hover_border_color' =>  ( isset( $v['hover_border_color']) ) ? $v['hover_border_color'] : '',
				'hover_background_color' => ( isset( $v['hover_background_color']) ) ? $v['hover_background_color'] : '',
				'hover_color' => ( isset( $v['hover_color']) ) ? $v['hover_color'] : '',
				'text' => ( isset( $v['text']) ) ? $v['text'] : '',
				'title' => $v['title'],
				'content' => $v['content'],
			);
		}

		$output = $service_has = $icon = '';
		
		if( $carousel != '1' ){
			$output = '<div class="row service-box-container">';
		}
		else{
			$output = '<div class="service-box-container carousel-service-box" data-service-autoplay=\''.$service_autoplay.'\' data-service-autoplay-timeout=\''.$service_autoplay_timeout.'\' data-service-autoplay-hover=\''.$service_autoplay_hover.'\' data-service-loop=\''.$service_loop.'\' data-service-pagination=\''.$service_pagination.'\' '.$column_count.'>';
			$i = $c = 1;
		}

		foreach ( $data as $atts ) {
			//$output .=  $v['label'];
			if( $atts['text_i_icon'] == '1' ){
				$icon_style = $radius = $icon_has = $icon_transparent = '';
				if( !empty($atts['radius']) ){
					$radius = 'border-radius:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['radius'] ) ? $atts['radius'] : $atts['radius'] . 'px' ).'; ';
				}
				
				$icon_style = 'style="'.$radius.'color:'.$atts['color'].'; ';
				if( $atts['icon_style'] == 'background' ){
					$icon_style .= ''.$atts['icon_style'].'-color:'.$atts[$atts['icon_style'].'_color'].';  border-color:'.$atts[$atts['icon_style'].'_color'].';';
					$icon_has = 'icon-has-'.$atts['icon_style'].'';
					$service_has = 'service-icon-has-'.$atts['icon_style'].'';
				}
				if( $atts['icon_style'] == 'border' ){
					$icon_style .= ''.$atts['icon_style'].'-color:'.$atts[$atts['icon_style'].'_color'].'; ';
					$icon_has = 'icon-has-'.$atts['icon_style'].'';
					$service_has = 'service-icon-has-'.$atts['icon_style'].'';
				}
				$icon_style .= '"';

				//hover style
				$hover_icon_style = $hover_radius = $hover_icon_has ='';
				if( !empty($atts['hover_radius']) ){
					$hover_radius = 'border-radius:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['hover_radius'] ) ? $atts['hover_radius'] : $atts['hover_radius'] . 'px' ).'; ';
				}

				$hover_icon_style = 'style="'.$hover_radius.'color:'.$atts['hover_color'].'; ';
				if( $atts['hover_icon_style'] != '' ){
					$hover_icon_style .= ''.$atts['hover_icon_style'].'-color:'.$atts['hover_'.$atts['hover_icon_style'].'_color'].'; ';
					$hover_icon_has = 'hover-icon-has-'.$atts['hover_icon_style'].'';
				}
				$hover_icon_style .= '"';

				if( $icon_has == 'icon-has-border' && $hover_icon_has == 'hover-icon-has-background' ){ 
					$icon_transparent = 'icon-background-transparent';
				}
				$icon = '<span class="'.$class.' agni-icon '.$icon_transparent.'" '.$hover_icon_style.'><i class="'.$atts['icon'].' '.$icon_has.' '.$hover_icon_has.'" '.$icon_style.'></i></span>';
				}
			else{
				$icon = ( $atts['text'] != '' )? '<h5 class="service-box-text">'.$atts['text'].'</h5>' : '';
			}
			
			// added additionally for carusel
			if( $carousel == '1' ){
				if( $i == $c ){ $c = $c + $column_items; // number of items in carousel
					$output .= '<div class="service-box-carousel-column">';
				}
				$i = $i + 1;
			}
			
			switch( $choice ){
				case '1':
					$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '><div class="service-box service-box-style-'.$choice.' text-'.$align.' '.$service_has.'">
						'.$icon.'
						<h4 class="heading">'.$atts['title'].'</h4>
						<div class="divide-line text-'.$align.'"><span></span></div>
						<p>'.$atts['content'].'</p>
					</div></div>';
					break;
				case '2':			
					$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '><div class="service-box service-box-style-'.$choice.' '.$service_has.'">
						<div class="service-box-style-'.$choice.'-icon">
							'.$icon.'
						</div>
						<div class="service-box-style-'.$choice.'-text">
							<h5 class="heading">'.$atts['title'].'</h5>
							<div class="divide-line text-'.$align.'"><span></span></div>
							<p>'.$atts['content'].'</p>
						</div>
					</div></div>';
					break;				
				case '3': 
				case '5': 
					$heading_class = ( $choice == '3' )? '6' : '5';
					$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '><div class="service-box service-box-style-'.$choice.' text-'.$service_3_align.' '.$service_has.'">
						<div class="service-box-style-'.$choice.'-icon">
							'.$icon.'
						</div>
						<div class="service-box-style-'.$choice.'-text">
							<h'.$heading_class.' class="heading">'.$atts['title'].'</h'.$heading_class.'>
							<p>'.$atts['content'].'</p>
						</div>
					</div></div>';
					break;
				case '4': 			
					$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '><div class="service-box service-box-style-'.$choice.' text-'.$align.' '.$service_has.'">						
						<div class="service-box-style-'.$choice.'-icon">
							'.$icon.'
							<div class="divide-line text-'.$align.'"><span></span></div>
							<h5>'.$atts['title'].'</h5>
						</div>
						<div class="service-box-style-'.$choice.'-text">
							<div><p>'.$atts['content'].'</p></div>
						</div>
					</div></div>';
					break;
				case '6': 			
					$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '><div class="service-box service-box-style-'.$choice.' text-'.$align.' '.$service_has.'">
						'.$icon.'
						<h5 class="heading">'.$atts['title'].'</h5>
						<div class="divide-line text-'.$align.'"><span></span></div>
						<p>'.$atts['content'].'</p>
					</div></div>';
					break;
				
			}
			if( $carousel == '1' ){
				if( $i == $c ){
					$output .= '</div>';
				}
			}
			
		}
		$output .= '</div>';
		
		return $output;
		
	}

	// Features
	public static function agni_features($atts=null, $content=null ){
		$atts = shortcode_atts(array(
			'img_url' => '',
			'title' => '',
			'title_url'        => '',
			'title_color'  => '',
			'icon'		=> '',
			'value'		=> '',
			'url'        => '#',
			'target'        => '_self',
			'style'		=> '',
			'choice'       => 'default',
			'radius'	=> '',
			'size'       => '',
			'hovered'	=> '',
			'bg_color'  => '',
			'class'=>'',
		), $atts);
		$size = $btn_style = $bg_color = $icon = $style = $title = $title_color = $button = $output = '';

		if( $atts['icon'] != '' ){
			$icon = '<i class="'.$atts['icon'].'"></i>';
		}
		if( $atts['size'] != '' ){
			$size = 'btn-'.$atts['size'].'';	
		}
		if( $atts['style'] != '' ){
			$btn_style = ' btn-'.$atts['style'];
		}
		if( $atts['bg_color'] != '' ){
			$bg_color = 'style="background-color:'.$atts['bg_color'].'"';
		}
		if( $atts['bg_color'] != '' ){
			$bg_color = 'style="background-color:'.$atts['bg_color'].'"';
		}
		if( !empty($atts['radius']) ){
			$style = 'style="border-radius:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['radius'] ) ? $atts['radius'] : $atts['radius'] . 'px' ).';"';
		}
		if( !empty($atts['title_color']) ){
			$title_color = 'style="color:'.$atts['title_color'].'"';
		}
		if( !empty($atts['title']) ){
			if( !empty($atts['title_url']) ){
				$title = '<a href="'.$atts['title_url'].'" class="feature-box-title-link" '.$title_color.'><h5 class="feature-box-title heading" '.$title_color.'>'.$atts['title'].'</h5></a>';
			}
			else{
				$title = '<h5 class="feature-box-title heading" '.$title_color.'>'.$atts['title'].'</h5>';
			}
		}

		if( !empty( $atts['value'] ) ){
			$button = '<a class="btn'.$btn_style.' btn-'.$atts['choice'].' '.$size.'" target="'.$atts['target'].'" href="'.$atts['url'].'" '.$style.'>'.$icon.$atts['value'].'</a>';
		}
		$output = '<div class="'.$atts['class'].' feature-box '.$atts['hovered'].'">'.wp_get_attachment_image( $atts['img_url'], 'full' ).'
			<div class="feature-box-content-details" '.$bg_color.'>
				<div class="feature-box-details">
					<div class="feature-box-content">
						'.$title.$button.'
					</div>
				</div>
			</div>
		</div>';

		return $output;
		
	}
	
	//pricing table
	public static function  agni_pricingtable($atts = null, $content = null){
		$atts = shortcode_atts(array(
				'featured' => '',
				'featured_style' => '1',
				'icon'  =>'ion-poidum',
				'bg_color' => '',
				'heading' => 'Normal',
				'currency' => '$',
				'price' => '100',
				'interval' => 'mo.',
				'value' => 'take it',				
				'link' => '#',
				'class' => ''
		
		), $atts, 'pricingtable' );
		$icon = $featured_style = '';
		$btn = 'btn-default';
		if( $atts['featured'] == ' pricing-recommanded' ){
			$icon = $atts['icon'];	
			$btn = 'btn-accent';
			$featured_style = 'pricing-recommanded-style-'.$atts['featured_style'];
		}
		
		$output= '<div class="'.$atts['class'].' '.$atts['featured'].' '.$featured_style.' pricing-table-content" style="background-color:'.$atts['bg_color'].';">
			<div class="pricing-cost-details">
				<h3 class="pricing-title '.$icon.'">'.$atts['heading'].'</h3>
				<h2 class="pricing-cost"><span>'.$atts['currency'].'</span>'.$atts['price'].'<span class="pricing-interval">'.$atts['interval'].'</span></h2>
			</div>
			<div class="pricing-feature-details">
				'.wpb_js_remove_wpautop($content, true).'
				<a href="'.$atts['link'].'" class="pricing-button btn btn-alt '.$btn.' btn-block">'.$atts['value'].'</a>
			</div>
		</div>';
		return $output;
	}
	
	// Milestone
	public static function  agni_milestone($atts = null, $content = null){
		$atts = shortcode_atts(array(
				'style' => '1',
				'icon' => '',
				'icon_size' => '30',
				'title' => '',
				'mile' => '',
				'mile_font_size' => '60',
				'mile_separator' => '',
				'mile_prefix' => '',
				'mile_suffix' => '',
				'align' => 'center',
				'count' => '1',
				'white' => '',
				'animation_offset' => '90%',
				'class' => ''
		
		), $atts, 'milestone' );
		
		$align = $mile_icon = '';

		if( $atts['style'] == '1' && !empty($atts['align']) ){
			$align = 'text-'.$atts['align'];
		}

		if( !empty( $atts['icon'] ) ){
			$mile_icon = '<div class="mile-icon" style="font-size: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['icon_size'] ) ? $atts['icon_size'] : $atts['icon_size'] . 'px' ) . '; '.'">
				<i class="'.$atts['icon'].'"></i>										
			</div>';
		}
		
		$output= '<div class="mile-content '.$atts['white'].' '.$align.' milestone-style-'.$atts['style'].' '.$atts['class'].'">
			'.$mile_icon.'
			<div class="mile-description">
				<div class="mile-count">
					<h3 class="count" style="font-size: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['mile_font_size'] ) ? $atts['mile_font_size'] : $atts['mile_font_size'] . 'px' ) . '; '.'" data-count="'.$atts['mile'].'" data-count-animation="'.$atts['count'].'" data-sep="'.$atts['mile_separator'].'" data-pre="'.$atts['mile_prefix'].'" data-suf="'.$atts['mile_suffix'].'" data-animation-offset="'.$atts['animation_offset'].'" >'.$atts['mile'].'</h3>
				</div>
				<div class="mile-title">
					<p>'.$atts['title'].'</p>
				</div>
			</div>
		</div>';
				
		return $output;
	}
	
	// Progress bar
	public static function  agni_progressbar($atts = null, $content = null){
		$atts = shortcode_atts(array(
			'style' => '1',
			'percentage' => '',
			'title' => '',
			'track_color' => '',
			'bar_color' => '',
			'animation_offset' => '90%',
			'class' => '',
		
		), $atts, 'progressbar' );
		
		$percent_1 = $percent_2 = $style = '';
		if( $atts['style'] == '1' ){
			$percent_1 = '<span class="progress-percentage">'.$atts['percentage'].'%</span>';
		}
		else{
			$percent_2 = '<h2 class="progress-percentage">'.$atts['percentage'].'%</h2>';
		}

		$output= '<div class="'.$atts['class'].' progress-bar-style-'.$atts['style'].'">
			'.$percent_2.'
			<div class="progress-bar-container">
				<p class="progress-heading">' . $atts['title'] . $percent_1 .'</p>
				<div class="progress" style="background-color:'.$atts['track_color'].';">
					<div class="progress-bar progress-bar-animate" style="background-color:'.$atts['bar_color'].'" role="progressbar" aria-valuenow="'.$atts['percentage'].'" aria-valuemin="0" aria-valuemax="100"  data-animation-offset="'.$atts['animation_offset'].'" >
						<span class="sr-only">'.$atts['percentage'].'% Complete</span>
					</div>
				</div>
			</div>
		</div>';
		
		return $output;
	}

	// Circle bar
	public static function  agni_circlebar($atts = null, $content = null){
		$atts = shortcode_atts(array(
			'style' => '1',
			'percentage' => '75',
			'bar_color' => '',
			'track_color' => '',
			'scale_color' => '',
			'animation' => '',
			'scale_length' => '',
			'line_width' => '4',
			'line_cap' => '',				
			'size' => '160',
			'icon' => '',
			'align' => 'center',
			'animation_offset' => '90%',
			'class' => '',
		
		), $atts, 'circlebar' );
		
		if( $atts['style'] == '1' ){
			$circle_content = '<h4 class="percent circle-bar-content"></h4>';
		}
		else{
			$circle_content = '<h4 class="circle-bar-icon circle-bar-content"><i class="'.$atts['icon'].'"></i></h4>';
		}

		$output= '<div class="'.$atts['class'].' circle-bar chart text-'.$atts['align'].'"  data-animation-offset="'.$atts['animation_offset'].'"  data-percent="'.$atts['percentage'].'" data-barcolor="'.$atts['bar_color'].'" data-trackcolor="'.$atts['track_color'].'" data-scalecolor="'.$atts['scale_color'].'" data-animation="'.$atts['animation'].'" data-scalelength="'.$atts['scale_length'].'" data-linewidth="'.$atts['line_width'].'" data-linecap="'.$atts['line_cap'].'" data-size="'.$atts['size'].'" style="width:'.$atts['size'].'px; height:'.$atts['size'].'px; line-height:'.$atts['size'].'px;">
			'.$circle_content.'
		</div>';
		
		return $output;
	}
	
	// list
	public static function agni_list( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'icon' => 'ion-ios7-check',
				'icon_style' => '',
				'radius' => '',
				'border_color' => '',
				'background_color' => '',
				'color' => '',
				'class'  => ''
			), $atts, 'lists' );
		
		$radius = $icon_style = '';
		if( !empty($atts['radius']) ){
			$radius = 'border-radius:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['radius'] ) ? $atts['radius'] : $atts['radius'] . 'px' ).';';
		}

		if( $atts['icon_style'] != '' ){
			$icon_style = 'style="'.$radius.' '.$atts['icon_style'].'-color:'.$atts[$atts['icon_style'].'_color'].'; color:'.$atts['color'].'"';
			$icon_has = 'icon-has-'.$atts['icon_style'].'';
		}
		else{
			$icon_style = 'style="color:'.$atts['color'].'"';
			$icon_has = '';
		}

		$output = str_replace( '<li>', '<li><i class="'.$atts['icon'].' '.$icon_has.'" '.$icon_style.'></i>', wpb_js_remove_wpautop($content, true) );
		return str_replace( '<ul>','<ul class="list '.$atts['class'].'">', $output );
	}

	// button
	public static function agni_button( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'value'  => 'Button',
				'icon'  => '',
				'url'        => '#',
				'target'        => '_self',
				'style'		=> '',
				'choice'       => 'default',
				'radius'	=> '',
				'size'       => '',
				'margin_top'       => '',
				'margin_bottom'       => '',
				'margin_left'       => '',
				'margin_right'       => '',
				'alignment'   => 'left',
				'class'  => ''
			), $atts, 'button' );
		
		$output = $btn_style = $style = $size = $margin = $icon = '';	

		if( $atts['icon'] != '' ){
			$icon = '<i class="'.$atts['icon'].'"></i>';
		}
		if( $atts['size'] != '' ){
			$size = 'btn-'.$atts['size'].'';	
		}
		if( $atts['style'] != '' ){
			$btn_style = ' btn-'.$atts['style'];
		}
		
		if( !empty($atts['margin_top']) || !empty( $atts['margin_bottom'] ) || !empty( $atts['margin_left'] ) || !empty( $atts['margin_right'] ) ){
			$margin .= 'margin-top: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['margin_top'] ) ? $atts['margin_top'] : $atts['margin_top'] . 'px' ) . '; ';
			$margin .= 'margin-bottom: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['margin_bottom'] ) ? $atts['margin_bottom'] : $atts['margin_bottom'] . 'px' ) . '; ';
			$margin .= 'margin-left: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['margin_left'] ) ? $atts['margin_left'] : $atts['margin_left'] . 'px' ) . '; ';
			$margin .= 'margin-right: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['margin_right'] ) ? $atts['margin_right'] : $atts['margin_right'] . 'px' ) . '; ';
		}
		$radius = '';
		if( !empty($atts['radius']) ){
			$radius = 'border-radius:'.( preg_match( '/(px|em|\%|pt|cm)$/', $atts['radius'] ) ? $atts['radius'] : $atts['radius'] . 'px' ).';';
		}
		if( $margin != '' || $radius != '' ){
			$style = 'style="'.$margin.$radius.'"';
		}

		$output = '<div class="'.$atts['class'].' text-'.$atts['alignment'].'"><a class="btn'.$btn_style.' btn-'.$atts['choice'].' '.$size.'" target="'.$atts['target'].'" href="'.$atts['url'].'" '.$style.'>'.$icon.$atts['value'].'</a></div>';
		
		return $output;
	}
	
	// Alerts
	public static function agni_alerts( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'choice' => 'success',
				'dismissable' => '',
				'class' => ''
			), $atts, 'alerts' );
			
		if($atts['dismissable'] == 'yes'){
			$output = '<div class="'.$atts['class'].' alert alert-'.$atts['choice'].' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.wpb_js_remove_wpautop($content, true).'</div>';	
		}
		else{
			$output = '<div class="'.$atts['class'].' alert alert-'.$atts['choice'].'">'.wpb_js_remove_wpautop($content, true).'</div>';	
		}
		
		return $output;
	}
	
	// Image
	public static function agni_image( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'img_url' => '',
			'img_size' => 'full',
			'img_caption' => '',
			'alignment' => 'left',
			'img_style' => '',
			'radius' => '',
			'background_color' => '',
			'border_color' => '',
			'img_link' => '',
			'img_custom_link' => '',
			'img_custom_link_target' => '',
			'animation' => '',
			'animation_delay' => '',
			'animation_duration' => '',
			'animation_offset' => '',
			'parallax' => '',
			'parallax_start' => 'transform:translateY(0px);',
			'parallax_end' => 'transform:translateY(-100px);',
			'class' => ''
		), $atts, 'image' );

		$img_link = $lightbox = $img_style = '';
		$animation = $atts['animation'];
		$animation_delay = $atts['animation_delay'];
		$animation_duration = $atts['animation_duration'];
		$animation_offset = $atts['animation_offset'];

		$background_color = ( !empty($atts['background_color']) ) ? 'background-color: ' . $atts['background_color'] . '; ' : '';
		$border_color = ( !empty($atts['border_color']) ) ? 'border-color: ' . $atts['border_color'] . '; ' : '';
		$radius = ( !empty($atts['radius']) ) ? 'border-radius: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $atts['radius'] ) ? $atts['radius'] : $atts['radius'] . 'px' ) . '; ' : '';

		if( $atts['img_style'] !== '' ){
			$img_style = 'image-has-'.$atts['img_style'].'';
		}

		$img_id = preg_replace( '/[^\d]/', '', $atts['img_url'] );
		
		$img = wpb_getImageBySize( array(
			'attach_id' => $img_id,
			'thumb_size' => $atts['img_size'],
			'class' => 'fullwidth-image attachment-'.$atts['img_size'] .' '. $img_style.''
		) );
		
		if( $atts['img_link'] == '4' ){
			$img_link = $atts['img_custom_link'];
		}
		else{
			$img_link = wp_get_attachment_url( $atts['img_url'] );
		}	

		if( $atts['img_link'] == '3' ){
			$lightbox = 'class="custom-image"';
		}

		$html = $img['thumbnail'];


		$img['thumbnail'] = str_replace( '<img ', '<img style="'.$radius. $border_color . $background_color .'" ', $img['thumbnail'] );
		if( $atts['img_link'] != '1' ){
			$html = '<a href="'.$img_link.'" '.$lightbox.' target="'.$atts['img_custom_link_target'].'">'.$img['thumbnail'].'</a>';
		}
		else{
			$html = '<a>'.$img['thumbnail'].'</a>';
		}
		
		if ( !empty($atts['img_caption']) ) {
			$post = get_post( $img_id );
			$caption = $post->post_excerpt;
			$html = '
				<figure class="agni-image-figure">
					' . $html . '
					<figcaption class="vc_figure-caption">' . esc_html( $caption ) . '</figcaption>
				</figure>
			';
		}

		$output = '<div class="'.$atts['class'].' agni-image custom-image-container text-'.$atts['alignment'].'"><div class="wpb_wrapper">';
		if( !empty($animation) ){
			$output .= '<div class="animate" data-animation="'.$animation.'" data-animation-offset="'.$animation_offset.'" style="animation-duration: '.$animation_duration.'s; 	animation-delay: '.$animation_delay.'s; 	-moz-animation-duration: '.$animation_duration.'s; 	-moz-animation-delay: '.$animation_delay.'s; 	-webkit-animation-duration: '.$animation_duration.'s; 	-webkit-animation-delay: '.$animation_delay.'s; ">';	
		}
		if( $atts['parallax'] == '1' ){
			$output .= '<div class="image-has-parallax" data-bottom-top="'.$atts['parallax_start'].'" data-top-bottom="'.$atts['parallax_end'].'">';
		}
		$output .= $html;
		if( $atts['parallax'] == '1' ){
			$output .= '</div>';
		}
		if( !empty($animation) ){
			$output .= '</div>';	
		}
		$output .= '</div></div>';

		return $output;
	}
	
	// Gallery
	public static function agni_gallery( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'img_url' => '',
			'img_size' => 'full',
			'img_caption' => '',
			'lightbox' =>'',
			'no_gutter' =>'',
			'type' => '2',
			'column' => '3',
			'gallery_autoplay' => '1',
			'gallery_autoplay_timeout' => '5000',
			'gallery_autoplay_hover' => '1',
			'gallery_loop' => '1',
			'gallery_pagination' => '1',
			'width' => '1/1',
			'offset' => '',
			'class'  => ''
		), $atts, 'gallery' );
		
		if( !empty($atts['no_gutter']) ){
			$gallery_margin = '0';
		}
		else{
			$gallery_margin = '30';
		}

		if( $atts['type'] == '1' ){
			switch( $atts['column'] ){
				case '1' :
					$column = 'data-gallery-0="1" data-gallery-768="1" data-gallery-992="1" data-gallery-1200="1"';
					break;
				case '2' :
					$column = 'data-gallery-0="1" data-gallery-768="1" data-gallery-992="2" data-gallery-1200="2"';
					break;
				case '3' :
					$column = 'data-gallery-0="1" data-gallery-768="2" data-gallery-992="3" data-gallery-1200="3"';
					break;
				case '4' :
					$column = 'data-gallery-0="1" data-gallery-768="3" data-gallery-992="4" data-gallery-1200="4"';
					break;
				case '5' :
					$column = 'data-gallery-0="2" data-gallery-768="4" data-gallery-992="5" data-gallery-1200="5"';
					break;
				case '6' :
					$column = 'data-gallery-0="2" data-gallery-768="4" data-gallery-992="6" data-gallery-1200="6"';
					break;
			}
			$width = '';
			$carousel_class = 'carousel-gallery';
			$gallery_autoplay = ( $atts['gallery_autoplay'] == '1' )?'true':'false';
			$gallery_autoplay_timeout = $atts['gallery_autoplay_timeout'];
			$gallery_autoplay_hover = ( $atts['gallery_autoplay_hover'] == '1' )?'true':'false';
			$gallery_loop = ( $atts['gallery_loop'] == '1' )?'true':'false';
			$gallery_pagination = ( $atts['gallery_pagination'] == '1' )?'true':'false';
			$carousel_settings =  'data-gallery-margin='.$gallery_margin.' data-gallery-autoplay='.$gallery_autoplay.' data-gallery-autoplay-timeout='.$gallery_autoplay_timeout.' data-gallery-autoplay-hover='.$gallery_autoplay_hover.' data-gallery-loop='.$gallery_loop.' data-gallery-pagination='.$gallery_pagination.' ';
		}
		else{
			$width = wpb_translateColumnWidthToSpan($atts['width']);
			$width = vc_column_offset_class_merge($atts['offset'], $width);
			$column = $carousel_class = $gallery_autoplay = $gallery_autoplay_timeout = $gallery_autoplay_hover = $gallery_loop = $gallery_pagination = $carousel_settings = '';
		}
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width .' custom-gallery-item ' , 'agni_gallery', $atts );
		
		if( $atts['lightbox'] == 'custom-gallery'){
			$atts['lightbox'] = 'class="'.$atts['lightbox'].'"';
		}
		$slides = explode(",", $atts['img_url']);
	
		$src1 = $caption = '';
		foreach( (array) $slides as $key => $slide ){
			$attachment_image = get_post( $slide );
			if ( !empty($atts['img_caption']) ) {
				$attachment_info = get_post( $slide );
				$caption = '<figcaption>'.$attachment_info->post_excerpt.'</figcaption>';
			}
			$src1 .= '<div class="'.$css_class.'"><figure class="agni-gallery-figure"><a href="'.wp_get_attachment_url( $slide ).'">'. wp_get_attachment_image( $slide, $atts['img_size'] ).'</a>'.$caption.'</figure></div>';
		
		}
		
		$output = '<div '.$atts['lightbox'].'><div class="row '.$atts['no_gutter'].' '.$carousel_class.' '. $atts['class'].'" '.$carousel_settings.$column.'>'.$src1.'</div></div>';
			
		return $output;
	}
	
	
	// video
	public static function agni_video( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'video_type' => '1',
				'youtube_height' => '360',
				'url' => '#',
				'fallback' => '',
				'overlay_opacity' => '0.6',
				'auto_play' => 'true',
				'loop' => 'true',
				'vol' => '50',
				'mute' => 'true',
				'start_at' => '0',
				'stop_at' => '30',
				'quality' => 'default',
				'self_url' => '#',
				'self_poster' => '',
				'self_player' => '1',
				'self_auto_play' => 'on',
				'self_loop' => 'on',
				'self_mute' => 'on',
				'self_preload' => 'metadata',
				'iframe_url' => '#',
				'iframe_style' => '1',
				'button_value'  => 'Button',
				'icon'  => '',
				'button_style'		=> '',
				'button_choice'       => 'default',
				'button_radius'	=> '',
				'button_size'       => '',
				'button_alignment'   => 'left',
				'size' =>'32',
				'icon_style' => '',
				'width' =>'72',
				'height' => '72',
				'radius' => '50%',
				'border_color' => '#000000',
				'background_color' => '#f0f1f2',
				'color' => '#000000',
				'hover_icon_style' => '',
				'hover_radius' => '50%',
				'hover_border_color' => '#000000',
				'hover_background_color' => '#22e3e5',
				'hover_color' => '#ffffff', 
				'margin_top'       => '',
				'margin_bottom'       => '',
				'margin_left'       => '',
				'margin_right'       => '',
				'embed' => '',
				'class'  => '',
				'id'  => ''
			), $atts, 'video' );
			$id = '';
			if( $atts['auto_play'] != 'true' ){
				$atts['auto_play'] = 'false';
			}
			if( $atts['loop'] != 'true' ){
				$atts['loop'] = 'false';
			}
			if( $atts['mute'] != 'true' ){
				$atts['mute'] = 'false';
			}
			if( !empty($atts['id']) ){
				$id = 'id="'.$atts['id'].'"';
			}


			if( $atts['video_type'] == '1' ){
				$height = '';
				if( $atts['height'] != '' ){
					$height = 'style="height:'.$atts['youtube_height'].'px"';
				}
				$output = '<div class="'.$atts['class'].' section-video-container section-video-container-'.$atts['id'].'" '.$height.'>
					<a '.$id.' class="player" data-property="{videoURL:\''.$atts['url'].'\', containment:\'.section-video-container-'.$atts['id'].' \', showControls:false, autoPlay:'.$atts['auto_play'].', loop:'.$atts['loop'].', vol:'.$atts['vol'].', mute:'.$atts['mute'].', startAt:'.$atts['start_at'].', stopAt:'.$atts['stop_at'].', opacity:1, addRaster:false, optimizeDisplay:true, quality:\''.$atts['quality'].'\'}" style="background-image:url(\' '.wp_get_attachment_url( $atts['fallback'] ).' \')"></a>
					<div class="overlay" style="opacity:'.$atts['overlay_opacity'].'"></div>
					<div class="section-video-controls">
						<a class="command command-play" href="#"></a>
						<a class="command command-pause" href="#"></a>
					</div>
				</div>';
			}
			elseif( $atts['video_type'] == '2' ){
				$autoplay = $loop = $muted = '';
				if( $atts['self_player'] == '1' ){
					if( $atts['self_auto_play'] == 'on' ){
						$autoplay = 'autoplay ';
					}
					if( $atts['self_loop'] == 'on' ){
						$loop = 'loop ';
					}
					if( $atts['self_mute'] == 'on' ){
						$muted = 'muted ';
					}
					$output = '<div '.$id.' class="'.$atts['class'].' custom-video self-hosted embed-responsive embed-responsive-16by9">
						<video '. $autoplay . $loop . $muted . ' class="custom-self-hosted-video" poster="'.wp_get_attachment_url( $atts['self_poster'] ).'">
							<source src="'.$atts['self_url'].'" type="video/mp4">
						</video>
					</div>';
				}
				else{
					if( $atts['self_auto_play'] == 'on' ){
						$autoplay = 'autoplay = "on"';
					}
					if( $atts['self_loop'] == 'on' ){
						$loop = 'loop = "on"';
					}
					$output = do_shortcode('[video src="'.$atts['self_url'].'" '.$autoplay.' '.$loop.' preload="'.$atts['self_preload'].'" ]');
				}
				
			}
			elseif( $atts['video_type'] == '3' ){
				if( $atts['iframe_style'] == '1' ){
					$output = do_shortcode('[agni_button value="'.$atts['button_value'].'" icon="'.$atts['icon'].'" url="'.$atts['iframe_url'].'" size="'.$atts['button_size'].'" style="'.$atts['button_style'].'" choice="'.$atts['button_choice'].'" radius="'.$atts['button_radius'].'" alignment="'.$atts['button_alignment'].'" margin_top="'.$atts['margin_top'].'" margin_bottom="'.$atts['margin_bottom'].'" margin_right="'.$atts['margin_right'].'" margin_left="'.$atts['margin_left'].'" class="'.$atts['class'].' custom-video-link cutom-iframe-style-'.$atts['iframe_style'].'" ]');
				}
				else{
					$output = '<div class="'.$atts['class'].' custom-video-link custom-iframe-style-'.$atts['iframe_style'].'"><a href="'.$atts['iframe_url'].'">'.do_shortcode( '[agni_icon icon="'.$atts['icon'].'" size="'.$atts['size'].'" icon_style="'.$atts['icon_style'].'" width="'.$atts['width'].'" height="'.$atts['height'].'" radius="'.$atts['radius'].'" border_color="'.$atts['border_color'].'" background_color="'.$atts['background_color'].'" color="'.$atts['color'].'" hover_icon_style="'.$atts['hover_icon_style'].'" hover_radius="'.$atts['hover_radius'].'" hover_border_color="'.$atts['hover_border_color'].'" hover_background_color="'.$atts['hover_background_color'].'" hover_color="'.$atts['hover_color'].'" ]' ).'</a></div>';
				}
			} 
			else{
				$output = '<div '.$id.' class="'.$atts['class'].' custom-video embed-responsive embed-responsive-16by9">
					'.trim( vc_value_from_safe( $atts['embed'] ) ).'
				</div>	' ;	
			}
		return $output;
	}
	
	
	// gmap
	public static function agni_gmap( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style'     => '1',
				'color' => '#22e3e5',
				'drag' => '',
				'height'     => '400',
				'google_map_icon' => '',
				'google_map_lng' => '',
				'google_map_lat' => '',
				'google_address_1' => '',
				'google_address_2' => '',
				'google_address_3' => '',
				'google_map_lng_2' => '',
				'google_map_lat_2' => '',
				'google_address_1_2' => '',
				'google_address_2_2' => '',
				'google_address_3_2' => '',
				'zoom' => '16',
				'id' => '',
				'class' => ''
			), $atts, 'gmap' );		
			
			$map_icon = ( !empty($atts['google_map_icon']) ) ? wp_get_attachment_url($atts['google_map_icon']) : get_template_directory_uri().'/img/marker.png';
			$id = ( !empty($atts['id']) ) ? $atts['id'] : 'map_canvas';
			
			$output = '<div id="'.$id.'" class="map-canvas '.$atts['class'].' map-canvas-style-'.$atts['style'].'" style="height:'.$atts['height'].'px" data-map-style="'.$atts['style'].'" data-map-accent-color="'.$atts['color'].'" data-map-drag="'.$atts['drag'].'" data-map-zoom = "'.$atts['zoom'].'" data-map="'.$map_icon.'" data-lng="'.$atts['google_map_lng'].'" data-lat="'.$atts['google_map_lat'].'" data-add1="'.$atts['google_address_1'].'" data-add2="'.$atts['google_address_2'].'" data-add3="'.$atts['google_address_3'].'" data-lng-2="'.$atts['google_map_lng_2'].'" data-lat-2="'.$atts['google_map_lat_2'].'" data-add1-2="'.$atts['google_address_1_2'].'" data-add2-2="'.$atts['google_address_2_2'].'" data-add3-2="'.$atts['google_address_3_2'].'" data-dir="'.get_template_directory_uri().'"></div>';
			
		return $output;
	}

	// countdown
	public static function agni_countdown( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'date'     => '20 January 2016 10:45:00',
				'class' => ''
			), $atts, 'countdown' );		
			
			$output = '<ul class="countdown list-inline '.$atts['class'].'" data-counter="'.$atts['date'].'" >
                <li class="col-xs-12 col-sm-6 col-md-3">
					<h2 class="days">00</h2>
					<p class="timeRefDays"></p>
				</li>
				<li class="col-xs-12 col-sm-6 col-md-3">
					<h2 class="hours">00</h2>
					<p class="timeRefHours"></p>
				</li>
				<li class="col-xs-12 col-sm-6 col-md-3">
					<h2 class="minutes">00</h2>
					<p class="timeRefMinutes"></p>
				</li>
				<li class="col-xs-12 col-sm-6 col-md-3">
					<h2 class="seconds">00</h2>
					<p class="timeRefSeconds"></p>
				</li>
            </ul>';
			
		return $output;
	}
	
	//team
	public static function agni_team($atts=null, $content=null){
		$atts = shortcode_atts( array(
				'posts' => '-1',
				'order' => 'DESC',
				'order_by' => 'date',
				'team_categories' => '',
				'style' => '1',
				'type' => '1',
				'column' => '3',
				'team_autoplay' => '1',
				'team_autoplay_timeout' => '5000',
				'team_autoplay_hover' => '1',
				'team_loop' => '1',
				'team_pagination' => '1',
				'class' => ''
			), $atts, 'team' );			
		
		
		global $no_posts, $style, $team_cat, $extra_class, $team_autoplay, $team_autoplay_timeout, $team_autoplay_hover, $team_loop, $team_pagination, $type, $column, $order, $orderby;
			
		$team_categories = $atts['team_categories'] ;
		
		if(!empty($team_categories)){		
			$team_cat = array(array(
				'taxonomy' => 'team_types',
				'field' => 'slug',
				'terms' =>  explode( ',', $team_categories ) ) );
		}
		if( $atts['type'] == '1' ){
			switch( $atts['column'] ){
				case '2' :
					$column = 'data-team-0="1" data-team-768="1" data-team-992="2" data-team-1200="2"';
					break;
				case '3' :
					$column = 'data-team-0="1" data-team-768="2" data-team-992="3" data-team-1200="3"';
					break;
				case '4' :
					$column = 'data-team-0="1" data-team-768="3" data-team-992="4" data-team-1200="4"';
					break;
			}
		}
		else{
			switch( $atts['column'] ){
				case '2' :
					$column = 'col-xs-12 col-sm-12 col-md-6';
					break;
				case '3' :
					$column = 'col-xs-12 col-sm-6 col-md-4';
					break;
				case '4' :
					$column = 'col-xs-12 col-sm-4 col-md-3';
					break;
			}
		}
		
		$style = $atts['style'];
		$order = $atts['order'];
		$orderby = $atts['order_by'];
		$type = $atts['type'];
		$no_posts = $atts['posts'];
		$team_autoplay = ( $atts['team_autoplay'] == '1' )?'true':'false';
		$team_autoplay_timeout = $atts['team_autoplay_timeout'];
		$team_autoplay_hover = ( $atts['team_autoplay_hover'] == '1' )?'true':'false';
		$team_loop = ( $atts['team_loop'] == '1' )?'true':'false';
		$team_pagination = ( $atts['team_pagination'] == '1' )?'true':'false';
		$extra_class = $atts['class'];
		
		ob_start(); 
		
			get_template_part( 'template-parts/content', 'team' );  
	
		$output = ob_get_contents();		
		ob_end_clean();
		
		return $output ;
	}
	
	//Clients	
	public static function agni_clients($atts=null, $content=null){
		$atts = shortcode_atts( array(
			'posts' => '-1',
			'order' => 'DESC',
			'order_by' => 'date',
			'client_categories'	=> '',
			'style' => '1',
			'type' => '1',
			'column' => '4',
			'clients_autoplay' => '1',
			'clients_autoplay_timeout' => '4000',
			'clients_autoplay_hover' => '1',
			'clients_loop' => '1',
			'clients_pagination' => '1',
			'class' => ''
		), $atts, 'clients' );
		
		global $no_posts, $client_cat, $extra_class, $clients_autoplay, $clients_autoplay_timeout, $clients_autoplay_hover, $clients_loop, $clients_pagination, $style, $type, $column, $order, $orderby;
		
		$client_categories = $atts['client_categories'] ;
		if(!empty($client_categories)){
		$client_cat = array( array(
			'taxonomy' => 'client_types',
			'field' => 'slug',
			'terms' =>  explode( ',', $client_categories )  ) ) ;
			
		}
		if( $atts['type'] == '1' ){
			switch( $atts['column'] ){
				case '2' :
					$column = 'data-client-0="1" data-client-768="1" data-client-992="2" data-client-1200="2"';
					break;
				case '3' :
					$column = 'data-client-0="1" data-client-768="2" data-client-992="3" data-client-1200="3"';
					break;
				case '4' :
					$column = 'data-client-0="1" data-client-768="3" data-client-992="4" data-client-1200="4"';
					break;
			}
		}
		else{
			switch( $atts['column'] ){
				case '2' :
					$column = 'col-xs-12 col-sm-12 col-md-6';
					break;
				case '3' :
					$column = 'col-xs-12 col-sm-6 col-md-4';
					break;
				case '4' :
					$column = 'col-xs-12 col-sm-4 col-md-3';
					break;
			}
		}
		$style = $atts['style'];
		$order = $atts['order'];
		$orderby = $atts['order_by'];
		$type = $atts['type'];
		$no_posts = $atts['posts'];
		$clients_autoplay = ( $atts['clients_autoplay'] == '1' )?'true':'false';
		$clients_autoplay_timeout = $atts['clients_autoplay_timeout'];
		$clients_autoplay_hover = ( $atts['clients_autoplay_hover'] == '1' )?'true':'false';
		$clients_loop = ( $atts['clients_loop'] == '1' )?'true':'false';
		$clients_pagination = ( $atts['clients_pagination'] == '1' )?'true':'false';
		$extra_class = $atts['class'];
				
		ob_start(); 
		
    		get_template_part( 'template-parts/content', 'clients' );
			
        $output = ob_get_contents();
        ob_end_clean();
		
		return $output ;
	}
	
	//Testimonials	
	public static function agni_testimonials($atts=null, $content=null){
		$atts = shortcode_atts( array(
			'posts' => '-1',
			'testimonial_categories'	=> '',
			'circle_avatar' => '',
			'alignment' => 'left',
			'order' => 'DESC',
			'order_by' => 'date',
			'type' => '1',
			'column' => '1',
			'class' => '',				
			'testimonial_autoplay' => '1',
			'testimonial_autoplay_timeout' => '4000',
			'testimonial_autoplay_hover' => '1',
			'testimonial_autoplay_speed' => '700',
			'testimonial_loop' => '1',
			'testimonial_pagination' => '1',
			'class' => ''
		), $atts, 'testimonials' );	
		
		global $no_posts, $extra_class, $quote_cat, $testimonial_autoplay, $testimonial_autoplay_timeout, $testimonial_autoplay_speed, $testimonial_autoplay_hover, $testimonial_loop, $testimonial_pagination, $type, $column, $order, $orderby, $circle_avatar, $alignment;
		
		$testimonial_categories = $atts['testimonial_categories'] ;
		if(!empty($testimonial_categories)){
		$quote_cat = array( array(
			'taxonomy' => 'quote_types',
			'field' => 'slug',
			'terms' =>  explode( ',', $testimonial_categories )  ) ) ;
		}
		if( $atts['type'] == '1' ){
			switch( $atts['column'] ){
				case '1' :
					$column = 'data-test-0="1" data-test-768="1" data-test-992="1" data-test-1200="1"';
					break;
				case '2' :
					$column = 'data-test-0="1" data-test-768="1" data-test-992="2" data-test-1200="2"';
					break;
				case '3' :
					$column = 'data-test-0="1" data-test-768="2" data-test-992="3" data-test-1200="3"';
					break;
			}
		}
		else{
			switch( $atts['column'] ){
				case '1' :
					$column = 'col-xs-12 col-sm-12 col-md-12';
					break;
				case '2' :
					$column = 'col-xs-12 col-sm-12 col-md-6';
					break;
				case '3' :
					$column = 'col-xs-12 col-sm-6 col-md-4';
					break;
			}
		}
		
		$order = $atts['order'];
		$orderby = $atts['order_by'];
		$type = $atts['type'];
		$no_posts = $atts['posts'];
		$circle_avatar = ( $atts['circle_avatar'] == '1' )? 'img-circle' : '';
		$alignment = $atts['alignment'];
		$testimonial_autoplay = ( $atts['testimonial_autoplay'] == '1' )?'true':'false';
		$testimonial_autoplay_timeout = $atts['testimonial_autoplay_timeout'];
		$testimonial_autoplay_speed = $atts['testimonial_autoplay_speed'];
		$testimonial_autoplay_hover = ( $atts['testimonial_autoplay_hover'] == '1' )?'true':'false';
		$testimonial_loop = ( $atts['testimonial_loop'] == '1' )?'true':'false';
		$testimonial_pagination = ( $atts['testimonial_pagination'] == '1' )?'true':'false';
		$extra_class = $atts['class'];
		
		ob_start(); 
		
			get_template_part( 'template-parts/content', 'testimonials' );  
			
		$output = ob_get_contents();
        
        ob_end_clean();
		
		return $output ;
	}
	
	// Custom slider
	public static function agni_custom_slider( $atts = null, $content = null ) {
		$return = '';
		$atts = shortcode_atts( array(
			'source'     => '',
			'caption'	=> '',
			'custom_slider_autoplay' => '1',
			'custom_slider_autoplay_timeout' => '4000',
			'custom_slider_autoplay_hover' => '1',
			'custom_slider_autoplay_speed' => '700',
			'custom_slider_loop' => '1',
			'custom_slider_pagination' => '1',
			'class'      => ''
		), $atts, 'custom-slider' );
		// Get slides
		
		$slides = explode(",", $atts['source']);
		
		$custom_slider_autoplay = ( $atts['custom_slider_autoplay'] == '1' )?'true':'false';
		$custom_slider_autoplay_timeout = $atts['custom_slider_autoplay_timeout'];
		$custom_slider_autoplay_speed = $atts['custom_slider_autoplay_speed'];
		$custom_slider_autoplay_hover = ( $atts['custom_slider_autoplay_hover'] == '1' )?'true':'false';
		$custom_slider_loop = ( $atts['custom_slider_loop'] == '1' )?'true':'false';
		$custom_slider_pagination = ( $atts['custom_slider_pagination'] == '1' )?'true':'false';

		$src1 = null;
		foreach( (array) $slides as $key => $slide ){
			//$src1 .= '<div>'. wp_get_attachment_image( $slide, 'full').'</div>';

			if ( $atts['caption'] == 'has-caption' ) {
				$post = get_post( $slide );
				$caption = $post->post_excerpt;
				$src1 .= '
					<figure class="agni-image-figure">
						' . wp_get_attachment_image( $slide, 'full') . '
						<figcaption class="vc_figure-caption">' . esc_html( $caption ) . '</figcaption>
					</figure>
				';
			}
			else{
				$src1 .= '
					<figure class="agni-image-figure">
						' . wp_get_attachment_image( $slide, 'full') . '
					</figure>
				';
			}
		
		}
		?><?php 
		$output ='<div id="custom-slider-'.get_the_ID().'" class="'.$atts['class'].' slider custom-slider '.$atts['caption'].'" data-custom-slider-autoplay=\''.$custom_slider_autoplay.'\' data-custom-slider-autoplay-timeout=\''.$custom_slider_autoplay_timeout.'\' data-custom-slider-autoplay-speed=\''.$custom_slider_autoplay_speed.'\' data-custom-slider-autoplay-hover=\''.$custom_slider_autoplay_hover.'\' data-custom-slider-loop=\''.$custom_slider_loop.'\' data-custom-slider-pagination=\''.$custom_slider_pagination.'\' >
					'.$src1.'															
				</div>';
		
		return $output;
	}
	
	// Post & portfolio post type
	public static function agni_posts( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;
		// Parse attributes
		$atts = shortcode_atts( array(
			'posttype'	=> 'post',
			'blog_layout'	=> 'standard',
			'blog_carousel_layout'	=> 'modern',
			'blog_carousel_fullwidth' => '',
			'carousel_column' => '3',
			//'blog_gutter' => '',
			'blog_grid_layout'	=> 'fitRows',
			'blog_sidebar'	=> 'has-sidebar',
			'blog_categories'	=> '',
			
			'portfolio_layout' => '3',
			'portfolio_fullwidth' => '',
			'portfolio_gutter' => '',
			'portfolio_grid' => 'fitRows',
			'portfolio_magnific_preloader_style' => '1',
			'portfolio_hover_style' => '1',
			'portfolio_bottom_caption' => '',
			'portfolio_filter'	=> '',
			'portfolio_filter_order_by'  => 'name',
			'portfolio_filter_order'  => 'ASC',
			'portfolio_filter_align'	=> 'left',	
			'portfolio_categories'	=> '',

			'posts_per_page'	=> '5',
			'order'	=> 'DESC',
			'order_by'	=> 'date',
			'pagination'	=> '0',
			'post_not_in'	=>'',
			'ignore_sticky'	=>'',

			'posttype_autoplay' => '1',
			'posttype_autoplay_timeout' => '4000',
			'posttype_autoplay_hover' => '1',
			'posttype_autoplay_speed' => '700',
			'posttype_loop' => '1',
			'posttype_pagination' => '1',

			'animation' => '',
			'animation_style' => 'fadeInUp',
			'animation_offset' => '90',
		), $atts, 'posts' );
		
		$tax_args = $carousel = $blog_cat = '';

		$ignore_sticky = $atts['ignore_sticky'];
		$order = sanitize_key( $atts['order'] );
		$orderby = sanitize_key( $atts['order_by'] );
		$post_type = $atts['posttype'] ;
		$posts_per_page = $atts['posts_per_page'];
		$blog_categories = $atts['blog_categories'] ;
		$portfolio_categories = $atts['portfolio_categories'] ;
		$exclude_ids = explode( ',', $atts['post_not_in'] );

		//$blog_gutter = $atts['blog_gutter'];
		$posttype_autoplay = ( $atts['posttype_autoplay'] == '1' )?'true':'false';
		$posttype_autoplay_timeout = $atts['posttype_autoplay_timeout'];
		$posttype_autoplay_speed = $atts['posttype_autoplay_speed'];
		$posttype_autoplay_hover = ( $atts['posttype_autoplay_hover'] == '1' )?'true':'false';
		$posttype_loop = ( $atts['posttype_loop'] == '1' )?'true':'false';
		$posttype_pagination = ( $atts['posttype_pagination'] == '1' )?'true':'false';

		switch( $atts['carousel_column'] ){
			case '1' :
				$column = 'data-post-0="1" data-post-768="1" data-post-992="1" data-post-1200="1"';
				break;
			case '2' :
				$column = 'data-post-0="1" data-post-768="1" data-post-992="2" data-post-1200="2"';
				break;
			case '3' :
				$column = 'data-post-0="1" data-post-768="2" data-post-992="3" data-post-1200="3"';
				break;
			case '4' :
				$column = 'data-post-0="1" data-post-768="2" data-post-992="3" data-post-1200="4"';
				break;
			case '5' :
				$column = 'data-post-0="1" data-post-768="2" data-post-992="4" data-post-1200="5"';
				break;
		}
		
		if( $atts['posttype'] == 'carousel-post' ){
			$post_type = 'post';
		}
		elseif ($atts['posttype'] == 'carousel-portfolio') {
			$post_type = 'portfolio';
		}
		else{
			$post_type = $atts['posttype'];
		}

		global $category;
		if( $post_type == 'portfolio' ){
			$category = $portfolio_categories;	
		}
		else{
			$category = $blog_categories;
		}
		// Set up initial query for post
		
		if( $atts['pagination'] != '0' ){
			if( get_query_var('paged') != '' ){
				$paged = get_query_var('paged');
			}
			elseif( get_query_var('page') != '' ){
				$paged = get_query_var('page');
			}
			else{
				$paged = 1;
			}
		}
		else{
			$paged = '';
		}
		
		
		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $portfolio_categories ) && $post_type == 'portfolio' ) {
						
			$tax_args = array( array(
				'taxonomy' => 'types',
				'field' => 'slug',
				'terms' =>  explode( ',', $category )  ) ) ;
			
		}
		else{
			$blog_cat = $category;
				
		}
		$args = array(
			'category_name'  => $blog_cat,
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => $post_type,
			'posts_per_page' => $posts_per_page,
			'post__not_in'   => $exclude_ids,
			'ignore_sticky_posts' => $ignore_sticky,	
            'paged'=> $paged,
			'tax_query' => $tax_args
		);
		
		
		global $post;
		
		// Save original posts
		global $shortcodeposts, $cookie_options;
		$original_posts = $shortcodeposts;
		// Query posts
		$shortcodeposts = new WP_Query( $args );
		// Buffer output
		ob_start();
		
		if( $atts['posttype'] == 'portfolio' ){ ?>
        	<?php 
				switch($atts['portfolio_layout']){
			        case '1':
			            $col = 'col-xs-12 col-sm-12 col-md-12';
			            break;
			        case '2':
			            $col = 'col-xs-12 col-sm-12 col-md-6';
			            break;
			        case '3':
			            $col = 'col-xs-12 col-sm-6 col-md-4';
			            break;
			        case '4':
			            $col = 'col-xs-12 col-sm-6 col-md-3';
			            break;
			        case '5':
			            $col = 'col-xs-12 col-sm-4 col-md-3 col-lg-2_5';
			            break;
			    }

			?>
		    <div class="page-portfolio  shortcode-page-portfolio content-area" data-magnific-preloader-choice="<?php echo esc_attr($atts['portfolio_magnific_preloader_style']); ?>" data-magnific-prev="<?php echo esc_attr($cookie_options['portfolio-single-prev']); ?>" data-magnific-next="<?php echo esc_attr($cookie_options['portfolio-single-next']); ?>">
		        <div class="page-portfolio-container container<?php if( $atts['portfolio_fullwidth'] == '1' ){ echo '-fluid '; } ?><?php if( $atts['pagination'] != '2'){ echo ' has-infinite-scroll '; }?><?php if( $atts['pagination'] == '4'){ echo ' has-load-more'; }?> site-main" role="main" data-dir="<?php echo AGNI_FRAMEWORK_URL; ?>">
		            <?php if( $atts['portfolio_filter'] == '1' ){ ?><div class="portfolio-filter <?php if( $atts['portfolio_fullwidth'] == '1' ){ echo 'container-fluid '; } ?> text-<?php echo esc_attr($atts['portfolio_filter_align']); ?>"><?php echo agni_portfolio_filter( $atts['portfolio_filter_order'], $atts['portfolio_filter_order_by'] ); ?></div><?php } ?>
		            <div class="row portfolio-container <?php if( $atts['portfolio_fullwidth'] == '1' ){ echo 'portfolio-fullwidth '; } ?><?php if( $atts['portfolio_gutter'] != '1' ){ echo 'portfolio-no-gutter'; } ?><?php if( $atts['pagination'] != '2'){ echo ' has-infinite-scroll '; }?>" data-grid="<?php echo esc_attr($atts['portfolio_grid']); ?>">
		                <?php $i = $ad = 0; if ( $shortcodeposts->have_posts() ) :
		                    while ( $shortcodeposts->have_posts() ) : $shortcodeposts->the_post(); 

		                        $portfolio_thumbnail_width = esc_attr( get_post_meta( $post->ID, 'portfolio_thumbnail_width', true ) );
		                        $portfolio_custom_link = esc_url( get_post_meta( $post->ID, 'portfolio_custom_link', true ) );
		                        
		                        $portfolio_category_list = $portfolio_category = '';
		                        $terms = get_the_terms( $post->ID, 'types' );
		                        if ( $terms && ! is_wp_error( $terms ) ) :
		                            foreach ( $terms as $term )
		                            {
		                                $portfolio_category .= strtolower($term->slug).' ';//strtolower($term->name).' ';
		                                $portfolio_category_list .= '<li>'.$term->name.'</li>';
		                            }
		                        endif;
		                        
		                        if( $portfolio_thumbnail_width == 'width2x' ){
		                            $i += 1;
		                        }
		                        if( $i >= $atts['portfolio_layout'] ){
		                            $ad = $i = 0;
		                        }
		                        $ad += 0.2;
		                        $i += 1;

		                        ?><div class="<?php echo $col; ?> portfolio-column <?php echo $portfolio_thumbnail_width; ?> <?php echo $portfolio_category; ?>all portfolio-hover-style-<?php echo esc_attr($atts['portfolio_hover_style']); ?> <?php if( $atts['portfolio_bottom_caption'] == '1' ){ echo 'has-bottom-caption'; } ?>">
		                            <?php if( $atts['animation'] == '1' ){?>
		                                <div class="animate" data-animation="<?php echo esc_attr($atts['animation_style']); ?>" data-animation-offset="<?php echo esc_attr($atts['animation_offset']); ?>%" style="animation-duration: 0.4s;     animation-delay: <?php echo $ad; ?>s;     -moz-animation-duration: 0.4s;  -moz-animation-delay: <?php echo $ad; ?>s;    -webkit-animation-duration: 0.4s;   -webkit-animation-delay: <?php echo $ad; ?>s; ">
		                            <?php } ?>
		                            <div id="portfolio-post-<?php the_ID(); ?>" class="portfolio-post">
		                                <div class="portfolio-thumbnail">
		                                    <?php the_post_thumbnail(); //the_post_thumbnail( $portfolio_thumb_size ); ?>
		                                </div>
		                                <?php if( $atts['portfolio_hover_style'] <= '10' ){?>
			                                <div class="portfolio-caption-content">
			                                    <div class="portfolio-content">
			                                        <div class="portfolio-content-details">
			                                            <div class="portfolio-icon hide"><a <?php //if( $portfolio_ajax_choice == 'on' ){ echo 'class="portfolio-single-link"'; }?> href="<?php if( !empty($portfolio_custom_link) ){ echo $portfolio_custom_link; }else{ the_permalink(); } ?>" target="<?php echo $cookie_options['portfolio-post-link-target']; ?>"><span></span></a></div>
			                                            <h5 class="portfolio-title"><a <?php //if( $portfolio_ajax_choice == 'on' ){ echo 'class="portfolio-single-link"'; }?> href="<?php if( !empty($portfolio_custom_link) ){ echo $portfolio_custom_link; }else{ the_permalink(); } ?>" target="<?php echo $cookie_options['portfolio-post-link-target']; ?>"><?php the_title(); ?></a></h5>
			                                            <ul class="portfolio-category list-inline">
			                                                <?php echo $portfolio_category_list; ?>
			                                            </ul>
			                                            <div class="portfolio-meta">
			                                                <a <?php //if( $portfolio_ajax_choice == 'on' ){ echo 'class="portfolio-single-link"'; }?> href="<?php if( !empty($portfolio_custom_link) ){ echo $portfolio_custom_link; }else{ the_permalink(); } ?>" target="<?php echo $cookie_options['portfolio-post-link-target']; ?>"><i class="fa fa-link"></i></a>
			                                                <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" class="portfolio-attachment"><i class="fa fa-image"></i></a>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                                <?php if( $atts['portfolio_bottom_caption'] == '1' ){?>
			                                    <div class="portfolio-bottom-caption">
			                                         <h5 class="portfolio-bottom-caption-title"><a <?php //if( $portfolio_ajax_choice == 'on' ){ echo 'class="portfolio-single-link"'; }?> href="<?php if( !empty($portfolio_custom_link) ){ echo $portfolio_custom_link; }else{ the_permalink(); } ?>" target="<?php echo $cookie_options['portfolio-post-link-target']; ?>"><?php the_title(); ?></a></h5>
			                                        <ul class="portfolio-bottom-caption-category list-inline">
			                                            <?php echo $portfolio_category_list; ?>
			                                        </ul>
			                                    </div>
			                                <?php } ?>
	                                    <?php }
	                                    else{ ?>
	                                        <div class="portfolio-caption-content">
	                                            <div class="portfolio-content">
	                                                <div class="portfolio-content-details">
	                                                    <h5 class="portfolio-title"><a class="portfolio-single-link" href="<?php if( !empty($portfolio_custom_link) ){ echo $portfolio_custom_link; }else{ the_permalink(); } ?>" target="<?php echo $cookie_options['portfolio-post-link-target']; ?>"><?php the_title(); ?></a></h5>
	                                                    <ul class="portfolio-category list-inline">
	                                                        <?php echo $portfolio_category_list; ?>
	                                                    </ul>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    <?php } ?>
		                            </div>
		                            <?php if( $atts['animation'] == '1' ){?>
		                                </div>
		                            <?php } ?>
		                        </div><?php 
		                    endwhile;
		                endif; 
		                // Reset Post Data
		                wp_reset_postdata(); ?>
		            </div>
		            <?php 
		            if( $atts['pagination'] != '0' ){
			        	if( $atts['pagination'] != '2' ){ echo '<div class="load-more text-center"></div>'; } 
			        	if( $atts['pagination'] == '4' ){ echo '<div class="load-more-button text-center"><a href="#" class="btn btn-default">Load More</a></div>'; } 
			        	agni_page_navigation( $shortcodeposts, $number_navigation = 'portfolio-number-navigation' );
			        }?>
		        </div><!-- #main -->
		    </div><!-- #primary --> 
							
		<?php }
		elseif( $atts['posttype'] == 'post' ){  ?>            
            <div class="blog blog-post shortcode-blog-post <?php echo esc_attr($atts['blog_layout']); ?>-layout-post <?php echo esc_attr($atts['blog_sidebar']); ?>">
				<div class="blog-container <?php if( $atts['pagination'] == '3' || $atts['pagination'] == '4' ){ echo ' has-infinite-scroll '; }?><?php if( $atts['pagination'] == '4'){ echo ' has-load-more'; }?>" data-dir="<?php echo AGNI_FRAMEWORK_URL;?>">
					<div class="row">
						<div class="col-sm-12 col-md-<?php if( $atts['blog_sidebar'] != 'no-sidebar' ){ echo '8'; }else { echo '12'; } ?> blog-post-content" <?php if( $atts['blog_layout'] != 'standard' ){ echo 'data-blog-grid="'.$atts['blog_grid_layout'].'"'; } ?>>
							<div class="content-area">
								<div class="site-main" role="main"><!--  carousel-posts -->

								<?php if ( $shortcodeposts->have_posts() ) : ?>

									<?php if ( is_home() && ! is_front_page() ) : ?>
										<header>
											<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
										</header>
									<?php endif; ?>

									<?php /* Start the Loop */ ?>
									<?php while ( $shortcodeposts->have_posts() ) : $shortcodeposts->the_post(); ?>

										<?php switch( $atts['blog_layout'] ){
											case 'grid':
												get_template_part( 'template-parts/content', 'grid' );
												break;
											case 'standard-grid':
												if( $shortcodeposts->current_post == 0 && !is_paged() ) : 
													get_template_part('template-parts/content');
												else : 
													get_template_part('template-parts/content', 'grid'); 
												endif; 
												break;
											case 'modern':
												get_template_part( 'template-parts/content', 'modern' );
												break;
											default :
												get_template_part( 'template-parts/content' );
												break;
										} ?>

									<?php endwhile; ?>
									<!-- Loop Ends -->
								<?php else : ?>

									<?php get_template_part( 'template-parts/content', 'none' ); ?>

								<?php endif; ?>

								</div><!-- #main -->
								<!-- Post Navigation -->
								<?php if( $atts['pagination'] != '0' ){

									if( $atts['pagination'] == '3' || $atts['pagination'] == '4' ){ echo '<div class="load-more text-center"></div>'; } 
									if( $atts['pagination'] == '4' ){ echo '<div class="load-more-button text-center"><a href="#" class="btn btn-default">Load More</a></div>'; } 
									agni_page_navigation( $shortcodeposts, $number_navigation = 'post-number-navigation' );
								}?>
							</div><!-- #primary -->
						</div>
						<?php if( $atts['blog_sidebar'] != 'no-sidebar' ){ ?>
							<div class="col-sm-12 col-md-4 blog-post-sidebar">
								<?php get_sidebar(); ?>
							</div>
						<?php }?>
					</div>
				</div>
			</div>      
		<?php  }
		elseif( $atts['posttype'] == 'carousel-post' ) { ?>
			<div class="blog blog-post shortcode-blog-post <?php echo esc_attr($atts['blog_carousel_layout']); ?>-layout-post <?php echo esc_attr($atts['blog_sidebar']); ?>">
				<div class="blog-container<?php if( $atts['blog_carousel_fullwidth'] == '1' ){ echo '-fluid'; } ?> container<?php if( $atts['blog_carousel_fullwidth'] == '1' ){ echo '-fluid'; } ?> <?php if( $atts['pagination'] == '3' || $atts['pagination'] == '4' ){ echo ' has-infinite-scroll '; }?><?php if( $atts['pagination'] == '4'){ echo ' has-load-more'; }?>" data-dir="<?php echo AGNI_FRAMEWORK_URL;?>">
					<div class="row">
						<div class="col-sm-12 col-md-<?php if( $atts['blog_sidebar'] != 'no-sidebar' &&  $atts['posttype'] != 'carousel-post' ){ echo '8'; }else { echo '12'; } ?> blog-post-content carousel-blog-post-content" <?php if( $atts['blog_carousel_layout'] != 'standard' &&  $atts['posttype'] != 'carousel-post' ){ echo 'data-blog-grid="'.$atts['blog_grid_layout'].'"'; } ?>>
							<div class="content-area">
								<div class="site-main <?php if( $atts['posttype'] == 'carousel-post' ){ echo esc_attr($atts['posttype']); } ?>" role="main" data-posttype-autoplay='<?php echo $posttype_autoplay; ?>' data-posttype-autoplay-timeout='<?php echo $posttype_autoplay_timeout; ?>' data-posttype-autoplay-speed='<?php echo $posttype_autoplay_speed; ?>' data-posttype-autoplay-hover='<?php echo $posttype_autoplay_hover; ?>' data-posttype-loop='<?php echo $posttype_loop; ?>' data-posttype-pagination='<?php echo $posttype_pagination; ?>' <?php echo $column; ?>><!--  carousel-posts -->

								<?php if ( $shortcodeposts->have_posts() ) : ?>

									<?php if ( is_home() && ! is_front_page() ) : ?>
										<header>
											<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
										</header>
									<?php endif; ?>

									<?php /* Start the Loop */ ?>
									<?php while ( $shortcodeposts->have_posts() ) : $shortcodeposts->the_post(); ?>

										<?php switch( $atts['blog_carousel_layout'] ){
											case 'grid':
												get_template_part( 'template-parts/content', 'grid' );
												break;
											case 'standard-grid':
												if( $shortcodeposts->current_post == 0 && !is_paged() ) : 
													get_template_part('template-parts/content');
												else : 
													get_template_part('template-parts/content', 'grid'); 
												endif; 
												break;
											case 'modern':
												get_template_part( 'template-parts/content', 'modern' );
												break;
											default :
												get_template_part( 'template-parts/content' );
												break;
										} ?>

									<?php endwhile; ?>
									<!-- Loop Ends -->
								<?php else : ?>

									<?php get_template_part( 'template-parts/content', 'none' ); ?>

								<?php endif; ?>

								</div><!-- #main -->
							</div><!-- #primary -->
						</div>
					</div>
				</div>
			</div>      
		<?php 	}
		elseif( $atts['posttype'] == 'carousel-portfolio' ){ ?>
        	<?php 
				$col = '';

			?>
		    <div class="page-portfolio  shortcode-page-portfolio content-area">
		        <div class="page-portfolio-container <?php if( $atts['portfolio_fullwidth'] != '1' ){ echo 'container '; } ?><?php if( $atts['pagination'] != '2'){ echo ' has-infinite-scroll '; }?><?php if( $atts['pagination'] == '4'){ echo ' has-load-more'; }?> site-main" role="main" data-dir="<?php echo AGNI_FRAMEWORK_URL; ?>">
		            <div class="portfolio-container <?php if( $atts['posttype'] == 'carousel-portfolio' ){ echo esc_attr($atts['posttype']); } ?> <?php if( $atts['portfolio_fullwidth'] == '1' ){ echo 'portfolio-fullwidth '; } ?><?php if( $atts['portfolio_gutter'] != '1' ){ echo 'portfolio-no-gutter'; } ?>" <?php if( $atts['portfolio_gutter'] == '1' ){  echo 'data-posttype-margin="30"'; } ?> data-posttype-autoplay='<?php echo $posttype_autoplay; ?>' data-posttype-autoplay-timeout='<?php echo $posttype_autoplay_timeout; ?>' data-posttype-autoplay-speed='<?php echo $posttype_autoplay_speed; ?>' data-posttype-autoplay-hover='<?php echo $posttype_autoplay_hover; ?>' data-posttype-loop='<?php echo $posttype_loop; ?>' data-posttype-pagination='<?php echo $posttype_pagination; ?>' <?php echo $column; ?>>
		                <?php if ( $shortcodeposts->have_posts() ) :
		                    while ( $shortcodeposts->have_posts() ) : $shortcodeposts->the_post(); 

		                        $portfolio_thumbnail_width = esc_attr( get_post_meta( $post->ID, 'portfolio_thumbnail_width', true ) );
		                        $portfolio_custom_link = esc_url( get_post_meta( $post->ID, 'portfolio_custom_link', true ) );
		                        
		                        $portfolio_category_list = $portfolio_category = '';
		                        $terms = get_the_terms( $post->ID, 'types' );
		                        if ( $terms && ! is_wp_error( $terms ) ) :
		                            foreach ( $terms as $term )
		                            {
		                                $portfolio_category .= strtolower($term->slug).' ';//strtolower($term->name).' ';
		                                $portfolio_category_list .= '<li>'.$term->name.'</li>';
		                            }
		                        endif;

		                        ?><div class="portfolio-column <?php echo $portfolio_thumbnail_width; ?> <?php echo $portfolio_category; ?>all portfolio-hover-style-<?php echo $atts['portfolio_hover_style']; ?> <?php if( $atts['portfolio_bottom_caption'] == '1' ){ echo 'has-bottom-caption'; } ?>">
		                            <figure id="portfolio-post-<?php the_ID(); ?>" class="portfolio-post">
		                                <div class="portfolio-thumbnail">
		                                    <?php the_post_thumbnail(); //the_post_thumbnail( $portfolio_thumb_size ); ?>
		                                </div>
			                            <?php if( $atts['portfolio_hover_style'] <= '10' ){?>
			                                <figcaption class="portfolio-caption-content">
			                                    <div class="portfolio-content">
			                                        <div class="portfolio-content-details">
			                                            <div class="portfolio-icon hide"><a href="<?php if( !empty($portfolio_custom_link) ){ echo $portfolio_custom_link; }else{ the_permalink(); } ?>" target="<?php echo $cookie_options['portfolio-post-link-target']; ?>"><span></span></a></div>
			                                            <h5 class="portfolio-title"><a href="<?php if( !empty($portfolio_custom_link) ){ echo $portfolio_custom_link; }else{ the_permalink(); } ?>" target="<?php echo $cookie_options['portfolio-post-link-target']; ?>"><?php the_title(); ?></a></h5>
			                                            <ul class="portfolio-category list-inline">
			                                                <?php echo $portfolio_category_list; ?>
			                                            </ul>
			                                            <div class="portfolio-meta">
			                                                <a href="<?php if( !empty($portfolio_custom_link) ){ echo $portfolio_custom_link; }else{ the_permalink(); } ?>" target="<?php echo $cookie_options['portfolio-post-link-target']; ?>"><i class="fa fa-link"></i></a>
			                                                <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" class="portfolio-attachment"><i class="fa fa-image"></i></a>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </figcaption>
	                                    <?php }
	                                    else{ ?>
	                                        <figcaption class="portfolio-caption-content">
	                                            <div class="portfolio-content">
	                                                <div class="portfolio-content-details">
	                                                    <h5 class="portfolio-title"><a class="portfolio-single-link" href="<?php if( !empty($portfolio_custom_link) ){ echo $portfolio_custom_link; }else{ the_permalink(); } ?>" target="<?php echo $cookie_options['portfolio-post-link-target']; ?>"><?php the_title(); ?></a></h5>
	                                                    <ul class="portfolio-category list-inline">
	                                                        <?php echo $portfolio_category_list; ?>
	                                                    </ul>
	                                                </div>
	                                            </div>
	                                        </figcaption>
	                                    <?php } ?>
		                                <?php if( $atts['portfolio_bottom_caption'] == '1' ){?>
		                                    <div class="portfolio-bottom-caption">
		                                         <h5 class="portfolio-bottom-caption-title"><a <?php //if( $portfolio_ajax_choice == 'on' ){ echo 'class="portfolio-single-link"'; }?> href="<?php if( !empty($portfolio_custom_link) ){ echo $portfolio_custom_link; }else{ the_permalink(); } ?>" target="<?php echo $cookie_options['portfolio-post-link-target']; ?>"><?php the_title(); ?></a></h5>
		                                        <ul class="portfolio-bottom-caption-category list-inline">
		                                            <?php echo $portfolio_category_list; ?>
		                                        </ul>
		                                    </div>
		                                <?php } ?>
		                            </figure>
		                        </div><?php 
		                    endwhile;
		                endif; 
		                // Reset Post Data
		                wp_reset_postdata(); ?>
		            </div>
		        </div><!-- #main -->
		    </div><!-- #primary --> 
							
		<?php }

		$output = ob_get_contents();
		ob_end_clean();
		// Return original posts
		$posts = $original_posts;
		// Reset the query
		wp_reset_postdata();
		
		return $output;
	}

	// Woocommerce
	public static function agni_woo_products( $atts = null, $content = null ){

		$atts = shortcode_atts( array(
			'product_type' => 'all',
			'product_categories'	=> '',
			'product_layout'	=> '3',
			'posts_per_page'	=> '3',
			'order'	=> 'DESC',
			'order_by'	=> 'date',
		), $atts, 'agni_woo_products' );

		global $product_layout;
		$product_layout = $atts['product_layout'];

		switch( $atts['product_type'] ){
			case 'all' :
			case 'toprated' :
				$meta_query = WC()->query->get_meta_query();
				$args = array(
					'post_type'				=> 'product',
					'post_status'			=> 'publish',
					'ignore_sticky_posts'	=> 1,
					'posts_per_page' 		=> $atts['posts_per_page'],
					'product_cat'           => $atts['product_categories'],
					'orderby' 				=> $atts['order_by'],
        			'order' 				=> $atts['order'],
					'meta_query' 			=> $meta_query
				);

				break;
			case 'sale' :
				$product_on_sale_IDs = wc_get_product_ids_on_sale();
				$meta_query   = array();
				$meta_query[] = WC()->query->visibility_meta_query();
				$meta_query[] = WC()->query->stock_status_meta_query();
				$meta_query   = array_filter( $meta_query );
				$args = array(
					'posts_per_page'	=> $atts['posts_per_page'],
					'post_status' 		=> 'publish',
					'post_type' 		=> 'product',
					'product_cat'       => $atts['product_categories'],
					'orderby' 			=> $atts['order_by'],
        			'order' 			=> $atts['order'],
					'meta_query' 		=> $meta_query,
					'post__in'			=> array_merge( array( 0 ), $product_on_sale_IDs )
				);
				break;
			case 'featured' :
				$args = array(
					'post_type'				=> 'product',
					'post_status' 			=> 'publish',
					'product_cat'           => $atts['product_categories'],
					'ignore_sticky_posts'	=> 1,
					'posts_per_page' 		=> $atts['posts_per_page'],
					'orderby' 				=> $atts['order_by'],
        			'order' 				=> $atts['order'],
					'meta_query'			=> array(
						array(
							'key' 		=> '_visibility',
							'value' 	=> array('catalog', 'visible'),
							'compare'	=> 'IN'
						),
						array(
							'key' 		=> '_featured',
							'value' 	=> 'yes'
						)
					)
				);
				break;
			case 'best_selling' :
				$args = array(
					'post_type' 			=> 'product',
					'post_status' 			=> 'publish',
					'ignore_sticky_posts'   => 1,
					'product_cat'           => $atts['product_categories'],
					'posts_per_page'		=> $atts['posts_per_page'],
					'orderby' 				=> $atts['order_by'],
        			'order' 				=> $atts['order'],
					'meta_key' 		 		=> 'total_sales',
					'orderby' 		 		=> 'meta_value_num',
					'meta_query' 			=> array(
						array(
							'key' 		=> '_visibility',
							'value' 	=> array( 'catalog', 'visible' ),
							'compare' 	=> 'IN'
						)
					)
				);
				break;
		}

		ob_start();

		if( $atts['product_type'] == 'toprated' ){
			add_filter( 'posts_clauses',  array( WC()->query, 'order_by_rating_post_clauses' ) );
		}
		$products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );

		if ( $products->have_posts() ) : ?>
		
			<?php woocommerce_product_loop_start(); ?>

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>


		<?php endif;

		if( $atts['product_type'] == 'toprated' ){
			remove_filter( 'posts_clauses', array( WC()->query, 'order_by_rating_post_clauses' ) );
		}
		wp_reset_postdata();

		return '<div class="woocommerce shortcode-products agni-products-'.$atts['product_type'].'">' . ob_get_clean() . '</div>';
			
	}

}
// Finally initialize code
new AgniShortcodesFunctions();

?>