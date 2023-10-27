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
// print_r($arResult);
?>

<section class="teams position-relative" id="teams">
	<div class="container">
		<div class="fs-45 fw-900 fst-italic text-uppercase lh-12 text-center mb-5">
			Наша команда
		</div>
		<ul class="nav nav-tabs d-flex flex-column flex-lg-row justify-content-center fs-16 fw-500 lh-10 mb-5" id="teamsTab" role="tablist">
			<? foreach ($arResult['SECTIONS'] as $key => $arSection) :
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			?>
				<li class="nav-item" id="<?= $this->GetEditAreaId($arSection['ID']); ?>">
					<a class="nav-link<?= ($key ? '' : ' active') ?> link" id="tab<?= $arSection['ID']; ?>-tab" data-toggle="tab" href="#tab<?= $arSection['ID']; ?>" role="tab" aria-controls="tab<?= $arSection['ID']; ?>" aria-selected="<?= ($key ? 'false' : 'true') ?>"><?= $arSection['NAME']; ?></a>
				</li>
			<? endforeach; ?>
		</ul>
		<div class="tab-content" id="teamsTabContent">
			<? foreach ($arResult['SECTIONS'] as $key => $arSection) : ?>
				<div class="tab-pane fade<?= ($key ? '' : ' show active') ?> position-relative" id="tab<?= $arSection['ID']; ?>" role="tabpanel" aria-labelledby="tab<?= $arSection['ID']; ?>-tab">
					<div class="swiper-control w-100">
						<div class="container position-absolute d-flex justify-content-between top-50 align-items-center">
							<div class="swiper-button-prev" aria-controls="swiper-wrapper-<?= $arSection['ID']; ?>"></div>
							<div class="swiper-button-next" aria-controls="swiper-wrapper-<?= $arSection['ID']; ?>"></div>
						</div>
					</div>
					<div class="swiper teamsSwiper position-relative" id="swiper-wrapper-<?= $arSection['ID']; ?>">
						<div class="swiper-wrapper">
							<?
							$arSelect = array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "PROPERTY_POST");
							$arFilter = array(
								"IBLOCK_ID" => $arParams['IBLOCK_ID'],
								"ACTIVE" => "Y",
								"IBLOCK_SECTION_ID" => $arSection['ID']
							);
							$rsElements = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
							while ($arElement = $rsElements->GetNext()) :
								$arFile = CFile::GetFileArray($arElement["PREVIEW_PICTURE"]);
								if ($arFile['CONTENT_TYPE'] == 'image/gif') {
									//$arFile["SRC"] = CMillcomPhpThumb::generateImg($arElement["PREVIEW_PICTURE"], 12);
								} else {
									if (CModule::IncludeModule("millcom.phpthumb")) {
										$arElement["PREVIEW_PICTURE_WEBP"] = CMillcomPhpThumb::generateImg($arElement["PREVIEW_PICTURE"], 4);
										$arElement["PREVIEW_PICTURE_JPG"] = CMillcomPhpThumb::generateImg($arElement["PREVIEW_PICTURE"], 5);
									}
								}
							?>
								<div class="swiper-slide teams__slide">
									<div class="teams__box-img mb-4">
										<? if ($arFile['CONTENT_TYPE'] == 'image/gif') : ?>
											<img src="<?= $arFile["SRC"]; ?>" alt="Команда" class="w-100 h-auto d-block" width="255" />
										<? else : ?>
											<picture>
												<source srcset="<?= $arElement["PREVIEW_PICTURE_WEBP"]; ?>" type="image/webp">
												<img src="<?= $arElement["PREVIEW_PICTURE_JPG"]; ?>" alt="Команда" class="w-100 h-auto d-block" width="255" height="265" />
											</picture>
										<? endif; ?>
									</div>
									<div class="d-flex flex-column justify-content-center align-items-center">
										<div class="fs-24 fw-700 lh-10 mb-3 text-center">
											<?= $arElement["NAME"]; ?>
										</div>
										<div class="fs-16 lh-10 text-center"><?= $arElement['PROPERTY_POST_VALUE']; ?></div>
									</div>
								</div>
							<? endwhile; ?>
						</div>
					</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
</section>

<script>
	<? foreach ($arResult['SECTIONS'] as $key => $arSection) : ?>
		var teamsSwiper = new Swiper("#tab<?= $arSection['ID']; ?> .teamsSwiper", {
			slidesPerView: 1,
			spaceBetween: 30,
			loop: true,
			grabCursor: true,
			keyboard: {
				enabled: true,
			},
			navigation: {
				nextEl: "#tab<?= $arSection['ID']; ?> .swiper-button-next",
				prevEl: "#tab<?= $arSection['ID']; ?> .swiper-button-prev",
			},
			breakpoints: {
				992: {
					slidesPerView: 4,
				},
				768: {
					slidesPerView: 3,
				},
				576: {
					slidesPerView: 2,
				},
			},
		});
	<? endforeach; ?>
</script>