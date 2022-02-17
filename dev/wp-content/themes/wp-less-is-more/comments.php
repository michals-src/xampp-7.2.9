<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
 
if ( post_password_required() ) {
	return;
}

	$commenter		= wp_get_current_commenter();
	$req			= get_option( 'require_name_email' );
	$aria_req		= ( $req ? " aria-required='true'" : '' );
	$required_text	= sprintf( ' ' . __( 'Required fields are marked %s', 'wp-less-is-more' ), '<span class="required label label-danger">*</span>' );
	$user			= wp_get_current_user();
	$user_identity	= $user->exists() ? $user->display_name : '';
	
	$fields =  array(

	'author' => '
	<div class="form-group">
	<label for="author" class="col-sm-2 control-label">' . __( 'Name:', 'wp-less-is-more') . ( $req ? ' <span class="required label label-danger">*</span>' : '' ) . '</label>
	<div class="col-sm-9">
	<input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="22" tabindex="3" ' . $aria_req . ' class="form-control" '. ( $req ? 'required' : '' ) .'>
	</div>
	</div>',

	'email' =>
	'<div class="form-group">
	<label for="email" class="col-sm-2 control-label">' . __( 'Email:', 'wp-less-is-more') . ( $req ? ' <span class="required label label-danger">*</span>' : '' ) . '</label>
	<div class="col-sm-9">
	<input type="text" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="22" tabindex="2" ' . $aria_req . ' class="form-control" '. ( $req ? 'required' : '' ) .'>
	</div>
	</div>',

	'url' =>
	'<div class="form-group">
	<label for="url" class="col-sm-2 control-label">' . __( 'Website:', 'wp-less-is-more' ) . '</label>
	<div class="col-sm-9">
	<input type="text" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="22" tabindex="1" class="form-control">
	</div>
	</div>',
);
	$comments_args = array(
	'id_form'				=> 'commentform',
	'class_form'			=> 'comment-form form-horizontal',
	'id_submit'				=> 'submit',
	'class_submit'			=> 'btn btn-default active',
	'name_submit'			=> __('Submit Response', 'wp-less-is-more' ),
	'title_reply'       => __( 'Write a Reply or Comment', 'wp-less-is-more' ),
	'title_reply_to'    => __( 'Write a Reply or Comment to %s', 'wp-less-is-more' ),
	'title_reply_before'	=> '<hr style="margin-top: 0px;"/><strong>',
	'title_reply_after'		=> '</strong><hr/>',
	'cancel_reply_before'	=> '<p class="cancel-comment-reply">',
	'cancel_reply_after'	=> '</p>',
	'cancel_reply_link'		=> __( 'Cancel reply', 'wp-less-is-more' ) . ' <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' ,
	'submit_button'			=> '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" >',
	'submit_field'			=> '<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">%1$s %2$s</div>
	</div>',
	'format'				=> 'xhtml',
	
	'must_log_in'			=> '<p class="must-log-in">' .
		sprintf(
			__( 'You must be <a href="%s">logged in</a> to post a comment.', 'wp-less-is-more' ),
			wp_login_url( 
				apply_filters( 'the_permalink', get_permalink() )
			)
		) . '</p>',

	'logged_in_as' 			=> '<p class="logged-in-as">' .
		sprintf(
			__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'wp-less-is-more'),
				admin_url( 'profile.php' ), $user_identity, wp_logout_url(
					apply_filters( 'the_permalink', get_permalink( ) )
				)
		) . '</p>',

	'comment_notes_before' 	=> '<p class="comment-notes">' .
    __( 'Your email address will not be published.', 'wp-less-is-more') . ( $req ? $required_text : '' ) .
    '</p>',

	'comment_notes_after' 	=> '<div class="form-group"><div class="col-sm-9 col-sm-offset-2">' .
		sprintf(
			__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'wp-less-is-more'),
			  '<code>' . allowed_tags() . '</code>'
		) . '</div></div>',
	
	'fields'				=> apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field'			=> 
	'<div class="form-group">
	<div class="col-sm-9 col-sm-offset-2">
	<textarea name="comment" class="form-control" rows="3" ' . $aria_req . ' '. ( $req ? 'required' : '' ) .'></textarea>
	</div>
	</div>',
  
);

	// If comments are closed and there are no comments, let's leave a little note, shall we?
	if ( !comments_open() && !get_comments_number() ) : ?>
		<div class="well well-sm"><?php _e( 'Comments are closed for this post.', 'wp-less-is-more' ); ?></div>
	<?php
	endif;

	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
	
<div id="comments" class="comments-area panel panel-info">	
	
	<div class="panel-heading" role="button" data-toggle="collapse" href="#collapseListComments" aria-expanded="true" aria-controls="collapseListComments">
		
		<h2 class="comments-title panel-title">
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One Reply to %s', 'comments title', 'wp-less-is-more' ), '&ldquo;' . get_the_title() . '&rdquo;' );
				} else {
					printf(
						/* translators: %s 1: number of comments, %s 2: post title */
						_nx(
							'%s Reply to %s',
							'%s Replies to %s',
							$comments_number,
							'comments title',
							'wp-less-is-more'
						),
						'<span class="badge">' . number_format_i18n( get_comments_number() ) . '</span>',
						'&ldquo;' . get_the_title() . '&ldquo;'
					);
				}
			?>&nbsp;<span class="glyphicon glyphicon-chevron-up pull-right" aria-hidden="true"></span><span class="glyphicon glyphicon-chevron-down pull-right" aria-hidden="true"></span>&nbsp;
		</h2>		
	</div>	
<div id="collapseListComments" class="panel-collapse collapse <?php
	
	echo wp_less_is_more__collapse_comments_list(); 
	
	?>" role="tabpanel" aria-labelledby="collapseListComments" aria-expanded="true">
	<div id="comments-list" class="panel-body ">
		<ul class="comment-list media-list list-group list-unstyled">
			<?php
				wp_list_comments( array(
					'avatar_size' => 40,
					'style'       => 'ul',
					'short_ping'  => true,
					'reply_text'  => __( 'Reply', 'wp-less-is-more' ),
					'callback' 		=> 'wp_less_is_more__custom_comments_list_template',
				) );
			?>
		</ul>

<?php // Are there comments to navigate through?
       if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { 
?>
		<nav aria-label="...">
		<ul class="pager">
			<li><?php previous_comments_link( __( 'Older Comments', 'wp-less-is-more'  ) ); ?></li>
			<li><?php next_comments_link( __( 'Newer Comments', 'wp-less-is-more'  ) ); ?></li>
		</ul>
		</nav><!-- .comment-navigation -->
		
	   <?php } // Check for comment navigation?>
	</div>	
</div><!-- .collapse comments list -->
<?php
	endif; // Check for have_comments(). 
	
	comment_form( $comments_args ); 
	
// You have to close panel block anyway by checking of comments status
	if  ( have_comments() ):
	
echo '</div>
<!-- End panel panel-info if comments are closed but have some -->';
endif;