jQuery(document).ready(function($){
    resizeBoxes();
        
    function resizeBoxes() {  
       var highestBox = 0;
       $('#vereniging .contentblock').each(function(){  
           if($(this).height() > highestBox){  
               highestBox = $(this).height();  
           }
       }); 
       $('#vereniging .contentblock').height( highestBox );    
    }  
    
    searchResize();
        
    function searchResize() {  
       var highestBox = 0;
       $('.event-wrapper .event-content').each(function(){  
           if($(this).height() > highestBox){  
               highestBox = $(this).height();  
           }
       }); 
       $('.event-wrapper .event-content').height( highestBox );    
    }  

    $(window, document).on('resize', searchResize);   
    $(window, document).on('resize', resizeBoxes);   
    
    setInterval( function() {
        searchResize();
        resizeBoxes();
    }, 500 );
});

