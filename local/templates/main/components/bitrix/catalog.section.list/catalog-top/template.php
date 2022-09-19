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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>


<!-- <div class="<?// echo $arCurView['CONT']; ?>"> -->

	<?
if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID'])
{
	$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

	?>

	<h1
		class="<? echo $arCurView['TITLE']; ?>"
		id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"
	>

	<a href="<? echo $arResult['SECTION']['SECTION_PAGE_URL']; ?>"><?
		echo (
			isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
			? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
			: $arResult['SECTION']['NAME']
		);
	?></a></h1><?
}
if (0 < $arResult["SECTIONS_COUNT"])
{
?>

<?

// debug($arParams['THIS_SECTION_ID']);
	
?>

 <!--products-->
<section class="products">
    <div class="container">
        <h1 class="products__title slideInUp">

        	<? if(SITE_ID == 's2'){ ?>

				Products

        	<? }else{ ?>

        		Продукты

        	<? } ?>
        </h1>	
        <div class="products-wrap"> 

            <a href="<?= $GLOBALS['lang']?>/ideas.php" class="products-wrap__link slideInUp">

            	<? if(SITE_ID == 's2'){ ?>

					Your ideas

	        	<? }else{ ?>

	        		Ваши идеи
	        		
	        	<? } ?>

           
        	</a>
            <button class="products-wrap__mobileBtn">

            	<? if(SITE_ID == 's2'){ ?>

					All products

	        	<? }else{ ?>

	        		Все продукты
	        		
	        	<? } ?>
           

        	</button>	
            <div class="products-btns slideInUp">
                <a href="/catalog/" class="products__btn <? if(!$arParams['THIS_SECTION_ID']){?> active <? } ?>">
                		
                		<? if(SITE_ID == 's2'){ ?>

							All products

			        	<? }else{ ?>

			        		Все продукты
			        		
			        	<? } ?>

                </a>
                <!-- <button class="products__btn"><?// echo $arSection['NAME']; ?></button> -->

				<?
					switch ($arParams['VIEW_MODE'])
					{
						case 'LINE':
							foreach ($arResult['SECTIONS'] as &$arSection)
							{
								$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
								$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

								if (false === $arSection['PICTURE'])
									$arSection['PICTURE'] = array(
										'SRC' => $arCurView['EMPTY_IMG'],
										'ALT' => (
											'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
											? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
											: $arSection["NAME"]
										),
										'TITLE' => (
											'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
											? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
											: $arSection["NAME"]
										)
									);
								?>

								<?

								// debug($);

								?>

								<a class="<? if($arParams['THIS_SECTION_ID'] == $arSection['ID']){?> active <? } ?> products__btn" href="<?= $arSection['SECTION_PAGE_URL']?>"><? echo $arSection['NAME']; ?></a>

								<!-- <button class="products__btn"><?// echo $arSection['NAME']; ?></button> -->


								<?
							}
							unset($arSection);
							break;
					}
				?>

				<? } ?>


 				</div>

 				<!-- products-catalog  -->

            