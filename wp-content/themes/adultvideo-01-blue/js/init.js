        $(document).ready(function(){ 
    
        $("ul.menu li a").mouseover(function() { 
        
        $(this).parent().find("ul.sub-menu").slideDown('fast').show(); 

        $(this).parent().hover(function() {
        }, function(){	
            $(this).parent().find("ul.sub-menu").slideUp('slow'); 
        });

        }).hover(function() { 
            $(this).addClass("subhover"); 
        }, function(){
            $(this).removeClass("subhover"); 
        });

	$("img[rel]").overlay({mask: '#000000' });

        });
