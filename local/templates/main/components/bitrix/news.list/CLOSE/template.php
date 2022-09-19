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





<div class="container mt12" style="width: 100%;">
	 <div class="single-product-info__item downloads  single-product-info ">

	 	<?foreach($arResult["ITEMS"] as $arItem){?>


			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

			<? if($arItem["PROPERTIES"]['FILES']['VALUE']){ ?>
	
			    <div  id="<?=$this->GetEditAreaId($arItem['ID']);?>"  class="single-product-info__item">
			        <div class="single-product-info__title">
			            <p>
			            	
			               <?echo $arItem["NAME"]?>
			            </p>
			        </div>
			        <div class="single-product-info__desc">

			        		<? foreach($arItem["PROPERTIES"]['FILES']['VALUE'] as $key => $item){ ?>


		        				<?
									// SIZE FILE
									$arFile = CFile::GetFileArray($item);

								?>

				                <div class="single-product-info__desc-content">
				                    <span><?= $arItem["PROPERTIES"]['FILES_NAME']['VALUE'][$key] ?> (<?= convert_bytes($arFile['FILE_SIZE']) ?>)</span>
									<a class="download" download href="<?= CFile::GetPath($item); ?>">Скачать</a>
				                </div>

			       			<? } ?>


			        </div>
			    </div>

			<? } ?>

		<? } ?>
		
	</div>
</div>
