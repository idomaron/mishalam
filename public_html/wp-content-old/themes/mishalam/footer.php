<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
        </div>
        </section>
        
        <section class="iconsection">
    	<div class="container">
        	<div class="iconsectioninner">
            	<div class="iconarealo"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon.png"><div class="txtfooter">פולט' מת'</div></a></div>
                <div class="iconarealo"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon2.png"><div class="txtfooter">כלכלה וחברה</div></a></div>
                <div class="iconarealo"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon3.png"><div class="txtfooter">חפדח</div></a></div>
                <div class="iconarealo"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon4.png"><div class="txtfooter">יהדות</div></a></div>
                <div class="iconarealo"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon5.png"></a><div class="txtfooter">מדﬠ ןכוכחבשׁה</div></div>
                <div class="iconarealo"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon6.png"></a><div class="txtfooter">איכות הסביבה</div></div>
                <div class="iconarealo"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon7.png"></a><div class="txtfooter">תרבות ופנאי</div></div>
                <div class="iconarealo"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/icon8.png"> <div class="txtfooter">הורות</div></a></div>
            </div>
        </div>
    </section>
    <section class="footersection">
    	<div class="container">
        	<div class="footerouter">
                <div class="footerinner">
                    <div class="lowerlogoarea">
                        <div class="lowerlogo"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/lowerlogo.png"></a></div>
                        <div class="logotxt">כל הזכיות שמורותלמשאל עם אתר הסקרים של ישראל</div>
                    </div>
                </div>
                <div class="footerinner">
                	<div class="lowerlink">
                    	<ul>
                        	<li><a href="#">סקר פוליטי מדיני</a></li>
                            <li><a href="#">סקר כלכלה וחברה</a></li>
                            <li><a href="#">סקר ספורט</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footerinner">
                	<div class="lowerlink">
                    	<ul>
                        	<li><a href="#">סקר מדע וטכנולוגיה</a></li>
                            <li><a href="#">סקר בנושא איכות הסביבה</a></li>
                            <li><a href="#">סקר בנושא תרבות ופנאי</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footerinner">
                	<div class="lowerlink">
                    	<ul>
                        	<li><a href="#">סקר בנושא הורות</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footerinner">
                	<div class="lowerlink">
                    	<ul>
                        	<li><a href="#">תקנון האתר</a></li>
                            <li><a href="#">צור קשר</a></li>
                            <li><a href="#">להזמנת סקרים</a></li>
                            <li><a href="#">הצעה לסקר</a></li>
                            <li>עיצוב אתר: אקטיב ברנגינג</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
	</section>
    <script>
	var win_width = $(window).width();
	var btn_navbar_click = 1;

	  //alert(win_width);
	$(document).ready(function() {
		 $("#drop").click(function () {
			var win_width = $(window).width();
			if(win_width > 768 )
			{
				$(".droparea").toggle();
			}
		});
	});
	
	$( ".menubtn" ).click(function() {
	$( ".navarea" ).slideToggle();
	});
	$( ".dropdown_small" ).click(function() {
	$( ".droparea_small" ).toggle();
	});
</script>
</body>
</html>