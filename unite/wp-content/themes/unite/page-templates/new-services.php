

<?php
	/**
	 * Template Name: New Services
	 *
	 * @package WordPress
	 * @subpackage Twenty_Seventeen
	 * @since 1.0
	 * @version 1.0
	 */
	 
	
	get_header(); ?>
<div id="main_col_top_1" class="page_col_top main_col_top pull-left pull-width">
	<div class="site-inner">
		<?php
			$id = get_the_ID();
			$page_title = get_the_title( $id->ID );
			?>
		<header class="entry-header">
			<div class="inner_page_heading pull-left pull-width">
				<div class="inner_page_heading pull-left pull-width text-center">
					<h1><?php echo $page_title; ?></h1>
				</div>
			</div>
		</header>
        
        <!-- Clasic Design  -->
		<div class="OurRepairServices_posts pull-left pull-width hide">
			<div class="our_services_new pull-left pull-width">
				<?php
					$productCounter = 1;
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array('posts_per_page'=> -1,'order'=> 'ASC','post_type'=> 'our_services', 'paged' => $paged, 'post_status'=> 'publish','suppress_filters'=> true );
					$lastposts = get_posts( $args );
					$inc = 0;
										
					foreach($lastposts as $post ):
					$postPermalink =  get_permalink( $post->ID );
					$inc++;
					?> 
				<div ID="services_<?php echo $inc; ?>" class="OurServices_posts_inner col-sm-4">
					<!-- normal img_col_new -->
					<div class="our_services_loop pull-left pull-width position_relative text-center">
						<div class="hovicon effect-1 sub-b">
							<?php
								$awesome_icons = get_field( "awesome_icons", $post->ID );
								$imag = get_field( "custom_image", $post->ID );
								if($awesome_icons != ''){
									echo $awesome_icons ;
								}elseif ($imag != ""){								
									echo '<img src="'.$imag['url'].'" alt="" />';
								}else{
									echo '<i class="fa fa-server" aria-hidden="true"></i>';
								}
								/*
								$imag = get_field( "custom_image", $post->ID );
									if ($image != " "){
									echo '<img src="'.$imag['url'].'" alt="" />';
								}
								
								if (has_post_thumbnail($post->ID) ){
								
								       $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
								
									echo '<img src="'.$image[0].'" alt="" />';
								
								}*/
								?>
						</div>
						<div class="our_services_inner_desc pull-left pull-width">
							<div class="our_services_desc_title pull-left pull-width">
								<h3><?php echo get_the_title( $post->ID ); ?></h3>
								<div class="our_services_desc_col pull-left pull-width">
                                <p>
									<?php 
										$content = $post->post_content;
										
										
										$trimmed_content = wp_trim_words( $content, 17, '' );
																			
										echo $trimmed_content;
										?>
								</p>
                                </div>
								<a class="more hvr-wobble-skew" href="<?php echo $postPermalink ;?>">View Detail</a>
							</div>
						</div>
					</div>
				</div>
				<?php if ($productCounter==3){
					echo '</div><div class="our_services_new pull-left pull-width">';
						$productCounter = 1;
						}else{
						$productCounter++;
					}
					endforeach; ?>
			</div>
		</div>
        
        <!-- Modren Design-->
        
        <div class="OurRepairServices_posts pull-left pull-width">
					<div class="OurRepairServices_new pull-left pull-width">
						<?php
							$productCounter = 1;
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array('posts_per_page'=> 14,'order'=> 'ASC','post_type'=> 'our_services', 'paged' => $paged, 'post_status'=> 'publish','suppress_filters'=> true );
							
							query_posts($args); 
							//$lastposts = get_posts( $args );
							
							$inc = 0;
							
							if ( have_posts() ) : while (have_posts()) : the_post();
													
							//foreach($lastposts as $post ):
							$postPermalink =  get_permalink( $post->ID );
							$inc++;
							?> 
						<div class="OurServices_posts_inner col-sm-4">
                        <div class="ourservices_new_loop pull-left pull-width">
							<!-- normal -->
							<div class="ih-item square effect10 left_to_right position_relative">
								<a href="<?php echo $postPermalink ;?>">
									<div class="img img_col position_relative">
										<?php
											$imag = get_field( "custom_image", $post->ID );
												if ($image != " "){
												echo '<img src="'.$imag['url'].'" alt="" />';
											}
											/*if (has_post_thumbnail($post->ID) ){
											
											       $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
											
												echo '<img src="'.$image[0].'" alt="" />';
											
											}*/
											?>
                                            
                                            <div class="img_overlay_new"></div>
									</div>
									<div class="info">
										<div class="info-back">
											<h3><?php echo get_the_title( $post->ID ); ?></h3>
											<p>
												<?php 
													$content = $post->post_content;
													
													$trimmed_content = wp_trim_words( $content, 20, '');	
													
													//$trimmed_content = wp_trim_words( $content, 20, '<span class="btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></span>' );
																						
													echo $trimmed_content;
													?>
                                                    
                                                    <span class="btn-sm servise-fa-eye"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                                    
											</p>
                                           
										</div>
									</div>
								</a>
                                <h4 class="text-center our_service_h"><?php echo get_the_title( $post->ID ); ?></h4>
							</div>
							<!-- end normal -->
							
                            </div>
						</div>
                        
                        <?php if ($productCounter==3){
                            echo '</div><div class="row pt32">';
                                $productCounter = 1;
                                }else{
                                $productCounter++;
                            }
							
							
                            //endforeach;
							
							
                            endwhile; ?>

									<!-- pagination -->

									<?php else : ?>

									<!-- No posts found -->

									<?php endif; ?>
                    </div>
                    <div class="pagination_inner pull-width pull-left">
                    <nav class="pagination">

                                        

                                            <?php pagination_bar(); ?>

                                        

									</nav>
                                    </div>
                                    
						<?php 
						/*if ($productCounter==3){
							echo '</div><div class="OurRepairServices_new pull-left pull-width">';
								$productCounter = 1;
								}else{
								$productCounter++;
							}
							endforeach;*/ ?>
                            
					</div>
					
				</div>
	</div>
</div>


<?php
get_footer();

