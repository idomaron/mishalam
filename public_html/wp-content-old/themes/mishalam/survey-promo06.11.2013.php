<?php
/**
 * The template for displaying survey's promo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="border: solid 3px red; margin:5px; float: left;">
	<div style="color:red">alternating survey >> <br/>these should be styled according to the design</div>
	<header class="entry-header">
		<h3 class="entry-title">
			<a href="<?php echo esc_url( twentythirteen_get_link_url() ); ?>"><?php the_title(); ?></a>
		</h2>
	</header><!-- .entry-header -->
	<?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>
<img src="<?php echo $large_image_url[0]; ?>" />
	<div class="entry-content">
    	<div class="iconarea"><img src="<?php echo get_post_meta($post->ID, 'smallbannericon', true); ?>"</div>
    	<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
</article><!-- #post -->
