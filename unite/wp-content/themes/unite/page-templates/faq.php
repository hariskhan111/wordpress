<?php
	/**
	 * Template Name: FAQ
	 *
	 * @package WordPress
	 * @subpackage Twenty_Seventeen
	 * @since 1.0
	 * @version 1.0
	 */
	 
	
	get_header(); ?>

<script>
		
	 jQuery(document).ready(function(){
        // Hide all by default
        jQuery(".faq-main-detail").hide();	
        jQuery(".first-div").show();	
        
        jQuery(".faq-main-h3").click(function(){	
            var choose =(this.id);
            jQuery(".faq-main-h3").removeClass("a-hover-active");	
            jQuery("#"+choose).addClass("a-hover-active", 1000);	
            jQuery(".faq-main-detail").hide();
            jQuery("#faq_detail_"+choose).slideToggle(300);	
        });
        });
	
</script>
<div class="page_col_top main_col_top pull-left pull-width">
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
        <div class="single_post single_detail pull-width pull-left">
        
        <div class="faqs_post_left pull-left col-sm-9 col-xs-12 col-lg-9 padding_left">
		<ul data-uk-accordion="collapsible: false">
			<?php
				$args = array('posts_per_page'=> -1,'offset'=> 0,'category'=> 23,'order'=> 'ASC','post_type'=> 'faq','post_status'=> 'publish','suppress_filters'=> true );
				$listposts = get_posts( $args );
				$inc = 0;						
				$catcounter = 0;				
				foreach($listposts as $post ):
				$inc++;
				$post = get_post($post->ID);
				if($inc == 1){				
					$firstclass = 'first-div';
					$activeheadingclass = 'a-hover-active';				
				}else{				
					$firstclass = '';
					$activeheadingclass = '';			
				}								
				
				?>
                <li>
								<h3 class="uk-accordion-title"><?php echo get_the_title( $post->ID ); ?></h3>
								<div class="uk-accordion-content">
									<span><?php echo $content = $post->post_content; ?></span>
								</div>
							</li>
			
			<?php endforeach; ?>
            </ul>
            </div>
            <div class="single_post_right faqs_post_right pull-left col-sm-3 col-xs-12 col-lg-3 padding_right">
        	<div class="right-sidebar pull-left pull-width">
							<div class="follow-us pull-left pull-width hide">
								<h3>Follow Us<span></span></h3>
								<div class="single_social_links_main pull-left pull-width">
									<?php echo wen_social_links(); ?> 
								</div>
							</div>
							<div class="follow-us pull-left pull-width">
								<h3>Get in Touch</h3>
								<?php dynamic_sidebar( 'sidebar-3' ); ?>
							</div>
						</div>
        </div>
		</div>
	</div>
</div>
</div>
<?php
get_footer();