<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<?php 
    $cat = get_the_category()[0];
    $color = get_tax_meta($cat->term_id,'color_field_id');
    $image = get_tax_meta($cat->term_id,'image_field_id');
    $image = $image['src'];

    $arrCountDown=countDown(the_ID());
?>

<?php //THIS WAS COPIED FROM CONTENT.PHP?>
<div class="innerpage3">
<div style="height:10px;margin-bottom:12px; background-color:<?php echo $color;?>;"></div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="clear">
       	<div class="innermain">
            	<div class="rightboxinner">
                	<div class="nobig">
                    	<div class="iniconarea marginbottom category-icon-in-question" style="background:<?php echo $color;?> url('<?php echo $image; ?>') no-repeat center 40%;">
                            <div><?php echo $cat->name;?></div>
                        </div>
                    </div>
                    <!--<img src="<?php bloginfo( 'template_url' ); ?>/images/innericon.jpg">-->
                    <div class="nobig">
                        <div class="imagbox marginbottom" >
                            <?php the_post_thumbnail( $size, $attr ); ?> 
                            <!--<img src="<?php bloginfo( 'template_url' ); ?>/images/smallbanner.jpg">-->
                        </div>
                    </div>
                </div>
                <div class="innleft">
                    <div class="innerleftcont">
                        <div class="innerlefttop">
                            <div class="retioportion">
                                <div class="tophead">סיום הסקר והצגת התוצאות בעוד</div>
                                <div class="countdown">
                                    <div class="number"><?php echo $arrCountDown['minutes']; ?></div>
                                    <div class="number"><?php echo $arrCountDown['hours']; ?></div>
                                    <div class="number"><?php echo $arrCountDown['days']; ?></div>
                                </div>
                            </div>
                            <div class="innertxtportion">
                            	<div class="txtin"><?php the_content();?></div>
                            </div>
                        </div>
                        <!--<div class="bigfont">מי הקבוצה <br>שתזכה העונה באליפות?</div>-->
                        <div class="bigfont"><?php echo get_post_custom_values('wpcf-question')[0]; ?></div>
                        <div class="innerlist">
                    	<ul>
                        
						<?php
						$surveyID = get_the_ID();
						$answers = GetAnswers($surveyID);
						if($answers): foreach($answers as $answer):
						?>
                        
                        <li>
                        <form method="post" name="voteForm<?php echo $answer->meta_id ?>">
                        <input type="hidden" name="answerID" value="<?php echo $answer->meta_id ?>" />
                        <input type="hidden" name="surveyID" value="<?php echo $surveyID ?>" />
                        <input type="submit" name="vote" value="<?php echo $answer->meta_value ?>" />
                        </form>
                        </li>
                        <?php
						endforeach; endif;
                        ?>

                        </ul>
                    </div>
                    </div>
                    <div class=""><img src="<?php bloginfo( 'template_url' ); ?>/images/addbanner.jpg"></div>
                </div>
                <div class="profilearea" style="background-color:<?php echo $color;?>;">
                	<div class="head">השתתפו<br />בסקר</div>
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