
function modalInit () {
	/****инициализация модалки JQUERY UI****/
	$( "#price-modal" ).dialog({
		modal: true,
		draggable: false, 
		autoOpen: false,
		closeOnEscape: true, 
		resizable: false,
		maxWidth: '570px',
		width: '100%',
		buttons: {
			Ok: function() {
				$( this ).dialog( "close" );
			}
		} 
	}); 
	
	$('#prices .btn').click(function(){
		$( "#price-modal" ).dialog("open");
	});
	/****МОДАЛКА JQUERY UI end****/

	var htmlold = $('.ui-dialog .ui-dialog-title').html();
	htmlold += '<i class="fa fa-times close-btn" aria-hidden="true"></i>';
	$('.ui-dialog .ui-dialog-title').html(htmlold);

	$('.close-btn').click(function(){
		$( "#price-modal" ).dialog("close");
	});
	$('#price-modal .btn').click(function(){
		$( "#price-modal" ).dialog("close");
	});
}

function menuInit (hammerOnSwypeElement, btnColor){
	var menu = $('.menu_mobile');
	var button = $('.menuToggle_icon');
	var myElement = document.getElementById(hammerOnSwypeElement);
	var mc = new Hammer(myElement);

	/********HUMMER (for menu)*****/
	mc.on("panright", function(ev) {
		$(menu).addClass('menu_animate');  
		$(button).removeClass('fa-bars').addClass('fa-times');
	});
	mc.on("panleft", function(ev) {
		$(menu).removeClass('menu_animate');  
		$(button).removeClass('fa-times').addClass('fa-bars');    
	});
	/********HUMMER (for menu)*****/

	
	/********MENU TOGGLE*******/
	$('.menuToggle').on('click', function(evt){
		$(menu).toggleClass('menu_animate');   

		if ($(menu).hasClass('menu_animate')) {
			$(button).removeClass('fa-bars').addClass('fa-times');
		} else{
			(button).removeClass('fa-times').addClass('fa-bars');  
		}
	});//click end
	/********MENU TOGGLE*******/
	
	
	/********MENU_TOGGLE_BUTTON COLOR**********/
	button.css({
		color: btnColor
	});
	/********MENU_TOGGLE_BUTTON COLOR**********/
};

function sliderInit(){
	$('.slick_slider').slick({
		prevArrow: '<p><i class="fa slick__arrow_left fa-angle-left" aria-hidden="true"></i></p>',
		nextArrow: '<p><i class="fa slick__arrow_right fa-angle-right" aria-hidden="true"></i></p>' 
	});//slick end
}

function formInit(){
		//E-mail Ajax Send
	$(".price_form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "../mail.php", //Change
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
}