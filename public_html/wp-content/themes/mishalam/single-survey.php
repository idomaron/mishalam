<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<?php
if(isset($_POST['vote'])) {
	if(!userVotedTo($_POST['surveyID'])) {
		voteTo($_POST['surveyID'], $_POST['answerID']);
	}
}
?>
<?php get_header(); ?>

<div id="primary" class="content-area">
  <div id="content" class="site-content" role="main">
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 
$now = time();
$published = strtotime(get_the_date());
$daysSincePublihsed = floor(($now - $published)/(60*60*24));
$lifetime = get_field('survey_lifetime');
$expired = $daysSincePublihsed > $lifetime;

if(isSurveyActive(get_the_ID()) && !UserVotedTo(get_the_ID())){	
	if(is_user_logged_in()){
		get_template_part( 'survey', 'question' );
	}else{
		get_template_part( 'survey', 'results' );
		echo '<script type="text/javascript">
			$(window).load( function(){
				$("a.topopup").trigger("click");
			});
			</script>';
	}
}
else {
	get_template_part( 'survey', 'results' );
}



/*if (get_the_ID()==22){get_template_part( 'survey', 'results' );}
else{get_template_part( 'survey', 'question' );}*/
?>
    <?php endwhile; ?>
  </div>
  <!-- #content --> 
</div>
<!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php
if(!is_user_logged_in()){
?>

<?php } ?>