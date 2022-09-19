<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?> 


 <main class="main">

<!-- Offer-->
<?$APPLICATION->IncludeComponent("bitrix:news.list", "first-page-first-slider", Array(
    "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
        "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
        "AJAX_MODE" => "N", // Включить режим AJAX
        "AJAX_OPTION_ADDITIONAL" => "", // Дополнительный идентификатор
        "AJAX_OPTION_HISTORY" => "N",   // Включить эмуляцию навигации браузера
        "AJAX_OPTION_JUMP" => "N",  // Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y", // Включить подгрузку стилей
        "CACHE_FILTER" => "N",  // Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y",  // Учитывать права доступа
        "CACHE_TIME" => "36000000", // Время кеширования (сек.)
        "CACHE_TYPE" => "A",    // Тип кеширования
        "CHECK_DATES" => "Y",   // Показывать только активные на данный момент элементы
        "DETAIL_URL" => "", // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
        "DISPLAY_BOTTOM_PAGER" => "Y",  // Выводить под списком
        "DISPLAY_DATE" => "Y",  // Выводить дату элемента
        "DISPLAY_NAME" => "Y",  // Выводить название элемента
        "DISPLAY_PICTURE" => "Y",   // Выводить изображение для анонса
        "DISPLAY_PREVIEW_TEXT" => "Y",  // Выводить текст анонса
        "DISPLAY_TOP_PAGER" => "N", // Выводить над списком
        "FIELD_CODE" => array(  // Поля
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "",    // Фильтр
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",  // Скрывать ссылку, если нет детального описания
        "IBLOCK_ID" => "3", // Код информационного блока
        "IBLOCK_TYPE" => "mainpage",    // Тип информационного блока (используется только для проверки)
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y", // Включать инфоблок в цепочку навигации
        "INCLUDE_SUBSECTIONS" => "Y",   // Показывать элементы подразделов раздела
        "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
        "NEWS_COUNT" => "20",   // Количество новостей на странице
        "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
        "PAGER_DESC_NUMBERING" => "N",  // Использовать обратную навигацию
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",   // Время кеширования страниц для обратной навигации
        "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
        "PAGER_SHOW_ALWAYS" => "N", // Выводить всегда
        "PAGER_TEMPLATE" => ".default", // Шаблон постраничной навигации
        "PAGER_TITLE" => "Новости", // Название категорий
        "PARENT_SECTION" => "", // ID раздела
        "PARENT_SECTION_CODE" => "",    // Код раздела
        "PREVIEW_TRUNCATE_LEN" => "",   // Максимальная длина анонса для вывода (только для типа текст)
        "PROPERTY_CODE" => array(   // Свойства
            0 => "",
            1 => "",
        ),
        "SET_BROWSER_TITLE" => "Y", // Устанавливать заголовок окна браузера
        "SET_LAST_MODIFIED" => "N", // Устанавливать в заголовках ответа время модификации страницы
        "SET_META_DESCRIPTION" => "Y",  // Устанавливать описание страницы
        "SET_META_KEYWORDS" => "Y", // Устанавливать ключевые слова страницы
        "SET_STATUS_404" => "N",    // Устанавливать статус 404
        "SET_TITLE" => "Y", // Устанавливать заголовок страницы
        "SHOW_404" => "N",  // Показ специальной страницы
        "SORT_BY1" => "ACTIVE_FROM",    // Поле для первой сортировки новостей
        "SORT_BY2" => "SORT",   // Поле для второй сортировки новостей
        "SORT_ORDER1" => "DESC",    // Направление для первой сортировки новостей
        "SORT_ORDER2" => "ASC", // Направление для второй сортировки новостей
        "STRICT_SECTION_CHECK" => "N",  // Строгая проверка раздела для показа списка
    ),
    false
);?>

<!--End of the Offer -->
<!-- About -->

<?$APPLICATION->IncludeComponent("bitrix:news.detail", "first-page-first-block", Array(
    "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
        "ADD_ELEMENT_CHAIN" => "N", // Включать название элемента в цепочку навигации
        "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
        "AJAX_MODE" => "N", // Включить режим AJAX
        "AJAX_OPTION_ADDITIONAL" => "", // Дополнительный идентификатор
        "AJAX_OPTION_HISTORY" => "N",   // Включить эмуляцию навигации браузера
        "AJAX_OPTION_JUMP" => "N",  // Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y", // Включить подгрузку стилей
        "BROWSER_TITLE" => "-", // Установить заголовок окна браузера из свойства
        "CACHE_GROUPS" => "Y",  // Учитывать права доступа
        "CACHE_TIME" => "36000000", // Время кеширования (сек.)
        "CACHE_TYPE" => "A",    // Тип кеширования
        "CHECK_DATES" => "Y",   // Показывать только активные на данный момент элементы
        "DETAIL_URL" => "", // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
        "DISPLAY_BOTTOM_PAGER" => "Y",  // Выводить под списком
        "DISPLAY_DATE" => "Y",  // Выводить дату элемента
        "DISPLAY_NAME" => "Y",  // Выводить название элемента
        "DISPLAY_PICTURE" => "Y",   // Выводить детальное изображение
        "DISPLAY_PREVIEW_TEXT" => "Y",  // Выводить текст анонса
        "DISPLAY_TOP_PAGER" => "N", // Выводить над списком
        "ELEMENT_CODE" => "",   // Код новости
        "ELEMENT_ID" => "4",    // ID новости
        "FIELD_CODE" => array(  // Поля
            0 => "",
            1 => "",
        ),
        "IBLOCK_ID" => "4", // Код информационного блока
        "IBLOCK_TYPE" => "news",    // Тип информационного блока (используется только для проверки)
        "IBLOCK_URL" => "", // URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y", // Включать инфоблок в цепочку навигации
        "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
        "META_DESCRIPTION" => "-",  // Установить описание страницы из свойства
        "META_KEYWORDS" => "-", // Установить ключевые слова страницы из свойства
        "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
        "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
        "PAGER_TEMPLATE" => ".default", // Шаблон постраничной навигации
        "PAGER_TITLE" => "Страница",    // Название категорий
        "PROPERTY_CODE" => array(   // Свойства
            0 => "",
            1 => "",
        ),
        "SET_BROWSER_TITLE" => "Y", // Устанавливать заголовок окна браузера
        "SET_CANONICAL_URL" => "N", // Устанавливать канонический URL
        "SET_LAST_MODIFIED" => "N", // Устанавливать в заголовках ответа время модификации страницы
        "SET_META_DESCRIPTION" => "Y",  // Устанавливать описание страницы
        "SET_META_KEYWORDS" => "Y", // Устанавливать ключевые слова страницы
        "SET_STATUS_404" => "N",    // Устанавливать статус 404
        "SET_TITLE" => "Y", // Устанавливать заголовок страницы
        "SHOW_404" => "N",  // Показ специальной страницы
        "STRICT_SECTION_CHECK" => "N",  // Строгая проверка раздела для показа элемента
        "USE_PERMISSIONS" => "N",   // Использовать дополнительное ограничение доступа
        "USE_SHARE" => "N", // Отображать панель соц. закладок
    ),
    false
);?>
     
<!--End of the About -->
<!-- products-main -->
        <section class="products-main animated">
            <div class="container">
                <h2>
                    Продукты
                </h2>
               


                <?$APPLICATION->IncludeComponent(
                    "bitrix:catalog.section.list",
                    "catalog-clean-links-sub-main-page",
                    Array(
                        "ADD_SECTIONS_CHAIN" => "N",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "COUNT_ELEMENTS" => "Y",
                        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                        "FILTER_NAME" => "sectionsFilter",
                        "IBLOCK_ID" => "2",
                        "IBLOCK_TYPE" => "catalog",
                        "SECTION_CODE" => "",
                        "SECTION_FIELDS" => array("",""),
                        "SECTION_ID" => $_REQUEST["SECTION_ID"],
                        "SECTION_URL" => "",
                        "SECTION_USER_FIELDS" => array("",""),
                        "SHOW_PARENT_NAME" => "Y",
                        "TOP_DEPTH" => "2",
                        "VIEW_MODE" => "LINE"
                    )
                );?>
                                










               
            </div>
        </section>
        <!--End of the products-main -->
        <!-- homeProduct -->

<?$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "first-page-two-block",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_ELEMENT_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BROWSER_TITLE" => "-",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "ELEMENT_CODE" => "",
        "ELEMENT_ID" => "5",
        "FIELD_CODE" => array("",""),
        "IBLOCK_ID" => "4",
        "IBLOCK_TYPE" => "news",
        "IBLOCK_URL" => "",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Страница",
        "PROPERTY_CODE" => array("",""),
        "SET_BROWSER_TITLE" => "Y",
        "SET_CANONICAL_URL" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "STRICT_SECTION_CHECK" => "N",
        "USE_PERMISSIONS" => "N",
        "USE_SHARE" => "N"
    )
);?>
   
        <!--End of the homeProduct -->
        <!-- silence color -->
<?$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "first-page-tree-block",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_ELEMENT_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BROWSER_TITLE" => "-",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "ELEMENT_CODE" => "",
        "ELEMENT_ID" => "6",
        "FIELD_CODE" => array("",""),
        "IBLOCK_ID" => "4",
        "IBLOCK_TYPE" => "news",
        "IBLOCK_URL" => "",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Страница",
        "PROPERTY_CODE" => array("",""),
        "SET_BROWSER_TITLE" => "Y",
        "SET_CANONICAL_URL" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "STRICT_SECTION_CHECK" => "N",
        "USE_PERMISSIONS" => "N",
        "USE_SHARE" => "N"
    )
);?>
        <!--End of the silence color  -->


<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>