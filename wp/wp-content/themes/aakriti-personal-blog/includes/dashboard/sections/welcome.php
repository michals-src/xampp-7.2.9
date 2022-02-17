<?php
/**
 * Display Welcome page Welcome section.
 *
 * @package Aakriti Personal Blog
 * @since 1.0
 * 
 */

?>
 <h1>
<?php
// Translators: %1$s - Theme name, %2$s - Theme version.
echo esc_html( sprintf( __( 'Welcome to %1$s - Version %2$s', 'aakriti-personal-blog' ), $theme_name, $theme_version ) );
?>
</h1>
<div class="about-text"><?php echo esc_html( $theme_description ); ?></div>
<div class="wp-badge"><?php esc_html_e( 'Blog Design', 'aakriti-personal-blog' ); ?></div>
