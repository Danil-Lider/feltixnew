<?php


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