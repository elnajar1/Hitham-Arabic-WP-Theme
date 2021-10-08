<?php
  
  /*
  * Hitham Arabic Theme
  * By fb.com/elnajar1 / @elnajar1
  */
  
  include_once 'inc/bootstrap_5_wp_nav_menu_walker.php';
 
  //Theme Support 
  add_theme_support('post-thumbnails');
  add_theme_support( 'title-tag' );
 
  //Syles and Script 
  function hitham_scripts() {
    
    wp_enqueue_style( 'bootstrap-rtl-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css') ;
  	wp_enqueue_style( 'bootstrab-icons-css', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css') ;
  	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css') ;
  	
  	//jquery
  	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.min.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );
  
  	wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), null, true );
  	
  }
  add_action( 'wp_enqueue_scripts', 'hitham_scripts' );

  //Menu - Header Navbar
  function hitham_register_menu(){
    
    register_nav_menu('header_navbar', __('Header Navbar') );
    
  }
  
  function hitham_menu(){
    
    wp_nav_menu(array(
      'theme_location' => 'header_navbar', 
      'container'   => false,
      'menu_class'  => '',
      'fallback_cb' => '__return_false',
      'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
      'depth'      => 2 ,
      'link_before'     => ' ✨ ', 
      'walker'     => new bootstrap_5_wp_nav_menu_walker, 
    ));
    
  }
  add_action( 'init', 'hitham_register_menu' );
  
  //Filter the except length to 20 words.
  function wpdocs_custom_excerpt_length( $length ) {
      return 15;
  }
  add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
  
  //Filter the "read more" excerpt string link to the post.
  function wpdocs_excerpt_more( $more ) {
      if ( ! is_single() ) {
          $more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
              get_permalink( get_the_ID() ),
              __( '...عرض المزيد', 'textdomain' )
          );
      }
   
      return $more;
  }
  add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
  
  //Remove Url from comments
  function wpdocs_remove_website_field( $fields ) {
      
      // To unset email, you must first Make the settings in wp-admin/options-discussion.php then uncomment that, then try:
      //unset( $fields['email'] );
      
      unset( $fields['url'] );
       
      return $fields;
  }
  add_filter( 'comment_form_default_fields', 'wpdocs_remove_website_field' ); 
    
  // Modify comments header text in comments
  function child_title_comments() {
      return __(comments_number( '<h3>No Responses</h3>', '<h3>1 Response</h3>', '<h3>% Responses...</h3>' ), 'genesis');
  }
  //add_filter( 'genesis_title_comments', 'child_title_comments');