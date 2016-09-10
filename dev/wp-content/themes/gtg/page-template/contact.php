<?php 
/* Template Name: Contact Template
*/ 
 get_header();
 global $post;
 ?>
 

   <!-- Main Content -->
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <h1>Contact</h1>
                    <form class="contact-form" id="registration" method="post">
                        <div class="row">
                            <p class="col-sm-4">
                                <label>Name</label>
                                <input type="text" class="input-text" name="name" id="name">
                            </p>
                            <p class="col-sm-4">
                                <label>Email</label>
                                <input type="text" class="input-text" name="email" id="email">
                            </p>
                            <p class="col-sm-4">
                                <label>Phone No.</label>
                                <input type="text" class="input-text" name="phone_number" id="phone_number">
                            </p>
                        </div>
                        <p>
                            <label>Message</label>
                            <textarea id="message" name="message"></textarea>
                        </p>
						<!--Loader-->
						<div id="loading" style="display:none" align="center">
							<img src="<?php echo  get_template_directory_uri(); ?>/images/ajax-loader.gif" id="loader">
						</div>
                        <input id="btn_submit" type="submit" value="Submit" class="submit">

                    </form>
					<!--show success message-->
					<div id="msg_success" class="alert alert-success" style="display:none">
						<strong>Success!</strong> Thank you for your message. It has been sent.
					</div>
					<!--show error message-->
					<div id="msg_error" class="alert alert-danger" style="display:none">
						<strong>Error!</strong> There was an error trying to send your message. Please try again later.
					</div>
                    <!--map section-->
					<div class="map">
					<?php 
					/***getting map from custom field***/
		 
						$location=get_post_meta($post->ID, 'contact_us_google_map', TRUE);
		 
						if( !empty($location) ):
						?>
							<div class="acf-map">
								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
							</div>
						<?php endif; ?>
	
					</div>
					
			
                    <div class="detail">
                        <div class="adrs">
                            <h3><i class="fa fa-map-marker"></i>Address</h3>
                            <p><?php echo get_option_tree('contact_address');?></p>
                        </div>
                        <div class="number">
                            <h3><i class="fa fa-phone"></i>Phone Number</h3>
                            <p><a href="tel:<?php echo get_option_tree('office');?>"><?php echo get_option_tree('office');?></a> Office
                                <br>
                                <a href="tel:<?php echo get_option_tree('cell');?>"><?php echo get_option_tree('cell');?></a> Cell</p>
                        </div>
                        <div class="mail">
                            <div class="pull-right">
                                <h3><i class="fa fa-envelope"></i>Email</h3>
                                <a href="mailto:info@gtg.com"><?php echo get_option_tree('contact_email');?></a>
                                <a href="mailto:gtg@gtgcreations.com"><?php echo get_option_tree('contact_email_2');?></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> 
 

<!--**************START SCRIPT FOR GOOGLE MAP*****************-->
        <style type="text/css">
            .acf-map {
                border: 1px solid #ccc;
                height: 427px;
                margin: 0;
            }
            /* fixes potential theme css conflict */
            
            .acf-map img {
                max-width: inherit !important;
            }
        </style>
		
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7XPVX2w3Q22FgcxuCDibIkDQbUwmo-88"
		type="text/javascript"></script>
		
        
        <script type="text/javascript">
            (function ($) {
                /*
                 *  render_map
                 *
                 *  This function will render a Google Map onto the selected jQuery element
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	4.3.0
                 *
                 *  @param	$el (jQuery element)
                 *  @return	n/a
                 */
                function render_map($el) {
                    // var
                    var $markers = $el.find('.marker');
                    // vars
                    var args = {
                        zoom: 30,
                        center: new google.maps.LatLng(0, 0),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    // create map	        	
                    var map = new google.maps.Map($el[0], args);
                    // add a markers reference
                    map.markers = [];
                    // add markers
                    $markers.each(function () {
                        add_marker($(this), map);
                    });
                    // center map
                    center_map(map);
                }
                /*
                 *  add_marker
                 *
                 *  This function will add a marker to the selected Google Map
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	4.3.0
                 *
                 *  @param	$marker (jQuery element)
                 *  @param	map (Google Map object)
                 *  @return	n/a
                 */
                function add_marker($marker, map) {
                    // var
                    var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
                    // create marker
                    var marker = new google.maps.Marker({
                        position: latlng,
                        map: map
                    });
                    // add to array
                    map.markers.push(marker);
                    // if marker contains HTML, add it to an infoWindow
                    if ($marker.html()) {
                        // create info window
                        var infowindow = new google.maps.InfoWindow({
                            content: $marker.html()
                        });
                        // show info window when marker is clicked
                        google.maps.event.addListener(marker, 'click', function () {
                            infowindow.open(map, marker);
                        });
                    }
                }
                /*
                 *  center_map
                 *
                 *  This function will center the map, showing all markers attached to this map
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	4.3.0
                 *
                 *  @param	map (Google Map object)
                 *  @return	n/a
                 */
                function center_map(map) {
                    // vars
                    var bounds = new google.maps.LatLngBounds();
                    // loop through all markers and create bounds
                    $.each(map.markers, function (i, marker) {
                        var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
                        bounds.extend(latlng);
                    });
                    // only 1 marker?
                    if (map.markers.length == 1) {
                        // set center of map
                        map.setCenter(bounds.getCenter());
                        map.setZoom(15);
                    } else {
                        // fit to bounds
                        map.fitBounds(bounds);
                    }
                }
                /*
                 *  document ready
                 *
                 *  This function will render each map when the document is ready (page has loaded)
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	5.0.0
                 *
                 *  @param	n/a
                 *  @return	n/a
                 */
                $(document).ready(function () {
                    $('.acf-map').each(function () {
                        render_map($(this));
                    });
                });
            })(jQuery);
        </script>
        <!--**************END OF SCRIPT FOR GOOGLE MAP*****************--> 
 
 
<?php get_footer();?>	