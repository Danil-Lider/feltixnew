<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");?>


<div class="main">
<section class="contacts">
    <div class="container">
        <h1 class="contacts__title slideInUp"><?$APPLICATION->ShowTitle(false);?></h1>

<?$APPLICATION->IncludeComponent(
	"bitrix:main.auth.form",
	"auth.main.feltix",
	Array(
		"AUTH_FORGOT_PASSWORD_URL" => "/auth/forget.php",
		"AUTH_REGISTER_URL" => "/auth/registration.php",
		"AUTH_SUCCESS_URL" => "/close/"
	)
);?>


<?php

$logout = $APPLICATION->GetCurPageParam(
    "logout=yes",
    array(
        "login",
        "logout",
        "register",
        "forgot_password",
        "change_password"
    )
);
?>


 </div>
</section>
</div>
 <!-- <a href="<?= $logout; ?>">выйти</a> -->


 <?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>