<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 

get_header();
global $post;

$category = $wp_query->get_queried_object();

// echo '<pre>';

// print_r($category);

// echo '</pre>';

// die; 
?>
<!-- Main Content -->
    <section class="product_description">
        <div class="container">
            <h1><?php echo $category->name;?></h1>
            <p><?php echo $category->description;?></p>
            
			           <?php

						$args1 = array( 'taxonomy' => 'wholesale_category','hide_empty'=> 0 , 'parent' => $category->term_id);
						$terms1 = get_terms('wholesale_category', $args1);
						if (count($terms1) > 0) 
						{
							foreach ($terms1 as $term11) 
							{
						?>
						<div class="main_prdct_heading">
							<h3><a id="product_cat_<?php echo $term11->term_id; ?>"><?php echo $term11->name; ?></a></h3>
						 </div>	
						 
					<div class="product_des_box">
						<ul>
				
							<?php
					 $args = array('post_type' => 'wholesale','posts_per_page' =>-1,'wholesale_category'=>$category->slug);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							?>
							<li>
								<div class="outer_div">
									<div class="icon">
									<?php
									if ( has_post_thumbnail() ) 
									{
										$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'prd_desc_img_size' );
									?>
										<img src="<?php echo $image[0]; ?>"/>
									 <?php
									  } 
									  else 
									  { 
									?>
									<img src="http://placehold.it/193x109&amp;text=No image found" alt="<?php the_title();?>" class="img-responsive" />
									 <?php 
									 } 
									 ?>
							
									</div>
									<div class="info_pdct">
										<h3><?php the_title();?></h3>
										<p><?php the_field('description',$loop->ID);?></p>
									</div>
								</div>
									<a class="view_dtl_btn" href="<?php the_permalink();?>">view detail</a>
							</li>
							<?php
							endwhile;
							wp_reset_query();							
							?>
						</ul>
					</div>
						  
						<?php 
								
							}
						}
					?>
        </div>
    </section>
    
<?php get_footer(); ?>
