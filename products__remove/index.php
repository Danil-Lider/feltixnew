<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Продукты");
?>

    <!--products-->
    <section class="products">
        <div class="container">
            <h1 class="products__title slideInUp">
                Продукты
            </h1>
            <div class="products-wrap">
                <a href="ideas.php" class="products-wrap__link slideInUp">Ваши идеи</a>
                <button class="products-wrap__mobileBtn">Все продукты</button>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:catalog.section.list",
                    "catalog-top",
                    Array(
                        "ADD_SECTIONS_CHAIN" => "Y",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "COMPONENT_TEMPLATE" => "catalog-top",
                        "COUNT_ELEMENTS" => "Y",
                        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                        "FILTER_NAME" => "sectionsFilter",
                        "IBLOCK_ID" => "2",
                        "IBLOCK_TYPE" => "catalog",
                        "SECTION_CODE" => "",
                        "SECTION_FIELDS" => array(0=>"",1=>"",),
                        "SECTION_ID" => $_REQUEST["SECTION_ID"],
                        "SECTION_URL" => "",
                        "SECTION_USER_FIELDS" => array(0=>"",1=>"",),
                        "SHOW_PARENT_NAME" => "Y",
                        "TOP_DEPTH" => "2",
                        "VIEW_MODE" => "LINE"
                    )
                );?>
                <div class="products-catalog">

                    <div class="products-tabs active">
                        all
                    </div>

                    <?

                    $IBLOCK_ID = 2;

                    // CModule::IncludeModule("iblock");

                    \Bitrix\Main\Loader::IncludeModule('iblock');

                    $arFilter = [
                    'IBLOCK_ID' => $IBLOCK_ID
                    ];

                    $arOrder = [
                    'LEFT_MARGIN' => 'ASC'
                    ];


                    $arSelect = [
                    'ID',
                    'LEFT_MARGIN',
                    'DEPTH_LEVEL',
                    'NAME',
                    "CODE"
                    ];

                    $resSections = \CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);

                    while( $arSection = $resSections->fetch() )
                    {

                        $arSectionID = $arSection['ID'];

                        // debug($arSectionID);

                        $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","PREVIEW_PICTURE","CODE");
                        $arFilter = Array("SECTION_ID" => $arSectionID ,"IBLOCK_ID"=>IntVal($IBLOCK_ID), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
                        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

                        ?>

                        <div class="products-tabs">

                            <?

                                while($ob = $res->GetNextElement())
                                {
                                    $arFields = $ob->GetFields();

                                    ?>


                                    <a href="single-product.php" class="products-card active">
                                        <img src="<?=CFile::GetPath($arFields["PREVIEW_PICTURE"])?>" alt="" loading="lazy">
                                        <p class="products-card__title"><?= $arFields['NAME']?></p>
                                    </a>



                                    <?
                                    // debug($arFields);
                                }


                            ?>

                        </div>

                        <?

                    }
                                    

                    ?> 

                    <!-- <div class="products-tabs active">
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product1.png" alt="" loading="lazy">
                            <p class="products-card__title">Панель "Лемех"</p>
                        </a href="single-product.php">
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product2.png" alt="" loading="lazy">
                            <p class="products-card__title">
                                Панель напольная
                                с длинным названием
                            </p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product3.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card ">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product4.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card ">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product5.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card ">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product6.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product1.png" alt="" loading="lazy">
                            <p class="products-card__title">Панель "Лемех"</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product2.png" alt="" loading="lazy">
                            <p class="products-card__title">
                                Панель напольная
                                с длинным названием
                            </p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product3.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                    </div>
                    <div class="products-tabs">
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product3.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product4.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product5.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product6.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product1.png" alt="" loading="lazy">
                            <p class="products-card__title">Панель "Лемех"</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product2.png" alt="" loading="lazy">
                            <p class="products-card__title">
                                Панель напольная
                                с длинным названием
                            </p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product3.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                    </div>
                    <div class="products-tabs">
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product1.png" alt="" loading="lazy">
                            <p class="products-card__title">Панель "Лемех"</p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product2.png" alt="" loading="lazy">
                            <p class="products-card__title">
                                Панель напольная
                                с длинным названием
                            </p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product3.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product6.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product1.png" alt="" loading="lazy">
                            <p class="products-card__title">Панель "Лемех"</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product2.png" alt="" loading="lazy">
                            <p class="products-card__title">
                                Панель напольная
                                с длинным названием
                            </p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product3.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                    </div>
                    <div class="products-tabs">
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product1.png" alt="" loading="lazy">
                            <p class="products-card__title">Панель "Лемех"</p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product2.png" alt="">
                            <p class="products-card__title">
                                Панель напольная
                                с длинным названием
                            </p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product3.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product4.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product5.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product6.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product1.png" alt="" loading="lazy">
                            <p class="products-card__title">Панель "Лемех"</p>
                        </a>
                    </div>
                    <div class="products-tabs">
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product1.png" alt="" loading="lazy">
                            <p class="products-card__title">Панель "Лемех"</p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product4.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product5.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product6.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product1.png" alt="">
                            <p class="products-card__title">Панель "Лемех"</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product2.png" alt="" loading="lazy">
                            <p class="products-card__title">
                                Панель напольная
                                с длинным названием
                            </p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product3.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                    </div>
                    <div class="products-tabs">
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product1.png" alt="" loading="lazy">
                            <p class="products-card__title">Панель "Лемех"</p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product2.png" alt="" loading="lazy">
                            <p class="products-card__title">
                                Панель напольная
                                с длинным названием
                            </p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product3.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                        <a href="single-product.php" class="products-card">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product3.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                    </div>
                    <div class="products-tabs">
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product1.png" alt="" loading="lazy">
                            <p class="products-card__title">Панель "Лемех"</p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product2.png" alt="" loading="lazy">
                            <p class="products-card__title">
                                Панель напольная
                                с длинным названием
                            </p>
                        </a>
                        <a href="single-product.php" class="products-card active">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/public/images/catalog/product3.png" alt="" loading="lazy">
                            <p class="products-card__title">Название продукта</p>
                        </a>
                    </div> -->
                </div>
                <div class="products-pagination animated">
                    <a href="#" class="products-pagination__link active">1</a>
                    <a href="#" class="products-pagination__link">2</a>
                    <a href="#" class="products-pagination__link">3</a>
                    <a href="#" class="products-pagination__link">4</a>
                </div>
            </div>
        </div>
    </section>
    <!--End of the products-->


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>