<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("authnew");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"",
	Array(
		"FORGOT_PASSWORD_URL" => "/authnew/forget.php",
		"PROFILE_URL" => "",
		"REGISTER_URL" => "/authnew/registration.php",
		"SHOW_ERRORS" => "N"
	)
);?>


<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.confirmation",
	"flat",
	Array(
		"CONFIRM_CODE" => "confirm_code",
		"LOGIN" => "login",
		"USER_ID" => "confirm_user_id"
	)
);?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>