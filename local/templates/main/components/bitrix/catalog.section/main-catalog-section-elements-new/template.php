<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */

$this->setFrameMode(true);
// $this->addExternalCss('/bitrix/css/main/bootstrap.css');

if (!empty($arResult['NAV_RESULT']))
{
	$navParams =  array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
}
else
{
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
	$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
	$showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$generalParams = array(
	'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
	'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
	'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
	'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
	'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
	'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
	'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
	'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
	'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
	'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
	'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
	'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
	'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
	'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
	'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
	'COMPARE_PATH' => $arParams['COMPARE_PATH'],
	'COMPARE_NAME' => $arParams['COMPARE_NAME'],
	'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
	'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
	'LABEL_POSITION_CLASS' => $labelPositionClass,
	'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
	'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
	'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
	'~BASKET_URL' => $arParams['~BASKET_URL'],
	'~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
	'~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
	'~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
	'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
	'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
	'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
	'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
	'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
	'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
	'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
	'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
	'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);

$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];


?>



    <div class="products-catalog">
    	<!-- ПОЛУЧЕНИЕ ВСЕХ ЭЛЕМЕНТОВ -->
        <div class="products-tabs active">
        	

<?
	if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS']))
	{
		$areaIds = array();

		foreach ($arResult['ITEMS'] as $item)
		{
			$uniqueId = $item['ID'].'_'.md5($this->randString().$component->getAction());
			$areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
			$this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
			$this->AddDeleteAction($uniqueId, $item['DELETE_LINK'], $elementDelete, $elementDeleteParams);
		}
		?>


		
		<?
		foreach ($arResult['ITEM_ROWS'] as $rowData)
		{
			$rowItems = array_splice($arResult['ITEMS'], 0, $rowData['COUNT']);
			?>

			
				<?
				switch ($rowData['VARIANT'])
				{
				
					case 2:
						?>


						<!-- <div class="col-xs-12 product-item-small-card">
							<div class="row"> -->
								<?
								foreach ($rowItems as $item)
								{
									?>
									<!-- <div class="col-sm-4 product-item-big-card">
										<div class="row">
											<div class="col-md-12"> -->
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:catalog.item',
													'',
													array(
														'RESULT' => array(
															'ITEM' => $item,
															'AREA_ID' => $areaIds[$item['ID']],
															'TYPE' => $rowData['TYPE'],
															'BIG_LABEL' => 'N',
															'BIG_DISCOUNT_PERCENT' => 'N',
															'BIG_BUTTONS' => 'Y',
															'SCALABLE' => 'N'
														),
														'PARAMS' => $generalParams
															+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
													),
													$component,
													array('HIDE_ICONS' => 'Y')
												);
												?>
											<!-- </div>
										</div>
									</div> -->
									<?
								}
								?>
							<!-- </div>
						</div> -->


				<?

				break; 

				}

				?>


			<!-- </div> -->
			<?
		}
		unset($generalParams, $rowItems);
		?>
		<!-- items-container -->
		<?
	}
	else
	{
		// load css for bigData/deferred load
		$APPLICATION->IncludeComponent(
			'bitrix:catalog.item',
			'',
			array(),
			$component,
			array('HIDE_ICONS' => 'Y')
		);
	}
?>	

		
	 <!-- <div class="products-pagination animated"> -->
               
        <?=$arResult['NAV_STRING']?>
    <!-- </div> -->


<!-- 1111111111111 -->
           
        </div>

        <?

  //       $IBLOCK_ID = $arParams['IBLOCK_ID'];
		// $IBLOCK_TYPE = $arParams['IBLOCK_TYPE'];

  //       // $IBLOCK_ID = 2;


  //       // ПОЛУЧЕНИЕ РАЗДЕЛОВ И ИХ ЭЛЕМЕНТОВ

  //       \Bitrix\Main\Loader::IncludeModule('iblock');

  //       $arFilter = [
  //       'IBLOCK_ID' => $IBLOCK_ID
  //       ];

  //       $arOrder = ['LEFT_MARGIN' => 'ASC'];


  //       $arSelect = ['ID','LEFT_MARGIN','DEPTH_LEVEL','NAME',"CODE"];

  //       $resSections = \CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);

  //       while( $arSection = $resSections->fetch() )
  //       {

  //           $arSectionID = $arSection['ID'];

            ?>


            <!-- <div class="products-tabs"> -->

            	<?

    //         	$APPLICATION->IncludeComponent(
				// 	"bitrix:news.list",
				// 	"catalog-main-show-all",
				// 	Array(
				// 		"ACTIVE_DATE_FORMAT" => "d.m.Y",
				// 		"ADD_SECTIONS_CHAIN" => "N",
				// 		"AJAX_MODE" => "N",
				// 		"AJAX_OPTION_ADDITIONAL" => "",
				// 		"AJAX_OPTION_HISTORY" => "N",
				// 		"AJAX_OPTION_JUMP" => "N",
				// 		"AJAX_OPTION_STYLE" => "Y",
				// 		"CACHE_FILTER" => "N",
				// 		"CACHE_GROUPS" => "Y",
				// 		"CACHE_TIME" => "36000000",
				// 		"CACHE_TYPE" => "A",
				// 		"CHECK_DATES" => "Y",
				// 		"COMPONENT_TEMPLATE" => "catalog-main-show-all",
				// 		"DETAIL_URL" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
				// 		"DISPLAY_BOTTOM_PAGER" => "N",
				// 		"DISPLAY_DATE" => "Y",
				// 		"DISPLAY_NAME" => "Y",
				// 		"DISPLAY_PICTURE" => "Y",
				// 		"DISPLAY_PREVIEW_TEXT" => "Y",
				// 		"DISPLAY_TOP_PAGER" => "N",
				// 		"FIELD_CODE" => array(0=>"",1=>"",),
				// 		"FILTER_NAME" => "",
				// 		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				// 		"IBLOCK_ID" => $IBLOCK_ID,
				// 		"IBLOCK_TYPE" => $IBLOCK_TYPE,
				// 		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
				// 		"INCLUDE_SUBSECTIONS" => "Y",
				// 		"MESSAGE_404" => "",
				// 		"NEWS_COUNT" => "20",
				// 		"PAGER_BASE_LINK_ENABLE" => "N",
				// 		"PAGER_DESC_NUMBERING" => "N",
				// 		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				// 		"PAGER_SHOW_ALL" => "N",
				// 		"PAGER_SHOW_ALWAYS" => "N",
				// 		"PAGER_TEMPLATE" => ".default",
				// 		"PAGER_TITLE" => "Новости",
				// 		"PARENT_SECTION" => $arSectionID,
				// 		"PARENT_SECTION_CODE" => "",
				// 		"PREVIEW_TRUNCATE_LEN" => "",
				// 		"PROPERTY_CODE" => array(0=>"",1=>"",),
				// 		"SET_BROWSER_TITLE" => "N",
				// 		"SET_LAST_MODIFIED" => "N",
				// 		"SET_META_DESCRIPTION" => "N",
				// 		"SET_META_KEYWORDS" => "N",
				// 		"SET_STATUS_404" => "N",
				// 		"SET_TITLE" => "N",
				// 		"SHOW_404" => "N",
				// 		"SORT_BY1" => "ACTIVE_FROM",
				// 		"SORT_BY2" => "SORT",
				// 		"SORT_ORDER1" => "DESC",
				// 		"SORT_ORDER2" => "ASC",
				// 		"STRICT_SECTION_CHECK" => "N"
				// 	)
				// );

				?>

            <!-- </div> -->

              <?//=$arResult['NAV_STRING']?>

        <?// } ?> 

        	<?//=$arResult['NAV_STRING']?>
        	<!-- 1111111111111 -->

            </div>
           <!--  <div class="products-pagination animated">
                <a href="#" class="products-pagination__link active">1</a>
                <a href="#" class="products-pagination__link">2</a>
                <a href="#" class="products-pagination__link">3</a>
                <a href="#" class="products-pagination__link">4</a>
                <?//=$arResult['NAV_STRING']?>

            </div> -->
        </div>
    </div>
</section>
<!--End of the products-->










<!-- </div> -->
<?


if ($showBottomPager)
{
	?>
	<!-- <div data-pagination-num="<?=$navParams['NavNum']?>"> -->
		<!-- pagination-container -->
		<?//=$arResult['NAV_STRING']?>
		<!-- pagination-container -->
	<!-- </div> -->
	<?


}

$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
	BX.message({
		BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
		BASKET_URL: '<?=$arParams['BASKET_URL']?>',
		ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
		TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
		TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
		TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
		BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
		BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
		BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
		COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
		COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
		COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
		PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
		RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
		RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
		BTN_MESSAGE_LAZY_LOAD: '<?=CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD'])?>',
		BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
		SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
	});
	var <?=$obName?> = new JCCatalogSectionComponent({
		siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
		componentPath: '<?=CUtil::JSEscape($componentPath)?>',
		navParams: <?=CUtil::PhpToJSObject($navParams)?>,
		deferredLoad: false, // enable it for deferred load
		initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
		bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
		lazyLoad: !!'<?=$showLazyLoad?>',
		loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
		template: '<?=CUtil::JSEscape($signedTemplate)?>',
		ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'])?>',
		parameters: '<?=CUtil::JSEscape($signedParams)?>',
		container: '<?=$containerName?>'
	});
</script>
<!-- component-end -->