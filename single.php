<?php get_header(); ?>

<div class = "container ">
  
  <div class = "row">
    <div class = "col">
     
      <?php 
        if ( have_posts() ) :
            while ( have_posts() ) :
                
                the_post(); ?>
                <article class="py-2 ">
                  <div class="py-2">
                    <h1 class="fw-bold single-post-title">
                        <?php the_title(); ?> 
                    </h1>
                    <div class="card-date">
                      <?php the_date(); ?>
                       في  
                      <?php the_category(', '); ?>
                      &middot; 
                    </div>
                    <?php the_post_thumbnail('', ['class' => 'card-img py-2' ] ) ?>
                    <div class="">
                      <?php the_content(); ?>
                    </div>
                    <div class="card-tags">
                      <?php the_tags('<div class="tag"><i class="fa fa-tag"></i>', '', '</div>' ) ?>
                    </div>
                  </div>
                </article>             
              <?php 
          endwhile;
        endif;
        
      ?>

    </div>
  </div>
  
  <div class="row d-flex align-items-center justify-content-center border rounded p-2 m-2">
    <div class = "col-3">
      <?php 
        echo get_avatar(
          get_the_author_meta('ID'), 
            64,
            '', //default
            '', //alt
            array(
                'class' => 'rounded-circle' 
              ) 
          ); 
      ?>
    </div>
    <div class = "col">
      <p class = "fw-bold pt-2 m-0">
        الكاتب : 
        <?php the_author_meta('display_name'); ?>
      </p>
      <small class = "pb-2 text-muted">
        <?php the_author_meta('description'); ?>
      </small>
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