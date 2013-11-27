<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<div class="maintopsection">
	<div class="content-index-inner">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="textareainner-page">
                <div class="txt-pageinner">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
					<header class="entry-header">
                    	<div class="headerbut"><a href="#"></a></div>
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post -->
                </div>
                </div>
				
			<?php endwhile; ?>
			<?php
			wp_reset_postdata();
		
			//querying for homepage alterneating surveys:
			$args = array(
				'post_type'	=> 'survey',
				'posts_per_page'=> 8, //TODO: shold receive only 1 post !!!!
				'meta_query'=> array(
					array(
						'key' => 'static_pages_sidebars',
						'value' => 1,
					)
				)
			);
			$wp_query = new WP_Query($args);
			?>
            <div class="innerloop">
            <?php 
			while ($wp_query->have_posts()) : $wp_query->the_post();
				get_template_part('survey','promo');
			endwhile;
			?>		
            </div>	
		</div><!-- #content -->
	</div><!-- #primary -->
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>