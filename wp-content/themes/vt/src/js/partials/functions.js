function headerFix(){
	var header = $("#header"); 
	var margin = header.height();
	$('.header__absoluteFix').css('padding-top', margin);
};

/***Управление главным баннером-бэкграундом***/
function getOffset (width) {
				//y=kx+b
				var k = -1.1;
				if (width< 680){
					/*если ширина экрана менее 680пк,
					то делаем квадратичную зависимость
					коэффициента k от ширины экрана*/
					var a = -13/2880000;
					var b = 221/36000;
					var c = -5737/1800;	
					k = width*width*a + width*b + c;
				}
				var b = 1600;
				var offset = (k * width) + b;
				offset = Math.floor(offset);
				
				if ( offset < 0 ){
						offset = 0;
				}
				
				return -offset;
			};

function mainBgResize(){
	var win_w = $(window).width();
	var offset = getOffset(win_w);
    $("#main").css({
        'background': 'url(wp-content/themes/vt/public/img/bg0.jpg) no-repeat ' + offset + 'px 0px'
    });//css end
	
};

function offerDescrPicHeight(){
	var descr = $('.prices__description');
	var pic = $('.prices__pic');


	if ($(window).width() >= '870') {						
		if (descr.height() < pic.height()){
			pic.height(descr.height());
			pic.children().css({
				height : '100%',
				width: 'auto',
			});
			pic.css({
				textAlign: 'right'
			});
		} else {
			pic.children().css({
				width : '100%',
				height: 'auto',
			});
			pic.css({
				'text-align': 'center' 
			});
		}
	} else { 
		pic.removeAttr("style");
		pic.children().removeAttr("style");
	}

};

function menuListHeightFix(ref, target){
	//ref - элемент, на высоту которого мы ровняем 
	//element - ровняемый элемент
	
	ref = $(ref);
	target = $(target); 
	var refHeight = ref.height();
	var targetHeight = target.height();
	var padding = (refHeight-targetHeight)/2;
	
	if( targetHeight == 0 || refHeight == 0){
		refHeight = ref.height();
		targetHeight = target.height();
		padding = (refHeight-targetHeight)/2;
	}
	
	target.css({
		paddingTop: padding,
		paddingBottom: padding
	});
}


/***Управление главным баннером-бэкграундом***/