jQuery(document).ready(function(){

    menuInit("main");
    mainBgResize();

    $(window).resize(function() {
        mainBgResize();
    });//resize end

    menuListHeightFix("#header", ".menuListHeightFixElement");
});//ready end