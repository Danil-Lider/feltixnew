<?
// require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// $APPLICATION->SetTitle("form");


define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$GLOBALS['APPLICATION']->RestartBuffer();

?>
<?
CModule::IncludeModule("iblock");
$PROP = array();

//debug($_REQUEST);

//echo "11111111111111111111111111111111111111111111";





  $comment = $_REQUEST['comment'];
  $number_dogovor = $_REQUEST['number_dogovor'];
  $password = $_REQUEST['password'];
  $name = trim($_REQUEST['product-name']);
  $price = $_REQUEST['product-price'];
  $count = $_REQUEST['product-count'];
  $user_name = $_REQUEST['name'];
  $phone = trim($_REQUEST['phone']);
  $product_kod = trim($_REQUEST['product-kod']);
  $email = trim($_REQUEST['email']);
  $work = trim($_REQUEST['work']);

  // SERVICES

  $service_name = trim($_REQUEST['service-name']);


  $PROP['phone'] = $phone;
  $PROP['password'] = $password;
  $PROP['number_dogovor'] = $number_dogovor;
  $PROP['comment'] = $comment;
  $PROP['modal_name'] = $_REQUEST['modal-name'];
  $PROP['name_product'] = $name;	
  $PROP['price'] = $price;
  $PROP['count'] = $count;
  $PROP['user_name'] = $user_name;
  $PROP['product_kod'] = $product_kod;
  $PROP['service_name'] = $service_name;
  $PROP['email'] = $email;
  $PROP['work'] = $work;

switch ($_REQUEST['modal-name']) {

	case 'Зарегистрироваться':
		
		$IBLOCK_ID = 21;

		if(!empty($name)){

			echo json_encode('<div>Спасибо !</div>');

		}else{
			echo json_encode('<div>Ошибка поле телефона не заполненно !</div>');
		}


		break;


	case 'заказать проект':
		
		$IBLOCK_ID = 22;

		if(!empty($name)){

			echo json_encode('<div>Спасибо !</div>');

		}else{
			echo json_encode('<div>Ошибка поле телефона не заполненно !</div>');
		}

		// if(!empty($phone)){

		// 	echo json_encode('<div>Спасибо !</div>');

		// }else{
		// 	echo json_encode('<div>Ошибка поле телефона не заполненно !</div>');
		// }


		break;

	default:

		$IBLOCK_ID = 48;

		if(!empty($phone)){

			echo json_encode('<div>Спасибо !</div>');

		}else{
			echo json_encode('<div>Ошибка поле телефона не заполненно !</div>');
		}
		

		//  если не равно одним из них то все формы сюда



		# code...
		break;
}



if(empty($user_name)){
	$user_name = $number_dogovor;
}


$mailFields = array('TYPE'=>$_REQUEST['modal-name'], 'NAME' => $user_name, 'PHONE' => $phone, 'MAIL' => $email, 'COMMENT' => $comment);


/* дальше используем метод CEvent::Send() или CEvent::SendImmediate()*/

CEvent::Send('FROM_FORM_USLIGY', 's1', $mailFields, 'N', 51);


$el = new CIBlockElement;

// $PROP = array();
// $PROP[12] = "Белый";  // свойству с кодом 12 присваиваем значение "Белый"
// $PROP[3] = 38;        // свойству с кодом 3 присваиваем значение 38

$arLoadProductArray = Array(
  "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
  "IBLOCK_SECTION_ID" => 0,          // элемент лежит в корне раздела
  "IBLOCK_ID"      => $IBLOCK_ID,
  "PROPERTY_VALUES"=> $PROP,
  "NAME"           => $user_name . ':' . $phone ,
  "ACTIVE"         => "Y",            // активен
  "PREVIEW_TEXT"   => "",
  "DETAIL_TEXT"    => "",
  "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/image.gif")
  );

if($PRODUCT_ID = $el->Add($arLoadProductArray)){
  echo json_decode("New ID: ".$PRODUCT_ID);
}
else{
  echo json_decode("Error: ".$el->LAST_ERROR);
}


?>
