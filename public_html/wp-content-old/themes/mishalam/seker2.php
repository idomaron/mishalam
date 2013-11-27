<?php
/*template name:Seker2*/
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header();?>
<?php //THIS WAS COPIED FROM CONTENT.PHP?>
<div class="innerpage3">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="clear">
       	<div class="innermain">
            	<div class="rightboxinner">
                <div class="nobig">
                	<div class="iniconarea marginbottom"><img src="<?php bloginfo( 'template_url' ); ?>/images/innericon.jpg"></div></div>
                   <div class="nobig"> <div class="imagbox marginbottom"><img src="<?php bloginfo( 'template_url' ); ?>/images/smallbanner.jpg"></div></div>
                </div>
                <div class="innleft">
                    <div class="innerleftcont">
                        <div class="innerlefttop">
                            <div class="retioportion">
                                <div class="tophead">סיום הסקר והצגת התוצאות בעוד</div>
                                <div class=""><img src="<?php bloginfo( 'template_url' ); ?>/images/ratioicons.png"></div>
                            </div>
                            <div class="innertxtportion">
                            	<div class="txtin">מכבי תל אביב מוליכה את הטבלה בפער של חמש נקודות, ורשמה ניצחון גדול בבורדו, אולם מכבי חיפה השיגה שלושה ניצחונות רצופים בליגה והפועל תל אביב טרם הפסידה העונה</div>
                            </div>
                        </div>
                        <div class="bigfont">מי הקבוצה שתזכה העונה <br />
באליפות?</div>
                        <div class="thumarea">
                        	<div class="thumsingle"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/graythum.png"></a></div>
                            <div class="thumsingle"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/bluethum.png"></a></div>
                        </div>
                    </div>
                    <div class=""><img src="<?php bloginfo( 'template_url' ); ?>/images/addbanner.jpg"></div>
                </div>
                <div class="profilearea">
                	<div class="headseker2">השתתפו<br />
בסקר</div>
					<div class="profilestic">
                    	<div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                        <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                        <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                        <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                        <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                        <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                    </div>
                </div>
         	</div>
	</div>
</article><!-- #post -->
</div>
<?php get_footer();?>