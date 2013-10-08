<?php

//Short titles for preview link

function short_title($after = '', $length) {
    $mytitle = get_the_title();
    if ( strlen($mytitle) > $length ) {
	//$mytitle = utf8_encode($mytitle);
    $mytitle = mb_substr($mytitle,0,$length);
	//$mytitle = utf8_decode($mytitle);
    echo rtrim($mytitle).$after;
    } else {
    echo $mytitle;
    }
}

//Removing useless CSS that WP pasts right inside BODY tags... (?)

function remove_gallery_css( $css ) {
    return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}

add_filter( 'gallery_style', 'remove_gallery_css' );

//Post thumbsnails support

if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' ); 
}

//Left sidebar

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Left Sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>'));
}

//Right sidebar

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Right Sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>'));
}

//Main menu

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
    register_nav_menus(
        array( 'header-menu' => __( 'Header Menu' ))
  );
}

//Thanks to http://design.sparklette.net/teaches/how-to-add-wordpress-pagination-without-a-plugin/ for pagination function

function pagination($pages = '', $range = 9)
{
     $showitems = ($range * 2)+1; 
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
     {
         echo "<span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         
     }
}

//Cumstom comments template

function custom_comments($comment, $args, $depth) {
    
    $GLOBALS['comment'] = $comment; ?>
    
    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
                    
        <?php echo get_avatar( $comment, 64 ); ?>
                        
        <span class="comment-author"><?php comment_author_link() ?> says:
                        
        <?php if ($comment->comment_approved == '0') : ?>
                        
        <em>(!) your comment is awaiting moderation</em>
                        
        <?php endif; ?>
                        
        </span>

        <small class="comment-data"><a href="#comment-<?php comment_ID() ?>" title="Permanent link to this comment"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a><?php edit_comment_link('Edit', ' | ', ''); ?></small>
                        
        <?php comment_text() ?>
                        
        <div class="clear"></div>

        </li>
    
    <?php
    
    }

?>
