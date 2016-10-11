<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 

?>




    <!-- Sign Up for Newsletter -->
    <div class="newsletter-sub">
        <input type="hidden" value="<?php echo site_url();?>" name="site_url" id="site_url">
        <div class="container">
            <div class="newsletter-inner">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><?php echo get_option_tree('newsletter_heading');?></h2>
                        <p>
                            <?php echo get_option_tree('newsletter_description');?>
                        </p>
                    </div>
                    <div class="col-sm-5 pull-right">

                        <?php echo do_shortcode('[contact-form-7 id="9" title="Newsletter Form"]'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="menu1">
                <h4><?php echo get_option_tree('social_media_heading');?></h4>
                <ul class="social">
                    <li><a href="<?php echo get_option_tree('facebook');?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="<?php echo get_option_tree('google_plus');?>"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="<?php echo get_option_tree('twitter');?>"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="<?php echo get_option_tree('linkedin');?>"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="<?php echo get_option_tree('envelope');?>"><i class="fa fa-envelope-o"></i></a></li>
                </ul>
                <p>
                    <?php echo get_option_tree('social_media_description');?>
                </p>
            </div>
            <div class="menu2">
                <h4><?php echo get_option_tree('menu_heading');?></h4>
                <ul>

                    <!--START CODE USE FOR GETTING HEADER MENU-->
                    <?php

									$defaults = array(
									'theme_location'  => '',
									'menu'            => 'Footer_menu',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'menu',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '', 
									'link_after'      => '',
									'items_wrap'      => '%3$s',
									'depth'           => 0,
									'walker'          => ''
									);

									wp_nav_menu( $defaults );
							?>
                        <!--END OF CODE USE FOR GETTING HEADER MENU-->
                </ul>
            </div>
            <div class="menu3">
                <h4><?php echo get_option_tree('contact_us_heading');?></h4>
                <p class="address">
                    <?php echo get_option_tree('contact_address');?>
                </p>
                <p class="phone">
                    <a href="tel:+<?php echo get_option_tree('office');?>">+<?php echo get_option_tree('office');?></a>
                    <a href="tel:+<?php echo get_option_tree('cell');?>">+<?php echo get_option_tree('cell');?></a>
                </p>
                <a href="mailto:<?php echo get_option_tree('contact_email');?>" class="f-email">
                    <?php echo get_option_tree('contact_email');?>
                </a>
            </div>
            <div class="menu4">
                <figure>
                    <a href="<?php echo site_url();?>"><img src="<?php echo get_template_directory_uri();?>/images/logo-footer.png" alt="logo-footer" /></a>
                </figure>
                <p><strong>&copy; <?php echo date('Y');?></strong> | Privacy Policy
                    <br> All Rights Reserved</p>
            </div>
        </div>
    </footer>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Owl carousel script -->


    <script>
        jQuery(document).ready(function () {

            jQuery("#owl-example").owlCarousel({

                autoPlay: 5000, //Set AutoPlay to 3 seconds
                items: 4,
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [979, 4],
                itemsTablet: [768, 2],
                itemsMobile: [479, 1]

            });

        });
    </script>
    <!-- Fixed Header on Scroll Script -->
    <script src="<?php echo get_template_directory_uri();?>/js/classie.js"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery(window).bind('scroll', function () {
                var navHeight = jQuery(window).height() - 83;
                if (jQuery(window).scrollTop() > navHeight) {
                    jQuery('.blue-bar').addClass('smaller');

                } else {
                    jQuery('.blue-bar').removeClass('smaller');

                }
            });
        });
    </script>

    <!-- Include js plugin -->
    <script src="<?php echo get_template_directory_uri();?>/js/owl.carousel.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.sticky.js"></script>

    <!--script use for conatct form validation and send mail -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/form.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/custom_script.js"></script>

    <script type="text/javascript">
        jQuery(window).load(function () {
            jQuery("#nav").sticky({
                topSpacing: 0
            });
        });
    </script>

    <!----******************** START SCRIPT ADDED BY DEVELOPER *****************************---->

    <!--script use for add get-quote classs on menu-->

    <script>
        jQuery(document).ready(function () {
            jQuery('#menu-item-52 a').addClass('get-quote');
        });
    </script>


    <!--script use for hide message on newslatter-->
    <script>
        jQuery('.cls_submit_btn').click(function () {

            setTimeout(function () {
                jQuery('.alert-success').fadeOut('slow');
            }, 9000);
            setTimeout(function () {
                jQuery('.alert-danger').fadeOut('slow');
            }, 9000);
        });
    </script>



    <!--script use for show active class on tags other page -->
    <script>
        jQuery(document).ready(function () {
            var hash = jQuery(location).attr('href');
            var abc = hash.split("/");
            if (abc[5] != "") {
                jQuery("ul.blog_cat li a").each(function () {
                    var req_text = jQuery(this).text();

                    if (req_text.toLowerCase() == abc[5]) {
                        jQuery(this).parent().addClass("active");
                    }
                })
            }
        });
    </script>


    <!--************************************ Start Script use for enter Alphabets only in (Name) Text box********************-->

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery.noConflict();
            jQuery("input[name='name']").keypress(function (event) {
                var inputValue = event.which;
                // allow letters and whitespaces only.
                if ((inputValue > 33 && inputValue < 64) || (inputValue > 90 && inputValue < 97) || (inputValue > 123 && inputValue < 126) && (inputValue != 32)) {
                    event.preventDefault();
                }
            });
        });
    </script>
    <!--************************************ End of Script use for enter Alphabets only in (Name) Text box********************-->


    <!-- ************************ Start Script use for enter only number in phone number text box *************************-->

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery("input[name='phone_number']").keydown(function (e) {
                jQuery.noConflict();
                // Allow: backspace, delete, tab, escape, enter and .
                if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });
    </script>


    <!--*********** End of Script use for enter only number in phone number text box *************-->


    <!-- ************************ Start Script use for enter only number in phone number text box *************************-->

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery("input[name='Phonenumber']").keydown(function (e) {
                jQuery.noConflict();
                // Allow: backspace, delete, tab, escape, enter and .
                if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });
    </script>


    <!--*********** End of Script use for enter only number in phone number text box *************-->


    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery("input[name='ItemQty']").keydown(function (e) {
                jQuery.noConflict();
                // Allow: backspace, delete, tab, escape, enter and .
                if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery("input[name='zipcode']").keydown(function (e) {
                jQuery.noConflict();
                // Allow: backspace, delete, tab, escape, enter and .
                if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });
    </script>





    <!--************START SCRIPT USE FOR HIDE ALERT SUCCESS AND DANGER MSG***************-->
    <script>
        jQuery('#btn_submit').click(function () {
            jQuery(".alert-success").alert();
            window.setTimeout(function () {
                jQuery(".alert-success").alert('close');
            }, 13000);

            jQuery(".alert-danger").alert();
            window.setTimeout(function () {
                jQuery(".alert-danger").alert('close');
            }, 13000);
        });
    </script>
    <!--************END OF SCRIPT USE FOR HIDE ALERT SUCCESS AND DANGER MSG***************-->


    <script>
        jQuery(document).ready(function () {
            jQuery('.blog_cat li a').click(function () {
                jQuery('.blog_cat li a').each(function () {
                    jQuery('.blog_cat li a').removeClass("active");
                    jQuery(this).addClass("active");
                });
            });
        });
    </script>

    <!--************* HIDE CONTACT FORM MESSAGE AFTER A TIME *******************-->
    <script>
        jQuery('.wpcf7-submit').click(function () {

            setTimeout(function () {
                jQuery('.wpcf7-validation-errors').fadeOut('slow');
            }, 10000);
            setTimeout(function () {
                jQuery('.wpcf7-mail-sent-ok').fadeOut('slow');
            }, 10000);

            setTimeout(function () {
                jQuery("input[name='Itemno']").val('');
            }, 2000);
            setTimeout(function () {
                jQuery("input[name='ItemLength']").val('');
            }, 2000);
            setTimeout(function () {
                jQuery("input[name='ItemAvilState']").val('');
            }, 2000);
            setTimeout(function () {
                jQuery("input[name='Itemcolor']").val('');
            }, 2000);
            setTimeout(function () {
                jQuery("input[name='Itemdesc']").val('');
            }, 2000);
        });
    </script>


    <!--************* Get value from single post and add to pop up field  *******************-->
    <script>
        jQuery("#btn_quote").click(function () {

            var itemNo = jQuery(".prdct_tbl .cls_tr #p_id").text();
            var description = jQuery(".prdct_tbl .cls_tr #description").text();
            var length = jQuery(".prdct_tbl .cls_tr #length").text();
            var avlstate = jQuery(".prdct_tbl .cls_tr #available_state").text();
            var quantity = jQuery('.fld').find('#quantity').val();
            var size = jQuery('.fld').find('#size').val();
            var color = jQuery('.fld').find('#color').val();
            var url = jQuery('.newsletter-sub').find('#site_url').val();

            jQuery("input[name='Itemno']").val(itemNo);
            jQuery("input[name='ItemLength']").val(length);
            jQuery("input[name='ItemAvilState']").val(avlstate);
            jQuery("input[name='ItemQty']").val(quantity);
            jQuery("input[name='Itemsize']").val(size);
            jQuery("input[name='Itemcolor']").val(color);
            jQuery("input[name='Itemdesc']").val(description);

            jQuery("input[name='siteurl']").val(url);


        });
    </script>
    <script>
    // grab the initial top offset of the navigation 
    var stickyNavTop = jQuery('body').offset().top;
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var stickyNav = function () {
        var scrollTop = jQuery(window).scrollTop(); // our current vertical position from the top

        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        if (scrollTop > 10) {
            jQuery('.responsive-menu-button').addClass('move_scroll');
        } else {
            jQuery('.responsive-menu-button').removeClass('move_scroll');
        }

    };

    stickyNav();
    // and run it again every time you scroll
    jQuery(window).scroll(function () {
        stickyNav();
    });
</script>
    <!---- ******************** END SCRIPT ADDED BY DEVELOPER *******************************---->


    <?php wp_footer(); ?>
        </body>

        </html>