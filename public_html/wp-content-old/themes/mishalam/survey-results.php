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
<?php //THIS WAS COPIED FROM CONTENT.PHP?>
<div class="innerpage4">
	<div class="content-index-inner3">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="component clear">
            	<div class="rightboxinnerresult">
                    <div class="cyonbox">
                        <div class="innerbox">
                            <div class="iconarea"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/question-result.png" alt=""/></a></div>
                            <div class="head">שאלת הסקר</div>
                            <div class="txt3">מי הקבוצה שתזכה העונה <br />
    באליפות?</div>
                        </div>
                    </div>
                    <div class="smallbanner-result">
                        <div class="innerbox"><img src="<?php bloginfo( 'template_url' ); ?>/images/smallbanner.jpg" alt=""/></div>
                    </div>
                    <div class="profileareagreen">
                        <div class="head">המובילים<br />
    בסקרים</div>
                        <div class="profilesticgreen">
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                        </div>
                    </div>
                </div>
                <div class="leftboxinnerresult">
                <div class="facebook">
                	<div class="innerbox"><img src="<?php bloginfo( 'template_url' ); ?>/images/facewithbook.png" alt=""/></div>
                </div>
                <div class="afterfacebook">
                	<div class="innerbox">
                    	<div class="head">455</div>
                        <div class="txt">השתתפו בסקר</div>
                    </div>
                </div>
                <div class="grayarea">
                	<div class="innerbox">
                    	<div class="head">80%</div>
                        <div class="txt">למכבי תל-אביב</div>
                    </div>
                </div>
                <div class="colerbuletarea">
                	<ul>
                    	<li>
                        	<div class="violet"></div>
                            <div class="txtof">מכבי ת"א</div>
                        </li>
                        <li>
                        	<div class="green"></div>
                            <div class="txtof">הפועל ת”א</div>
                        </li>
                        <li>
                        	<div class="orange"></div>
                            <div class="txtof">בית”ר ירושלים</div>
                        </li>
                        <li>
                        	<div class="blue"></div>
                            <div class="txtof">מכבי חיפה</div>
                        </li>
                        <li>
                        	<div class="yellow"></div>
                            <div class="txtof">עירוני ק"ש</div>
                        </li>
                        <li>
                        	<div class="red"></div>
                            <div class="txtof">מועדון ספורט אשדוד</div>
                        </li>
                    </ul>
                </div>                
                <div class="graparea">
                	<script>
					 $(document).ready(function() {
						$(".css-tabs li").live("click", function(event){
						var this_id = $(this).attr('name');
					
						$('.css-tabs li').removeClass("active");
						$('*[id^=tab]').css('display', 'none');
						
						$(this).addClass("active");
						$(this_id).css('display', 'block');
						});
					 });
					</script>
                    <ul class="css-tabs">
                      <li name="#tab2"><a id="t1" ></a></li>
                      <li name="#tab1" class="active"><a id="t2" ></a></li>
                    </ul>
                	<div class="graph" id="tab1"><img src="<?php bloginfo( 'template_url' ); ?>/images/graph.jpg" alt=""/></div>
                    <div class="graph" id="tab2" style="display:none"><img src="<?php bloginfo( 'template_url' ); ?>/images/graph2.jpg" alt=""/></div>
                    <div class="backroundimgarea">
                    	<div class="dropdown_small">
                        	<span class="">השכלה</span>
                        	<div class="droparea_small">
                            	<ul>
                                	<li><a href="#">מין</a></li>
                                    <li><a href="#">גיל</a></li>
                                    <li><a href="#">מצב משפחתי</a></li>
                                    <li><a href="#">השכלה</a></li>
                                    <li><a href="#">אזור מגורים</a></li>
                                    <li><a href="#">יליד ישראל</a></li>
                                    <li><a href="#">דת</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="imgheaderresult">
                	<div class="head">אולי יעניין אותך גם:</div>
               
                <div class="imageresult">
                	<div class="imageboxouter">
                    	<div class="inbox">
                        
                        
                            <img src="<?php bloginfo( 'template_url' ); ?>/images/smallimg5.jpg" />
                        <div class="entry-content imginfobox">
                            <div class="iconarea"><img src="<?php bloginfo( 'template_url' ); ?>/images/txticon.png" /></div>
                            <div class="text1">קורקינט חשמל<br>
                    				או אופניים חשמליים
                                        </div>
                        </div>
                    </div>
					</div>
                    <div class="imageboxouter">
                    <div class="inbox">
                        
                        
                            <img src="<?php bloginfo( 'template_url' ); ?>/images/smallimg6.jpg">
                        <div class="entry-content imginfobox">
                            <div class="iconarea"><img src="<?php bloginfo( 'template_url' ); ?>/images/txticon.png"></div>
                            
                    <div class="text1">מה עדיף!<br>
אנדרואיד או אייפון?
                    </div>
                        </div><!-- .entry-content -->
                    </div><!-- #post -->
                    </div>
                    <div class="imageboxouter">
                    <div class="inbox">
                        
                        
                            <img src="<?php bloginfo( 'template_url' ); ?>/images/smallimg7.jpg">
                        <div class="entry-content imginfobox">
                            <div class="iconarea"><img src="<?php bloginfo( 'template_url' ); ?>/images/txticon.png"></div>
                            <div class="text1">מה הכי חשוב<br>
לך לדעת לפני קניית דירה</div>
                        </div><!-- .entry-content -->
                    </div><!-- #post -->
                    </div>              	
                </div> 
                </div>
                </div>
            </div>
        </article><!-- #post -->
	</div>
</div>