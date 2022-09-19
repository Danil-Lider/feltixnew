<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>







<div class="form-wrap slideUp-veryslow">
	<!--  -->
	<h2><?=GetMessage("AUTH_REGISTER")?></h2>
	<!-- ДЛЯ ОШИБОК -->
	<? if (count($arResult["ERRORS"]) > 0): ?>

		<? foreach ($arResult["ERRORS"] as $key => $error)
				if (intval($key) == 0 && $key !== 0) 
					$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

			ShowError(implode("<br />", $arResult["ERRORS"]));

			elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
		?>
		
		<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>

	<?endif?>

	<form class="form" method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">

		<?
		if($arResult["BACKURL"] <> ''):
		?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?
		endif;
		?>

	<!-- 	<input type="text" class="form-input" name="name" required="" placeholder="Имя">
		<input type="text" class="form-input" name="work" required="" placeholder="Род занятий">
		<input type="email" class="form-input" name="email" required="" placeholder="e-mail"> -->


		<?// debug($arResult["SHOW_FIELDS"]); ?>

		<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):?>

		<?
			switch ($FIELD) {
				case 'LOGIN':
					?>
						<input  class="form-input" placeholder="<?=GetMessage("REGISTER_FIELD_LOGIN")?>" size="30" type="text" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" />
					<?
					# code...
					break;
				case 'EMAIL':
					?>
						<input  class="form-input" placeholder="<?=GetMessage("REGISTER_FIELD_EMAIL")?>" size="30" type="text" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" />
					<?
					# code...
					break;

				case 'PASSWORD':
					?>
						<input  class="form-input"  placeholder="<?=GetMessage("REGISTER_FIELD_PASSWORD")?>" size="30" type="PASSWORD" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" />
					<?
					# code...
					break;

				case 'CONFIRM_PASSWORD':
					?>
						<input  class="form-input" placeholder="<?=GetMessage("REGISTER_FIELD_CONFIRM_PASSWORD")?>"  size="30" type="PASSWORD" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" />
					<?
					# code...
					break;

				case 'PERSONAL_PROFESSION':

					?>
						<input  class="form-input"  placeholder="Род занятий<?//=GetMessage("REGISTER_FIELD_PERSONAL_PROFESSION")?>"  size="30" type="text" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" />
					<?
					# code...
					break;
				
				default:
					# code...
					break;
			}

		?>


		<? endforeach?>


		<button type="submit" class="form-btn btn" name="register_submit_button"  value="<?=GetMessage("AUTH_REGISTER")?>"><?=GetMessage("AUTH_REGISTER")?></button>


		<div class="bx-authform-link-container" style="margin-top: 2rem;">
			<a href="/auth/" rel="nofollow">авторизация</a>
			<?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?>
		</div>
		
	</form>
</div>







