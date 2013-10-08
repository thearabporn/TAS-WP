<?php get_header(); ?>
    
    <div class="main">
    
        <div class="content">
        
            <div class="posts">
    
            <?php if(have_posts()) { ?>
                    
                    <?php while (have_posts()) : the_post(); ?>   
                    
                    <div class="post" id="post-<?php the_ID(); ?>">
                    
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(240,180), array('alt' => get_the_title(), 'title' => '')); ?></a>
                        
                        <?php if ( get_post_meta($post->ID, 'duration', true) ) : ?><div class="duration"><?php echo get_post_meta($post->ID, 'duration', true) ?></div><?php endif; ?>
                        
                        <div class="link"><a href="<?php the_permalink() ?>"><?php short_title('...', '34'); ?></a></div>
                        
                        <span>Added: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></span>
                        
                        <span><?php the_tags('Tags: ', ', ', ''); ?></span>
                    
                    </div>
                    
                    <?php endwhile; ?>
                    
                    <div class="clear"></div>

                    <div class="paginator">
                    
                        <?php if (function_exists("pagination")) {
    
                                pagination($additional_loop->max_num_pages);
                            
                            } ?>

                    </div>
                    
                    <div class="clear"></div>
                    
                <?php }
        
                else { ?>
        
                    <h2>Sorry, no posts matched your criteria</h2>
        
                <?php } ?>
        
            </div>
            
            <?php get_sidebar('left'); ?>
        
        </div>
        
        <?php get_sidebar('right'); ?>
        
        <div class="clear"></div>
        
    </div>
    
<?php get_footer(); ?>