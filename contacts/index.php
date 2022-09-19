<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>




<div class="main">
<section class="contacts">
    <div class="container">
        <h1 class="contacts__title slideInUp"><?$APPLICATION->ShowTitle(false);?></h1>
        <div class="contacts__wrap slideInUp">
            <div class="contacts__item">
                <div class="contacts-phones">
                <span>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "include/inc_contacts_phone_1.php"
                        )
                    );?>
                </span>
                    
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "include/inc_contacts_phone.php"
                        )
                    );?>
                    
                </div>
                <div class="contacts-emails">
                <span>
                    E-mail:
                </span>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "include/inc_contacts_mail.php"
                        )
                    );?>
                </div>
            </div>
            <div class="contacts__item">
                <div class="contacts-address">
                <span>
                   <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "include/inc_contacts_addres_name.php"
                        )
                    );?>
                </span>
                    <p>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "include/inc_contacts_addres.php"
                            )
                        );?>
                    </p>
                </div>
            </div>
            <div class="contacts__item">
                <div class="contacts-address">
                <span>
                     <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "include/inc_contacts_addres_name2.php"
                        )
                    );?>
                </span>
                    <p>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "include/inc_contacts_addres2.php"
                            )
                        );?>
                        
                    </p>
                </div>
            </div>
        </div>
        <div class="form-wrap slideUp-veryslow">
            <h2>Заявка на доступ в кабинет для архитекторов и дилеров</h2>
            <form action="#" class="form">
                <input 
                type="text" 
                class="form-input"
                name="name" 
                required 
                placeholder="Имя">
                <input 
                type="text" 
                class="form-input"
                name="work" 
                required 
                placeholder="Род занятий">
                <input 
                type="email"
                class="form-input"
                name="email" 
                required 
                placeholder="e-mail">
                <button type="submit" class="form-btn btn">Отправить</button>
            </form>
        </div>
    </div>
</section>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>