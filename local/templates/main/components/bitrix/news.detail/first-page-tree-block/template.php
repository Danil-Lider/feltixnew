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

<section class="silenceColor animated">
	<div class="container">
		<h2>
		   <?=$arResult["NAME"]?>
		</h2>
		<div class="silenceColor__wrap">
			<div class="silenceColor__wrap-left">
				<img
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				width="<?//=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
				height="<?//=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
				/>
			</div>
			<div class="silenceColor__wrap-right">
			   <?echo $arResult["DETAIL_TEXT"];?>
			</div>
		</div>
	</div>
</section>




