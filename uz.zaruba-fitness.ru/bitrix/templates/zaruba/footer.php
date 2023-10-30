<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>

</main>
<footer class="footer py-5" id="contacts">
	<div class="container footer__box position-relative">
		<div class="fs-45 fw-900 fst-italic text-uppercase lh-12 mb-5">
			Контакты
		</div>
		<div class="row gy-5" style="z-index: 10;">
			<div class="col-12 col-sm-6 col-lg-2">
				<div class="fw-500 lh-12">
					<span class="d-block text-success text-uppercase fs-12 ls-7 mb-2">/Режим работы/</span>
					<span class="d-block fs-15 fw-500 lh-12 text-nowrap">
						<?= nl2br(\Victory\Options\CVictoryOptions::getOptionValue('time_' . SITE_ID)); ?>
					</span>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-lg-2">
				<div class="fw-500 lh-12">
					<span class="d-block text-success text-uppercase fs-12 ls-7 mb-2">/отдела продаж/</span>
					<span class="d-block fs-15 fw-500 lh-12 text-nowrap">
						<?= nl2br(\Victory\Options\CVictoryOptions::getOptionValue('time_op_' . SITE_ID)); ?>
					</span>
				</div>
			</div>
			<div class="d-none d-lg-block col-lg-5"></div>
			<div class="col-12 col-lg-5">
				<span class="d-block text-success text-uppercase fs-12 ls-7 mb-2">
					<a href="<?= nl2br(\Victory\Options\CVictoryOptions::getOptionValue('map_' . SITE_ID)); ?>">/СМОТРЕТЬ на карте/</a>
				</span>
				<span class="d-block fs-24 fw-700 lh-12">
					<?= nl2br(\Victory\Options\CVictoryOptions::getOptionValue('address_' . SITE_ID)); ?>
				</span>
			</div>
			<div class="col-12 col-lg-9" style="z-index: 10">
				<div class="fw-800 lh-12 phone-large"><?
														$phone = \Victory\Options\CVictoryOptions::getOptionValue('phone_' . SITE_ID);
														?>
					<a href="tel:<?= str_replace(array(' ', '(', ')', '-'), '', $phone); ?>" class="d-block text-nowrap"><?= $phone; ?></a>
				</div>
				<a href="#" class="btn btn-transparent pe-5 border-0 py-0 text-end d-block text-success fw-700 lh-12 fs-16 contacts__btn position-relative" data-toggle="modal" data-target="#orderModal"><span>Заказать обратный звонок</span></a>
			</div>
		</div>
		<div class="row footer__box-content">
			<div class="col col-lg-2 d-none d-lg-block">
				<a href="/" class="d-block mw-100">
					<img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/logo.svg" alt="logo" class="mw-100" />
				</a>
			</div>
			<div class="col-lg-10">
				<div class="row pt-3 g-5 footer__box-content">
					<div class="col-12 col-md-6 col-xl-3 order-1 d-none d-md-block">
						<div class="fs-14 fw-500 lh-12 text-center text-md-start">
							<?= \Victory\Options\CVictoryOptions::getOptionValue('requisites_name_' . SITE_ID); ?>
						</div>
					</div>
					<?
					$wa_link = \Victory\Options\CVictoryOptions::getOptionValue('wa_link_' . SITE_ID);
					$ig_link = \Victory\Options\CVictoryOptions::getOptionValue('ig_link_' . SITE_ID);
					$vk_link = \Victory\Options\CVictoryOptions::getOptionValue('vk_link_' . SITE_ID);
					if ($wa_link || $ig_link || $vk_link) :

					?>
						<div class="col-12 col-md-6 col-lg-5 order-1 ">
							<ul class="footer__social social d-flex p-0 m-0 gap-4">
								<? if ($vk_link) : ?>
									<li class="ps-5 social__item social__item--vk social__link--vk">
										<a href="<?= $vk_link; ?>" target="_blank" class="fs-12 fw-500 lh-12 ls-7 social__link">Вконтакте</a>
									</li>
								<? endif; ?>
								<? if ($ig_link) : ?>
									<li class="ps-5 social__item social__item--insta">
										<a href="<?= $ig_link; ?>" target="_blank" class="fs-12 fw-500 lh-12 ls-7 social__link">Instagram</a>
									</li>
								<? endif; ?>
								<? if ($wa_link) : ?>
									<li class="ps-5 social__item social__item--whatsapp social__link--whatsapp ">
										<a href="<?= $wa_link; ?>" target="_blank" class="fs-12 fw-500 lh-12 ls-7 social__link">WhatsApp</a>
									</li>
								<? endif; ?>
							</ul>
						</div>
					<? endif; ?>
					<div class="col-12 col-md-6 col-lg-4 order-1">
						<a href="#" class="d-block fs-14 fw-500 lh-12 d-none">
							Политика конфиденциальности
						</a>
						<a href="<?= nl2br(\Victory\Options\CVictoryOptions::getOptionValue('oferta_' . SITE_ID)); ?>" target="_blank" class="d-block fs-14 fw-500 lh-12">
							Публичный договор оферты
						</a>
						<a href="<?= nl2br(\Victory\Options\CVictoryOptions::getOptionValue('rules_' . SITE_ID)); ?>" target="_blank" class="d-block fs-14 fw-500 lh-12">
							Правила
						</a>
						<a href="<?= nl2br(\Victory\Options\CVictoryOptions::getOptionValue('politica_' . SITE_ID)); ?>" target="_blank" class="d-block fs-14 fw-500 lh-12">
							Политика обработки персональных данных
						</a>
					</div>
					<div class="col-12 col-lg-7 order-2 order-lg-1">
						<div class="fs-12 fw-500 lh-12 opacity-50">
							<div class="d-block d-md-none"><?= \Victory\Options\CVictoryOptions::getOptionValue('requisites_name_' . SITE_ID); ?></div>
							<?= nl2br(\Victory\Options\CVictoryOptions::getOptionValue('requisites_' . SITE_ID)); ?>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-3 order-1">
						<div class="d-flex gap-4">
							<img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/tkk.svg" alt="TKK" class="d-inline-block mw-100" />
							<div class="d-flex flex-column">
								<a href="https://target-kc.ru" target="_blank" class="d-block fs-12 fw-500 lh-12 opacity-50">Разработка сайта:
								</a>
								<span class="d-block fs-12 fw-500 lh-12 opacity-50">Таргет Консалт Компани</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

</div>


<script>
	/*
let bg = document.querySelectorAll('.paralax');
var randParalax = [];
for (let i = 0; i < bg.length; i++){
	randParalax[i] = Math.round(Math.random()*50);
	window.addEventListener('mousemove', function(e) {
		let x = e.clientX / window.innerWidth;
		let y = e.clientY / window.innerHeight;
		var randX = randParalax[i];
		var randY = randX;
		bg[i].style.transform = 'translate(-' + x * randX + 'px, -' + y * randY + 'px)';
	});
}
*/
	var wow = new WOW({
		boxClass: 'wow', // animated element css class (default is wow)
		animateClass: 'animate__animated', // animation css class (default is animated)
		offset: 0, // distance to the element when triggering the animation (default is 0)
		mobile: true, // trigger animations on mobile devices (default is true)
		live: true, // act on asynchronously loaded content (default is true)
		callback: function(box) {
			// the callback is fired every time an animation is started
			// the argument that is passed in is the DOM node being animated
		},
		scrollContainer: null, // optional scroll container selector, otherwise use window,
		resetAnimation: true, // reset animation on end (default is true)
	});
	wow.init();
</script>

<!--

				<div id="fitbaseWidgetContainer">
<fitbase-widget theme="dark" data-club="3" domain="https://zaruba-ugozapad.fitbase.io/" data-src="https://zaruba-ugozapad.fitbase.io/vue-resources/schedule-widget/dist/js/app.js"></fitbase-widget>
				</div>
				<script src="https://zaruba-ugozapad.fitbase.io/vue-resources/schedule-widget/init.js" defer></script>
-->
<!--
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="scheduleModalLabel">Расписание</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Закрыть"></button>
			</div>
			<div class="modal-body">
			<?
			$fitbase = \Victory\Options\CVictoryOptions::getOptionValue('fitbase_' . SITE_ID);
			echo $fitbase;
			?>

			</div>
		</div>
	</div>
</div>
-->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Закрыть"></button>
				<h5 class="modal-title text-center  fs-24 fw-700" id="orderModalLabel">Заказать звонок</h5>
			</div>
			<div class="modal-body pt-0">
				<? $APPLICATION->IncludeComponent(
					"bitrix:iblock.element.add.form",
					"large",
					array(
						"FORM_NAME" => "Всплывающая форма",
						"AJAX_MODE" => "Y",
						"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
						"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
						"CUSTOM_TITLE_DETAIL_PICTURE" => "",
						"CUSTOM_TITLE_DETAIL_TEXT" => "",
						"CUSTOM_TITLE_IBLOCK_SECTION" => "",
						"CUSTOM_TITLE_NAME" => "+7 (xxx) xxx-xx-xx",
						"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
						"CUSTOM_TITLE_PREVIEW_TEXT" => "",
						"CUSTOM_TITLE_TAGS" => "",
						"DEFAULT_INPUT_SIZE" => "30",
						"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
						"ELEMENT_ASSOC" => "CREATED_BY",
						"GROUPS" => array(
							0 => "2",
						),
						"IBLOCK_ID" => FORM_IBLOCK_ID,
						"IBLOCK_TYPE" => "us",
						"LEVEL_LAST" => "Y",
						"LIST_URL" => "",
						"MAX_FILE_SIZE" => "0",
						"MAX_LEVELS" => "100000",
						"MAX_USER_ENTRIES" => "100000",
						"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
						"PROPERTY_CODES" => array(
							0 => "6",
							1 => "12",
							2 => "NAME",
						),
						"PROPERTY_CODES_REQUIRED" => array(
							0 => "6",
						),
						"RESIZE_IMAGES" => "N",
						"SEF_MODE" => "N",
						"STATUS" => "ANY",
						"STATUS_NEW" => "N",
						"USER_MESSAGE_ADD" => "",
						"USER_MESSAGE_EDIT" => "",
						"USE_CAPTCHA" => "N",
						"COMPONENT_TEMPLATE" => "large"
					),
					false
				); ?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="vacanciesModal" tabindex="-1" aria-labelledby="vacanciesModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Закрыть"></button>
				<h5 class="modal-title text-center fs-24 fw-700" id="vacanciesModalLabel">Отклик на вакансию</h5>
			</div>
			<div class="modal-body pt-0">
				<? $APPLICATION->IncludeComponent(
					"bitrix:iblock.element.add.form",
					"vacansies",
					array(
						"FORM_NAME" => "Всплывающая форма",
						"AJAX_MODE" => "Y",
						"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
						"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
						"CUSTOM_TITLE_DETAIL_PICTURE" => "",
						"CUSTOM_TITLE_DETAIL_TEXT" => "",
						"CUSTOM_TITLE_IBLOCK_SECTION" => "",
						"CUSTOM_TITLE_NAME" => "+7 (xxx) xxx-xx-xx",
						"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
						"CUSTOM_TITLE_PREVIEW_TEXT" => "",
						"CUSTOM_TITLE_TAGS" => "",
						"DEFAULT_INPUT_SIZE" => "30",
						"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
						"ELEMENT_ASSOC" => "CREATED_BY",
						"GROUPS" => array(
							0 => "2",
						),
						"IBLOCK_ID" => "25",
						"IBLOCK_TYPE" => "all",
						"LEVEL_LAST" => "Y",
						"LIST_URL" => "",
						"MAX_FILE_SIZE" => "0",
						"MAX_LEVELS" => "100000",
						"MAX_USER_ENTRIES" => "100000",
						"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
						"PROPERTY_CODES" => array(
							0 => "18",
							1 => "19",
							2 => "20",
							3 => "21",
							4 => "22",
						),
						"PROPERTY_CODES_REQUIRED" => array(
							0 => "18",
							1 => "19",
							2 => "20",
						),
						"RESIZE_IMAGES" => "N",
						"SEF_MODE" => "N",
						"STATUS" => "ANY",
						"STATUS_NEW" => "N",
						"USER_MESSAGE_ADD" => "",
						"USER_MESSAGE_EDIT" => "",
						"USE_CAPTCHA" => "N",
						"COMPONENT_TEMPLATE" => "vacansies"
					),
					false
				); ?>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="view3dModal" tabindex="-1" aria-labelledby="view3dModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="view3dModalLabel">3D-тур по клуб</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Закрыть"></button>
			</div>
			<div class="modal-body">
				<div class="wrapper-iframe">
					<?
					$view3d = \Victory\Options\CVictoryOptions::getOptionValue('3D_' . SITE_ID);
					echo $view3d;
					?>
				</div>
			</div>
		</div>
	</div>
</div>


</body>

</html>