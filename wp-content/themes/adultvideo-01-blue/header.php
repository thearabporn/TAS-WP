<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

    <head>

        <title><?php 
            if (is_home () ) {
                bloginfo('name');
            } elseif (is_attachment() ) {
                echo get_the_title($post -> post_parent).' &raquo; '; wp_title('', true);
            } elseif (is_category() ) {
                single_cat_title();
            } elseif (is_single() || is_page() ) { 
                single_post_title();
            } elseif (is_search() ) { 
                echo esc_html($s);
            } else { 
                wp_title('',true);
            }
        ?></title>

        <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
        <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        
        <?php wp_head(); ?>
        
        <script src="<?php bloginfo('template_directory'); ?>/js/jquery.tools.min.js" type="text/javascript"></script>

        <script src="<?php bloginfo('template_directory'); ?>/js/init.js" type="text/javascript"></script>

    </head>

    <body>
    
        <div class="header">
            
            <div class="info">
                
                <?php if(is_home()) { ?>
                
                <h1><?php bloginfo('name'); ?></h1>
                
                    <?php }
                
                else { ?>
                    
                    <h1><a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
                    
                    <?php } ?>
                
                <p><?php bloginfo('description'); ?></p>
            
            </div>
            
            <div class="user-bar">
                
                <form method="post" action="<?php bloginfo('url'); ?>/">
                    
                    <input type="text" class="search-form" name="s" onfocus="javascript: if(this.value == 'Search') this.value = '';" onblur="javascript: if(this.value == '') { this.value = 'Search';}" value="Search" />
                    <input type="submit" class="search-button" value="" />
                
                </form>
                
                <div class="clear"></div>
                
                <div class="user-login">
                    
                    <?php if(is_user_logged_in()) : 
                    
                    $user = wp_get_current_user();
                    
                    if ( !($user instanceof WP_User) )
                    
                    return;
                    
                    echo 'Howdy, <a href="'.admin_url().'profile.php">'.$user -> display_name.'</a>';
                    
                    else : ?>
                    
                    Please <?php wp_register('', ''); ?> or <a href="<?php echo wp_login_url( home_url() ); ?>">Login</a>
                    
                    <?php endif; ?>
                
                </div>
                
                <!--<div class="rss-feed"><a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a> | <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments RSS Feed</a></div>-->
            
            </div>
    
        </div>
    
        <div class="navigation">
            
            <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => '', 'depth' => '2' ));?>
            
        </div>
