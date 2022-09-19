<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("forget");
?>

<div class="main">
<section class="contacts">
    <div class="container">
        <h1 class="contacts__title slideInUp"><?$APPLICATION->ShowTitle(false);?></h1>
        
<?$APPLICATION->IncludeComponent(
	"bitrix:main.auth.forgotpasswd",
	"",
	Array(
		"AUTH_AUTH_URL" => "/auth/",
		"AUTH_REGISTER_URL" => "/auth/registration.php"
	)
);?>

 </div>
</section>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>