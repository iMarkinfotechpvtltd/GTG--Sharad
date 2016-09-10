<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
    <link rel="icon" type="image/ico" href="<?php echo get_template_directory_uri();?>/images/favicon.ico" sizes="32x32" />
	<!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/font-awesome.css">

    <!-- Google Font CSS -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,900|Lato:400,100,300,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css">
    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/owl.carousel.css">

    <!-- Default Theme -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/owl.theme.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style.css">
</head>

<body>
        <!-- Blue Strip -->

   <header class="header2">
        <!-- Blue Strip -->
        <div class="blue-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <a href="<?php echo site_url();?>" class="logo"><img src="<?php echo get_template_directory_uri();?>/images/logo-white.png" alt="logo_image"/></a>
                    </div>
                    <div class="col-sm-10">
                        <nav>
                            <ul class="cls_menu">
							<!--START CODE USE FOR GETTING HEADER MENU-->
								<?php

									$defaults = array(
									'theme_location'  => '',
									'menu'            => 'Header_menu',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'menu',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '<span></span>', 
									'link_after'      => '<span></span>',
									'items_wrap'      => '%3$s',
									'depth'           => 0,
									'walker'          => ''
									);

									wp_nav_menu( $defaults );
							?>
							<!--END OF CODE USE FOR GETTING HEADER MENU-->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
   