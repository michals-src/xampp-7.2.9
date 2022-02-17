<?php
/**
 * 
 * Template part for including posts design formate wise
 * @link https://codex.wordpress.org/Template_Hierarchy
 * 
 * @package Aakriti Personal Blog
 * @since 1.0 
 * 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 		  
		<?php get_template_part( 'template-parts/content', 'media' ); ?>		
		<div class="blogdesign-post-grid-content <?php if ( !has_post_thumbnail() ) { echo 'no-thumb-image'; } ?>">				
				<header class="entry-header">					
						<?php if (is_sticky()) : ?>
										<span class="sticky-label"><i class="fa fa-thumb-tack"></i><span class="sticky-label-text"><?php esc_html_e('Featured', 'aakriti-personal-blog'); ?></span></span>
						<?php endif; ?>
					    <?php if ( 'page' !== get_post_type() ) { aakriti_personal_blog_cat_posted_on(); }   ?>
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>								
						<?php if ( 'page' !== get_post_type() ) { aakriti_personal_blog_posted_on(); }  ?>
				</header><!-- .entry-header -->
				<?php if ( is_search() ) { ?>
					<div class="entry-summary">
				<?php    
						the_excerpt();
				} else { ?>
					<div class="entry-content">
				<?php 
						$ismore = ! empty( $post->post_content ) ? strpos( $post->post_content, '<!--more-->' ) : '';
						if ( ! empty( $ismore ) ) {
								/* translators: %s: Name of current post */
								the_content( sprintf(
												esc_html__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aakriti-personal-blog' ),
												get_the_title()
										) );
						} else {							
								the_excerpt();							
						}
						wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aakriti-personal-blog' ),
								'after'  => '</div>',
						) );

				}
				aakriti_personal_blog_tags_posted_on();
				 ?>				 
					<footer class="entry-footer">
							<?php aakriti_personal_blog_entry_footer(); ?>
					</footer><!-- .entry-footer -->					
					</div><!-- .entry-content --><!-- .entry-summary -->
				</div>       
</article><!-- #post-## -->