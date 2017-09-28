jQuery(document).ready(function () {
        menuInit("prices", "#201b1b");
        modalInit();

        $(".price_form").submit(function() { //Change
            var th = $(this);
            $.ajax({
                type: "POST",
                url: "mail.php", //Change
                data: th.serialize()
            }).done(function() {
                alert("Thank you!");
                setTimeout(function() {
                    // Done Functions
                    th.trigger("reset");
                }, 1000);
            });
            return false;
        });

        headerFix();
        offerDescrPicHeight();

        $(window).resize(function(){
            headerFix();
            offerDescrPicHeight();
        });

        menuListHeightFix("#header", ".menuListHeightFixElement");
});
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJzcGVjX3ByaWNlcy5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJqUXVlcnkoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBtZW51SW5pdChcInByaWNlc1wiLCBcIiMyMDFiMWJcIik7XHJcbiAgICAgICAgbW9kYWxJbml0KCk7XHJcblxyXG4gICAgICAgICQoXCIucHJpY2VfZm9ybVwiKS5zdWJtaXQoZnVuY3Rpb24oKSB7IC8vQ2hhbmdlXHJcbiAgICAgICAgICAgIHZhciB0aCA9ICQodGhpcyk7XHJcbiAgICAgICAgICAgICQuYWpheCh7XHJcbiAgICAgICAgICAgICAgICB0eXBlOiBcIlBPU1RcIixcclxuICAgICAgICAgICAgICAgIHVybDogXCJtYWlsLnBocFwiLCAvL0NoYW5nZVxyXG4gICAgICAgICAgICAgICAgZGF0YTogdGguc2VyaWFsaXplKClcclxuICAgICAgICAgICAgfSkuZG9uZShmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgICAgIGFsZXJ0KFwiVGhhbmsgeW91IVwiKTtcclxuICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgLy8gRG9uZSBGdW5jdGlvbnNcclxuICAgICAgICAgICAgICAgICAgICB0aC50cmlnZ2VyKFwicmVzZXRcIik7XHJcbiAgICAgICAgICAgICAgICB9LCAxMDAwKTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgaGVhZGVyRml4KCk7XHJcbiAgICAgICAgb2ZmZXJEZXNjclBpY0hlaWdodCgpO1xyXG5cclxuICAgICAgICAkKHdpbmRvdykucmVzaXplKGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgICAgIGhlYWRlckZpeCgpO1xyXG4gICAgICAgICAgICBvZmZlckRlc2NyUGljSGVpZ2h0KCk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIG1lbnVMaXN0SGVpZ2h0Rml4KFwiI2hlYWRlclwiLCBcIi5tZW51TGlzdEhlaWdodEZpeEVsZW1lbnRcIik7XHJcbn0pOyJdLCJmaWxlIjoic3BlY19wcmljZXMuanMifQ==
