jQuery(window).on('resize',function($) {
    offsetcontainer();
    calcheight();  
});

jQuery(document).ready(function($) {
    $(window).trigger('resize');
    
     $("select").select2({
         minimumResultsForSearch: Infinity
     });
    
    $(window).on('scroll', function() {
		if ($(window).scrollTop() > 45) {
			$('body').addClass('scrolled');
		}
		else {
			$('body').removeClass('scrolled');
		}
	});
    
    offsetcontainer();
    calcheight();
    
    // Javascript to enable link to tab
    var hash = document.location.hash;
    var prefix = "";
    if (hash) {
        $('.nav.tabs a[href='+hash.replace(prefix,"")+']').tab('show');
        $('.nav.tabs a[href='+hash.replace(prefix,"")+']').removeClass('active');  
    } 

    // Change hash for page-reload
    $('.nav.tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash.replace("#", "#" + prefix);
        localStorage.setItem('lastTab', $(this).attr('href'));
        $('.nav.tabs a[href='+hash.replace(prefix,"")+']').removeClass('active');  
        $(this).parent().addClass('active'); 
        window.scrollTo(0, 550); 
    });
});

function offsetcontainer(){
    var ruimte = jQuery(window).width() - jQuery('.container-fluid').closest('.container-fluid').width();
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

(function($){
    $("#hamburger").click(function(){
        $("body").toggleClass("nav-open");
        $("html").toggleClass("not-scrollable");
    });
    $('.tabs-nav-list').eq(0).addClass('active');
    $('.tab-pane').removeClass('active');
    $('.tab-pane').eq(0).addClass('active');    
})(jQuery)
