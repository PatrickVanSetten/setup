(function($){
    $("#hamburger").click(function(){
        $("body").toggleClass("nav-open");
        $("html").toggleClass("not-scrollable");
    });
    $('.tabs-nav-list').eq(0).addClass('active');
    $('.tab-pane').removeClass('active');
    $('.tab-pane').eq(0).addClass('active');
})

function offsetcontainer(){
    var ruimte = jQuery(window).width() - jQuery('.container-fluid').width();
        ruimte = ruimte / 2;
    jQuery('.adressbarright').css('width',ruimte);
    jQuery('.newswrapperbg').css('width',ruimte);
    jQuery('.photowrapperbg').css('width',ruimte);
}offsetcontainer();

jQuery(window).resize(function(){
    offsetcontainer();
})

function equalheight() {
    var height = jQuery('.photowrapper').height();
    jQuery('.photo-wrapper::after').css('border-top',height);
}equalheight();

(jQuery)

