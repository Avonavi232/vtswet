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

});