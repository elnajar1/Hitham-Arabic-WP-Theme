<?php acf_form_head(); ?>
<?php get_header(); ?>

<div class = "container ">
  
  <div class = "row">
    <div class = "col">
      
      <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
        <div class="py-2">
          
          <h1 class="fw-bold">
            <?php the_title(); ?> 
          </h1>
          
          <div class="d-flex align-items-center  ">
            <img src = "<?php echo get_avatar_url(get_the_author_meta('ID'), ['size' => 32] ); ?>" class="rounded-circle" >
            <h6 class = "fw-bold mx-2"><?php the_author(); ?></h6>
          </div>

          <div class="">
            <?php the_field('owner_name'); ?>
            <hr>
            <?php //acf_form(); ?>
            <hr>
            <pre>
              <?php var_dump(get_fields()); ?>
            </pre>
          </div>
          
        </div>
      <?php endwhile; endif; ?>

    </div>
  </div>
  
  <div class = "row bg-light py-5">
    <div class = "col text-center">
      
      <?php 
        if ( get_next_post_link('%link','', true) ) :
          //get next post in the same category
          echo  next_post_link('%link', '<button class ="btn btn-light bg-white text-primary border"> التالي :  %title </button>', true) ;
        else:
          //get previous post in the same category
          echo  previous_post_link('%link', '<button class ="btn btn-light bg-white text-primary border"> السابق : %title </button>', true ) ;
        endif;
        
      ?>
    </div>
  </div> 
  
  <div class = "row">
    <div class = "col border-tob">
      <?php comments_template(); ?>
    </div>
  </div> 
  
</div>
<?php get_footer(); ?>