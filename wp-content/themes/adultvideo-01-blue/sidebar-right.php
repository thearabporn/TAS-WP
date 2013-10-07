            <div class="adsbar">
                
                <!--Right sidebar 300x250 banners block, remove if not used-->
            
                <?php get_template_part('banners'); ?>
                
                <!--End of banners block, don't remove anything after this line-->
                
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Right Sidebar") ) : ?>
                
                <h3>Any Content</h3>
                
                <div>
                        
                    <p>
                            
                        Use widgets settings in Wordpress admin area to modify content of sidebars   
                        
                    </p>
                    
                </div>
                    
                <?php endif; ?>
                    
                <div class="clear"></div>

            </div>
