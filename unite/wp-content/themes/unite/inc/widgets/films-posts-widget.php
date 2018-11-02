<?php

/**
 * Plugin Name: Films Posts
 * Unite Theme
 */
class unite_films_posts_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function unite_films_posts_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'unite_tabbes_widget', 'description' => __('Displays tabbes list of Films posts', 'unite') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'unite_tabbes_widget' );

		/* Create the widget. */
		parent::__construct( 'unite_tabbes_widget', __('Unite: Films Posts Widget', 'unite'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $argss, $instances ) {
		extract( $argss );

		/* Our variables from the widget settings. */
		$numbers = $instances['number'];

		?>


        <div class="widget tabbes">
            <div class="tabs-wrapper">
                <ul class="nav nav-tabs">
                      <li class="active"><a href="#films-posts" data-toggle="tab"><?php _e('Films', 'unite') ?></a></li>
                      
                </ul>

            <div class="tab-content">
            
            
                <ul id="films-posts" class="tab-pane active">

                    <?php
                        
						$films_posts = new WP_Query(array('showposts' => $numbers, 'ignore_sticky_posts' => 1, 'post_status' => 'publish', 'order'=> 'DESC', 'post_type'=> 'films', 'orderby' => 'meta_value'));
						
						//$films_posts = array('posts_per_page'=> 6,'order'=> 'ASC','post_type'=> 'films', 'post_status'=> 'publish','suppress_filters'=> true );
						
						//print_r($films_posts);
                    ?>

                    <?php while($films_posts->have_posts()): $films_posts->the_post(); ?>
                        <li>
                            <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php echo get_permalink() ?>" class="tab-thumb thumbnail" rel="bookmark" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail('tab-small'); ?>
                            </a>
                            <?php endif; ?>
                            <div class="content">
                                <a class="tab-entry" href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                <i>
                                    <?php the_time('M j, Y') ?>
                                </i>
                            </div>
                        </li>
                    <?php endwhile; ?>

                </ul>
                <?php //wp_reset_query(); ?>


                
                </div>
            </div>
        </div>

		<?php

	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instances = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instances['number'] = strip_tags( $new_instance['number'] );

		return $instances;
	}


	function form( $instances ) {

		/* Set up some default widget settings. */
		$defaults = array('number' => 3);
		$instances = wp_parse_args( (array) $instances, $defaults ); ?>

		<!-- Number of posts -->
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show','unite') ?>:</label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instances['number']; ?>" size="3" />
		</p>


	<?php
	}
}

?>