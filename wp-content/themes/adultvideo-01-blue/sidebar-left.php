                <div class="sidebar">
                    
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Left Sidebar") ) : ?>
                
                    <h3>Categories</h3>
                
                    <ul>
                    
                        <?php wp_list_categories('orderby=name&show_count=1&hierarchical=0&title_li=0&hide_empty=0'); ?>
                
                    </ul>
                    
                    <h3>Friends</h3>
                
                    <ul>
                    
                        <?php wp_list_bookmarks('orderby=name&title_li=0&categorize=0'); ?>
                
                    </ul>
                    
                    <h3>Any Content</h3>
                
                    <div>
                        
                        <p>
                            
                            Use widgets settings in Wordpress admin area to modify content of sidebars
                        
                        </p>
                    
                    </div>
                    
                    <?php endif; ?>
                    
                    <div class="clear"></div>
            
                </div>
