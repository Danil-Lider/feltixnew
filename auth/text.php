<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ждите !");
?>


<div class="main">
<section class="contacts">
    <div class="container">
        <h1 class="contacts__title slideInUp"><?$APPLICATION->ShowTitle(false);?></h1>

<div class="form-wrap slideUp-veryslow">
		


	<form class="form" name="form_auth" method="post" target="_top" action="/auth/">
		
		<div class="container" style="color:green;">
			 Ожидайте email уведомления, как только одобрим регистрацию, вам придет письмо !
			 <br>
			 <br>
			 <br>
			 <a href="/">на главную</a>
		</div>
	</form>


</div>



 </div>
</section>
</div>



 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>