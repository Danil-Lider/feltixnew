<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>

<?
	// debug($item);
// /local/templates/main/components/bitrix/catalog.section/main-catalog-section-elements-new/images/no_photo.png
?>

<a href="<?=$item["DETAIL_PAGE_URL"]?>" class="products-card active">
	<img src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>" alt="" loading="lazy">
	<p class="products-card__title"><?= $item['NAME']?></p>
</a>







