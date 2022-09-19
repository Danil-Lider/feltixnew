<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("ideas");
?>

<section class="ideas">
    <div class="container">
        <h1 class="ideas__title slideInUp">
        	<?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => $GLOBALS['lang'] . "/include/idead/title.php"
                )
            );?>
        </h1>
        <div class="ideas__wrap slideInUp">
            <div class="ideas__wrap-content">
                <p class="ideas__wrap-text">
                	<?$APPLICATION->IncludeComponent(
		                "bitrix:main.include",
		                "",
		                Array(
		                    "AREA_FILE_SHOW" => "file",
		                    "AREA_FILE_SUFFIX" => "inc",
		                    "EDIT_TEMPLATE" => "",
		                    "PATH" => $GLOBALS['lang'] . "/include/idead/text.php"
		                )
		            );?>
                </p>
                <?$APPLICATION->IncludeComponent(
		                "bitrix:main.include",
		                "",
		                Array(
		                    "AREA_FILE_SHOW" => "file",
		                    "AREA_FILE_SUFFIX" => "inc",
		                    "EDIT_TEMPLATE" => "",
		                    "PATH" => $GLOBALS['lang'] . "/include/idead/link.php"
		                )
		        );?>
            </div>
            <img class="ideasImg" src="<?= SITE_TEMPLATE_PATH?>/public/images/ideasImg.jpg" alt="">
        </div>
    </div>
</section>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>