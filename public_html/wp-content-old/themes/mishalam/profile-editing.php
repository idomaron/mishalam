<?php
/*template name:profile-editing*/
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
                    <div class="totalproblog">
					<div class="edittop">
                    	<div class="profilesingle">
                        	<div class="nametxt">*שם פרטי</div>
                            <div class="rightboxprofile"><input name="" type="text" class="fieldpro" /></div>
                        </div>
                        <div class="profilesingle">
                        	<div class="nametxt">*שם משפחה</div>
                            <div class="rightboxprofile"><input name="" type="text" class="fieldpro" /></div>
                        </div>
                        <div class="profilesingle">
                        	<div class="nametxt">דוא”ל</div>
                            <div class="rightboxprofile"><input name="" type="text" class="fieldpro" /></div>
                        </div>
                    </div>
                    <div class="protxt">
                    	טקסט כלשהו לגבי חשיבות הנתונים למידע הסטטיסטי ושמירה על פרטיות ושזה לא חובה למלא אבל חשוב כדי לקבל מידע שיעזור וכו וכו
                    </div>
                    <script type="text/javascript">
					$(function () {
						$(".country_id").selectbox();
					});
					</script>
                    <div class="profilesingleselect">
                        	<div class="nametxt">*מין</div>
                            <div class="rightboxprofileselect">
                            <select name="" class="country_id">
                            	<option>Male</option>
                                <option>Female</option>
                            </select>
                            </div>
                    </div>
                    <div class="profilesingleselect">
                        	<div class="nametxt">*גיל</div>
                            <div class="rightboxprofileselect">
                            <select name="" class="country_id">
                            	<option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                            </select>
                            </div>
                    </div>
                    <div class="profilesingleselect">
                        	<div class="nametxt">*מצב משפחתי</div>
                            <div class="rightboxprofileselect">
                            <select name="" class="country_id">
                            	<option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                            </select>
                            </div>
                    </div>
                    <div class="profilesingleselect">
                        	<div class="nametxt">אזור מגורים</div>
                            <div class="rightboxprofileselect">
                            <select name="" class="country_id">
                            	<option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                            </select>
                            </div>
                    </div>
                    <div class="profilesingleselect">
                        	<div class="nametxt">הכנסה</div>
                            <div class="rightboxprofileselect">
                            <select name="" class="country_id">
                            	<option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                            </select>
                            </div>
                    </div>
                    <div class="profilesingleselect">
                        	<div class="nametxt">השכלה</div>
                            <div class="rightboxprofileselect">
                            <select name="" class="country_id">
                            	<option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                            </select>
                            </div>
                    </div>
                    <div class="profilesingleselect">
                        	<div class="nametxt">יליד ישראל</div>
                            <div class="rightboxprofileselect">
                            <select name="" class="country_id">
                            	<option>lorem ip</option>
                                <option>lorem ip</option>
                                <option>lorem ip</option>
                            </select>
                            </div>
                    </div>
                    <div class="profilesingleselect">
                        	<div class="nametxt">דת</div>
                            <div class="rightboxprofileselect">
                            <select name="" class="country_id">
                            	<option>lorem ip</option>
                                <option>lorem ip</option>
                            </select>
                            </div>
                    </div>
                    <div class="profilesingleselectbut">
                    	<div class="buttonareapro">
                        	<div class="txtleft">*שדה חובה</div>
                            <div class=""><input name="" class="bluebut" value="שמירה" type="button" /></div>
                        </div>
                    </div>
                    </div>
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