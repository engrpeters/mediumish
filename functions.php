<?php



function juju_theme_support(){
  add_theme_support('custom-logo');
  add_theme_support('thumbanail-image');
  add_theme_support('post-thumbnails');

  add_theme_support(
    'featured-content',
    array(
      'featured_content_filter' => 'juju_get_featured_posts',
      'max_posts' => 4,
    )
  );
};

add_action("after_setup_theme", 'juju_theme_support');

/*

function juju_menus(){
  $locations = array(
    'primary' => "Desktop Primary Left Sidebar",
    'footer' => 'Footer Menu Item'
  );

  register_nav_menus($locations);
}

add_action('init','juju_menus');

*/


function juju_register_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('juju-mediumish',get_template_directory_uri() . "/style.css",array("juju-bootstrap"),$version,'all');
    wp_enqueue_style('juju-bootstrap',get_template_directory_uri() . "/assets/css/bootstrap.min.css",array(),'4.0.0','all');

  
      
    wp_enqueue_style('juju-fa',"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",array(),'4.7.0','all');
   
  };

  
add_action('wp_enqueue_scripts','juju_register_styles');

function juju_register_scripts(){
    wp_enqueue_script('juju-jquery',get_template_directory_uri() . "/assets/js/jquery.min.js",array(),"3.2.1",true);
    wp_enqueue_script('juju-bootstrap',get_template_directory_uri() . "/assets/js/bootstrap.min.js",array('juju-tether'),"4.0.0",true);
    wp_enqueue_script('juju-tether',"https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js",array(),"1.4.0",true);
    wp_enqueue_script('juju-ie10viewport',get_template_directory_uri() ."/assets/js/ie10-viewport-bug-workaround.js",array(),"1.0.0",true);
    wp_enqueue_script('juju-mediumish',get_template_directory_uri() . "/assets/js/mediumish.js",array("juju-jquery"),'1.0',true);


   
  };


add_action('wp_enqueue_scripts','juju_register_scripts');



function juju_get_featured_posts() {
	return apply_filters( 'juju_get_featured_posts', array() );

}

function juju_has_featured_posts() {
	return ! is_paged() && (bool) juju_get_featured_posts();
}


if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}


add_filter( 'get_avatar','get_local_avatar' , 10, 5 );
 


function get_local_avatar($avatar, $author, $size, $default, $alt) {
  // ------------------------------------
  // handle user passed by email or by id
  if(gettype($author) == 'object'){
    return $avatar;
  }
  if(stristr($author,"@")) $autore = get_user_by('email', $author);
    else $autore = get_user_by('ID', $author);
 
  $url = get_the_author_meta( 'userpicprofile', $autore->ID);
  if($url) {
    return "<img class='avatar' alt=\"".$alt."\" src='".$url."' width='".$size."' />";
  } else {
    return $avatar;
  }
}
// --------------------------------------
// add the field in your user edit profile page
function add_author_image( $contactmethods ) {
  $contactmethods['userpicprofile'] = 'URL for profile image';
  return $contactmethods;
}
add_filter('user_contactmethods','add_author_image',10,1);



function custom_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="custom-form"><label class="screen-reader-text" for="s">' . __( 'Search:' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input  value="'. esc_attr__( 'Se' ) .'" />
  </div>
  </form>';

  $form = '	<form id="searchform" class="form-inline my-2 my-lg-0" action="' . home_url( '/' ) . '">
  <input type="text" class="form-control mr-sm-2" placeholder="Search" value="' . get_search_query() . '" name="s" id="s" />
 
   <span class="search-icon" onclick="document.getElementById('. "'searchform'" . ').submit();"> <svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg>
 
  </span>
  </button>
</form>';


  return $form;
}
add_filter( 'get_search_form', 'custom_search_form', 40 );



?>

