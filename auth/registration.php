<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("registration");
?>



<div class="main">
<section class="contacts">
    <div class="container">
        <h1 class="contacts__title slideInUp"><?$APPLICATION->ShowTitle(false);?></h1>



<?$APPLICATION->IncludeComponent("bitrix:main.register", "main.registr.felrix", Array(
	"AUTH" => "N",	// Автоматически авторизовать пользователей
		"REQUIRED_FIELDS" => array(	// Поля, обязательные для заполнения
			0 => "EMAIL",
			1 => "PERSONAL_PROFESSION",
		),
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOW_FIELDS" => array(	// Поля, которые показывать в форме
			0 => "EMAIL",
			1 => "PERSONAL_PROFESSION",
		),
		"SUCCESS_PAGE" => "/auth/text.php",	// Страница окончания регистрации
		"USER_PROPERTY" => "",	// Показывать доп. свойства
		"USER_PROPERTY_NAME" => "",	// Название блока пользовательских свойств
		"USE_BACKURL" => "Y",	// Отправлять пользователя по обратной ссылке, если она есть
	),
	false
);?>

 </div>
</section>
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>