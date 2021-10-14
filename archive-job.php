<?php get_header(); ?>

<div class = "container ">
  
  <div class = "row">
    <div class = "col">
      
      <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
         <div class="card m-2 " >
          <div class="card-body">
            <h5 class="card-title">
              <a href = "<?php the_permalink() ?>">
                <?php the_title(); ?> 
              </a>
            </h5>
            <small class="card-subtitle mb-2 text-muted"><?php echo get_fields['governorate']; ?></small>
            <p class="card-text">
              <?php var_dump(get_fields()); echo get_field('library'); ?>
               . 
              <?php echo get_field('owner_phone'); ?>
            </p>
          </div>
        </div>
      <?php endwhile; endif; ?>

    </div>
  </div>
  
</div>
<?php get_footer(); ?>