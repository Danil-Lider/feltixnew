<?
/*
 * Файл local/templates/.default/components/bitrix/main.register/.default/template.php
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<?php if ($USER->IsAuthorized()): /* если пользователь уже авторизован */ ?>
    <p><?= GetMessage('MAIN_REGISTER_REG_AUTH'); /* Вы зарегистрированы и авторизованы */ ?></p>
    <?php return ?>
<?php endif; ?>


<div class="container">

<div class="bitrix-main-register">

    <h2><?= GetMessage('MAIN_REGISTER_FORM_TITLE'); /* заголовок формы */ ?></h2>

    <?php if (count($arResult["ERRORS"]) > 0): /* сообщения об ошибках при заполнении формы */ ?>
        <?php
            foreach ($arResult["ERRORS"] as $key => $error) {
                if (intval($key) == 0 && $key !== 0) {
                    $arResult["ERRORS"][$key] = str_replace(
                        "#FIELD_NAME#",
                        '«'.GetMessage('MAIN_REGISTER_'.$key).'»',
                        $error
                    );
                }
            }
            ShowError(implode("<br />", $arResult["ERRORS"]));
        ?>
    <?php elseif ($arResult["USE_EMAIL_CONFIRMATION"] === "Y"): ?>
        <p><?= GetMessage('MAIN_REGISTER_EMAIL_HELP'); /* будет отправлено письмо для подтверждения */ ?></p>
    <?php endif; ?>

    <form method="post" action="<?= POST_FORM_ACTION_URI; ?>" name="regform" enctype="multipart/form-data">

        <?php if ($arResult["BACKURL"] <> ''): ?>
            <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"]; ?>" />
        <?php endif; ?>

        <?php foreach ($arResult["SHOW_FIELDS"] as $FIELD): ?>
            <?php if ($FIELD == "AUTO_TIME_ZONE" && $arResult["TIME_ZONE_ENABLED"]): /* часовой пояс */ ?>
                <!-- код удален -->
                <?php continue; ?>
            <?php endif; ?>

            <div>
                <span>
                    <?= GetMessage('MAIN_REGISTER_'.$FIELD); /* очередное поле */ ?>
                    <?php if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>
                        <i>*</i> <!-- поле обязательно для заполнения -->
                    <?php endif; ?>
                </span>
                <span>
                    <?php if ($FIELD == "PASSWORD"): /* пароль */ ?>
                        <input type="password" name="REGISTER[<?= $FIELD; ?>]" value="<?= $arResult["VALUES"][$FIELD]; ?>"
                               autocomplete="off" />
                        <?php if ($arResult["SECURE_AUTH"]): /* безопасная авторизация */ ?>
                            <!-- код удален -->
                        <?php endif; ?>
                    <?php elseif ($FIELD == "CONFIRM_PASSWORD"): /* подтверждение пароля */ ?>
                        <input type="password" name="REGISTER[<?= $FIELD; ?>]" value="<?= $arResult["VALUES"][$FIELD]; ?>"
                               autocomplete="off" />
                    <?php elseif ($FIELD == "PERSONAL_GENDER"): /* пол: мужской, женский */ ?>
                        <select name="REGISTER[<?= $FIELD; ?>]">
                            <option value="">
                                <?= GetMessage('MAIN_REGISTER_USER_UNKNOWN'); ?>
                            </option>
                            <option value="M"<?= $arResult["VALUES"][$FIELD] == 'M' ? ' selected="selected"' : ''; ?>>
                                <?= GetMessage('MAIN_REGISTER_USER_MALE'); ?>
                            </option>
                            <option value="F"<?= $arResult["VALUES"][$FIELD] == 'F' ? ' selected="selected"' : ''; ?>>
                                <?= GetMessage('MAIN_REGISTER_USER_FEMALE'); ?>
                            </option>
                        </select>
                    <?php elseif (in_array($FIELD, array("PERSONAL_COUNTRY", "WORK_COUNTRY"))): /* страна проживания или работы */ ?>
                        <select name="REGISTER[<?= $FIELD; ?>]">
                        <?php foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value): ?>
                            <?php
                            $selected = ($value == $arResult["VALUES"][$FIELD]) ? ' selected="selected"' : '';
                            ?>
                            <option value="<?= $value; ?>"<?= $selected; ?>>
                                <?= $arResult["COUNTRIES"]["reference"][$key]; ?>
                            </option>
                        <?php endforeach; ?>
                        </select>
                    <?php elseif (in_array($FIELD, array("PERSONAL_PHOTO", "WORK_LOGO"))): /* личное фото */ ?>
                        <input type="file" name="REGISTER_FILES_<?= $FIELD; ?>" />
                    <?php elseif (in_array($FIELD, array("PERSONAL_NOTES", "WORK_NOTES"))): ?>
                        <textarea name="REGISTER[<?= $FIELD; ?>]">
                            <?= $arResult["VALUES"][$FIELD]; ?>
                        </textarea>
                    <?php elseif ($FIELD == "PERSONAL_BIRTHDAY"): /* дата рождения */ ?>
                        <small><?= $arResult["DATE_FORMAT"]; ?></small><br />
                        <input size="30" type="text" name="REGISTER[<?= $FIELD; ?>]"
                               value="<?= $arResult["VALUES"][$FIELD]; ?>" />
                        <?php
                        $APPLICATION->IncludeComponent(
                            'bitrix:main.calendar',
                            '',
                            array(
                                'SHOW_INPUT' => 'N',
                                'FORM_NAME' => 'regform',
                                'INPUT_NAME' => 'REGISTER[PERSONAL_BIRTHDAY]',
                                'SHOW_TIME' => 'N'
                            ),
                            null,
                            array("HIDE_ICONS"=>"Y")
                        );
                        ?>
                    <?php else: ?>
                        <input type="text" name="REGISTER[<?= $FIELD; ?>]"
                               value="<?= $arResult["VALUES"][$FIELD]; ?>" />
                    <?php endif; ?>
                </span>
            </div>
        <?php endforeach; ?>

        <?php /***** User properties *****/ ?>
        <?php if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"): ?>
            <h3>
            <?=
            empty($arParams["USER_PROPERTY_NAME"]) ? GetMessage("USER_TYPE_EDIT_TAB") : $arParams["USER_PROPERTY_NAME"];
            ?>
            </h3>
            <?php foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField): ?>
                <div>
                    <span>
                        <?= $arUserField["EDIT_FORM_LABEL"]; ?>
                        <?php if ($arUserField["MANDATORY"]=="Y"): ?>
                            <i>*</i> <!-- поле обязательно для заполнения -->
                        <?php endif; ?>
                    </span>
                    <span>
                        <?php
                        $APPLICATION->IncludeComponent(
                            "bitrix:system.field.edit",
                            $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                            array(
                                "bVarsFromForm" => $arResult["bVarsFromForm"],
                                "arUserField" => $arUserField,
                                "form_name" => "regform"
                                ),
                                null,
                                array("HIDE_ICONS"=>"Y")
                        );
                        ?>
                    </span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php /***** User properties *****/ ?>

        <?php if ($arResult["USE_CAPTCHA"] == "Y"): /* использовать CAPTCHA? */ ?>
            <div class="captcha">
                <h3><?= GetMessage('MAIN_REGISTER_CAPTCHA_TITLE'); ?></h3>
                <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"]; ?>" />
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"]; ?>"
                         width="180" height="40" alt="CAPTCHA" />
                <span>
                    <?= GetMessage('MAIN_REGISTER_CAPTCHA_HELP'); ?>
                    <i>*</i>
                </span>
                <span>
                    <input type="text" name="captcha_word" maxlength="50" value="" />
                </span>
            </div>
        <?php endif; ?>

        <div class="submit">
            <input type="submit" name="register_submit_button"
                   value="<?= GetMessage('MAIN_REGISTER_FORM_SUBMIT'); /* кнопка отправки формы */ ?>" />
        </div>

    </form>

    <p>
        <?= $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; /* предупреждение о min длине пароля */?>
    </p>
    <p>
        <i>*</i> <?= GetMessage('MAIN_REGISTER_REQUIRED'); /* Эти поля обязательны для заполнения */ ?>
    </p>

</div>
</div>