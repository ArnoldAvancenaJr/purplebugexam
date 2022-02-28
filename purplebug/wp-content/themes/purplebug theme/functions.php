<?php

function loadingFiles(){

    // CSS Styles    
	wp_enqueue_style( 'bootstrapCSS', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), false, 'all' );
	wp_enqueue_style( 'fontawsome', get_template_directory_uri() . '/assets/css/fonts/font-awesome.min.css');
    wp_enqueue_style( 'mystyles', get_template_directory_uri() . '/style.css', array(), false, 'all' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.min.css', array(), '4.1.1', 'all' );
	wp_enqueue_style( 'slicktheme', get_template_directory_uri() . '/assets/css/slick-theme.min.css', array(), '4.1.1', 'all' );

	// JS Scripts
	wp_enqueue_script( 'bootstrapJS', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'mainJS', get_template_directory_uri() . '/assets/js/main.js', array(), false, true );
	wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '4.1.1', true );
	wp_enqueue_script( 'slicksjs', get_template_directory_uri() . '/assets/js/slick1.min.js', array(), '4.1.1', true );
	wp_enqueue_script( 'slickscript', get_template_directory_uri() . '/assets/js/scripts.js', array(), '4.1.1', true );
	
}
add_action('wp_enqueue_scripts', 'loadingFiles'); 

function get_breadcrumb() {

    $post = get_post();
	$home_url = home_url();

    echo '<li><a class="breadcrumb-link" href="'.$home_url.'">Home</a><span class="breadcrumb-divider">&nbsp;&nbsp;»&nbsp;&nbsp;</span></li>';

	// Get the ID of a given category
	$category_name = get_the_category($post->ID);
	$category_link = get_category_link($category_name);
	$post_name = get_the_title($post->ID);
	$post_link = get_permalink( $post->ID );

	if (!is_category()) {
		foreach($category_name as $cd){
			echo '<li><a class="breadcrumb-link" href="'.$category_link.'">'.$cd->cat_name.'</a><span class="breadcrumb-divider">&nbsp;&nbsp;»&nbsp;&nbsp;</span></li>';
		}
		echo '<li><span class="breadcrumb-active-link">'.$post_name.'</span></li>';
	}else {
		foreach($category_name as $cd){
			echo '<li><span class="breadcrumb-active-link">'.$cd->cat_name.'</span></li>';
		}
	}
}

function display_header_details() {
	$post = get_post();
	$category_name = get_the_category($post->ID);
	$post_name = get_the_title($post->ID);
	$numberofcomments = $post->comment_count;

	if (!is_category()) {
		echo '<h3 class="header-details-title">'.$post_name.'</h3><div class="header-bottom-div">';
		echo '<small class="header-bottom-details"><span>'.the_date().'</span></small>';
		echo '<small class="header-bottom-details"><span><i class="fa fa-user"></i>&nbsp;&nbsp;'.get_the_author().'</span></small>';
		echo '<small class="header-bottom-details"><span><i class="fa fa-comments"></i>&nbsp;&nbsp;'.$numberofcomments.'&nbsp;Comment</span></small>';			
		echo '<small class="header-bottom-details"><span><i class="fa fa-eye"></i>&nbsp;&nbsp;'. getPostViews(get_the_ID()).'&nbsp;</span></small>';		
		echo '</div>';
		
	} else {
		foreach($category_name as $cd){
			echo '<h3 class="header-details-title">CATEGORY: '.$cd->cat_name.'</h3>';
		}
	}
}

function displaySidebar(){
	
	register_sidebar(
	array(
		'name'			=> 'Sidebar left',
		'id'			=> 'sidebar-left',
		'class'			=> 'custom_left',
		'description' 	=> 'Right Sidebar',
		'before_widget' => '<div class="division mb-3"><aside id="%1$s" class="%2$s">',
		'after_widget' 	=> '</aside></div>',
		'before_title' 	=> '<div class="title-content-bg"><div class="titles p-2 mb-0">',
		'after_title'	=> '</div></div>',
	)

);

	register_sidebar(
	array(
		'name'			=> 'Sidebar right',
		'id'			=> 'sidebar-right',
		'class'			=> 'custom_right',
		'description' 	=> 'Right Sidebar',
		'before_widget' => '<div class="division mb-3"><aside id="%1$s" class="%2$s">',
		'after_widget' 	=> '</aside></div>',
		'before_title' 	=> '<div class="title-content-bg"><div class="titles p-2 mb-0">',
		'after_title'	=> '</div></div>',
	)
);

	
}
add_action('widgets_init', 'displaySidebar');

/*Comment Count Function*/
function comment_count(){
	$comments_num = get_comments_number();
	if(comments_open()){
		if( $comments_num == 0 ){
			$comments = __(' 0 Comments');
		} elseif ( $comments_num > 1 ) {
			$comments = $comments_num . __(' Comments');
		} else{
			$comments = __( ' 1 Comment' );
		}		
	} else{
		$comments = __('Comments are closed!');
	}
	return $comments;
}

// View Count for Posts
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count;
}

/*Excerpt*/
function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
	return $excerpt;
}