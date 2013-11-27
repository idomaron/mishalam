<?php
/*
Plugin Name: WordPress Category Posts
Plugin URI: http://watershedstudio.com/portfolio/software-development/wordpress-category-posts-plugin/
Description: List the posts in a specific category
Author: Watershed Studio, LLC
Version: 2.0
Author URI: http://watershedstudio.com/
*/ 

function wp_cat_posts( $catID = 0 ) {
	$catID = (int) $catID;
	$posts = get_posts(array('category' => $catID, 'numberposts' => -1, 'order' => ASC, 'orderby' => title));
	
	foreach( (array) $posts as $post ) {
		echo '<a href="' . get_permalink($post->ID) . '">' . $post->post_title . '</a><br />';
	}
}

?>