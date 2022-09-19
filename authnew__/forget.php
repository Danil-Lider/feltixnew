<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("forget.php");
?>


<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.forgotpasswd",
	"",
	Array(
		"FORGOT_PASSWORD_URL" => "/authnew/forget.php",
		"PROFILE_URL" => "",
		"REGISTER_URL" => "/authnew/registration.php",
		"SHOW_ERRORS" => "N"
	)
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>