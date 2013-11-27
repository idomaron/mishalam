<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> dir="rtl">
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>

<link href="<?php bloginfo( 'template_url' ); ?>/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo( 'template_url' ); ?>/css/responsive.css" rel="stylesheet" type="text/css">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.js" /></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/script.js" /></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/script2.js" /></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.screwdefaultbuttonsV2.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.selectbox-0.2.js"></script>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
	
<?php wp_head(); ?>
<script type="text/javascript">
		$(function(){
			$('input:checkbox').screwDefaultButtons({
				image: 'url("<?php bloginfo( 'template_url' ); ?>/images/checkboxSmall.jpg")',
				width: 15,
				height: 15
			});
		});
	</script>
</head>
<body <?php body_class(); ?>>
<div id="toPopup">
  <div class="toPopupinner">
	<?php echo do_shortcode('[wp-members page="login"]'); ?>
    <!--<div class="singlebox">
      <div class="profilepic_pop"></div>
      <input name="" type="text" class="selectboxsmall" placeholder="שם משתמש">
    </div>
    <div class="singlebox">
      <div class="profilebusket"></div>
      <input name="" type="text" class="selectboxsmall" placeholder="סיסמא">
    </div>
    <div class="infoboxbut">
      <div class="checkboxleft">
        <div class="checksingle">
          <input type="checkbox" name="ex2_a" id="ex2_a">
        </div>
        <div class="checktxt">מאשר קבלת דיוור</div>
      </div>
      <div class="checkboxleft">
        <div class="checktxt"><a href="#">שכחת סיסמא?</a></div>
      </div>
    </div>
    <div class="">
      <input name="" type="button" class="logbut" value="כניסה">
    </div>-->
  </div>
</div>
<div id="toPopup2"<?php if(isset($_POST['submit'])) echo ' style="display:block"' ?>>
  <div class="toPopupinner">
	<?php echo do_shortcode('[wp-members page="register"]'); ?>
    <!--<div class="singlebox">
      <div class="profile_pop"></div>
      <input name="" type="text" class="selectboxsmall" placeholder="שם פרטי">
    </div>
    <div class="singlebox">
      <div class="profile_pop"></div>
      <input name="" type="text" class="selectboxsmall" placeholder="שם משפחה">
    </div>
    <div class="singlebox">
      <div class="profilebusketat"></div>
      <input name="" type="text" class="selectboxsmall" placeholder="דוא”ל">
    </div>
    <div class="singlebox">
      <div class="profilebusket"></div>
      <input name="" type="text" class="selectboxsmall" placeholder="סיסמא">
    </div>
    <div class="singlebox">
      <div class="profilebusket"></div>
      <input name="" type="text" class="selectboxsmall" placeholder="אישור סיסמא">
    </div>
    <div class="infoboxbut">
      <div class="checkboxleft">
        <div class="checksingle">
          <input type="checkbox" name="ex2_a2" id="ex2_a2">
        </div>
        <div class="checktxt">מאשר קבלת דיוור</div>
      </div>
      <div class="checkboxleft">
        <div class="checksingle">
          <input type="checkbox" name="ex2_a3" id="ex2_a3">
        </div>
        <div class="checktxt2">מאשר תקנון אתר</div>
      </div>
    </div>
    <div class="">
      <input name="" type="button" class="logbut" value="שלח">
    </div>-->
  </div>
</div>
<div class="loader"></div>
<div id="backgroundPopup"></div>
<div class="loader2"></div>
<div id="backgroundPopup2"></div>
<section class="bodypanel">
<section class="Toppanel">
  <div class="container">
    <div class="header">
      <div class="logoportion"><a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/logo.png" alt=""></a></div>
      <div class="txtimg"><img src="<?php bloginfo( 'template_url' ); ?>/images/headicon.png"></div>
      <div class="menubtn"> <span></span> <span></span> <span></span> </div>
      <div class="navarea">
        <div class="linksandicon">
          <div class="facebookicon">
            <div class="fb"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/facebook2.png"></a></div>
          </div>
          <div class="links">
            <ul>
              <li><a href="javascript:void(0)" class="topopup">כניסה</a></li>
              <li><a href="javascript:void(0)" class="topopup2">הרשמה</a></li>
           </ul>
          </div>
        </div>
        <div class="dropdown" id="drop"><span>איזה סקר מעניין אותך?</span>
          <div class="droparea">
            <ul>
              <?php 
                            $args= array(
                                'type' => 'survey',
                                'hide_empty' => 0,
                                'title_li' => '',
                            );
                            wp_list_categories($args);
                        ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="mainbody">
<div class="bodyshadow"></div>
<div class="container">
