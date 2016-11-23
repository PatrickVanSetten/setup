(function($){
    $("#hamburger").click(function(){
        $("body").toggleClass("nav-open");
        $("html").toggleClass("not-scrollable");
    });
    $('.tabs-nav-list').eq(0).addClass('active');
    $('.tab-pane').removeClass('active');
    $('.tab-pane').eq(0).addClass('active');

    $(window).resize(function(){
        offsetcontainer();
        calcheight();
    })
})

jQuery(document).ready(function($){
     $("select").select2();
}); 

function offsetcontainer(){
    var ruimte = jQuery(window).width() - jQuery('.container-fluid').width();
        ruimte = ruimte / 2;
    jQuery('.adressbarright').css('width',ruimte);
    jQuery('.newswrapperbg').css('width',ruimte);
    jQuery('.photowrapperbg').css('width',ruimte);
    jQuery('.aboutwrapperbg').css('width',ruimte);
}offsetcontainer();

function calcheight(){
    var photoheight = jQuery('#photos').height();
    jQuery('.photowrapper-offset').css('border-top-width',photoheight);

    var aboutheight = jQuery('#about').height();
    jQuery('.aboutwrapper-offset').css('border-top-width',aboutheight);
}calcheight();



(jQuery)



