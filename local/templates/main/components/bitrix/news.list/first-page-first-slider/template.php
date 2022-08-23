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


    <section class="offer">
            <!-- Slider main container -->
            <div class="offer-slider swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->

					<?foreach($arResult["ITEMS"] as $arItem):?>

						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>
	
						<div class="offer-slide swiper-slide"
							 style="background: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>') center/cover no-repeat;">
								 <!--                        <img src="<?//= SITE_TEMPLATE_PATH ?>/public/images/Slayd-1.jpg" alt="">-->
							<div class="container">
								<h1 class="slideInUp"><?echo $arItem["PREVIEW_TEXT"];?>
								</h1>
							</div>
						</div>


					<?endforeach;?>

                </div>
                <div class="container">
                    <div class="offer-BtnBox">
                        <a href="#" class="offer__link btn-link slideInUp">
                            Посмотреть продукты
                        </a>
                    </div>
                </div>
                <div class="offer-pagination swiper-pagination"></div>
                <div class="offer-numberOfSlides">
                    <div class="offer-slider__num slideInUp"></div>
                </div>
            </div>
            <a class="offer-arrow">
                <svg width="55" height="30" viewBox="0 0 55 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2L27.5 28L53 2" stroke="white" stroke-width="3" stroke-linejoin="round"/>
                </svg>
            </a>
        </section>






