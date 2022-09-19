<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<div class="container" style="margin-top: 10rem;">

<?$APPLICATION->IncludeComponent("bitrix:system.auth.registration","flat",Array());?>

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>