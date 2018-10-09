<?php
/**
 * The template for displaying home page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vtswet
 */
get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
//		the_content();
		?>
		<section id="contacts" class="contacts">
			<div class="container">
				<h1 class="contacts__title">Контакты</h1>
				<div class="row">
					<div class="col-md-6">
						<div class="contacts__description">
							<p class="contacts__description__text">Если Вам удобно, Вы можете написать (позвонить) мне: </p>
							<ul class="contacts__list">
								<li>
									<i class="fa fa-check" aria-hidden="true"></i>
									<a class="contacts__fromcontacts__item" href="tel:+79118360075">+7 (911) 836-00-75</a>
								</li>
								<li>
									<i class="fa fa-check" aria-hidden="true"></i>
									<a class="contacts__fromcontacts__item" href="mailto:vasya.tswetkow@yandex.ru">vasya.tswetkow@yandex.ru</a>
								</li>
								<li>
									<i class="fa fa-check" aria-hidden="true"></i>
									<a class="contacts__fromcontacts__item" href="https://vk.com/razrisyem" target="_blank">Вконтакте</a>
								</li>
								<li>
									<i class="fa fa-check" aria-hidden="true"></i>
									<a class="contacts__fromcontacts__item" href="https://instagram.com/tswet_art" target="_blank">Инстаграм</a>
								</li>
							</ul>

							<p class="contacts__description__text text">При заказе граффити или художественного
								оформления работа будет выполнена в ближайшие сроки, если это города:</p>
							<ul class="contacts__description__list">
								<li>Санкт-Петербург</li>
								<li>Москва</li>
							</ul>
							<p class="contacts__description__text text">Также возможен выезд в любые города РФ
								и за рубеж.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="contacts__pic">
							<img src="http://vtswet.loc/wp-content/uploads/2017/09/gallery_22-min.jpg" alt="background_pic">
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}

get_footer();
