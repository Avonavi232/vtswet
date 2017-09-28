$('.slick_slider').ready(function () {
	(function () {
		//gallery__category_active - активный класс категории (кнопочки)
		$category = $('.gallery__category');  //все кнопочки здесь
		$slider = $('.slick_slider');  //контейнер слайдера

		function removeSlider() {
			$slider = $('.slick_slider');
                $slider.remove(); //удаляем нах слайдер
        }
		function getSlides() {
            let sliderItems = []; //создаем пустой массив элементов
            $('.slick_slider__item').each(function () {
                let item = {};	//создаем объект под элемент слайдера
                let $el = $(this).remove(); //удаляем его из слайдера и сохраняем в переменную
                $el.removeClass('slick_slider__item_hidden'); //удаляем из элемента класс, скрывающий элемент изначально
                item.category = $el.attr('data-categoryid');	//создаем поле объекта - категория
                item.code = '<div class="slick_slider__item" data-categoryid="' + item.category + '">' + $el.html().trim() + '</div>'; //создаем поле объекта - хтмл код
                sliderItems.push(item); //пихаем эл-т в массив
            });
            removeSlider();
			return sliderItems;
        }

        let allSlides = getSlides(); //получаем все слайды

        function sliderFilter(categoryName) {
        	removeSlider();

            let code = allSlides.filter(function (el) {	//сохраняем в code нужные элементы с учетом категории
                if (el.category === categoryName)
                    return el;
            });

            let result = ''; //формируем строку кода в этой переменной
            for (let slide of code){
                result += slide.code;
            }

            $('.gallery__rightcol').append('<div class="slick_slider">' + result + '</div>');
            $('.slick_slider').slick({
                prevArrow: '<p><i class="fa slick__arrow_left fa-angle-left" aria-hidden="true"></i></p>',
                nextArrow: '<p><i class="fa slick__arrow_right fa-angle-right" aria-hidden="true"></i></p>'
            });//slick end
        }

		$category.hover(function () {
			if (!($(this).hasClass('gallery__category_active'))){
				$(this).addClass('gallery__category_hover');
			}
		}, function () {
			if ($(this).hasClass('gallery__category_hover')){
				$(this).removeClass('gallery__category_hover');
			}
		});

		$category.click(function () {
            $category.removeClass('gallery__category_active');
            $(this).addClass('gallery__category_active');
			let category = $(this).text();
			sliderFilter(category);
		});

        $category.first().click();
	})();
});
