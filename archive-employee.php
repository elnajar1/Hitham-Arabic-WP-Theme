<?php get_header(); ?>

<div class = "container ">
  
  <div class = "row">
    <div class = "col">
      <h1 class = "pt-3 fw-bold">
        المتقدمون للعمل
      </h1>
    </div>
  </div>
  
  <div class = "row">
    <div class = "col">
      
      <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
         <div class="card m-2 " >
          <div class="card-body">
            <h5 class="card-title mb-0 pb-0">
              <a href = "<?php the_permalink() ?>">
                <?php the_title(); ?> 
              </a>
            </h5>
            <small class="card-subtitle mb-2 text-muted">📍<?php echo get_field('governorate') ; ?></small>
            <p class="card-text" > 
              🛖<?php echo get_field('Market_type'); ?>( <?php echo get_field('job_type'); ?> )
              <br>
              😌<?php echo get_field('phone'); ?> . <?php echo get_field('education'); ?>
            </p>
          </div>
        </div>
      <?php endwhile; endif; ?>

    </div>
  </div>
  
</div>
<?php get_footer(); ?>