<?php 
    if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        
        die ('Please do not load this page directly');

        if (!empty($post->post_password)) { 
            
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { 
                ?>

                <p>This post is password protected. Enter the password to view comments.<p>

                <?php
                
                return;
            }
        }

?>

                <?php if ($post->comment_status == 'open') : ?>

                <div class="post-comments">
                            
                    <div class="total-comments"><?php comments_number('No comments', 'One comment', '% comments' );?> on "<?php if(is_attachment() ) { echo get_the_title($post -> post_parent).' &raquo; '; } the_title(); ?>"</div>
                            
                    <div class="comment-link"><img src="<?php bloginfo('template_directory'); ?>/images/add-comment.png" rel="#comment" alt="Add comment" /></div>
                            
                    <div class="clear"></div>
                        
                </div>
                
                <?php if ($comments) : ?>
                
                <ol class="comment-list" id="comments">

                <?php wp_list_comments(array('callback' => 'custom_comments')); ?>

                </ol>
                
                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                
                <div class="comments-paginator"><?php paginate_comments_links(array('prev_text' => '&laquo; Previous comments', 'next_text' => 'Next comments &raquo;')); ?></div>
                
                <?php endif; ?>
                
                <?php endif; ?>
                        
                <div class="add-comment" id="comment">
                    
                    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
                    
                    <p>You must be <a href="<?php echo site_url(); ?>/wp-login.php?action=register&redirect_to=<?php echo site_url(); ?>/wp-login.php?redirect_to=<?php echo the_permalink(); ?>">registered</a> and <a href="<?php echo site_url(); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
                    
                    <?php else : ?>
                            
                    <form action="<?php echo site_url(); ?>/wp-comments-post.php" method="post" id="comment-form">
                    
                        <?php if ( $user_ID ) : ?>

                        <p>You are logged in as <a href="<?php echo site_url(); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> (<a href="<?php echo site_url(); ?>/wp-login.php?action=logout">logout</a>)</p>

                        <?php else : ?>
                                
                        <input class="input-text" type="text" name="author" id="author" value="Name" onfocus="javascript: if(this.value == 'Name') this.value = '';" onblur="javascript: if(this.value == '') { this.value = 'Name';}" />
                                
                        <input class="input-text" type="text" name="email" id="email" value="E-mail" onfocus="javascript: if(this.value == 'E-mail') this.value = '';" onblur="javascript: if(this.value == '') { this.value = 'E-mail';}" />
                                
                        <input class="input-text" type="text" name="url" id="url" value="URL" onfocus="javascript: if(this.value == 'URL') this.value = '';" onblur="javascript: if(this.value == '') { this.value = 'URL';}" />
                        
                        <?php endif; ?>
                                
                        <textarea class="input-textarea" name="comment" id="comment" onfocus="javascript: if(this.value == 'Your comment...') this.value = '';" onblur="javascript: if(this.value == '') { this.value = 'Your comment...';}">Your comment...</textarea>
                                
                        <input class="input-submit" name="submit" id="submit" type="submit" value="" />
                        
                        <input type="hidden" name="comment_post_ID" id="comment_post_ID" value="<?php echo $id; ?>" />
                        
                        <?php do_action('comment_form', $post->ID); ?>
                        
                        <div class="clear"></div>
                        
                        <br />
                        
                        <p>Allowed tags: <?php echo allowed_tags(); ?></p>
                            
                    </form>
                    
                    <?php endif; ?>
                        
                </div>
                
                <?php endif; ?>
                

