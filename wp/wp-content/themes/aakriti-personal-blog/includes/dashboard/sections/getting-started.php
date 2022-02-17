<?php
/**
 * Display Welcome page Getting started section.
 *
 * @package Aakriti Personal Blog
 * @since 1.0
 * 
 */ 
 $pro_ver_url = 'https://www.wponlinesupport.com/wordpress-themes/aakriti-wordpress-blog-theme/' ; 
 $prodemo_ver_url = 'http://demo.wponlinesupport.com/themes/aakriti-personal-blog-pro/';
?>
<div id="getting-started" class="gt-tab-pane gt-is-active">
    <div class="feature-section two-col">
        <div class="col">
                <h3><?php esc_html_e( 'Customize The Theme', 'aakriti-personal-blog' ); ?></h3>
                <p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'aakriti-personal-blog' ); ?></p>
                <p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Start Customize', 'aakriti-personal-blog' ); ?></a>
				<a href="<?php echo esc_url( 'http://demo.wponlinesupport.com/themes/aakriti-personal-blog/' ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'View Demo', 'aakriti-personal-blog' ); ?></a> </p>
				
                <h3><?php esc_html_e( 'Upgrade to PRO version', 'aakriti-personal-blog' ); ?></h3>
            <p><?php esc_html_e( 'Upgrade to PRO version and get lots of options.', 'aakriti-personal-blog' ); ?></p>
            <ul class="feature-section-pro">
				<li><?php _e( '<strong>- 4 Post Layouts : </strong>Theme comes with 4 layouts -  Grid, List, Masonry and Grid-List.', 'aakriti-personal-blog' ); ?></li>
                <li><?php _e( '<strong>- 5 Post Format : </strong>Theme comes with Video, Audio, Quote and Gallery post formats.', 'aakriti-personal-blog' ); ?></li>
                <li><?php _e( '<strong>- Post Category : </strong>Offering different background color and font color in post categories.', 'aakriti-personal-blog' ); ?></li>
                <li><?php _e( '<strong>- 2 Widgets : </strong> Added WordPress Post List / Slider, Recent Posts (Image left side and Content right side).', 'aakriti-personal-blog' ); ?></li>
                <li><?php _e( '<strong>- Sidebar : </strong> Added WordPress Sidebar on header with toggle bar.', 'aakriti-personal-blog' ); ?></li>
                <li><?php _e( '<strong>- Google Fonts : </strong>100+ google fonts added', 'aakriti-personal-blog' ); ?></li>
            </ul>
            <p>
                <a href="<?php echo esc_url( $pro_ver_url ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Buy PRO Version', 'aakriti-personal-blog' ); ?></a>
                <a href="<?php echo esc_url( $prodemo_ver_url ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'View PRO Demo', 'aakriti-personal-blog' ); ?></a>
                
            </p>

        </div>

        <div class="col">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.jpg" alt="<?php esc_attr_e( 'screenshot', 'aakriti-personal-blog' ); ?>">
        </div>
    </div>
</div>