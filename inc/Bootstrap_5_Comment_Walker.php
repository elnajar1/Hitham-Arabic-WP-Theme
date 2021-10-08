<?php


/**
 * A custom WordPress comment walker class to implement the Bootstrap 3 Media object in wordpress comment list.
 *
 * @package     wp-bootstrap-5-comment-walker
 * @version     1.0.0
 * @author      Ayoub Khan <ayoubkhan558@hotmail.com>
 * @license     MIT
 * @link        https://gist.github.com/ayoubkhan558/f227745b3d4193f07b73fbdbcef2ded6
 */

class Bootstrap_5_Comment_Walker extends Walker_Comment
{
  /**
   * Output a comment in the HTML5 format.
   *
   * @access protected
   * @since 1.0.0
   *
   * @see wp_list_comments()
   *
   * @param object $comment Comment to display.
   * @param int    $depth   Depth of comment.
   * @param array  $args    An array of arguments.
   */
  protected function html5_comment($comment, $depth, $args)
  {
    $icon_svg_reply = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
									<path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z"></path>
								</svg>';
    $tag = ('div' === $args['style']) ? 'div' : 'li';
?>
    <?php
    $col_total = 12;
    $col_rem =  $depth == 1 ? ($col_total) : ($col_total - $depth);
    $col_rem =  $depth == 1 ? ($col_total) : ($col_total - 1);

    $class_comment =  $depth == 1 ? ' ' : ' comment_reply ';
    // echo $depth; 
    echo '<div class="col-' . $col_rem . '">';
    echo '<div class="row justify-content-end">';
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent comment m-1 p-1' . $class_comment : 'child comment ps-4 ' . $class_comment); ?>>

      <?php if (0 != $args['avatar_size']) : ?>
        <div class="d-flex flex-row" >
          
          <?php if (get_comment_author() == get_comment_author_link()): ?>
            <a href="<?php echo get_comment_author_url(); ?>" class="user-image me-2 me-md-3">
              <img src="<?php print get_avatar_url($comment->user_id, ['size' => '32']); ?>" class="rounded-circle mt-2" />
            </a>
          <?php else: ?>
            <div href="<?php echo get_comment_author_url(); ?>" class="user-image me-2 me-md-3">
              <img src="<?php print get_avatar_url($comment->user_id, ['size' => '32']); ?>" class="rounded-circle mt-2" />
            </div>
          <?php endif; ?>
          
          <div class="meta d-flex flex-column w-100 m-0">

            <div class="border comment-body bg-light m-1 p-2" style =" border-radius: 20px" id="div-comment-<?php comment_ID(); ?>">

              <div class="content">
                <h6 class="text-dark fw-bold mb-0"><?php comment_author(); ?></h6
                <?php comment_text(); ?>
              </div><!-- /content -->
              
              <?php if ('0' == $comment->comment_approved) : ?>
                <p class="comment-awaiting-moderation label text-muted">( <?php _e('Your comment is awaiting moderation.'); ?> )</p>
              <?php endif; ?>
            </div>

            <div class="d-flex justify-content-between">

              <?php
              comment_reply_link(array_merge($args, array(
                'reply_text' => 'رد',
                'add_below' => 'div-comment',
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
                'before'    => '<div class="reply ms-4">',
                'after'     => '</div>'
              )));
              ?>

              <?php edit_comment_link('تعديل  ', '<div class="edit-link me-4">', '</div>'); ?>

            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php
      echo '</row>'; // End row
      echo '</div>'; // End col-md-12
      ?>
  <?php
  }
}
  ?>