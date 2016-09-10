<?php 
/* Template Name: About Template
*/ 
 get_header();?>
 

 <!-- Main Content -->
    <section class="about">
        <div class="container">
            <h1>About Us</h1>
            <div class="row">
                <div class="col-sm-8">
                    <div class="about-left-01">
                        <p><?php the_field('about_section_1_description',$post->ID);?></p>

                        <!-------- Tabs ----------------------->
                      <div class="tabbable tabs-left">
                            <ul class="nav nav-tabs">
                               <li class="active"><a href="#<?php the_field('overview_heading',$post->ID)?>" data-toggle="tab">
								<?php the_field('overview_heading',$post->ID)?></a></li>
                                <li><a href="#<?php the_field('history_heading',$post->ID)?>" data-toggle="tab"><?php the_field('history_heading',$post->ID)?></a></li>
                                <li><a href="#<?php the_field('associations_heading',$post->ID)?>" data-toggle="tab"><?php the_field('associations_heading',$post->ID)?></a></li>
                                 <li><a href="#<?php the_field('accreditations_heading',$post->ID)?>" data-toggle="tab"><?php the_field('accreditations_heading',$post->ID)?></a></li>
                                <li><a href="#<?php the_field('environmental_heading',$post->ID)?>" data-toggle="tab"><?php the_field('environmental_heading',$post->ID)?></a></li>
                            </ul>
                            <div class="tab-content">
           
                                <div class="tab-pane active" id="<?php the_field('overview_heading',$post->ID)?>">
                                    <?php the_field('overview_description',$post->ID)?>
                                </div>
                                <div class="tab-pane" id="<?php the_field('history_heading',$post->ID)?>">
                                    <?php the_field('history_description',$post->ID)?>
                                </div>
                                <div class="tab-pane" id="<?php the_field('associations_heading',$post->ID)?>">
                                    <?php the_field('associations_description',$post->ID)?>
                                </div>
                                <div class="tab-pane" id="<?php the_field('accreditations_heading',$post->ID)?>">
                                     <?php the_field('accreditations_description',$post->ID)?>
                                </div>
                                <div class="tab-pane" id="<?php the_field('environmental_heading',$post->ID)?>"> 
									<?php the_field('environmental_description',$post->ID)?>
								</div>
                           </div>
                      </div>
                        <!-- /tabs -->
                    </div>
                </div>
                <div class="col-sm-4">
				<?php 
				/*Getting  about_section_1_image */
					$about_image=get_post_meta($post->ID,"about_section_1_image",true);
					$Banner = wp_get_attachment_image_src($about_image, 'about_section_1_image');
				?>
				
					<figure class="about-img"><img src="<?php echo $url=$Banner[0]?>" alt="about section1" /></figure>
                </div>
            </div>

        </div>

        <!-- Section two -->
        <div class="about-02">
            <div class="container">
                <figure><img src="<?php echo get_template_directory_uri();?>/images/design-01.png" alt="design image" /></figure>
                <h2><?php the_field('about_section_2_representing_quality',$post->ID)?></h2>
                <a href="<?php echo site_url();?>/contact" class="quote"><?php echo get_option_tree('get_a_quote_button_heading');?></a>
            </div>
        </div>

        <!-- Section Three -->
        <div class="about-03">
            <div class="container">
                <h3><?php the_field('about_section3_6_reasons_heading',$post->ID)?></h3>
                <div class="about-left">
                    <?php the_field('about_section3_6_reasons_description',$post->ID)?>
                    <div class="btn-box">
                        <a href="<?php echo site_url();?>/contact" class="blue-btn"><?php echo get_option_tree('get_a_quote_button_heading');?></a>
                        <!--<a href="#" class="white-btn">View More</a>-->
                    </div>
                </div>
                <div class="about-right">
				<?php 
				/*Getting  about_section_3 6_reason_image */
					$about_image_sec3=get_post_meta($post->ID,"about_section3_6_reasons_image",true);
					$Banner = wp_get_attachment_image_src($about_image_sec3, 'abt_sec3_image_size');
				?>
				
					<img src="<?php echo $url=$Banner[0]?>" alt="6 Reasons image" />
				</div>
            </div>
        </div>

    </section>
 
 
 
 
<?php get_footer();?>	