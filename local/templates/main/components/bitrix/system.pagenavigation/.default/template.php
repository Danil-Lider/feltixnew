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

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<!-- 
</div>

<div class="products-pagination animated active">
    <a href="#" class="products-pagination__link active">1</a>
    <a href="#" class="products-pagination__link">2</a>
    <a href="#" class="products-pagination__link">3</a>
    <a href="#" class="products-pagination__link">4</a>
</div> -->


<?php

if (!defined('B_PROLOG_INCLUDED') || (B_PROLOG_INCLUDED !== true)) {
    die();
}

if (!$arResult["NavShowAlways"]) {
    if (
       (0 == $arResult["NavRecordCount"])
       ||
       ((1 == $arResult["NavPageCount"]) && (false == $arResult["NavShowAll"]))
    ) {
        return;
    }
}


$navQueryString      = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$navQueryStringFull  = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

?>


<? if($arResult['NavPageCount'] > 1){ ?>

<div class="products-pagination animated active">

   	<?// debug($arResult); ?>

   	<? if($arResult['NavPageNomer'] > 3 ){?>

   		<a class="products-pagination__link " href="<?php echo $arResult["sUrlPath"] ?>?<?php echo $navQueryString ?>PAGEN_1=1">...</a>

   	<? } ?>

    <?php while ($arResult["nStartPage"] <= $arResult["nEndPage"]) { ?>
        <?php if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) { ?>
        	  <a class="products-pagination__link active" href="<?php echo $arResult["sUrlPath"] ?><?php echo $navQueryStringFull ?>"><?php echo $arResult["nStartPage"] ?></a>

        <?php } elseif ((1 == $arResult["nStartPage"]) && (false == $arResult["bSavePage"])) { ?>
            <a class="products-pagination__link " href="<?php echo $arResult["sUrlPath"] ?><?php echo $navQueryStringFull ?>"><?php echo $arResult["nStartPage"] ?></a>
        <?php } else { ?>
            <a class="products-pagination__link" href="<?php echo $arResult["sUrlPath"] ?>?<?php echo $navQueryString ?>PAGEN_<?php echo $arResult["NavNum"] ?>=<?php echo $arResult["nStartPage"] ?>"><?php echo $arResult["nStartPage"] ?></a>
        <?php } ?>
        <?php $arResult["nStartPage"]++ ?>
    <?php } ?>


    <? if(($arResult['NavPageCount']-2) > $arResult['NavPageNomer']){?>

   		
        <a href="<?php echo $arResult["sUrlPath"] ?>?<?php echo $navQueryString ?>PAGEN_<?php echo $arResult["NavNum"] ?>=<?= $arResult['NavPageCount'] ; ?>" class="products-pagination__link">...<?//= $arResult['NavPageCount'] ?></a>

   	<? } ?>
    
       
        <!-- </li> -->
    <?//php endif; ?>


</div>

  <? } ?>
    


