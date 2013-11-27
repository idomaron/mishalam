<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	<div class="maintopsection-inner">
	<div class="content-index-inner2">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="overflow: hidden;">

		
<script type="text/javascript">
jQuery(document).ready( function(){
	jQuery('#active_surveys_btn, #survey_results_btn').click( function(){
		var act_rel = jQuery(this).attr('rel');
		jQuery('.active').each( function(){
			jQuery(this).removeClass('active');
		});
		jQuery(this).addClass('active');

		jQuery('.toggle_container').each( function(){
			jQuery(this).hide();
		});
		jQuery(act_rel).show();
	});
});
</script>

<?php 

//Get the correct taxonomy ID by slug
$cat = get_queried_object();
//Get Taxonomy Meta
$color = get_tax_meta($cat->term_id,'color_field_id');
$image = get_tax_meta($cat->term_id,'image_field_id');
$image = $image['src'];
?>


		<?php if ( have_posts() ) : ?>
			<header class="archive-header" style="background: <?php echo $color; ?> ;">
				<!--<h1 class="archive-title"><?php //printf( single_cat_title( '', false ) ); ?><img src="<?php //bloginfo( 'template_url' ); ?>/images/category.jpg" /></h1>-->
				<img src="<?php echo $image; ?>" />
				<h1 class="archive-title"><?php echo $cat->name; ?></h1>
				<div id="active_surveys_btn" rel="#active_surveys" class="active">סקרים פעילים</div>
				<div id="survey_results_btn" rel="#survey_results">תוצאות סקרים</div>
			</header><!-- .archive-header -->
            
            <!-- New Section START -->

            <!-- New Section END -->

			<?php /* The loop */ ?>
			
            <div class="loopinner2 toggle_container" id="active_surveys">
            <?php query_posts('cat=1&showposts=14'); ?>
			<?php 
			while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'survey', 'promo' ); ?>
			<?php endwhile; ?>
            <?php wp_reset_query(); ?>
			</div>
			
			<div class="survey_results toggle_container" id="survey_results">
				כאן תהיינה תוצאות סקרים..
			</div>
			
			<?php twentythirteen_paging_nav(); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>