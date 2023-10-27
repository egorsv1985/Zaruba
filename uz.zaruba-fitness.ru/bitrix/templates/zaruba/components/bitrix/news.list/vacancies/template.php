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

<section class="vacancies position-relative" id="vacancies">
	<div class="container">
		<div class="fs-45 fw-900 fst-italic text-uppercase lh-12 text-center mb-5">
			Присоединись к команде уже сегодня
		</div>
		<div class="accordion" id="vacanciesAccordion">
			<?
			$counter = 1;
			foreach ($arResult['ITEMS'] as $key => $arItem) :
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strItemEdit);
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strItemDelete, $arItemDeleteParams);
			?>
				<div class="card">
					<div class="card-header ps-0" id="heading-<?= $counter ?>">
						<h2 class="mb-0">
							<button class="card__btn fw-700 fs-24 ps-0 d-flex justify-content-between w-100" type="button" data-toggle="collapse" data-target="#collapse-<?= $counter ?>" aria-expanded="<?= $key ? 'false' : 'true' ?>" aria-controls="collapse-<?= $counter ?>">
								<span class="py-3"><?= $arItem["NAME"] ?> </span>
								<span class="vacancies__box d-flex justify-content-center align-items-center ">
								</span>
							</button>
						</h2>
					</div>
					<div id="collapse-<?= $counter ?>" class="collapse <?= $key ? '' : ' show' ?> mb-4" aria-labelledby="heading-<?= $counter ?>" data-parent="#vacanciesAccordion">
						<div class="card-body ps-0">
							<?= $arItem["PREVIEW_TEXT"]; ?>
						</div>
					</div>
				</div>
				<? $counter++; ?>
			<? endforeach; ?>
		</div>
	</div>
</section>