<?php
/**
 * The template for displaying survey's promo
 */
$id =get_the_ID();
//Calculating if the survey isActive
$isActive = isSurveyActive($id);

?>
<div class="imageboxouter <?php if($isActive){echo 'active';}else{echo 'expired';}?>">
	<article id="post-<?php echo $id; ?>" <?php post_class(); ?>>
		<?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>
		<img src="<?php echo $large_image_url[0]; ?>" />
		<div class="entry-content imginfobox">
	    	<a href="<?php echo the_permalink();?>">
		    	
	    		<div class="iconarea"></div>
		    	<!--Ido commented- is it needed?
		    	<div class="iconarea"><img src="<?php echo get_post_meta($post->ID, 'smallbannericon', true); ?>" /></div>
		    	-->
		    	<div class="text1"><?php echo get_post_custom_values('wpcf-question')[0]; ?></div>
	    	</a>
		</div><!-- .entry-content -->
	</article><!-- #post -->
</div>
