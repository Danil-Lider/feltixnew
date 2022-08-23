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




 <section class="faq">
    <div class="container">
        <h1 class="faq__title slideInUp">
            FAQ
        </h1>
        <div class="faq-wrap slideInUp">
            <img class="faq-wrap__img" src="<?= SITE_TEMPLATE_PATH?>/public/images/faqImg.png" alt="">
            <div class="faq-accord__item">
                <div class="faq-accord__title">
                    <p>
                        Каков срок поставки?
                    </p>
                </div>
                <div class="faq-accord__desc">
                    Листовой и рулонный войлок мы храним в большом количестве на складе компании.
                    Срок производства стандартных изделий не превышает двух недель. Элементы индивидуального дизайна
                    с использованием резки мы выполняем максимум за три недели; объемные, требующие изготовления
                    матрицы, продукты в рамках пяти недель с дату согласования чертежей.
                </div>
            </div>



			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>


				<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="faq-accord__item">
					<div class="faq-accord__title">
						<p>
						   <?echo $arItem["NAME"]?>
						</p>
					</div>
					<div class="faq-accord__desc">
					   <?echo $arItem["PREVIEW_TEXT"];?>
					</div>
				</div>

			<?endforeach;?>



        </div>
    </div>
</section>







