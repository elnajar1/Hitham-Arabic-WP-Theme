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
  	
  	wp_enqueue_style( 'main-js', get_template_directory_uri() . '/main.js', array(), null, true) ;

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
  
  /*
  * ACF. Frontend form styling ( to look like bootstrap )
  */
  
  // Modify ACF Form Label for Post Title Field
  function custome_post_title_acf_name( $field ) {
     
     if( is_page( 'add-job' ) ) { // if on the vendor page
          $field['label'] = 'اسم المحل (المتجر /الدكان) ';
     } elseif( is_page( 'add-employee' ) ) {
          $field['label'] = 'الاسم';
     }
     
     return $field;
  }
  add_filter('acf/load_field/name=_post_title', 'custome_post_title_acf_name');
  
  
  //styling acf fornted form by bootstrap
  function acf_form_deregister_styles(){
      
      // Deregister ACF Form style
      wp_deregister_style('acf-global');
      wp_deregister_style('acf-input');
      
      // Avoid dependency conflict
      wp_register_style('acf-global', false);
      wp_register_style('acf-input', false);
      
  } 
  add_action('wp_enqueue_scripts', 'acf_form_deregister_styles');
    
  function acf_form_bootstrap_styles($args){
      /*
      // Before ACF Form
      if(!$args['html_before_fields'])
          $args['html_before_fields'] = '<div class="row">'; // May be .form-row
      
      // After ACF Form
      if(!$args['html_after_fields'])
          $args['html_after_fields'] = '</div>';
      */
      // Success Message
      if($args['html_updated_message'] == '<div id="message" class="updated"><p>%s</p></div>')
          $args['html_updated_message'] = '<div id="message" class="updated alert alert-success">%s</div>';
      
      // Submit button
      if($args['html_submit_button'] == '<input type="submit" class="acf-button button button-primary button-large" value="%s" />')
          $args['html_submit_button'] = '<input type="submit" class="acf-button button button-primary button-large btn btn-primary" value="%s" />';
      
      return $args;
      
  }
  add_filter('acf/validate_form', 'acf_form_bootstrap_styles');

  function acf_form_fields_bootstrap_styles($field){
      
      // Target ACF Form Front only
      if(is_admin() && !wp_doing_ajax())
          return $field;
      
      // Add .form-group & .col-12 fallback on fields wrappers
      $field['wrapper']['class'] .= 'form-group col-12 mb-3';
      
      // Add .form-control on fields
      $field['class'] .= 'form-control';
      
      return $field;
      
  }
  add_filter('acf/prepare_field', 'acf_form_fields_bootstrap_styles');

  function acf_form_fields_required_bootstrap_styles($label){
      
      // Target ACF Form Front only
      if(is_admin() && !wp_doing_ajax())
          return $label;
      
      // Add .text-danger
      $label = str_replace('<span class="acf-required">*</span>', '<span class="acf-required text-danger">*</span>', $label);
      
      return $label;
      
  }
  add_filter('acf/get_field_label', 'acf_form_fields_required_bootstrap_styles');
  