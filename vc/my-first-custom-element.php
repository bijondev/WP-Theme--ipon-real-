<?php
/*
Element Description: VC Info Box
*/
 
// Element Class 
class vcInfoBox extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_infobox_mapping' ) );
        add_shortcode( 'vc_yellow_map', array( $this, 'vc_infobox_html' ) );
    }
     
    // Element Mapping
    public function vc_infobox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('VC Yellow Map', 'text-domain'),
                'base' => 'vc_yellow_map',
                'description' => __('Make your google map yellow', 'text-domain'), 
                'category' => __('My custom map', 'text-domain'),   
                'icon' => get_template_directory_uri().'/vc/vc-icon.png',            
                'params' => array(   
                         
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'Map latitude', 'text-domain' ),
                        'param_name' => 'latitude',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'Map longitude, like - 49.888624', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),  
                     
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __( 'Map longitude', 'text-domain' ),
                        'param_name' => 'longitude',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'Map longitude, like - 15.487843', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),                      
                        
                ),
            )
        );                                
        
    }
     
     
    // Element HTML
    public function vc_infobox_html( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'latitude'   => '',
                    'longitude' => '',
                ), 
                $atts
            )
        );
         
        // Fill $html var with data
        $html = '
                <div class="section-map">
            <div data-lat="'.$latitude.'" data-long="'.$longitude.'" id="map"></div>
        </div>
        ';      
         echo $this->map_js($latitude, $longitude);
        return $html;
         
    }
     
     public function map_js($latitude, $longitude){
        ?>
        <script>

      function initMap() {
        
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>},
          zoom: 12,
          styles: [{"featureType":"all","elementType":"all","stylers":[{"saturation":"0"}]},{"featureType":"all","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"all","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"all","elementType":"geometry.stroke","stylers":[{"visibility":"simplified"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#efc337"},{"lightness":"-15"},{"gamma":"1.00"}]},{"featureType":"administrative","elementType":"labels.icon","stylers":[{"saturation":"-100"},{"lightness":"20"},{"visibility":"simplified"},{"gamma":".5"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"color":"#000000"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"lightness":"60"},{"saturation":"0"},{"color":"#efc337"},{"visibility":"simplified"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efc337"},{"saturation":"0"},{"lightness":"12"},{"gamma":"1.00"}]},{"featureType":"landscape.natural","elementType":"labels.text","stylers":[{"lightness":"100"}]},{"featureType":"landscape.natural","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#efc337"},{"saturation":"0"},{"lightness":"-7"},{"gamma":"1.00"}]},{"featureType":"road","elementType":"all","stylers":[{"gamma":"6.14"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#efc337"},{"saturation":"0"},{"lightness":"-18"},{"gamma":"1.00"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"visibility":"simplified"},{"saturation":"0"},{"lightness":"100"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"},{"invert_lightness":true}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"simplified"},{"hue":"#ffc200"},{"saturation":"100"},{"gamma":"0.85"},{"lightness":"17"},{"weight":"1.00"}]},{"featureType":"transit","elementType":"labels.icon","stylers":[{"hue":"#ffc200"},{"saturation":"-100"},{"gamma":"0.5"},{"weight":"1.00"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"lightness":"80"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#efc337"},{"saturation":"0"},{"lightness":"35"},{"gamma":"1.00"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"visibility":"off"}]}]
        });
        var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation: google.maps.Animation.BOUNCE,
                icon: '<?php echo get_bloginfo('template_directory'); ?>/img/map-marker.png',
                map: map
            });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5os6oQBtIiHfG4GbiQaaxv5KjC05o8FU&callback=initMap"
    async defer></script>
    <?php
     }
} // End Element Class
 
 
// Element Class Init
new vcInfoBox(); 
?>