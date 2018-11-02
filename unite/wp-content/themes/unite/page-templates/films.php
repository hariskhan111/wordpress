<?php
	/**
	 * Template Name: Films
	 *
	 */
	 
	
	get_header(); ?>
<style>
	#ourpartnerss{display:none;}
</style>
<?php
	$id = get_the_ID();
	$contact_us = get_post($id);
	//print_r($contact_us);
	
	$current_pageID = $contact_us->ID;
	$page_map = '';
	$banner_image = get_field( "banner_image", $contact_us->ID );
	$page_map = get_field("extra_information", $contact_us->ID);
	$form_bottom = '';
	$form_bottom = get_field( "pagesubtitle", $contact_us->ID );	
	$page_title = get_the_title( $id->ID );	
	$content = $contact_us->post_content;
	$trimmed_content = wp_trim_words( $content, 50, '...');							
	  ?>
<div class="page_col_top about_us_top pull-left pull-width">
	<div class="page_col_top about_us_top pull-left pull-width">
		<header class="entry-header pull-left pull-width bg_banner_image <?php if($banner_image == ''){echo 'banner_image_defualt';}?>"  <?php if($banner_image != ''){?> style="background-image:url(<?php echo $banner_image['url']; ?>)"<?php } ?> >
			<div class="site-inner">
				<div class="inner_page_heading pull-left pull-width">
					<div class="page_title pull-left pull-width text-center">
						<h1><?php echo $page_title; ?></h1>
					</div>
				</div>
			</div>
		</header>
		<div class="page_col_toper main_col_top pull-left pull-width">
			<div class="site-inner">
				<div class="contact_form_top inner_pages_main pull-left pull-width position_relative">
					<div class="OurRepairServices_posts pull-left pull-width">
						<div class="OurRepairServices_new pull-left pull-width">
							<?php
								$productCounter = 1;
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$args = array('posts_per_page'=> 6,'order'=> 'ASC','post_type'=> 'films', 'paged' => $paged, 'post_status'=> 'publish','suppress_filters'=> true );
								
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
													/*$imag = get_field( "custom_image", $post->ID );
														if ($image != " "){
														echo '<img src="'.$imag['url'].'" alt="" />';
													}*/
													if (has_post_thumbnail($post->ID) ){
													
													       $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
													
														echo '<img src="'.$image[0].'" style="height:350px" alt="">';
													
													}
													?>
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
														<!--<span class="btn-sm servise-fa-eye"><i class="fa fa-eye" aria-hidden="true"></i></span>-->
													</p>
												</div>
											</div>
										</a>
										
									</div>
									<!-- end normal -->
								</div>
							</div>
							<?php if ($productCounter==3){
								echo '<hr>';
								                    echo '</div><div class="OurRepairServices_new pull-left pull-width">';

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
						
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();