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
print_r($arResult);
?>

<section class="vacancies position-relative" id="vacancies">
	<div class="container">
		<div class="fs-45 fw-900 fst-italic text-uppercase lh-12 text-center mb-5">
			Присоединись к команде уже сегодня
		</div>
		<ul class="nav nav-tabs d-flex flex-column flex-lg-row justify-content-center fs-16 fw-500 lh-10 mb-5" id="vacanciesTab" role="tablist">
			<? foreach ($arResult['SECTIONS'] as $key => $arSection) :
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			?>
				<li class="nav-item" id="<?= $this->GetEditAreaId($arSection['ID']); ?>">
					<a class="nav-link<?= ($key ? '' : ' active') ?> link" id="tab<?= $arSection['ID']; ?>-tab" data-toggle="tab" href="#tab<?= $arSection['ID']; ?>" role="tab" aria-controls="tab<?= $arSection['ID']; ?>" aria-selected="<?= ($key ? 'false' : 'true') ?>"><?= $arSection['NAME']; ?></a>
				</li>
			<? endforeach; ?>
		</ul>
		<div class="tab-content" id="vacanciesTabContent">
			<? foreach ($arResult['SECTIONS'] as $key => $arSection) : ?>
				<div class="tab-pane fade<?= ($key ? '' : ' show active') ?> position-relative" id="tab<?= $arSection['ID']; ?>" role="tabpanel" aria-labelledby="tab<?= $arSection['ID']; ?>-tab">
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
										<button class="card__btn fw-700 fs-24 ps-0 d-flex justify-content-between w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $counter ?>" aria-expanded="<?= $key ? 'false' : 'true' ?>" aria-controls="collapse-<?= $counter ?>">
											<span class="py-3"><?= $arItem["NAME"] ?> </span>
											<span class="vacancies__box-circle rounded-circle bg-primary d-flex justify-content-center align-items-center position-relative">
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
			<? endforeach; ?>
		</div>
	</div>
</section>
