<?php
/**
 * Entry meta display
 *
 * @package Clean_Fotografie
 */

?>

<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta category-date-meta">
		<?php cleanfotografie_entry_categories(); ?>
		<?php fotografie_date(); ?>
	</div><!-- .entry-meta -->
<?php endif;
