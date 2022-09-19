<?php

// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);


$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler('landing', 'onHookExec',
   function(\Bitrix\Main\Event $event)
   {
      $result = new \Bitrix\Main\Entity\EventResult;

      $result->modifyFields([ 
         'ThemeFonts' => function(/** @var \Bitrix\Landing\Hook\Page $hook */ $hook)
         {	
             \Bitrix\Landing\Manager::setPageView(
                'ThemeFonts', 
              '' 
             );


              //обязательно вернуть true, если НЕ требуется выполнение системного
            return true;
         }
      ]);

      return $result;
   }
);


function debug($item){
    echo "<pre>";
    print_r($item);
    echo "</pre>";
}

function convert_bytes($size)
{
  $i = 0;
  while (floor($size / 1024) > 0) {
    ++$i;
    $size /= 1024;
  }
 
  $size = str_replace('.', ',', round($size, 1));
  switch ($i) {
    case 0: return $size .= ' байт';
    case 1: return $size .= ' КБ';
    case 2: return $size .= ' МБ';
  }
}


if(SITE_ID == 's2'){

    $lang = '/en';

}else{

    $lang = '';
}

$GLOBALS['lang'] = $lang;



// ДЕЛАЕМ ПОЛЬЗОВАТЕЛЕЙ НЕАТИВНЫМИ

AddEventHandler("main", "OnBeforeUserRegister", Array("MyClass", "OnBeforeUserRegisterHandler"));class MyClass
{
   function OnBeforeUserRegisterHandler(&$arFields)
    {
        $arFields["ACTIVE"] = "N";
           
    }
}



function array_to_string($array) {
    ob_start();
    var_dump($array);
    return ob_get_clean();
}


AddEventHandler("main", "OnAfterUserUpdate", Array("MyClassNew", "OnAfterUserUpdateHandler"));

class MyClassNew
{
    // создаем обработчик события "OnAfterUserUpdate"
    function OnAfterUserUpdateHandler(&$arFields)
    {
        if($arFields["RESULT"]){

          if($arFields['ACTIVE'] == 'Y'){

              AddMessage2Log("Запись с EMAIL ".$arFields." изменена.");
              $to      = $arFields["EMAIL"];
              $subject = 'Ваш аккаунт теперь активный !';
              //$message = '<pre>' . array_to_string($arFields) . '</pre>';
              $message = 'Ваш аккаунт теперь активный ! ссылка на закрытый доступ: http://ksburo.beget.tech/close/';
              $headers = 'From: webmaster@example.com' . "\r\n" .
                  'Reply-To: webmaster@example.com' . "\r\n" .
                  'X-Mailer: PHP/' . phpversion();

              mail($to, $subject, $message, $headers);

          }


        }else{

            AddMessage2Log("Ошибка изменения записи ".$arFields["ID"]." (".$arFields["RESULT_MESSAGE"].").");
        }
            // AddMessage2Log("Запись с кодом ".$arFields["ID"]." изменена.");
    }
}