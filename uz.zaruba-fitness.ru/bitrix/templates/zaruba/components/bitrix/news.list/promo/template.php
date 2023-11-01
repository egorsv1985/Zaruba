<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>
<section class="promo" id="promo">
	<div class="position-relative ">
		<div class="promo__box-lighting" style="background: url(<?= SITE_TEMPLATE_PATH ?>/img/icons/lightning.svg) no-repeat 100% 50% / auto 100%;"></div>
		<div class="swiper promoSwiper position-relative">
			<div class="container position-absolute swiper__box-control start-0 end-0">
				<div class="row">
					<div class="col-md-5 offset-md-7">
						<div class="swiper-control">
							<div class="d-flex flex-column align-items-end">
								<div class="swiper-button-next"></div>
								<div class="swiper-button-prev"></div>
							</div>
							<div class="swiper-pagination d-flex align-items-center gap-1 position-relative"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-wrapper">
				<? foreach ($arResult["ITEMS"] as $key => $arItem) :
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

					if (CModule::IncludeModule("millcom.phpthumb") && $arItem['DETAIL_PICTURE']['SRC'])
						$arItem['DETAIL_PICTURE']['SRC'] = CMillcomPhpThumb::generateImg($arItem['DETAIL_PICTURE']['SRC'], 13);

					/*
	if (!$USER->IsAdmin()) {
		unset($arItem['DETAIL_PICTURE']['SRC']);
	}
	*/

				?>
					<div class="swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" <?= ($arItem['DETAIL_PICTURE']['SRC'] ? ' style="background-image:url(\'' . $arItem['DETAIL_PICTURE']['SRC'] . '\');"' : '') ?>>
						<div class="slide-shadow<?= ($arItem['DETAIL_PICTURE']['SRC'] ? ' active' : '') ?>">
							<div class="promo__slide position-relative">
								<div class="container">
									<div class="row justify-content-end">
										<div class="col-lg-6 col-12">
											<span class="d-block fs-70 fw-900 lh-12 fst-italic text-primary counter text-center text-md-start mb-2 mb-lg-0"><?= str_pad(($key + 1), 2, "0", STR_PAD_LEFT) ?></span>
											<div class="h1 fs-45 fw-900 lh-12 fst-italic text-center text-uppercase mb-5">
												<?= $arItem['~NAME']; ?>
											</div>

											<?
											$APPLICATION->IncludeComponent(
												"bitrix:iblock.element.add.form",
												"small",
												array(
													"FORM_NAME" => "Форма в слайдере: " . $arItem['NAME'],
													"AJAX_MODE" => 'Y',
													"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",	// * дата начала *
													"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",	// * дата завершения *
													"CUSTOM_TITLE_DETAIL_PICTURE" => "",	// * подробная картинка *
													"CUSTOM_TITLE_DETAIL_TEXT" => "",	// * подробный текст *
													"CUSTOM_TITLE_IBLOCK_SECTION" => "",	// * раздел инфоблока *
													"CUSTOM_TITLE_NAME" => "+7 (xxx) xxx-xx-xx",	// * наименование *
													"CUSTOM_TITLE_PREVIEW_PICTURE" => "",	// * картинка анонса *
													"CUSTOM_TITLE_PREVIEW_TEXT" => "",	// * текст анонса *
													"CUSTOM_TITLE_TAGS" => "",	// * теги *
													"DEFAULT_INPUT_SIZE" => "30",	// Размер полей ввода
													"DETAIL_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования подробного текста
													"ELEMENT_ASSOC" => "CREATED_BY",	// Привязка к пользователю
													"GROUPS" => array(	// Группы пользователей, имеющие право на добавление/редактирование
														0 => "2",
													),
													"IBLOCK_ID" => FORM_IBLOCK_ID,	// Инфоблок
													"IBLOCK_TYPE" => "us",	// Тип инфоблока
													"LEVEL_LAST" => "Y",	// Разрешить добавление только на последний уровень рубрикатора
													"LIST_URL" => "",	// Страница со списком своих элементов
													"MAX_FILE_SIZE" => "0",	// Максимальный размер загружаемых файлов, байт (0 - не ограничивать)
													"MAX_LEVELS" => "100000",	// Ограничить кол-во рубрик, в которые можно добавлять элемент
													"MAX_USER_ENTRIES" => "100000",	// Ограничить кол-во элементов для одного пользователя
													"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования текста анонса
													"PROPERTY_CODES" => array(	// Свойства, выводимые на редактирование
														//0 => "6",
														1 => "NAME",
													),
													"PROPERTY_CODES_REQUIRED" => array(	// Свойства, обязательные для заполнения
														0 => "NAME",
													),
													"RESIZE_IMAGES" => "N",	// Использовать настройки инфоблока для обработки изображений
													"SEF_MODE" => "N",	// Включить поддержку ЧПУ
													"STATUS" => "ANY",	// Редактирование возможно
													"STATUS_NEW" => "N",	// Деактивировать элемент
													"USER_MESSAGE_ADD" => "Спасибо, Ваша заявка сохранена!",	// Сообщение об успешном добавлении
													"USER_MESSAGE_EDIT" => "Спасибо, Ваша заявка сохранена!",	// Сообщение об успешном сохранении
													"USE_CAPTCHA" => "N",	// Использовать CAPTCHA
												),
												false
											); ?>

											<form action="#" class="promo__form form mb-5 d-none">
												<div class="row gy-3">
													<div class="col-12 col-md-6 form-group position-relative">
														<input type="text" class="form-control form__input bg-light rounded-0 border border-secondary text-secondary p-3 h-100 skew-btn" name="tel" id="tel" placeholder="" required />
														<label for="tel" class="form-label form__label fs-20 lh-12 text-primary position-absolute top-50">+7 (ххх) ххх хх хх</label>
													</div>

													<div class="col-12 col-md-6">
														<button type="submit" class="btn fs-20 fw-800 px-3 py-3 btn-primary rounded-0 w-100 border-0 skew-btn">
															<span>ХОЧУ!</span>
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
									<? if ($arItem['PREVIEW_PICTURE']['SRC'] && !$arItem['DETAIL_PICTURE']['SRC']) : ?>
										<div class="swiper__box-img" style="background: url(<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>) no-repeat 100% 50% / auto 100%;"></div>
									<? endif; ?>
								</div>
							</div>
						</div>
					</div>
				<? endforeach; ?>
			</div>
		</div>
	</div>
</section>
<script>
	var promoSwiper = new Swiper(".promoSwiper", {
		slidesPerView: 1,
		loop: true,
		grabCursor: true,
		keyboard: {
			enabled: true,
		},
		navigation: {
			nextEl: ".promo .swiper-button-next",
			prevEl: ".promo .swiper-button-prev",
		},
		pagination: {
			el: ".promo .swiper-pagination",
			clickable: true,
		},
	});
</script>