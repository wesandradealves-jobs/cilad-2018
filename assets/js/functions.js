jQuery(document).ready(function () {
    $('.flexslider').flexslider({
        animationLoop: false,
        animation:"fade",
        prevText: "",
        nextText: "",
        controlNav: false,
        directionNav: true
    });  
    $(window).scroll(function(event) {
        $("footer").each(function(i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("animate"); 
            } else {
                el.removeClass("animate"); 
            }
        });
    });    
});

function mobileNavigation() {
    $("#wrap").children("nav").first().toggleClass("toggle");
}
