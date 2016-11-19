(function($){
    $("#hamburger").click(function(){
        $("body").toggleClass("nav-open");
        $("html").toggleClass("not-scrollable");
    });
    $('.tabs-nav-list').eq(0).addClass('active');
    $('.tab-pane').removeClass('active');
    $('.tab-pane').eq(0).addClass('active');
})

function adressbarright(){
    var ruimte = jQuery(window).width() - jQuery('.container-fluid').width();
        ruimte = ruimte / 2;
    jQuery('.adressbarright').css('width',ruimte);
    
    jQuery(window).resize(function(){
        adressbarright();
    })
    
}adressbarright();

(jQuery)

