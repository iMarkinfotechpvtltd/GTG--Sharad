<?php
include('../../../../wp-config.php');
global $post;

$display_count=4;

$offSet=$_GET['page_val1'];

$offSet = ( $offSet - 1 ) * $display_count; 

query_posts( array (  'post_type' => 'post', 'order'=> 'DESC','posts_per_page'=>$display_count,'offset'=>$offSet) );
			while ( have_posts() ) : the_post(); 
			$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'blog_size' ); 
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
			<?php endwhile;wp_reset_query(); ?>
