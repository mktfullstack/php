<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

  <?php if ( have_comments() ) : ?>

    <div class="row">
      <div class="col-md-12 col-sm-12 animate-box" data-animate-effect="fadeInLeft">
        <!-- Comments -->
        <div class="clear" id="comment-list">
          <div class="comments-area" id="comments">
            <h2 class="comments-title"><?php comments_number( esc_html__('Comments (0)', 'pwe'), esc_html__('Comment (1)', 'pwe'), esc_html__('Comments (%)', 'pwe')); ?></h2>
            <ol class="comment-list">
              <?php wp_list_comments('callback=pwe_theme_comment'); ?>
            </ol>
          </div>
        </div>
      </div>
    </div>
                                   
    <?php
            // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
      ?>
    <div class="text-center">
      <ul class="pagination">
        <li>
          <?php //Create pagination links for the comments on the current post, with single arrow heads for previous/next
          paginate_comments_links( array(
            'prev_text' => wp_specialchars_decode(esc_html__( '<i class="ti-arrow-left"></i>', 'pwe' ),ENT_QUOTES), 
            'next_text' => wp_specialchars_decode(esc_html__( '<i class="ti-arrow-right"></i>', 'pwe' ),ENT_QUOTES)
          ));  ?>
        </li> 
      </ul>
    </div>
<?php endif; // Check for comment navigation ?>
<?php endif; ?>
<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                'id_form' => 'commentform',        
                'class_form' => 'row',                         
                'title_reply'=> esc_html__( 'Leave a comments', 'pwe' ),
                'fields' => apply_filters( 'comment_form_default_fields', array(
                    'author' => '<div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="text" class="form-control" placeholder="'.esc_attr__('Name', 'pwe').'" name="author">
                                    </div>
                                  </div>',
                    'email' => '<div class="col-sm-6">
                                  <div class="form-group">
                                    <input type="email" placeholder="'.esc_attr__('Email here', 'pwe').'" id="email" name="email">
                                  </div>
                                </div>'
                ) ),
                'comment_field' => '<div class="col-sm-12">
                                      <div class="form-group">
                                        <textarea name="comment" id="message" cols="30" rows="7" class="form-control" placeholder="'.esc_attr__('Write a Comment...', 'pwe').'"></textarea>
                                      </div>
                                    </div>',                    
                 'label_submit' => esc_attr__( 'Post a Comment', 'pwe' ),
                 'class_submit' => 'btn-contact',
                 'comment_notes_before' => '',
                 'comment_notes_after' => '',               
        )
    ?>
<?php if ( comments_open() ) : ?>
  <div class="row">
    <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
      <?php comment_form($comment_args); ?>
    </div>
  </div>
<?php endif; ?>