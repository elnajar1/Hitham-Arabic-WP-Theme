<?php acf_form_head(); ?>
<?php get_header(); ?>

<div class = "container ">
  
  <div class = "row">
    <div class = "col">
    
      <i class=" bi-person-badge pt-3 d-block text-center " style ="font-size: 70px;color: var(--primary)" ></i> 
      <h1 class="py-2 rounded h5 text-center fw-bold" style = "background: var(--light) ">
        أضف طلب عمل
      </h1>

      <div class="p-2 border rounded m-auto" style = "max-width: 500px">
        <?php 
          $form_args = array(
              'post_id'	    	=> 'new_post',
              'post_title'    => true,
              'new_post'		  => array(
          			'post_type'		=> 'employee',
          			'post_status'	=> 'publish'
          		), 
              'field_groups' => ['group_6167eb502a920'], 
              'updated_message' => ' تم ارسال الطلب بحمدالله بنجاح، شكرا لك', 
              'submit_value' => 'أرسال ', 
              
            );
          acf_form($form_args); 
        ?>
      </div>

    </div>
  </div>
  
</div>
<?php get_footer(); ?>