jQuery(document).ready(function () {
    menuInit("gallery", "#201b1b");
    modalInit();

    headerFix();
    offerDescrPicHeight();

    $(window).resize(function(){
        headerFix();
        offerDescrPicHeight();
    });

    menuListHeightFix("#header", ".menuListHeightFixElement");
});