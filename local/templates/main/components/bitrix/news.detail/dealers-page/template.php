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


<section class="dealers">
	<div class="container">
		<h1 class="dealers__title slideInUp"><?=$arResult["NAME"]?></h1>
		<div class="dealers__wrap slideInUp">
			<img 
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
				height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
				>
			<p class="dealers__wrap-text">
				<?echo $arResult["DETAIL_TEXT"];?>
			</p>
		</div>
		<a href="/auth/?register=yes" class="dealers__link btn-link slideInUp">
			Зарегистрироваться
		</a>
	</div>
</section>








