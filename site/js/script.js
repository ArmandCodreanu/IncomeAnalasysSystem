$(document).ready(function(){
    
    /*TOGGLE SIDEBAR MENU*/
    $(".close-menu").hide();
    $(".open-menu").click(function(){
        $(".landing-handler").animate({
            left: "240px",
            backgroundPosition: "240px"
        },{
            duration: 300,
            easing: "linear"
        });
        
        $(this).hide();
        $(".close-menu").delay(300).show();
    });
    
    $(".close-menu").click(function(){
        $(".landing-handler").animate({
            left: "0px",
            backgroundPosition: "0px"
        },{
            duration: 300,
            easing: "linear"
        });
        
        $(this).hide();
        $(".open-menu").delay(300).show();
    });
    
    
});