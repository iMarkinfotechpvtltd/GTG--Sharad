<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 
global $post;

 
while ( have_posts() ) : the_post();
 
?>

    <!-- Main Content -->
    <section class="detail_product">
        <div class="container">
            <a class="back_to_product" href="" onclick="history.go(-1);">
                << Back to products </a>
                    <div class="single_product">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="img_prdct">
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
                            </div>
                            <div class="col-md-8">
                                <div class="dtl_prdct">
                                    <h2><?php the_title();?></h2>
                                        <?php the_content();?>
                                    <table class="table table-hover prdct_tbl">
                                        <thead>
                                            <tr>
                                                <th>Item No:</th>
                                                <th>Description</th>
                                                <th>Length</th>
                                                <th>Available state</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cls_tr">
                                                <td id="p_id"><?php the_title();?></td>
                                                <td id="description"><?php the_field('description',$post->ID);?></td>
                                                <td id="length"><?php the_field('length',$post->ID);?></td>
                                                <td id="available_state"><?php the_field('available_state',$post->ID);?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="options">
                                        <div class="lft_part">
                                            <div class="fld">
                                                <label>Quantity:</label>
                                                <input type="text" value="" placeholder="" id="quantity">
                                            </div>
                                            <div class="fld">
                                                <label>Size:</label>
                                                <input type="text" value="" placeholder="" id="size">
                                            </div>
                                            <div class="fld">
                                                <label>Color:</label>
                                                <input type="text" value="" placeholder="" id="color">
                                            </div>
                                        </div>
                                        <div class="rght_part">
                                            <a href="#" data-toggle="modal" data-target="#myModal" id="btn_quote">Request to Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
	<?php 
	
	// End of the loop.
		endwhile;
	?>				
					
                    <div class="related_products">
                        <h2>Related Parts</h2>
                        <div class="product_des_box">
                            <ul>
					  <?php

					     $args = array('post_type' => 'wholesale','posts_per_page' =>-1,'wholesale_category'=>$category->slug,'parent' => $category->term_id);
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
										<img src="<?php echo $image[0]; ?>" alt="<?php the_title();?>"/>
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
							</li>
							<?php
							endwhile;
							wp_reset_query();															
							?>
                            </ul>
                        </div>
                    </div>
				</div>
    </section>

	
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
		</button>
        <h4 class="modal-title" id="myModalLabel">Request Quote</h4>
      </div>
      <div class="modal-body">
          <!--<div class="row">
			  <div class="col-md-6">
				  <div class="combo">
						<label> Item no. :</label><input type="text" id="item_pid"/>
				  </div>
			  </div>
              <div class="col-md-6">
				 <div class="combo">
					<label> length :</label><input type="text" id="item_plength"/>
				</div>
			  </div>
              <div class="col-md-6">
					<div class="combo">
						<label> Available state :</label><input type="text" id="item_avl_state"/>
					</div>
			  </div>
              <div class="col-md-6">
					<div class="combo">
						<label> Quantity :</label><input type="text" id="item_qty"/>
					</div>
              </div>
              <div class="col-md-6">
					<div class="combo">
						<label> Size</label><input type="text" id="item_size"/>
					</div>
			  </div>	
              <div class="col-md-6">
					<div class="combo">
						<label> Color :</label><input type="text" id="item_color"/>
					</div>
			  </div>
              <div class="col-md-12">
				    <div class="combo">
						<label> Description :</label><input type="text" id="item_desc"/>
					</div>
			  </div>
              <div class="col-md-6">
				<label><i class="fa fa-user" aria-hidden="true"></i> Name</label><input type="text" id="name">
              </div>
              <div class="col-md-6">
				<label><i class="fa fa-envelope" aria-hidden="true"></i> Email</label><input type="email" id="email">
              </div>
              <div class="col-md-6">
				<label><i class="fa fa-mobile" aria-hidden="true"></i> Phone number</label><input type="text" id="phone_number">
              </div>
              <div class="col-md-6">
				<label><i class="fa fa-fax" aria-hidden="true"></i> Fax</label><input type="text" id="fax">
              </div>
              <div class="col-md-6">
				<label><i class="fa fa-map-marker" aria-hidden="true"></i> Address</label><input type="text" id="address">
              </div>
              <div class="col-md-6">
				<label><i class="fa fa-map-marker" aria-hidden="true"></i> City</label><input type="text" id="city">
              </div>
              <div class="col-md-6">
				<label><i class="fa fa-map-marker" aria-hidden="true"></i> State</label><input type="text" id="state">
              </div>
              <div class="col-md-6">
				<label><i class="fa fa-map-pin" aria-hidden="true"></i> Zip code</label><input type="text" id="zip_code">
              </div>
              <div class="col-md-12">
				<label><i class="fa fa-envelope" aria-hidden="true"></i> Message</label><textarea id="message"></textarea>
              </div>
          </div>
       <input type="submit" value="Send">-->


         <?php echo do_shortcode('[contact-form-7 id="194" title="Request Quote Form"]');?>
       
      </div>

    </div>
  </div>
</div>



<?php get_footer(); ?>