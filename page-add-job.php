<?php acf_form_head(); ?>
<?php get_header(); ?>

<div class = "container ">
  
  <div class = "row">
    <div class = "col">
     
      <h1 class="pt-5 h3 fw-bold">
        أضف المكان الذي تريد له عمال
      </h1>

      <div class="">
        <?php 
          $form_args = array(
              'post_id'	    	=> 'new_post',
              'post_title'    => true,
              'new_post'		  => array(
          			'post_type'		=> 'job',
          			'post_status'	=> 'publish'
          		), 
              'field_groups' => ['group_6163ccc5db389'], 
              'updated_message' => '<div class ="alert alert-success py-3" > تم ارسال الطلب بحمدالله بنجاح، شكرا لك </div>', 
              'submit_value' => 'أرسال الطلب', 
              
            );
          acf_form($form_args); 
        ?>
      </div>

    </div>
  </div>
  
</div>
<?php get_footer(); ?>