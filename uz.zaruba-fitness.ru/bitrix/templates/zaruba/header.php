<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
	
use \Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();

$asset->addCss('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&ital@0;1&display=swap');
$asset->addCss('https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');
$asset->addCss('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.css');

$asset->addJs('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
$asset->addJs('https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js');
$asset->addJs('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');


$asset->addJs(SITE_TEMPLATE_PATH.'/js/app.js');
$asset->addJs(SITE_TEMPLATE_PATH.'/js/wow.js');
$asset->addCss(SITE_TEMPLATE_PATH.'/css/animate.css');
if (CModule::IncludeModule("victory.options")) {}
?><!doctype html>
<html lang="ru">
	<head>
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>

		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />


		<link rel="apple-touch-icon" sizes="180x180" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?=SITE_TEMPLATE_PATH?>/favicon/site.webmanifest">
		<link rel="mask-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon/safari-pinned-tab.svg" color="#faed19">
		<meta name="msapplication-TileColor" content="#000000">
		<meta name="theme-color" content="#ffffff">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?=\Victory\Options\CVictoryOptions::getOptionValue('gtm_'.SITE_ID);?>');</script>
<!-- End Google Tag Manager -->

	</head>
	<body class="bg-black">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?=\Victory\Options\CVictoryOptions::getOptionValue('gtm_'.SITE_ID);?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
		<div class="wrapper">
			<header class="header">
				<div class="container py-3">
					<div class="row">
						<div class="col col-lg-2">
							<a href="/" class="d-block mw-100">
								<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/logo.svg" alt="Заруба Фитнес" class="mw-100" />
							</a>
						</div>
						<div class="col-10">
							<div class="row border-bottom border-dark pb-md-3 top-head align-items-center align-items-md-start">
								<div class="col d-none d-xl-block">
									<div class="fw-500 lh-12">
										<span class="d-block text-success text-uppercase fs-12 ls-7">/<?=nl2br(\Victory\Options\CVictoryOptions::getOptionValue('city_'.SITE_ID));?>/</span>
										<span class="d-block fs-15 text-nowrap">
											<?=\Victory\Options\CVictoryOptions::getOptionValue('address_small_'.SITE_ID);?>
										</span>
									</div>
								</div>
								<div class="col d-none d-lg-block">
									<div class="fw-500 lh-12">
										<span class="d-block text-success text-uppercase fs-12 ls-7">/Работаем/</span>
										<span class="d-block fs-15 text-nowrap">
											<?=nl2br(\Victory\Options\CVictoryOptions::getOptionValue('time_'.SITE_ID));?>
										</span>
									</div>
								</div>
								<div class="col d-none d-md-block">
									<div class="fw-500 lh-12">
										<span class="d-block text-success text-uppercase fs-12 ls-7">/Звоните/</span>
										<span class="d-block fs-15 text-nowrap">
											<?
												$phone = \Victory\Options\CVictoryOptions::getOptionValue('phone_'.SITE_ID);
											?>
											<a href="tel:<?=str_replace(array(' ', '(', ')', '-'), '', $phone);?>"><?=$phone;?></a>
										</span>
									</div>
								</div>

								<div class="col-6 col-md-4 col-lg-3 offset-sm-1 offset-lg-0">
									<!--<a href="#" class="btn btn-outline-success rounded-0 py-md-3 d-block fw-700 lh-12 fs-16 skew-btn" data-toggle="modal" data-target="#scheduleModal"><span>Расписание</span></a>-->
									<?
										$fitbase_url = \Victory\Options\CVictoryOptions::getOptionValue('fitbase_url_'.SITE_ID);
									?>
									<a href="<?=$fitbase_url;?>" class="btn btn-outline-success rounded-0 py-md-3 d-block fw-700 lh-12 fs-16 skew-btn" target="_blank"><span>Расписание</span></a>
								</div>
								<div class="col-4 col-sm-3 col-md-2 offset-sm-1 offset-lg-0 col-sm-0">
									<?
										$login = \Victory\Options\CVictoryOptions::getOptionValue('fitbase_link_'.SITE_ID);
									?>
									<a href="<?=$login?>" target="_blank" role="button" class="btn btn--enter position-relative btn-outline-light border-0 py-md-3 px-1 fs-15 fw-500 d-block"><span>Вход</span></a>
								</div>
								<div class="col d-block d-lg-none py-0">
									<button type="button" class="header__burger burger button w-100">
										<span class="burger__inner position-relative w-100 h-100 d-flex justify-content-center align-items-center">
											<span></span>
										</span>
									</button>
								</div>
							</div>
							<nav class="header__menu">
								<ul class="d-flex h-100 flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center text-nowrap ps-0 py-2">
									<li class="py-1 py-lg-0 text-uppercase fw-600 fs-14 ls-9">
										<a href="#advantages" class="link">о нас</a>
									</li>
									<li class="py-1 py-lg-0 text-uppercase fw-600 fs-14 ls-9">
										<a href="#gallery" class="link">галерея</a>
									</li>
									<li class="py-1 py-lg-0 text-uppercase fw-600 fs-14 ls-9">
										<a href="#cards" class="link">абонементы</a>
									</li>
									<li class="py-1 py-lg-0 text-uppercase fw-600 fs-14 ls-9">
										<a href="#orientations" class="link">студии</a>
									</li>
									<li class="py-1 py-lg-0 text-uppercase fw-600 fs-14 ls-9">
										<a href="#kids" class="link">дети</a>
									</li>
									<li class="py-1 py-lg-0 text-uppercase fw-600 fs-14 ls-9">
										<a href="#teams" class="link">команда</a>
									</li>
									<li class="py-1 py-lg-0 text-uppercase fw-600 fs-14 ls-9">
										<a href="#vacancies" class="link">вакансии</a>
									</li>
									<li class="py-1 py-lg-0 text-uppercase fw-600 fs-14 ls-9">
										<a href="#offers" class="link">акции</a>
									</li>
									<li class="py-1 py-lg-0 text-uppercase fw-600 fs-14 ls-9">
										<a href="#community" class="link">community</a>
									</li>
									<li class="py-1 py-lg-0 text-uppercase fw-600 fs-14 ls-9">
										<a href="#contacts" class="link">Контакты</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="d-md-none">
						<div class="row text-center text-success align-items-center pt-2 text-nowrap">
							<div class="col">
								<div class="fw-500 lh-12">
									<span class="d-block fs-12">
										<?=str_replace('<br>', '', \Victory\Options\CVictoryOptions::getOptionValue('address_small_'.SITE_ID));?>
									</span>
								</div>
							</div>
							<div class="col">
								<div class="fw-500 lh-12">
									<span class="d-block fs-12">
										<?
											$phone = \Victory\Options\CVictoryOptions::getOptionValue('phone_'.SITE_ID);
										?>
										<a href="tel:<?=str_replace(array(' ', '(', ')', '-'), '', $phone);?>"><?=$phone;?></a>
									</span>
								</div>
								
							</div>

						</div>
					</div>
				</div>
				<?
				$wa_link = \Victory\Options\CVictoryOptions::getOptionValue('wa_link_'.SITE_ID);
				$ig_link = \Victory\Options\CVictoryOptions::getOptionValue('ig_link_'.SITE_ID);
				$vk_link = \Victory\Options\CVictoryOptions::getOptionValue('vk_link_'.SITE_ID);
				if ($wa_link || $ig_link || $vk_link):
				
				?>
				<ul class="header__social social position-fixed d-flex gap-3 p-2 m-0 bg-black">
					<?if ($wa_link):?>
					<li class="social__item">
						<a href="<?=$wa_link?>" class="fs-12 fw-500 lh-12 ls-7 ps-5 py-3 social__link social__link--whatsapp">WhatsApp</a>
					</li>
					<?endif;?>
					<?if ($ig_link):?>
					<li class=" social__item ">
						<a href="<?=$ig_link?>" class="fs-12 fw-500 lh-12 ls-7 ps-5 py-3 social__link social__link--insta">Instagram</a>
					</li>
					<?endif;?>
					<?if ($vk_link):?>
					<li class="social__item">
						<a href="<?=$vk_link?>" class="fs-12 fw-500 lh-12 ls-7 ps-5 py-3 social__link social__link--vk">Вконтакте</a>
					</li>
					<?endif;?>
				</ul>
				<?endif;?>
			</header>
			<main class="position-relative">