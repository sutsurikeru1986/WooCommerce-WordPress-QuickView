<?php
/**
 *   Template Name: Quick View - WooCommerce
 */
?>
<?php

    $post = get_post($_GET['id']);
?>

<?php if ($post) : ?>

	<?php setup_postdata($post); ?>

	<div class="reveal-modal" data-reveal aria-labelledby="quickView" role="dialog">
	
		<div class="quickViewContainer">
		
			<h1><?php the_title(); ?></h1>
			
			<div class="row">
				
				<div class="medium-5 large-5 columns">
					
					<div class="quickView">
					
						<!-- Owl Carousel -->	
						<div id="slider" class="owl-carousel">
						
							<img src="image/slider1.jpg" />
							<img src="image/slider2.jpg" />
							<img src="image/slider3.jpg" />
							<img src="image/slider4.jpg" />
							
						</div>

					</div>	
					
				</div>
			
				<div class="medium-7 large-7 columns">

				   <div class="hidedetails">

						<div class="delivery">

						</div>
											
						<div class="coloravailable">
						
							<!-- Sample attribute list - Colour & Size - feel free to change to the ones you are using! -->

							<h3>Colours available</h3>

							<ul>
								<?php 
									$colours = get_the_terms( $product->id, 'pa_colour');

									if ( $colours && ! is_wp_error( $colours ) ) : 

									foreach ( $colours as $colour ) { ?>

										<li class='<?php echo $colour->name; ?>'></li>
										
								<?php } endif; ?> 
								
							</ul>											

						</div>
					
						<div class="clear"></div>

						<div class="sizeavailable">

							<h3>Sizes available</h3>

							<ul>
							
								<?php 
									$sizes = get_the_terms( $product->id, 'pa_size');

									if ( $sizes && ! is_wp_error( $sizes ) ) : 

									foreach ( $sizes as $size ) { ?>

								<li><?php echo $size->name; ?></li>
								
								<?php } endif; ?> 
								
							</ul>

						</div>

						<div class="productdescription">

							<p><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?></p>

						</div>
					   
						<div class="buynow">

							<a class="addtobag" rel="nofollow" href="#">Add to basket</a>

						</div>                      

					</div>                
					
				</div>
				
			</div>
				
		</div>
			
		<a id="closevidmodal" class="close-reveal-modal">&#215;</a>

	</div>
			
<?php endif; ?>
