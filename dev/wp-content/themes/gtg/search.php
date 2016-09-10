<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<section class="blog">
        <div class="container">
            <h1>Our Blog</h1>
            <div class="blog-white">
                <div class="row">
                    <div class="col-sm-8 blog-left">
                        <ul>

							<?php if ( have_posts() ) : 
							
								// Start the loop.
								while ( have_posts() ) : the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									$src = wp_get_attachment_image_src( get_post_thumbnail_id($blog->ID),'blog_size' ); 
											 ?>
												<li>
													<a href="<?php the_permalink();?>" class="blog-post">
														<figure><img src="<?php echo $src[0];?>" alt="<?php the_title();?>" /></figure>
														<h2><?php the_title();?></h2>
														<figure class="shape"><img src="<?php echo get_template_directory_uri();?>/images/design-02.png" alt="" /></figure>
														<h4><?php echo get_the_date('M d, Y');?>/ by <?php the_field('posted_by',$blog->ID)?></h4>
														<?php the_content();?>
													</a>
												</li>
								<?php 
								// End the loop.
								endwhile;
								?>
						</div>
						 <div class="col-sm-4 blog-right">
                        <div class="blog-sidebar">
						<div class="search-box">
						<!--************************ START FORM TAG FOR CREATING SEARCH BOX *********************-->
			
							<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					   
								<input type="text" placeholder="SEARCH BLOG" name="s" id="s" value="<?php echo get_search_query(); ?>"><button type="submit" class="btn"><i class="fa fa-search"></i></button>

							</form>
			           <!--************************ END OF FORM TAG FOR CREATING SEARCH BOX *********************-->

                       </div>

                            <!-- Recent Posts -->
                            <div class="recent-posts">
                                <h3>Recent</h3>
								<?php 
									$args=array
									(
											'post_type'      =>'post',
											'posts_per_page' => 3,
											'order'          => 'DESC',
									);
									$blog = new WP_Query($args);
									
									while( $blog -> have_posts() ) : $blog -> the_post();
									
									$src = wp_get_attachment_image_src( get_post_thumbnail_id($blog->ID),'blog_small_size' ); 
								?>
								   
                                <a href="<?php the_permalink();?>">
                                     <figure><img src="<?php echo $src[0];?>" alt="<?php the_title();?>" /></figure>
                                    <h4><?php the_title();?></h4>
                                    <p><?php echo get_the_date('M d, Y');?></p>
                                </a>
								<?php 
									endwhile;
									wp_reset_query();
								?>
								
                            </div>

                            <!-- Categories -->
                            <div class="b-categories">
                                <h3>Categories</h3>
                                <ul>
                                    <li><a href="#">Mainframe</a></li>
                                    <li><a href="#">Sill</a></li>
                                    <li><a href="#">Lock and Hinge Style</a></li>
                                    <li><a href="#">Top & Bottom Rail</a></li>
                                    <li><a href="#">Subhead & Subsill</a></li>
                                    <li><a href="#">Curtain Wall</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
				</div>
            </div>
		</div>
		<?php 
			
		// If no content, include the "No posts found" template.
		else :
			// get_template_part( 'template-parts/content', 'none' );
			echo "SORRY, BUT NOTHING MATCHED YOUR SEARCH TERMS. PLEASE TRY AGAIN WITH SOME DIFFERENT KEYWORDS. ";

		endif;
		?>

 </section> 
<?php get_footer(); ?>
