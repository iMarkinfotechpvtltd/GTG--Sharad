<?php 
/* Template Name: Product Template
*/ 
 get_header();
 
 global $post;
 ?>
 

<!-- Main Content -->
    <section class="products">
	
		<?php
				$our_product_image=get_post_meta($post->ID,"product_banner_image",true);	
				$thumb1 = wp_get_attachment_image_src($our_product_image, 'product_banner_image_size' );
		?>
			
        <div class="banner"><img src="<?php  echo $thumb1['0']; ?>" alt="products-banner" />
            <div class="heading">
                <div class="container">
                    <h1><?php the_field('our_product_heading',$post->ID);?></h1>
                    <p><?php the_field('our_products_description',$post->ID);?></p>
                </div>
            </div>
        </div>

        <!-- MAin content-->
        <div class="pro-content">
            <div class="container">
                <div class="pro-tabs">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php the_field('wholesale_products_heading',$post->ID);?></a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
						<?php the_field('manufacturing_products_heading',$post->ID);?></a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="wholesale-pro">
                                <p><?php the_field('wholesale_products_description',$post->ID);?></p>
                                <div class="pro-list">
                                    <div class="row">
                                        <ul>
		
									<?php
									$args = array( 'taxonomy' => 'wholesale_category','hide_empty'=> 0 , 'parent' => 0);
									$terms = get_terms('wholesale_category', $args);
									if (count($terms) > 0) 
									{
									$i=1;
									foreach ($terms as $term) 
									{
									?>
									 <li class="col-sm-6">
										<div class="item-box">
											 <figure><a href="<?php echo get_category_link( $term->term_id ); ?>">
											 <img src="<?php echo z_taxonomy_image_url($term->term_id,'full'); ?>" 
											 alt="<?php echo $term->name;?>"></a> </figure>
											<a href="<?php echo get_category_link( $term->term_id ); ?>">
											<h2><?php echo $term->name;?></h2></a>
											<ul>

											<?php
											$args1 = array( 'taxonomy' => 'wholesale_category','hide_empty'=> 0 , 'parent' => $term->term_id);
											$terms1 = get_terms('wholesale_category', $args1);
											if (count($terms1) > 0) 
											{
												foreach ($terms1 as $term11) 
												{
											?>
											<li><a href="<?php echo get_category_link( $term11->term_id ); ?>" id="product_cat_<?php echo $term11->term_id; ?>"><?php echo $term11->name; ?></a></li>
											<?php 
												}
											}
											?>
											</ul>
										</div>
									<?php 
									$i++;
									}//end of main foreach loop

									}//end of main if condition
									?>
											
                                        </ul>
                                    </div>
                                </div>
                            </div><!--wholesale-pro-->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
						
							<div class="wholesale-pro">
                                <p><?php the_field('manufacturing_products_description',$post->ID);?></p>
                                <div class="pro-list">
                                    <div class="row">
                                        <ul>
										<?php
				
										$args = array( 'taxonomy' => 'manufacturing_category','hide_empty'=>0,'parent' => 0 );
											$terms = get_terms('manufacturing_category', $args);
                
											foreach ($terms as $term) 
											{
										?> 
										
                                           <li class="col-sm-6">
											<div class="item-box">
											 <figure><a href="<?php echo get_category_link( $term->term_id ); ?>">
											 <img src="<?php echo z_taxonomy_image_url($term->term_id,'full'); ?>" 
											 alt="<?php echo $term->name;?>"></a> </figure>
											<a href="<?php echo get_category_link( $term->term_id ); ?>">
											<h2><?php echo $term->name;?></h2></a>
											<ul>

											<?php
											$args1 = array( 'taxonomy' => 'wholesale_category','hide_empty'=> 0 , 'parent' => $term->term_id);
											$terms1 = get_terms('wholesale_category', $args1);
											if (count($terms1) > 0) 
											{
												foreach ($terms1 as $term11) 
												{
											?>
											<li><a href="<?php echo get_category_link( $term11->term_id ); ?>" id="product_cat_<?php echo $term11->term_id; ?>"><?php echo $term11->name; ?></a></li>
											<?php 
												}
											}
											?>
											</ul>
										</div>
									<?php 
									$i++;
									}//end of main foreach loop

									
									?>
											
                                        </ul>
                                    </div>
                                </div>
                            </div><!--wholesale-pro-->
						
						</div>
                    </div>
                </div>


            </div>
        </div>
    </section>

<?php get_footer();?>	