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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJzcGVjX3BvcnRmb2xpby5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJqUXVlcnkoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcclxuICAgIG1lbnVJbml0KFwiZ2FsbGVyeVwiLCBcIiMyMDFiMWJcIik7XHJcbiAgICBtb2RhbEluaXQoKTtcclxuXHJcbiAgICBoZWFkZXJGaXgoKTtcclxuICAgIG9mZmVyRGVzY3JQaWNIZWlnaHQoKTtcclxuXHJcbiAgICAkKHdpbmRvdykucmVzaXplKGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgaGVhZGVyRml4KCk7XHJcbiAgICAgICAgb2ZmZXJEZXNjclBpY0hlaWdodCgpO1xyXG4gICAgfSk7XHJcblxyXG4gICAgbWVudUxpc3RIZWlnaHRGaXgoXCIjaGVhZGVyXCIsIFwiLm1lbnVMaXN0SGVpZ2h0Rml4RWxlbWVudFwiKTtcclxufSk7Il0sImZpbGUiOiJzcGVjX3BvcnRmb2xpby5qcyJ9
