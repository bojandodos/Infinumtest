<?php

/*
    ==========================================
     Include scripts
    ==========================================
*/

function mainscripts_script_enqueue() {

	//css

	wp_enqueue_style( 'slickcss', get_stylesheet_directory_uri() . '/css/slick.css', '1.8.1', 'all');
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');

	
	//js
     
	wp_deregister_script('jquery');
	wp_register_script('jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js", true, null);
	wp_enqueue_script('jquery');
  

	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/functions.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.8.1', true );

}

add_action( 'wp_enqueue_scripts', 'mainscripts_script_enqueue');



add_theme_support( 'post-thumbnails' ); 

///////////////////////////// Ajax fetch JS:
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetch() {
	 
	
	
	
    jQuery.ajax({
		
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: {
          action: 'data_fetch',
		  keyword: jQuery('#post_title').val()
		 
        },
        success: function(data) {
            jQuery('#datafetch').html( data );
        }
	});
	

}
</script>
<?php
}


///////////////////////////// Ajax fetch PHP:

add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');

function data_fetch() {
	
    $query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'ulica' ) );
    if( $query->have_posts() ) {
        while( $query->have_posts() ) {
          $query->the_post(); ?>

              <div id="check-in-visitor">
                <a href="mailto:<?php the_author_email(); ?>"><?php the_title(); ?><?php  the_excerpt(); ?>   </a>
              </div>
        <?php
        }
        wp_reset_postdata();
    }
    else {
		?>
		<input name="submit" type="submit" value="submit" />
              <div class="alert alert-info">
			  
              </div>
    <?php
    }
  die();



}



add_filter( 'get_the_excerpt', function( $post_excerpt, $post ) {

	if( $post->post_type != 'ulica' ) return $post_excerpt;
	
	$date = date_i18n( 'F j, Y' );
	$time = date_i18n( 'g:i a' );
	 

	 

	
	echo $time;
	echo $date;
	
	}, 99, 2 );





	function get_images_from_media_library() {
		$args = array(
			'post_type' => 'attachment',
			'post_mime_type' =>'image',
			'post_status' => 'inherit',
			'posts_per_page' => 1,
			'orderby' => 'DESC'
		);
		$query_images = new WP_Query( $args );
		$images = array();
		foreach ( $query_images->posts as $image) {
			$images[]= $image->guid;
		}
		return $images;
	}




	function dotiavatar_function() { 
		
		$imgs = get_images_from_media_library();
    $html = '<div id="media-gallery">';

    foreach($imgs as $img) {

        $html .= '<img src="' . $img . '" alt="" />';

    }

    $html .= '</div>';

    return $html;

		
   }

   add_shortcode('dotiavatar', 'dotiavatar_function');