<?php
/*====CUSTOM POST TYPE SURVEY ---START====*/

/**
 * Add survey custom post type
 */
function create_survey_post_type() {
	register_post_type( 'survey',
		array(
			'labels' => array(
				'name' => 'Surveys',
				'singular_name' => 'Survey',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Survey',
				'edit_item' => 'Edit Survey',
				'new_item' => 'New Survey',
				'view_item' => 'View Survey',
				'search_items' => 'Search Surveys',
				'not_found' =>  'Nothing Found',
				'not_found_in_trash' => 'Nothing found in the Trash',
				'parent_item_colon' => ''
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			//'menu_icon' => get_stylesheet_directory_uri() . '/yourimage.png',
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail','custom-fields'),
			'taxonomies' => array('category')
		)
	);
}
add_action( 'init', 'create_survey_post_type' );

/*Register footer categories sidebar*/
$args = array(
	'name'          => 'Footer Categories Sidebar',
	'id'            => 'footer_categories_sidebar',
	'description'   => '',
        'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' ); 
register_sidebar($args);

/*Including ONLY Surveys in the query:*/
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'survey','post'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

/*Check Survey isActive*/ 
function isSurveyActive($survey){	
	$arrLT = get_post_custom_values('survey_lifetime', $survey->id);
	$hoursLT = intval($arrLT[0]);	
	$currentTime = time();
    $postTime = get_post_time('U', true);
    $lifeTime = $hoursLT*60*60;

    if(($currentTime - $postTime) < $lifeTime){$status=true;}
	else{$status=false;}
	
	return $status;
}



/**
 * Add survey custom fields
 */
/*function add_survey_meta_boxes() {
	add_meta_box("survay_lifetime_meta", "Survey Lifetime", "add_survey_lifetime_meta_box", "survey", "normal", "low");
	add_meta_box("survay_promos_meta", "Survey Promos", "add_survey_promos_meta_box", "survey", "normal", "low");
}
function add_survey_lifetime_meta_box()
{
	global $post;
	$custom = get_post_custom( $post->ID );
	?>
	<style>.width99 {width:99%;}</style>
	<p>
		<label>Insert number of hours</label><br />
		<textarea rows="1" name="lifetime" class="width99"><?= @$custom["lifetime"][0] ?></textarea>
	</p>
	<?php
}
function add_survey_promos_meta_box()
{
	global $post;
	$custom = get_post_custom( $post->ID );
	?>
	<style>.width99 {width:99%;}</style>
	<p>
		<label>Question Promo</label><br />
		<textarea rows="3" name="lifetime" class="width99"><?= @$custom["question_promo"][0] ?></textarea>
	</p>
	<p>
		<label>Result Promo</label><br />
		<textarea rows="3" name="lifetime" class="width99"><?= @$custom["result_promo"][0] ?></textarea>
	</p>
	<p>
		<label>Homepage main image</label><br />
		<input type="checkbox" name="homepage-main" ><?= @$custom["homepage-main"][0] ?></textarea>
	</p>
	<?php
}
/**
 * Save custom field data when creating/updating posts
 */
/*
function save_survey_custom_fields(){
  global $post;
 
  if ( $post )
  {
    update_post_meta($post->ID, "lifetime", @$_POST["lifetime"]);
    update_post_meta($post->ID, "lifetime", @$_POST["question_promo"]);
	update_post_meta($post->ID, "lifetime", @$_POST["result_promo"]);
  }
}
add_action( 'admin_init', 'add_survey_meta_boxes' );
add_action( 'save_post', 'save_survey_custom_fields' );