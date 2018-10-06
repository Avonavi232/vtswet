
/***Управление главным баннером-бэкграундом***/
// function getOffset (width) {
// 				//y=kx+b
// 				var k = -1.1;
// 				if (width< 680){
// 					/*если ширина экрана менее 680пк,
// 					то делаем квадратичную зависимость
// 					коэффициента k от ширины экрана*/
// 					var a = -13/2880000;
// 					var b = 221/36000;
// 					var c = -5737/1800;
// 					k = width*width*a + width*b + c;
// 				}
// 				var b = 1600;
// 				var offset = (k * width) + b;
// 				offset = Math.floor(offset);
//
// 				if ( offset < 0 ){
// 						offset = 0;
// 				}
//
// 				return -offset;
// 			};

// function mainBgResize(){
// 	var win_w = $(window).width();
// 	var offset = getOffset(win_w);
//     $("#main").css({
//         'background': 'url(wp-content/themes/vt/public/img/bg0.jpg) no-repeat ' + offset + 'px 0px'
//     });//css end
//
// };

/***Управление главным баннером-бэкграундом***/