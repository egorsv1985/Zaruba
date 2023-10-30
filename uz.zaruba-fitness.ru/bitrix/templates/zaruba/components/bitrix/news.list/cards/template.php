<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<section class="cards bg-white" id="cards">
	<div class="container">
		<div class="fs-45 fw-900 fst-italic text-uppercase lh-12 text-center text-black cards__title">
			Выбери свою клубную карту
		</div>
		<div class="row gy-5 flex-row-reverse">
			<div class="col-12 col-md-6 col-lg-3 pb-lg-5">
				<ul class="row nav nav-tabs row pb-lg-5" id="cardTab" role="tablist">
<?foreach($arResult["ITEMS"] as $key => $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	//print_r($arItem['PROPERTIES']['BG_COLOR']);
	?>
					<li class="nav-item col-12 col-sm-4 col-md-12 wow animate__backInRight" data-wow-delay="<?=$key*0.2?>s">
						<a style="background: <?=$arItem['PROPERTIES']['BG_COLOR']['VALUE']?>; color: <?=$arItem['PROPERTIES']['COLOR']['VALUE']?>;" class="cards-item mb-4 nav-link p-0<?=$key ? '' : ' active show'?>" id="tab<?=$arItem['ID'];?>-tab" data-toggle="tab" href="#tab<?=$arItem['ID'];?>" role="tab" aria-controls="tab<?=$arItem['ID'];?>" aria-selected="<?=$key ? 'false' : 'true'?>">
							<div class="d-flex justify-content-between mb-4">
								<div class="ps-4 pt-4 logo">
									<?
									$img = file_get_contents(__DIR__.'/logo-horizontal.svg');
									$img = str_replace('fill="black"', 'fill="'.$arItem['PROPERTIES']['COLOR']['VALUE'].'"', $img);
									echo $img;
									?>
								</div>
								<div class="lightning">
									<?
									$img = file_get_contents(__DIR__.'/lightning.svg');
									$img = str_replace('fill="black"', 'fill="'.$arItem['PROPERTIES']['COLOR']['VALUE'].'"', $img);
									echo $img;
									?>
								</div>
							</div>
							<div class="fs-14 fw-700 fst-italic ps-4 pb-4">
								<?=$arItem['NAME'];?>
							</div>
						</a>
					</li>
<?endforeach;?>
				</ul>
			</div>
			<div class="col-12 col-md-6 col-lg-9 pb-5 pb-md-0 card-detail tab-content" id="cardTabContent">
<?foreach($arResult["ITEMS"] as $key => $arItem):?>
				<div class="tab-pane pb-3 fade<?=$key ? '' : '  active show';?>" id="tab<?=$arItem['ID'];?>" role="tabpanel" aria-labelledby="tab<?=$arItem['ID'];?>-tab">
					<div class="row">
						<div class="col-12 col-lg-6 wow animate__backInLeft">
							<div class="fs-24 fst-italic fw-700 text-black mb-4">
								<?=$arItem['NAME'];?>
							</div>
							<div class="mb-5 cards__list text-black">
								<?=$arItem['PREVIEW_TEXT'];?>
							</div>
							<a href="#" class="btn fs-20 fw-800 p-3 btn-primary rounded-0 w-100 lh-12 skew-btn" data-toggle="modal" data-target="#orderModal"><span>УЗНАТЬ СТОИМОСТЬ</span></a>
						</div>
						<div class="d-none d-lg-block col-lg-6 wow animate__backInDown">
							<div class="cards__box">
								<div class="cards-item cards__item--active" style="background: <?=$arItem['PROPERTIES']['BG_COLOR']['VALUE']?>; color: <?=$arItem['PROPERTIES']['COLOR']['VALUE']?>;">
									<div class="d-flex justify-content-between mb-4">
										<div class="ps-4 pt-4 logo">
											<?
											$img = file_get_contents(__DIR__.'/logo-horizontal.svg');
											$img = str_replace('fill="black"', 'fill="'.$arItem['PROPERTIES']['COLOR']['VALUE'].'"', $img);
											echo $img;
											?>
										</div>
										<div class="lightning">
											<?
											$img = file_get_contents(__DIR__.'/lightning.svg');
											$img = str_replace('fill="black"', 'fill="'.$arItem['PROPERTIES']['COLOR']['VALUE'].'"', $img);
											echo $img;
											?>
										</div>
									</div>
									<div class="fs-14 fw-700 fst-italic ps-4 pb-4">
										<?=$arItem['NAME'];?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
<?endforeach;?>
			</div>
		</div>
	</div>
</section>
<section class="tickers4 position-relative">
	<div class="tickers4__box">
		<div class="tickers4__item tickers4__item1"></div>
		<div class="tickers4__item tickers4__item2"></div>
	</div>
</section>
