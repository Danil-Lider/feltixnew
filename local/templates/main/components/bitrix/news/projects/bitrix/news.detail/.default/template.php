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

<?

// debug($arResult);
	
?>


<section class="single-project">
    <div class="container">
        <div class="breadcrumbs slideInUp">

        	<?$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
				        "START_FROM" => "0", 
				        "PATH" => "", 
				        "SITE_ID" => "s1" 
				    )
				);?>
           
        </div>
        <h1 class="single-project__title slideInUp">
            <?= $arResult['NAME']?>
        </h1>
        <p class="single-project__author slideInUp-slower">
            Архитектор проекта: <?= $arResult["PROPERTIES"]['TITLE']['VALUE']  ?>
        </p>
        <p class="single-project__desc slideInUp-slower">
           <?= $arResult['PREVIEW_TEXT']?>
        </p>
        <!-- Slider main container -->
        <div class="single-project__slider swiper slideInUp-slower">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->

                 <? foreach($arResult["PROPERTIES"]['IMAGES']['VALUE'] as $key => $item){ ?>

                    	<a href="<?= CFile::GetPath($item); ?>">
	                        <img src="<?= CFile::GetPath($item); ?>" loading="lazy"/>
	                    </a>

	                     <div class="swiper-slide">
		                    <img src="<?= CFile::GetPath($item); ?>" alt="">
		                </div>

                    <? } ?>

            </div>
        </div>
        <div class="single-project__slider-nav animated">
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev">
                <svg width="60" height="24" viewBox="0 0 60 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.939339 10.9393C0.353554 11.5251 0.353554 12.4749 0.939339 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939339 10.9393ZM60 10.5L2 10.5V13.5L60 13.5V10.5Z"
                          fill="black"/>
                </svg>
            </div>
            <div class="offer-numberOfSlides">
                <div class="single-project__slider-num"></div>
            </div>
            <div class="swiper-button-next">
                <svg width="117" height="24" viewBox="0 0 117 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M116.061 13.0607C116.646 12.4749 116.646 11.5251 116.061 10.9394L106.515 1.39341C105.929 0.807621 104.979 0.807621 104.393 1.39341C103.808 1.97919 103.808 2.92894 104.393 3.51473L112.879 12L104.393 20.4853C103.808 21.0711 103.808 22.0208 104.393 22.6066C104.979 23.1924 105.929 23.1924 106.515 22.6066L116.061 13.0607ZM-1.31134e-07 13.5L115 13.5L115 10.5L1.31134e-07 10.5L-1.31134e-07 13.5Z"
                          fill="black"/>
                </svg>
            </div>
        </div>
        <div class="single-project__content animated">
            <p>
               <?= $arResult['DETAIL_TEXT']?>
            </p>
        </div>
    </div>
</section>


