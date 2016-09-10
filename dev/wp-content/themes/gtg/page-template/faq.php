<?php 
/* Template Name: Faq Template
*/ 
 get_header(); 
?>
 
<!-- Main Content -->
    <section class="faq">
        <div class="container">
            <h1>FAQ</h1>

            <?php 
			$args=array
					(
							'post_type'      =>'faq',
							'posts_per_page' => -1,
							'order'          => 'ASC',
					);
					$faq = new WP_Query($args);
					
					while( $faq -> have_posts() ) : $faq -> the_post();
			?>
			
			<!--Ques 1 -->
            <h2><?php the_title();?></h2>
                 <?php the_content();?>

            <?php 
				endwhile;
				wp_reset_postdata();
			?>
        </div>
    </section> 
 

<?php get_footer();?>	