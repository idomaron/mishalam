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

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php //printf( single_cat_title( '', false ) ); ?><img src="<?php bloginfo( 'template_url' ); ?>/images/category.jpg" /></h1>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
            <div class="loopinner2">
            <?php query_posts('cat=1&showposts=14'); ?>
			<?php 
			while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'survey', 'promo' ); ?>
			<?php endwhile; ?>
            <?php wp_reset_query(); ?>
			</div>
			<?php twentythirteen_paging_nav(); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>