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
     $("select").select2({
         minimumResultsForSearch: Infinity
     });
    
    var hash = document.location.hash;
    var prefix = "";
    if (hash) {
        $('.tabs a[href=' + hash.replace(prefix, "") + ']').tab('show');
    }
    $('.tabs a').on('click', function (e) {                    
        window.location.hash = e.target.hash.replace("#", "#" + prefix);
    });
});



function offsetcontainer(){
    var ruimte = jQuery(window).width() - jQuery('.container-fluid').width();
        ruimte = ruimte / 2;
    jQuery('.widthcalc').css('width',ruimte);
}offsetcontainer();

function calcheight(){
    var photoheight = jQuery('#photos').height();
    jQuery('.photowrapper-offset').css('border-top-width',photoheight);

    var aboutheight = jQuery('#about').height();
    jQuery('.aboutwrapper-offset').css('border-top-width',aboutheight);
    
    var sidebarheight = jQuery('.wrapper').height()+150;
    jQuery('.sidebar').css('height',sidebarheight);
    
}calcheight();
(jQuery)

jQuery(document).ready(function($) {
	$(window).on('scroll', function() {
		if ($(window).scrollTop() > 45) {
			$('body').addClass('scrolled');
		}
		else {
			$('body').removeClass('scrolled');
		}
	});
});