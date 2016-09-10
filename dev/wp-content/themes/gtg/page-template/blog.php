<?php 
/* Template Name: Blog Template
*/ 
 get_header();?>
 
 
 
 <!--script use for load more acqulities--->
<script>
jQuery(document).ready(function()
{
	jQuery('#page_val').val();
});


function pagination()
{
   
	var page_val=jQuery('#page_val').val();
	var page_val1=parseInt(page_val)+1;
	
  //alert(page_val);
	// alert(page_val1);
	
	jQuery('#loading_sec').show();
	jQuery.ajax({
	type: "GET",
	url:"<?php bloginfo('template_url'); ?>/ajax/ajax.php",
	data:{page_val1:page_val1,format:'raw'},
	success:function(resp) 
	{
		
		
		if( resp !="")
		{
			
			// jQuery('#result').empty().append(resp)
			//alert(resp);
			jQuery('#loading_sec').hide();
			jQuery(resp).insertAfter(jQuery('.more_post>ul li:last')).fadeIn('slow');
			jQuery('#page_val').val(page_val1); 
			
		}
		else 
		{
			
			jQuery(".btn-box").hide();
			jQuery('#loading_sec').hide();
		}
	} 
	});
	
}
</script>



<!-- Main Content -->
    <section class="blog">
        <div class="container">
            <h1>Our Blog</h1>
            <div class="blog-white">
                <div class="row">
                    <div class="col-sm-8 blog-left more_post">
                        <ul>
						<?php 
						
						$args=array
								(
										'post_type'      =>'post',
										'posts_per_page' => 4,
										'order'          => 'DESC',
								);
								$blog = new WP_Query($args);
								
								while( $blog -> have_posts() ) : $blog -> the_post();
								
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
                            <!-- Blog Post -->
							<?php
														
								endwhile;
								wp_reset_query();
							?>
					</ul>	
							<div class="btn-box">
								<input type="hidden" name="page_val" id="page_val" value="1">
								<input type="Submit" value="Load More"  onclick="pagination();" class="load_more_btn  older-post">
                              
                            </div>
							<div id="loading_sec" style="display:none" align="center">
								<img src="<?php echo  get_template_directory_uri(); ?>/images/ajax-loader.gif" id="loader">
								<!--<img src="http://i.imgur.com/kh6soPe.gif">-->
							</div>
					 		
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
                                <ul class="blog_cat">
                                   <?php 
									$args = array(
													'type'       => 'post',
													'hide_empty' => 0   
													);
									$categories = get_categories( $args );
                  
									foreach($categories as $category)
									{
										if ($category->name != 'Uncategorized') 
										{
									?>
											<li><a href="<?php echo get_category_link( $category->term_id ); ?>" title="" class="<?php echo $category->slug; ?>"><?php echo $category->name;?></a></li>
											<?php
										}
									}				
									?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
 
 
<?php get_footer();?>	