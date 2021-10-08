<style>
ul, li{
  list-style: none;
}
</style>

<?php if (comments_open()) : ?>
  <div class="commentlist">
  
    <hr />
   
    <h4 class ="fw-bold ">
      التعليقات 
      (
      <?php comments_number(); ?>
      )
      : 
    </h4>
    
    <div onclick = "author.style.display = 'block'; email.style.display = 'block' "  class = "ms-2 ps-4 border-start">
      <?php 
        include_once 'inc/Bootstrap_5_Comment_Walker.php';
        $args = array(
          'fields' => array(
              'author'  => '<input style = "display: none" class ="form-control my-1" id="author" name="author" type="text" placeholder="الاسم" size="30" maxlength="245" />',
              'email'   => '<input style = "display: none;text-align: right" class ="form-control my-1" id="email" name="email" type ="email" placeholder="الإيميل"></input>', 
              //'cookies' => '<input wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s class="form-check-input" type="checkbox"> <label class="form-check-label" for="wp-comment-cookies-consent"> تذكرني </label> ',
              'cookies'   => '' 
            ), 
          'comment_notes_after' => '',
          'comment_notes_before' => '', 
          // Redefine your own textarea (the comment body).
          'comment_field' => '<textarea class = "form-control" placeholder ="اكتب تعليق...." id="comment" name="comment" aria-required="true"></textarea>',
          'class_submit' => "btn btn-secondary mt-1"
        );
        
        comment_form($args);
        
        $args = array(
          // 'walker'            => null,
          'walker'        => new Bootstrap_5_Comment_Walker(),
          // 'walker'        => new comment_walker(),
          'max_depth'         =>  2,
          'style'             => 'ul',
          'callback'          => null,
          'end-callback'      => null,
          'type'              => 'all',
          'page'              => '',
          'per_page'          => '',
          'avatar_size'       => 32,
          'reverse_top_level' => null,
          'reverse_children'  => '',
          'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
          'short_ping'        => true,   // @since 3.6
          'echo'              => true     // boolean, default is true
        );
        wp_list_comments($args);
        
      ?>
    </div>
    
  </div>
<?php endif; ?>
