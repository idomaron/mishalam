<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header();?>
	<div class="maintopsection">
    <div class="content-index">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		
		<?php
			//querying for homepage main survey:
			$args = array(
				'post_type'	=> 'survey',
				'posts_per_page'=> 1, //TODO: shold receive only 1 post !!!!
				'meta_query'=> array(
					array(
						'key' => 'wpcf-hot-survey',
						'value' => 1,
					)
				)
			);
			$wp_query = new WP_Query($args);
			?>
            <div class="bigbannerarea">
            <?php
			while ($wp_query->have_posts()) : $wp_query->the_post();
				get_template_part('survey','homepage-main');	
			endwhile;
			?>
            </div>
            <?php 
			wp_reset_postdata();
			//querying for homepage alterneating surveys:
			$args = array(
				'post_type'	=> 'survey',
				'meta_query'=> array(
					array(
						'key' => 'wpcf-alternating',
						'value' => 1,
					)
				)
			);
			$wp_query = new WP_Query($args);
			?>
            <div class="loooparea">
            <?php
			while ($wp_query->have_posts()) : $wp_query->the_post();
				get_template_part('survey','promo');
			endwhile;
			?>
            </div>
            <div class="hidden-alternating" style="display:none;">
            <?php
			while ($wp_query->have_posts()) : $wp_query->the_post();
				get_template_part('survey','promo');
			endwhile;
			?>
            </div>
            <?php
			wp_reset_postdata();
		?>
		
		<section class="marqeeouter">
    	<div class="container">
        	<div class="marquarea">
            	<div class="txt3">
					<?php
                        echo do_shortcode('[horizontal-scrolling]');
                    ?>
                </div>
            	<div class="marquecover"></div>
            </div>
        </div>
    </section>
		
		<?php
			//querying for homepage alterneating surveys:
			$args = array(
				'post_type'	=> 'survey',
				'posts_per_page'=> 4, //TODO: shold receive only 1 post !!!!
				'meta_query'=> array(
					array(
						'key' => 'wpcf-home-bottom',
						'value' => 1,
					)
				)
			);
			$wp_query = new WP_Query($args);
			?>
            <div class="smallimgouter">
            <?php
			while ($wp_query->have_posts()) : $wp_query->the_post();
				get_template_part('survey','promo');
			endwhile;
			?>
           </div>
            <?php
			wp_reset_postdata();
		?>
		<div style="clear:both;"></div>
		</div><!-- #content -->
	</div><!-- #primary -->
</div>
</div>
<script type="text/javascript">
//Alternating:
function alternateImage(){
	var shownIds=[];
	var hiddenIds=[];
	$.each($('.loooparea .imageboxouter .survey'),function(i,e){
		shownIds.push($(this).attr('id'));
		
	});
	$.each($('.hidden-alternating .imageboxouter .survey'),function(i,e){
		if(shownIds.indexOf($(this).attr('id'))>-1){}//do nothing
		else{
			hiddenIds.push($(this).attr('id'));	
		}
	})

	if(hiddenIds.length>1){
		console.log(shownIds);
	console.log(hiddenIds);

	var s = Math.floor(Math.random() * (shownIds.length));
	var h = Math.floor(Math.random() * (hiddenIds.length));

	var hiddenS = $('.hidden-alternating #'+hiddenIds[h]).parent();
  	var shownS = $('.loooparea #'+shownIds[s]).parent();
	
	console.log(shownS);
  	console.log(hiddenS);
  	var temp=hiddenS.clone();
  	shownS.replaceWith(temp);	
	}
	else{console.log('smaller!');}
	
}
$(function(){
	$('.loooparea .imageboxouter:nth-child(n+5)').remove();
	window.setInterval(function(){alternateImage()},5000);
});
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>