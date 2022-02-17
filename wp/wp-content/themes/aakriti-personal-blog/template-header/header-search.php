<?php
/**
 *  Aakriti Personal Blog Header Search
 *
 * @package Aakriti Personal Blog
 * @since 1.0
 */
          
?>   
 <div class="header-search">
        <?php
            $data_aakriti_personal_blog_str = '{"content":';
            $data_aakriti_personal_blog_str .= '{"effect": "fadein", "fullscreen": true, "speedIn": 300, "speedOut": 300, "delay": 300},'; 
            $data_aakriti_personal_blog_str .= '"loader":';    
            $data_aakriti_personal_blog_str .= '{"active": true}';     
            $data_aakriti_personal_blog_str .= '}';
        ?>
        <a class="aakriti-personal-blog-link" href="javascript:void(0);" data-aakriti-personal-blog-1='<?php echo esc_attr($data_aakriti_personal_blog_str);?>'><i class="fa fa-search"></i></a>  
		<a class="sidebar-toggle show-for-large-only" href="javascript:void(0);"><i class="fa fa-bars"></i></a>  		
        <div id="aakriti-personal-blog-modal-1" class="aakriti-personal-blog-modal">
          <a href="javascript:void(0);" onclick="Custombox.modal.close();" class="aakriti-personal-blog-close"><i class="fa fa-close"></i></a>      
            <div class="aakriti-personal-blog-search-box">
                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">                         
                    <input placeholder="<?php esc_html_e('Type search term and press enter', 'aakriti-personal-blog'); ?>" type="search" value="<?php echo get_search_query(); ?>" name="s" id="s" />
                    <button type="submit" class="search-btn"><?php esc_html_e('Search', 'aakriti-personal-blog'); ?></button>         
                </form><!-- end #searchform --> 
				
            </div>  
        </div>  
</div><!-- .header-search -->

        