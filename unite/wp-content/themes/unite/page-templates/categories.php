<?php
	/**
	
	 * Template Name: Categories Page
	
	 *
	
	 * @package WordPress
	
	 * @subpackage Twenty_Seventeen
	
	 * @since 1.0
	
	 * @version 1.0
	
	 */
	
	
	
	get_header(); ?>
<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content pull-left pull-width" role="main">
			<div class="site-inner">
				<div class="woocommerce_content pull-left pull-width">
					<div class="products_page pull-left pull-width">
						
                        <div class="home_category_inner product_CT sections_top pull-width pull-left">

								<?php
    global $product;
    $attributes = $product->get_attributes();
 
    if ( ! $attributes ) {
        return;
    }
 
    $out = '<ul class="custom-attributes">';
 
    foreach ( $attributes as $attribute ) {
 
 
        // skip variations
        if ( $attribute['is_variation'] ) {
        continue;
        }
 
 
        if ( $attribute['is_taxonomy'] ) {
 
            $terms = wp_get_post_terms( $product->id, $attribute['name'], 'all' );
 
            // get the taxonomy
            $tax = $terms[0]->taxonomy;
 
            // get the tax object
            $tax_object = get_taxonomy($tax);
 
            // get tax label
            if ( isset ($tax_object->labels->name) ) {
                $tax_label = $tax_object->labels->name;
            } elseif ( isset( $tax_object->label ) ) {
                $tax_label = $tax_object->label;
            }
 
            foreach ( $terms as $term ) {
 
                $out .= '<li class="' . esc_attr( $attribute['name'] ) . ' ' . esc_attr( $term->slug ) . '">';
                $out .= '<span class="attribute-label">' . $tax_label . ': </span> ';
                $out .= '<span class="attribute-value">' . $term->name . '</span></li>';
 
            }
 
        } else {
 
            $out .= '<li class="' . sanitize_title($attribute['name']) . ' ' . sanitize_title($attribute['value']) . '">';
            $out .= '<span class="attribute-label">' . $attribute['name'] . ': </span> ';
            $out .= '<span class="attribute-value">' . $attribute['value'] . '</span></li>';
        }
    }
 
    $out .= '</ul>';
 
    echo $out;
	?>

								

							</div>
					</div>
				</div>
			</div>
			<!-- #content --> 
		</div>
		<!-- #primary --> 
	</div>
</div>
<!-- #main-content -->
<?php
//get_sidebar();
get_footer();