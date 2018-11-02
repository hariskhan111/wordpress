<?php

/**
 * Films  Widget
 * Unite Theme
 */
class unite_films_widget extends WP_Widget
{
    function unite_films_widget(){

       $widget_ops = array('classname' => 'unite-films','description' => esc_html__( "Unite Films Widget" ,'unite') );
       parent::__construct('unite-films', esc_html__('Unite Films Widget','unite'), $widget_ops);
    }

    function widget($args , $instance) {
    	extract($args);
        $title = isset($instance['title']) ? $instance['title'] : esc_html__('Films' , 'unite');

        echo $before_widget;
        echo $before_title;
        echo $title;
        echo $after_title;

        /**
         * Widget Content
         */ ?>

        <!-- films icons -->
        <div class="films-icons sticky-sidebar-films">

            <?php //unite_films_icons(); ?>

        </div><!-- end films icons --><?php

        echo $after_widget;
    }

    

}
?>