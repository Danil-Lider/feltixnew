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

<main class="main">
<section class="about-page">
	<div class="container">
		<div class="about-page__wrap">
			<div class="about-page__content">
				<h1 class="about-page__title slideInUp">
					О компании
				</h1>
				<p class="about-page__subtitle slideInUp">
					<?=$arResult["NAME"]?>
				</p>
				<div class="about-page__content-wrap slideInUp">
					<p>
						<?echo $arResult["PREVIEW_TEXT"];?>
					</p>
				</div>
			</div>
			<asside class="about-page__sidebar slideInUp">
				<img
					src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
					width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
					height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
					alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
					title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
					/>
				<ul>
					<?echo $arResult["DETAIL_TEXT"];?>
				</ul>
				<button class="about-page__sidebar-btn">Заказать проект</button>
			</asside>
		</div>
	</div>
</section>






