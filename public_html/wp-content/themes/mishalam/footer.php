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
			<?php 
			$args = array(
				'type'                     => 'survey',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 0,
				'hierarchical'             => 0,
			); 
			$surv_categories = get_categories( $args ); 
			foreach($surv_categories as $surv_cat){
				$cat_image = get_tax_meta($surv_cat->term_id,'image_field_id');
				$cat_image_src = $cat_image['src'];
			?>
            	<div class="iconarealo"><a href="<?php echo get_category_link( $surv_cat->term_id ); ?>"><img src="<?php echo $cat_image_src; ?>"><div class="txtfooter"><?php echo $surv_cat->name; ?></div></a></div>
            <?php } ?>
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
		 $("#drop").click(function (e) {
			var win_width = $(window).width();
			if(win_width > 768 )
			{
				$(".droparea").toggle();
                e.stopPropagation();
			}
		});
        $('body').click(function(){
            $(".droparea").hide();
        });
	});
	
	$( ".menubtn" ).click(function() {
	   $( ".navarea" ).slideToggle();
	});
	$( ".dropdown_small" ).click(function(e) {
	   $(this).find( ".droparea_small" ).toggle();
       e.stopPropagation();
	});

</script>
<?php wp_footer() ?>
</body>
</html>