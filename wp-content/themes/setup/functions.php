<?php 

//REGISTER WIDGET AREAS
 if ( function_exists('register_sidebars') ) {
 register_sidebar(array(
 'name' => 'Homepage Kalender',
 'id' => 'homepagekalender',
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h3 class="footertitle">',
 'after_title' => '</h3>',
 ));
 register_sidebar(array(
 'name' => 'Footer Widget 1',
 'id' => 'footer1',
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h3 class="footertitle">',
 'after_title' => '</h3>',
 ));
 register_sidebar(array(
 'name' => 'Footer Widget 2',
 'id' => 'footer2',
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h3 class="footertitle">',
 'after_title' => '</h3>',
 ));
 register_sidebar(array(
 'name' => 'Footer Widget 3',
 'id' => 'footer3',
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h3 class="footertitle">',
 'after_title' => '</h3>',
 ));
 register_sidebar(array(
 'name' => 'Footer Widget 4',
 'id' => 'footer4',
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h3 class="footertitle">',
 'after_title' => '</h3>',
 ));
 register_sidebar(array(
 'name' => 'Footer Widget 5',
 'id' => 'footer5',
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h3 class="footertitle">',
 'after_title' => '</h3>',
 ));
register_sidebar(array(
 'name' => 'Widget',
 'id' => 'widget',
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h3>',
 'after_title' => '</h3>',
 ));
 }
 
add_filter('show_admin_bar', '__return_false');

function add_js_and_css() {
  global $wp_scripts;

    wp_enqueue_style( 'global', get_template_directory_uri() . '/assets/css/global.min.css' );

}
add_action( 'wp_enqueue_scripts', 'add_js_and_css' );


 function footer_enqueue() {
    wp_enqueue_script( 'jquery', get_template_directory_uri(). '/assets/js/jquery-2.1.1.min.js', array( 'jquery') );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri(). '/assets/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'script', get_template_directory_uri(). '/assets/js/script.js', array( 'jquery') );
    wp_enqueue_script( 'flickity', get_template_directory_uri(). '/assets/js/flickity.pkgd.min.js', array( 'jquery') );
    wp_enqueue_script( 'scrollreveal', get_template_directory_uri(). '/assets/js/scrollreveal.js', array( 'jquery') );
    wp_enqueue_script( 'imageloaded', get_template_directory_uri(). '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery') );
    wp_enqueue_script( 'masonary', get_template_directory_uri(). '/assets/js/masonry.pkgd.min.js', array( 'jquery') );
    wp_enqueue_script( 'cbpGridGallery', get_template_directory_uri(). '/assets/js/cbpGridGallery.js', array( 'jquery') );
    wp_enqueue_script( 'classie', get_template_directory_uri(). '/assets/js/classie.js', array( 'jquery') );
}

add_action('wp_footer', 'footer_enqueue');
	
function register_my_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Primary' ),
      'secondary' => __( 'Secondary' ),
      'mobile' => __( 'Mobile' ),
      'footermenu' => __( 'Footermenu' ),
        'footermenu2' => __( 'Footermenu2' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

add_theme_support( 'post-thumbnails' ); 

function svg_mime_types( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;}
add_filter( 'upload_mimes', 'svg_mime_types' );

/*
 * Resize images dynamically using wp built in functions
 * Victor Teixeira
 *
 * php 5.2+
 *
 * Exemplo de uso:
 * 
 * <?php 
 * $thumb = get_post_thumbnail_id(); 
 * $image = vt_resize( $thumb, '', 140, 110, true );
 * ?>
 * <img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" />
 *
 * @param int $attach_id
 * @param string $img_url
 * @param int $width
 * @param int $height
 * @param bool $crop
 * @return array
 */
if ( !function_exists( 'vt_resize') ) {
	function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
		// this is an attachment, so we have the ID
		if ( $attach_id ) {
			$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
			$file_path = get_attached_file( $attach_id );
		// this is not an attachment, let's use the image url
		} else if ( $img_url ) {
			$file_path = parse_url( $img_url );
			$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
			// Look for Multisite Path
			if(file_exists($file_path) === false){
				global $blog_id;
				$file_path = parse_url( $img_url );
				if (preg_match("/files/", $file_path['path'])) {
					$path = explode('/',$file_path['path']);
					foreach($path as $k=>$v){
						if($v == 'files'){
							$path[$k-1] = 'wp-content/blogs.dir/'.$blog_id;
						}
					}
					$path = implode('/',$path);
				}
				$file_path = $_SERVER['DOCUMENT_ROOT'].$path;
			}
			//$file_path = ltrim( $file_path['path'], '/' );
			//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
			$orig_size = getimagesize( $file_path );
			$image_src[0] = $img_url;
			$image_src[1] = $orig_size[0];
			$image_src[2] = $orig_size[1];
		}
		$file_info = pathinfo( $file_path );
		// check if file exists
		$base_file = $file_info['dirname'].'/'.$file_info['filename'].'.'.$file_info['extension'];
		if ( !file_exists($base_file) )
		 return;
		$extension = '.'. $file_info['extension'];
		// the image path without the extension
		$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];
		$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
		// checking if the file size is larger than the target size
		// if it is smaller or the same size, stop right here and return
		if ( $image_src[1] > $width ) {
			// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
			if ( file_exists( $cropped_img_path ) ) {
				$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
				$vt_image = array (
					'url' => $cropped_img_url,
					'width' => $width,
					'height' => $height
				);
				return $vt_image;
			}
			// $crop = false or no height set
			if ( $crop == false OR !$height ) {
				// calculate the size proportionaly
				$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
				$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;
				// checking if the file already exists
				if ( file_exists( $resized_img_path ) ) {
					$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
					$vt_image = array (
						'url' => $resized_img_url,
						'width' => $proportional_size[0],
						'height' => $proportional_size[1]
					);
					return $vt_image;
				}
			}
			// check if image width is smaller than set width
			$img_size = getimagesize( $file_path );
			if ( $img_size[0] <= $width ) $width = $img_size[0];
			// Check if GD Library installed
			if (!function_exists ('imagecreatetruecolor')) {
			    echo 'GD Library Error: imagecreatetruecolor does not exist - please contact your webhost and ask them to install the GD library';
			    return;
			}
			// no cache files - let's finally resize it
			$new_img_path = image_resize( $file_path, $width, $height, $crop );			
			$new_img_size = getimagesize( $new_img_path );
			$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
			// resized output
			$vt_image = array (
				'url' => $new_img,
				'width' => $new_img_size[0],
				'height' => $new_img_size[1]
			);
			return $vt_image;
		}
		// default output - without resizing
		$vt_image = array (
			'url' => $image_src[0],
			'width' => $width,
			'height' => $height
		);
		return $vt_image;
	}
}

/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="admin.php?action=rd_duplicate_post_as_draft&amp;post=' . $post->ID . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
 
add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);

/*
 * Add a portfolio custom post type.
 */
add_action('init', 'create_redvine_projecten');
function create_redvine_projecten() 
{
  $labels = array(
    'name' => _x('Projecten', 'projecten'),
    'singular_name' => _x('Projecten', 'projecten'),
    'add_new' => _x('Nieuw project', 'projecten'),
    'add_new_item' => __('Nieuw project'),
    'edit_item' => __('Bewerk project'),
    'new_item' => __('Nieuw project'),
    'view_item' => __('Bekijk project'),
    'search_items' => __('Zoek naar een project'),
    'not_found' =>  __('Geen project gevonden'),
    'not_found_in_trash' => __('Geen project in de prullenbak gevonden'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-appearance',
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','thumbnail','revisions', 'editor')
  ); 
  register_post_type('projecten',$args);
}

register_taxonomy( "projecten-categories", 
	array( 	"projecten" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Categorieën",'add_new_item'=>"Voeg categorie toe"), 
			"singular_label" => __( "Field" ), 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							'with_front' => false)
		 ) 
);

add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
function tsm_filter_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'projecten'; // change to your post type
	$taxonomy  = 'projecten-categories'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

/**
 * Display navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*/

if ( ! function_exists( 'twentythirteen_post_nav' ) ) :

function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
		?>
    <section id="project-nav" class="pan" role="navigation">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 vorige text-left pan">
        	<?php if ( $previous ) { ?>
            <?php previous_post_link( '%link', _x( '%title', 'Vorige', 'twentythirteen' ) ); ?>
            <?php } ?>
        </div>
        <a class="overzicht" href="<?=get_site_url()?>/projecten/"></a>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 volgende text-right pan">
        	<?php if ( $next ) { ?>
            <?php next_post_link( '%link', _x( '%title', 'Volgende', 'twentythirteen' ) ); ?>
            <?php } ?>
        </div>
    </section>
	<?php
}
endif;
/*
 * Resize images dynamically using wp built in functions
 * Victor Teixeira
 *
 * php 5.2+
 *
 * Exemplo de uso:
 * 
 * <?php 
 * $thumb = get_post_thumbnail_id(); 
 * $image = vt_resize( $thumb, '', 140, 110, true );
 * ?>
 * <img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" />
 *
 * @param int $attach_id
 * @param string $img_url
 * @param int $width
 * @param int $height
 * @param bool $crop
 * @return array
 */
if ( !function_exists( 'vt_resize') ) {
	function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
		// this is an attachment, so we have the ID
		if ( $attach_id ) {
			$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
			$file_path = get_attached_file( $attach_id );
		// this is not an attachment, let's use the image url
		} else if ( $img_url ) {
			$file_path = parse_url( $img_url );
			$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
			// Look for Multisite Path
			if(file_exists($file_path) === false){
				global $blog_id;
				$file_path = parse_url( $img_url );
				if (preg_match("/files/", $file_path['path'])) {
					$path = explode('/',$file_path['path']);
					foreach($path as $k=>$v){
						if($v == 'files'){
							$path[$k-1] = 'wp-content/blogs.dir/'.$blog_id;
						}
					}
					$path = implode('/',$path);
				}
				$file_path = $_SERVER['DOCUMENT_ROOT'].$path;
			}
			//$file_path = ltrim( $file_path['path'], '/' );
			//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
			$orig_size = getimagesize( $file_path );
			$image_src[0] = $img_url;
			$image_src[1] = $orig_size[0];
			$image_src[2] = $orig_size[1];
		}
		$file_info = pathinfo( $file_path );
		// check if file exists
		$base_file = $file_info['dirname'].'/'.$file_info['filename'].'.'.$file_info['extension'];
		if ( !file_exists($base_file) )
		 return;
		$extension = '.'. $file_info['extension'];
		// the image path without the extension
		$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];
		$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
		// checking if the file size is larger than the target size
		// if it is smaller or the same size, stop right here and return
		if ( $image_src[1] > $width ) {
			// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
			if ( file_exists( $cropped_img_path ) ) {
				$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
				$vt_image = array (
					'url' => $cropped_img_url,
					'width' => $width,
					'height' => $height
				);
				return $vt_image;
			}
			// $crop = false or no height set
			if ( $crop == false OR !$height ) {
				// calculate the size proportionaly
				$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
				$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;
				// checking if the file already exists
				if ( file_exists( $resized_img_path ) ) {
					$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
					$vt_image = array (
						'url' => $resized_img_url,
						'width' => $proportional_size[0],
						'height' => $proportional_size[1]
					);
					return $vt_image;
				}
			}
			// check if image width is smaller than set width
			$img_size = getimagesize( $file_path );
			if ( $img_size[0] <= $width ) $width = $img_size[0];
			// Check if GD Library installed
			if (!function_exists ('imagecreatetruecolor')) {
			    echo 'GD Library Error: imagecreatetruecolor does not exist - please contact your webhost and ask them to install the GD library';
			    return;
			}
			// no cache files - let's finally resize it
			$new_img_path = image_resize( $file_path, $width, $height, $crop );			
			$new_img_size = getimagesize( $new_img_path );
			$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
			// resized output
			$vt_image = array (
				'url' => $new_img,
				'width' => $new_img_size[0],
				'height' => $new_img_size[1]
			);
			return $vt_image;
		}
		// default output - without resizing
		$vt_image = array (
			'url' => $image_src[0],
			'width' => $width,
			'height' => $height
		);
		return $vt_image;
	}
}