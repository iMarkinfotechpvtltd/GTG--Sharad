<?php 
/* Template Name: Home Template
*/ 
 get_header('home');
 
 global $post;
 ?>

<!-- Main Content -->
    <div class="home-01">
        <div class="block-1">
		<?php
				$image_id1=get_post_meta($post->ID,"welcome_to_g.t.g_background_image_1",true);	
				$thumb1 = wp_get_attachment_image_src($image_id1, 'Wel_bc_image1_size' );
		?>
		
            <div class="img1"><img src="<?php  echo $thumb1['0']; ?>" alt="welcome_to_g.t.g_background_image_1" /></div>
            <div class="content-box">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2><?php the_field('welcome_to_g.t.g_heading',$post->ID);?></h2>
								<p><?php the_field('welcome_to_g.t.g_description_1',$post->ID);?></p>
                            <div class="btn-box"> <a href="<?php echo site_url();?>/about-us" class="white-btn">view more</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-2">
		<?php
				$image_id2=get_post_meta($post->ID,"welcome_to_g.t.g_background_image_2",true);	
				$thumb2 = wp_get_attachment_image_src($image_id2, 'Wel_bc_image2_size' );

                $image_id3=get_post_meta($post->ID,"welcome_to_g.t.g_background_image_3",true);	
				$thumb3 = wp_get_attachment_image_src($image_id3, 'Wel_bc_image3_size' );  				
		?>                
            <div class="img2"><img src="<?php  echo $thumb2['0']; ?>" alt="welcome_to_g.t.g_background_image_2" /></div>
            <div class="img3"><img src="<?php  echo $thumb3['0']; ?>" alt="welcome_to_g.t.g_background_image_3" /></div>
        </div>
        <div class="block-3">
            <div class="text1">
                <p><?php the_field('welcome_to_g.t.g_description_2',$post->ID);?></p>
            </div>
        </div>
    </div>
    <!-- Section 2 / Featured Wholesale Products -->
    <div class="home-02 grey-bg">
        <div class="container">
            <h2><?php the_field('featured_wholesale_heading',$post->ID);?></h2>
			<div class="row">
			
			    <?php
				
				$args = array( 'taxonomy' => 'wholesale_category','hide_empty'=>0, 'parent'=>0 );
				$terms = get_terms('wholesale_category', $args);
                
               foreach ($terms as $term) 
               {
               ?> 
                <div class="col-sm-4">
                    <div class="pro-box">
                        <figure><a href="<?php echo get_category_link( $term->term_id ); ?>"><img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name;?>"></a> </figure>
                        <div class="blue">
                         <a href="<?php echo get_category_link( $term->term_id ); ?>"><h3><?php echo $term->name;?></h3></a>
                            <p><?php echo wp_trim_words( $term->description, 27);?></p>
                        </div>
                    </div>
                </div>
				<?php 
			   }
				?>
            </div>
            <a href="<?php echo site_url();?>/product" class="view-btn">View all</a> </div>
    </div>

    <!-- Section 3 / Featured Manufacturing Products -->
    <div class="home-02 white-bg manufacturing">
        <div class="container">
            <h2><?php the_field('featured_manufacturing_heading',$post->ID);?></h2>
            <div class="row">
			
			    <?php
				
				$args = array( 'taxonomy' => 'manufacturing_category','hide_empty'=>0,'parent'=>0 );
				$terms = get_terms('manufacturing_category', $args);
                
               foreach ($terms as $term) 
               {
               ?> 
                <div class="col-sm-4">
                    <div class="pro-box">
                        <figure><a href="<?php echo get_category_link( $term->term_id ); ?>" title=""><img src="<?php echo z_taxonomy_image_url($term->term_id); ?>"></a> </figure>
                        <div class="blue">
                         <a href="<?php echo get_category_link( $term->term_id ); ?>"><h3><?php echo $term->name;?></h3></a>
                            <p><?php echo wp_trim_words( $term->description, 23);?></p>
                        </div>
                    </div>
                </div>
				<?php 
			   }
				?>
            </div>
            <a href="#" class="view-btn">View all</a> 
		</div>
    </div>

    <!-- Section 4 / Our Recent Products -->
    <div class="home-03 grey-bg">
        <h2>Our Recent Projects</h2>
        <div class="projects-row">
            <div id="owl-example" class="owl-carousel">
			<?php 
			$args=array
					(
							'post_type'      =>'recent_projects',
							'posts_per_page' => -1,
							'order'          => 'ASC',
					);
					$projects = new WP_Query($args);
					
					while( $projects -> have_posts() ) : $projects -> the_post();
					
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($projects->ID),'recent_project_size' ); 
			?>
                <div class="projects"> 
						<img src="<?php echo $src[0];?>" alt="<?php the_title();?>" />
                    <div class="overlay">
                        <div class="display-table">
                            <div class="display-cell">
                                <h5><?php the_field('frame_size',$projects->ID);?></h5>
                                <h3><?php the_title();?></h3>
                                <h4><?php the_field('address',$projects->ID);?></h4>
                                <p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 150);?></p>
                                <a href="<?php the_permalink();?>" class="view-more">View More</a>
							</div>
                        </div>
                    </div>
                </div>
		  <?php 
				endwhile;
				wp_reset_query();
	      ?>
            </div>
        </div>
    </div>

    <!-- Section 5 / Our Blog -->
    <div class="home-04 white-bg">
        <h2>Our Blog</h2>
        <div class="container">
            <div class="row">
			<?php 
			$args=array
					(
							'post_type'      =>'post',
							'posts_per_page' => 2,
							'order'          => 'DESC',
					);
					$blog = new WP_Query($args);
					
					while( $blog -> have_posts() ) : $blog -> the_post();
					
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($blog->ID),'home_blog_size' ); 
			?>
                <div class="col-sm-6">
                    <div class="h-blog">
                     <a href="<?php the_permalink();?>"><figure><img src="<?php echo $src[0];?>" alt="<?php the_title();?>" /></figure>
                        <h3><?php the_title();?></h3></a>
                        <div class="text">
                            <h5><?php echo get_the_date('d M, Y');?></h5>
                             <p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 162);?></p>
                        </div>
                    </div>
                </div>
				<?php 
				endwhile;
				wp_reset_query;
				?>
            </div>
            <a href="<?php echo site_url();?>/blog.php" class="view">View All <span><img src="<?php echo get_template_directory_uri();?>/images/arrow-right.png" alt="arrow-right" /></span></a>
        </div>
    </div>
<?php get_footer();?>		