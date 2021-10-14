<?php acf_form_head(); ?>
<?php get_header(); ?>

<div class = "container ">
  
  <div class = "row">
    <div class = "col">
      
      <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
         <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">
              <a href = "<?php the_permalink() ?>">
                <?php the_title(); ?> 
              </a>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      <?php endwhile; endif; ?>

    </div>
  </div>
  
</div>
<?php get_footer(); ?>