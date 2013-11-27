<?php
/**
 * The template for displaying static-page
 */
?>
<?php get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
<?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(9), 'large'); ?>
<img src="<?php echo $large_image_url[0]; ?>" />
<div class="bannericon"><img src="<?php echo get_post_meta(9, 'bannertoparrow', true); ?>"></div>
	<div class="entry-content imginfoboxbig">
		<div class="iconareabig"><a href="#"><img src="<?php echo get_post_meta(9, 'bannertopicon', true); ?>"></a></div>
                      	<div class="txtright">
                        	<div class="txtimgbig"><img src="<?php echo get_post_meta(9, 'yellowtext', true); ?>" /></div>
                            <div class="txt2"><?php $queried_post = get_post(9); ?>
<?php echo $queried_post->post_content;?></div>
                      	</div>
	</div><!-- .entry-content -->
</article><!-- #post -->
