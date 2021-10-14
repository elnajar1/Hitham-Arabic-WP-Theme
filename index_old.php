<?php/*get_header(); ?>

<div class = "container posts-page">
  
  <div class = "row">
    <div class = "col">
      <h1 class = "py-3 fw-bold">
        احدث المقالات
      </h1>
    </div>
  </div>
  
  <div class = "row">
    <div class = "col post-container">
     
      <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                
                the_post(); ?>
                <article class="my-2 rounded card">
                  <a href = "<?php the_permalink() ?>" style = "display: block ">
                    <?php the_post_thumbnail('', ['class' => 'card-img' ] ) ?>
                  </a> 
                  <div class="card-content">
                    <h2 class="card-title">
                      <a href = "<?php the_permalink() ?>" style = "display: block ">
                        <?php the_title(); ?> 
                      </a>
                    </h2>
                    <div class="card-date">
                      <?php the_date(); ?>
                       في  
                      <?php the_category(', '); ?>
                      &middot; 
                    </div>
                    <div class="card-excerpt">
                      <?php the_excerpt(); ?>
                    </div>
                    <div class="card-tags">
                      <?php the_tags('<div class="tag"><i class="fa fa-tag"></i>', '', '</div>' ) ?>
                    </div>
                  </div>
                </article>             
            <?php } 
          } ?>

    </div>
  </div>
  
  <div class = "row">
    <div class = "col text-center">
      
      <?php 
      
        if ( get_previous_posts_link() ) {
          echo previous_posts_link('<button class ="btn btn-light pb-0 border" > <i class="bi bi-chevron-compact-right"></i> </button>') ;
        } 
        
        if ( get_next_posts_link() ) {
          echo next_posts_link('<button class ="btn btn-ligh border pb-0"> <i class="bi bi-chevron-compact-left"></i> </button>') ;
        } 
        
      ?>
    </div>
  </div>
</div>
<?php get_footer();*/ ?>