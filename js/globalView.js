var main = function(){
    
    $('.cuad').click(function(){
        $.post( "sumidero_info.php" );
    });
    
    
};
            
         

$(document).ready(main);