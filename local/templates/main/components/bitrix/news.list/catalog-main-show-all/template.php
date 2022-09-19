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

<?foreach($arResult["ITEMS"] as $arItem):?>
<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>

<?

	// debug($arItem);

	if(empty($arItem['PREVIEW_PICTURE'])){
		$arItem['PREVIEW_PICTURE']['SRC'] = '/local/templates/main/components/bitrix/catalog.section/main-catalog-section-elements-new/images/no_photo.png';
	}

?>

	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="products-card active">
		<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="" loading="lazy">
		<p class="products-card__title"><?= $arItem['NAME']?></p>
	</a>
<?endforeach;?>




	<?//=$arResult["NAV_STRING"]?>



<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>