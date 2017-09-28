jQuery(document).ready(function () {
    menuInit("contacts", "#201b1b");
    headerFix();

    $(window).resize(function(){
        headerFix();
    });

    menuListHeightFix("#header", ".menuListHeightFixElement");
});