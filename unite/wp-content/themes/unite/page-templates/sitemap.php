<?php
	/**
	 * Template Name: Sitemap page
	 *
	 * @package WordPress
	 * @subpackage Twenty_Seventeen
	 * @since 1.0
	 * @version 1.0
	 */
	 
	
	get_header(); ?>
    <style>
		.sitemap_page_inner ol {
		  padding-left: 20px;
		}
		.sitemap_page_inner ol li{
		  padding: 2px 0;
		}
	</style>
<?php
	$id = get_the_ID();
	$contact_us = get_post($id);
	//print_r($contact_us);
	$page_map = '';
	$current_pageID = $contact_us->ID;
	
	$banner_image = get_field( "banner_image", $contact_us->ID );
	$page_map = get_field("page_subtitle", $contact_us->ID);
	$form_bottom = '';
	$form_bottom = get_field( "current_page_slider", $contact_us->ID );
	
	$wp_category_id = get_field( "enter_wp_category_id", $contact_us->ID );
	$wp_category_name = get_field( "enter_wp_category_slug", $contact_us->ID );
		
	$page_title = get_the_title( $id->ID );	
	$content = $contact_us->post_content;
	$trimmed_content = wp_trim_words( $content, 50, '...');							
	  ?>
<div class="page_col_top about_us_top main_col_top pull-left pull-width">

<header class="entry-header pull-left pull-width bg_banner_image <?php if($banner_image == ''){echo 'banner_image_defualt';}?>"  <?php if($banner_image != ''){?> style="background-image:url(<?php echo $banner_image['url']; ?>)"<?php } ?>>
	<div class="site-inner">
		<div class="inner_page_heading pull-left pull-width">
			<div class="page_title pull-left pull-width text-center">
				<h1 style="padding-bottom: 30px;"><?php echo $page_title; ?></h1>
			</div>
		</div>
	</div>
</header>
<?php if ( !is_front_page() ) {?>
<div class="breadcrumbs_top products_silder_breadcrumbs pull-width pull-left">
	<div class="site-inner">
		<div class="products_silder_top pull-width pull-left">
			<div class="products_silder_inn pull-width pull-left">
				<?php
					if ($form_bottom != ""){
						echo do_shortcode($form_bottom);
					}
					?>
				<?php //echo do_shortcode('[rev_slider products_silder]'); ?>
			</div>
		</div>
		<div class="breadcrumbs" typeof="BreadcrumbList">
			<?php if(function_exists('bcn_display'))
				{
				    bcn_display();
				}?>
		</div>
	</div>
</div>
<?php }  ?>

    <div class="page_col_toper pull-left pull-width">
	<div class="site-inner">
		<div class="about_us_inn inner_pages_main pull-left pull-width">
			<div class="htmlSitemap pull-width pull-left">                        
						
						

<?php echo do_shortcode('[htmlSitemap]');?>
					</div>
		</div>
	</div>
    </div>
</div>
</div>
<?php
get_footer();