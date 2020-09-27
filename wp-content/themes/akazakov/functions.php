<?php

if ( ! isset( $content_width ) )
	$content_width = 500;




function akazakov_setup() {
	/* Makes akazakov available for translation. */
	load_theme_textdomain( 'akazakov', get_template_directory() . '/languages' );
	register_sidebar( array( 'name' => 'Sidebar', 'id' => 'sidebar', 'before_title' => '<span class="widgettitle">', 'after_title' => '</span>' ) );
	
	// Custom thumbnail size
	add_image_size( 'blog-featured', 730, 335, array( 'center', 'center' ) );
	add_image_size( 'category-thumb', 215, 215, array( 'center', 'center' ) );
	add_image_size( 'jcarousel-thumbnail', 235, 210,  array( 'center', 'center' ) );
	
	add_theme_support( 'post-thumbnails' );

	/* Adds RSS feed links to <head> for posts and comments. */
	add_theme_support( 'automatic-feed-links' );

	/* This theme uses wp_nav_menu() in one location. */
//	register_nav_menu( 'head', 'Navigation menu' );
        register_nav_menus( array(
	'head' => 'Navigation menu',
	'head2' => 'Header2'
        ) );
	/* This theme supports custom background color and image. */
//	add_theme_support( 'custom-background', array( 'default-image' => get_template_directory_uri() . 'images/main-bg.jpg' ) );

	/* This theme supports custom header image. */
	add_theme_support( 'custom-header', array(
								'default-image' => get_template_directory_uri() . 'images/default-image.jpg',
								'height'		=> 343,
								'width'			=> 1200 ) );
	add_editor_style();
	show_admin_bar( true );
}
//disable_srcset !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function disable_srcset( $sources ) {
return false;
}
add_filter( 'wp_calculate_image_srcset', 'disable_srcset' );

function akazakov_add_scripts() {
	/* Load script */
	//wp_deregister_script('jquery');
	//wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '1.11.1');
	//wp_register_script('json2.js', get_template_directory_uri() . '/js/json2/json2.js', false, '');
	
	wp_enqueue_script( 'akazakov-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ) );


  	/* Load main stylesheet */
	wp_enqueue_style( 'akazakov-style', get_stylesheet_uri() );?>
	<script type="text/javascript"> var akazakov_path = "<?php echo get_template_directory_uri(); ?>"; </script><?php

	/* Load stylesheet for IE */
	wp_enqueue_style( 'akazakov-ie', get_template_directory_uri() . '/css/ie.css', array( 'akazakov-style' ) );
	wp_style_add_data( 'akazakov-ie', 'conditional', 'lt IE 9' );



	if ( is_singular() )
		wp_enqueue_script( 'comment-reply' );
}

/* Load PIE */
function pie() { ?>
	<!--[if lt IE 9]>
	<style type="text/css" media="screen">
		input[type = "submit"],
		input[type = "reset"],
		input[type = "button"],
		.site-content input[type = "text"],
		.site-content input[type = "password"],
		.site-content textarea,
		.akazakov-select-header {
			behavior: url("<?php echo get_stylesheet_directory_uri() . '/js/pie/PIE.htc'; ?>");
			position: relative;
		}
	</style>
	<![endif]-->
	<?php
}

/* Metabox for slider */
function akazakov_add_metabox_for_slider() {
	add_meta_box(
		'metabox_id',
		__( 'For Slider', 'akazakov' ),
		'akazakov_metabox_callback',
		'post',
		'side' );
}

function akazakov_metabox_callback() {
	$check = '';
	if ( get_post_meta( get_the_ID(), 'akazakov_in_slider', 'yes' ) )
		$check = 'checked';
	_e( 'If you want to add this post to slider, choose the checkbox &nbsp;', 'akazakov' ); ?>
	<form action = "" method = "post">
		<input type = "checkbox" name = "akazakov_add_to_slider" <?php echo $check; ?>>
	</form><?php
}

/* Adding post to slider via Admin Panel */
function akazakov_add_post_to_slider_ap() {
	if ( isset( $_POST['akazakov_add_to_slider'] ) )
		add_post_meta( get_the_ID(), 'akazakov_in_slider', 'yes', true ); /* add post to slider */
	else
		delete_post_meta( get_the_ID(), 'akazakov_in_slider' ); /* remove post from slider */
}

/* Adding post to slider via Frontend */
function akazakov_add_post_to_slider_fe() {
	if ( isset( $_POST['save'] ) ) {
		if ( isset( $_POST['akazakov_add_to_slider'] ) )
			add_post_meta( get_the_ID(), 'akazakov_in_slider', 'yes', true ); /* add post to slider */
		else
			delete_post_meta( get_the_ID(), 'akazakov_in_slider' ); /* remove post from slider */
		echo '<meta http-equiv="refresh" content="0">'; /* refresh page */
	}
}

/* Cut excerpt for slider */
function akazakov_excerpt_for_slider() {
	$excerpt = get_the_excerpt();
	$words = explode( ' ', $excerpt );
	if ( count( $words ) > 20 ) {
		array_splice( $words, 20 );
		$excerpt = implode( ' ', $words );
		echo $excerpt . '...';
	}
	else
		echo $excerpt;
}

/* Comments */
function akazakov_comment_callback() { ?>
	<li <?php comment_class(); ?> id = "comment-<?php comment_ID(); ?>">
		<div class = "comment-body" id = "div-comment-<?php comment_ID(); ?>">
			<div class = "comment-author vcard">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
				<cite class = "fn"><?php comment_author_link(); ?></cite>
				<span class = "says"><?php _e( 'says:', 'akazakov'); ?></span>
			</div> <!-- .comment-author -->
			<div class = "comment-meta">
				<a href = "<?php comment_link(); ?>">
					<?php echo get_comment_date() . __( ' at ', 'akazakov' ) . get_comment_time(); ?>
				</a>
			</div> <!-- .comment-meta -->
			<?php comment_text(); ?>
			<div class = "reply">
			<?php comment_reply_link( array( 'add_below' => 'div-comment', 'depth' => 1, 'max_depth' => 10, 'reply_text' => __( 'Reply', 'akazakov' ) ) );
				edit_comment_link( __( 'Edit', 'akazakov' ), ' | ', '' ); ?>
			</div>
		</div><?php
}

/* Post navigation */
function akazakov_post_navigation() {
	if ( get_previous_posts_link() ) {
		echo '<div class = "akazakov-prev-post-link" >';
		previous_posts_link( __( 'Newer posts &rarr;', 'akazakov' ) );
		echo '</div>';
	}
	if ( get_next_posts_link() ) {
		echo '<div class = "akazakov-next-post-link" >';
		next_posts_link( __( '&larr; Older posts', 'akazakov' ) );
		echo '</div>';
	}
	if ( is_single() ) {
		if ( get_previous_post_link() ) {
			echo '<div class = "akazakov-prev-post-link" >';
			previous_post_link( '%link', __( 'Next post &rarr;', 'akazakov' ) );
			echo '</div>';
		}
		if ( get_next_post_link() ) {
			echo '<div class = "akazakov-next-post-link" >';
			next_post_link( '%link', __( '&larr; Previous post', 'akazakov' ) );
			echo '</div>';
		}
	}
}
function wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="navigation">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
} 
/* Title */
function akazakov_wp_title( $title ) {
	global $page, $paged;
	$title .= get_bloginfo( 'name' );
	if ( is_single() || is_page() )
		$title .= ' | ' . get_the_title();
	if ( $page > 1 || $paged > 1 )
		$title .= sprintf( __( ' | Page %s', 'akazakov' ), max( $page, $paged) );
	return $title;
}
if ( function_exists('register_sidebar') )
{
register_sidebar(array(
        'name' => 'Footer Sidebar',
        'before_widget' => '<div id="%1$s" class="sidearea %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<span class="widgettitle">',
        'after_title' => '</span>',
    ));
}
if (!current_user_can('manage_options')) {
    add_filter('show_admin_bar', '__return_false');
}
function new_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '" style="margin-left:3px;">[...]</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function getPostViews($postID, $count_key){
	//global $wp_query;
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = rand ( 5, 500 );
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, $count);
    }
    return $count;
}
function setPostViews($postID, $count_key){
	global $wpdb; 	//global $wp_query;
    $count = get_post_meta($postID, $count_key, true);
//	echo wpp_get_views( $postID );
    if($count==''){
        $count = rand ( 5, 500 );
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, $count);
    }
    else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
	//echo "count: ".$count."<br>";
	return $count;
}

/* Hooks */
add_action( 'wp_enqueue_scripts', 'akazakov_add_scripts' );
add_filter( 'wp_print_scripts', 'pie' );
add_action( 'after_setup_theme', 'akazakov_setup' );
add_action( 'add_meta_boxes', 'akazakov_add_metabox_for_slider' );
add_action( 'save_post', 'akazakov_add_post_to_slider_ap' );



class WebcoupeData{
	//public $contactsPageId = 69;
	public $countriesSettings = array(
									'ua'=>array(),
									'ru'=>array(),
								);
	public $checkMarkersInVars = array(
								);
	public $applyTheContentFilterInVars = array(
								);
								
	public $dynamicStylesSetting  = array();
								
								
	
	public $ruMonthes = [
	  'январь',
	  'февраль',
	  'март',
	  'апрель',
	  'май',
	  'июнь',
	  'июль',
	  'август',
	  'сентябрь',
	  'октябрь',
	  'ноябрь',
	  'декабрь'
	];	
	public $ruMonthes1 = [
	  'января',
	  'февраля',
	  'марта',
	  'апреля',
	  'мая',
	  'июня',
	  'июля',
	  'августа',
	  'сентября',
	  'октября',
	  'ноября',
	  'декабря'
	];					
								
	public $contactsData = array();
	public $pageData = array();
	
	public function __construct(){
		
	}

	public function setParameter($name, $value){
		$this->{$name} = $value;
	}

	public function getSiteContacts(){
		if(empty($this->contactsData)){
			$contactsMeta = get_post_meta( $this->contactsPageId, false, 1 );
			//echo "country: ".$this->country."<br>";
			$countriesKeys = array_keys($this->countriesSettings);
			if(in_array($this->country, $countriesKeys)){
				$contactsMeta['phonesTop'] = array_slice($contactsMeta['wpcf-phones-'.$this->country], 0, 2);
				$contactsMeta['phonesAll'] = $contactsMeta['wpcf-phones-'.$this->country];
			}
			else{
				$contactsMeta['phonesTop'] = array_merge(
					array_slice($contactsMeta['wpcf-phones-ua'], 0, 1),
					array_slice($contactsMeta['wpcf-phones-ru'], 0, 1)
				);
				$contactsMeta['phonesAll'] = array_merge(
					$contactsMeta['wpcf-phones-ua'],
					$contactsMeta['wpcf-phones-ru']
				);
			}
			$this->contactsData = $contactsMeta;
			
			//$this->contactsData['phonesTop'] = ;
		}
		return $this->contactsData;
	}
	
	public function getPageData($postId){
		if(empty($this->pageData)){
			$this->pageData['post_id'] = $postId;
			$this->pageData['meta'] = get_post_meta( $postId, false, 1 );
			foreach($this->pageData['meta'] as &$metaValue){
				$metaValue = str_replace("<p>&nbsp;</p>","<br/>",$metaValue);
			}
			if($this->pageData['meta']['wpcf-woo-productid'][0] > 0){
				$this->pageData['product'] = wc_get_product($this->pageData['meta']['wpcf-woo-productid'][0], array());
			}
			if(function_exists("get_woocommerce_currency")){
				$this->pageData['currency'] = get_woocommerce_currency(); 
				$this->pageData['currency_symbol'] = get_woocommerce_currency_symbol();
				if(empty($this->pageData['product']) === false){
					if($this->pageData['product']->price > 0){
						$this->pageData['price'] = $this->pageData['product']->price.'&nbsp;'.$this->pageData['currency_symbol'];
					}
				}
			}
			foreach ($this->applyTheContentFilterInVars as $varKey){
				if(empty($this->pageData['meta'][$varKey][0]) === false){
					$this->pageData['meta'][$varKey][0] = apply_filters('the_content',$this->pageData['meta'][$varKey][0]);
				}
			}
			
			//$pattern = "/{[^}]*}/i";
			$pattern = "/{([^}]*)}/";
			foreach ($this->checkMarkersInVars as $var){
				preg_match_all($pattern, $this->pageData['meta'][$var][0], $matches);
				//echo "matches: <pre>".var_export($matches,true)."</pre>";
				$foundMarkers = $matches[1];
				if(is_array($foundMarkers)){
					foreach($foundMarkers as &$marker){
						//$marker = "[".$marker."]";
						//echo "marker: (".$marker."), value:".$this->pageData[$marker]."<br>";
						if(empty($this->pageData[$marker]) === false){
							$this->pageData['meta'][$var][0] = str_replace('{'.$marker.'}', $this->pageData[$marker], $this->pageData['meta'][$var][0]);
						}
					}
				}
				//$vn = "name";
				//echo "product name: ".$this->pageData['product']->{$vn}."<br>";
				//echo "foundMarkers: <pre>".var_export($foundMarkers,true)."</pre>";
			}
			
			if(empty($this->pageData['meta']['wpcf-date-of-event'][0]) === false){
				setlocale(LC_TIME,"ru_RU.utf8");
				$day = strftime('%d', $this->pageData['meta']['wpcf-date-of-event'][0]);
				$monthNumber = ltrim(strftime('%m', $this->pageData['meta']['wpcf-date-of-event'][0]), 0);
				$month = $this->ruMonthes1[$monthNumber-1];
				$year = strftime('%Y', $this->pageData['meta']['wpcf-date-of-event'][0]);
	
				$this->pageData['meta']['wpcf-date-of-event'][0] = $day.' '.$month.' '.$year.' года';
			}
			
			$this->pageData['dynamicStyles'] = "";
			foreach($this->dynamicStylesSetting as $className=>$classSettings){
				$this->pageData['dynamicStyles'].= ".".$className."{";
				foreach($classSettings as $propName=>$varName){
					if(empty($this->pageData['meta'][$varName][0]) === false){
						if(in_array($propName, array('background-image'))){
							$bgUrls = array();
							for($ibg = 0; $ibg <= 2; $ibg++) {
								$bgUrl = $this->pageData['meta'][$varName][$ibg];
								if(empty($bgUrl) === false){
									$bgUrls[]= "url(".$bgUrl.")";
								}
							}
							//echo "bgUrls: <pre>".var_export($bgUrls, true)."</pre>";
							$this->pageData['dynamicStyles'].= $propName.":".implode(",",$bgUrls).";";
						}
						else{
							$this->pageData['dynamicStyles'].= $propName.":".$this->pageData['meta'][$varName][0].";";
						}
					}
				}
				$this->pageData['dynamicStyles'].= "}";
			}
			
		}
		return $this->pageData;
	}

	
}
//end of webcoupe functions
function wpschool_noindex_pagination() {
    if( is_paged() )
        echo '<meta name="robots" content="noindex,nofollow" />';
};
add_action( 'wp_head', 'wpschool_noindex_pagination' );