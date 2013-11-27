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
/*function isSurveyActive($survey){	
	$arrLT = get_post_custom_values('survey_lifetime', $survey->id);
	$hoursLT = intval($arrLT[0]);	
	$currentTime = time();
    $postTime = get_post_time('U', true);
    $lifeTime = $hoursLT*60*60;

    if(($currentTime - $postTime) < $lifeTime){$status=true;}
	else{$status=false;}
	
	return $status;
}*/

function isSurveyActive($surveyId){	
	$arrLT = get_post_custom_values('survey_lifetime', $surveyId);
	$hoursLT = intval($arrLT[0]);	
	
	$currentTime = time();
    $postTime = get_post_time('U', true);
    $lifeTime = $hoursLT*60*60;

    if(($currentTime - $postTime) < $lifeTime){$status=true;}
	else{$status=false;}
	
	return $status;
}




/* ========================= Surveys Functions START ========================= */

function VoteTo($surveyID, $answerID) {
	global $wpdb;
	if(!is_user_logged_in())
		return false;
	$data = array('userId' => get_current_user_id(), 'post_id' => get_the_ID(), 'meta_id' => $answerID);
	return $wpdb->insert('usersAnswers', $data);
}

function UserVotedTo($surveyID) {
	global $wpdb;
	if(!is_user_logged_in())
		return false;
	$userId = get_current_user_id();
	if(!$wpdb->get_row("SELECT * FROM usersAnswers WHERE userId = '$userId' AND post_id='$surveyID'"))
		return false;
	return true;
}

function GetAnswers() { // use inside loop of surveys
	global $wpdb;
	// Retrive possible answers					
	$answersTemp = explode('!!!SEP!!!', types_render_field('answer', array('separator'=>'!!!SEP!!!')));
	$answers = array();
	$surveyID = get_the_ID();
	// Build a new array of answers including meta_id, post_id, meta_key, meta_value (columns in wp_postmeta table) of each possible answer.
	foreach($answersTemp as $a) {
		$answers[] = $wpdb->get_row("SELECT * FROM wp_postmeta WHERE meta_key='wpcf-answer' AND meta_value='$a' AND post_id='$surveyID'");
	}
	return $answers;
}

function UsersVotedToAnswer($answerID) {
	global $wpdb;
	if(!is_user_logged_in())
		return false;
	$users = array();
	$votes = $wpdb->get_results("SELECT * FROM usersAnswers WHERE meta_id='$answerID'");
	foreach($votes as $vote) {
		$users[] = $vote->userId;
	}
	return $users;
}

/* ========================= Surveys Functions END ========================= */