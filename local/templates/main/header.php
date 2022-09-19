<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html>
<head>
<?$APPLICATION->ShowHead();?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FELTIX</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="author">
    <meta name="image" content="public/images/favicon.ico">
    <link rel="icon" href="<?= SITE_TEMPLATE_PATH?>/public/images/favicon.ico">
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH?>/public/images/favicon.ico">
    <link rel="canonical" href="https://example.com">
    <!-- Использование внешних русурсов -->
    <link rel="preconnect" href="//fonts.gstatic.com">
    <link rel="preconnect" href="//cdnjs.cloudflare.com">
    <link rel="preconnect" href="//google-analytics.com">

    <meta name="msapplication-TileImage" content="./images/">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <meta name="apple-mobile-web-app-title" content="название">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH?>/public/css/app.css">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH?>/public/css/integration_css.css">

	<title><?$APPLICATION->ShowTitle()?></title>

	<script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
</head>




<?$APPLICATION->ShowPanel()?>

<?
	
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


$page = $APPLICATION->GetCurPage();
$body_class = '';

if($page == '/faq/' || $page == '/en/faq/'){

	$body_class = 'faq-page';

}elseif ($page == '/dealers/' || $page == '/en/dealers/') {
	
	$body_class = 'dealers-page';
}
elseif ($page == '/auth/') {
	
	// $body_class = 'dealers-page';
	// $style = 'body.dealers-page:after {z-index:-1;}';
}
elseif ($page == '/close/') {
	
	$body_class = 'close';	
	// $style = 'body.dealers-page:after {z-index:-1;}';
}


// close


// FOR LANG

// if(SITE_ID == 's2'){
// 	$lang = 'en';
// }else{
// 	$lang = 'ru';
// }
// echo SITE_ID;

?>


<style type="text/css">
    
.single-product__desc {
    color: black;
}

</style>

<body class="<?= $body_class?>">



	<div class="modal order-project" id="order-project" tabindex="-1" aria-labelledby="order-project" aria-hidden="true" style="display: none;">
	   <div class="modal-dialog">
	      <div class="modal-content">
	         <div class="modal__close" data-dismiss="modal" aria-label="Close">
	            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
	               <path d="M1 1.5L15 15.5M1 15.5L15 1.5" stroke="#C2C2C2" stroke-width="2" stroke-linecap="round"></path>
	            </svg>
	         </div>

	         <div class="modal__open">
	            <form class="modal__form form-query">

	               <input type="hidden" name="modal-name" value="Заказ услуги">
	               <input class="input-service-name" type="hidden" name="service-name" value="Замена масла в автоматической и механической трансмиссиях">

	               <div class="modal__title">Заказать проект</div>
	               <div class="modal__field">

	                    <div class="form__label mt30">
	                        <input type="text" name="name" placeholder="Иван Караченский" value="">
	                    </div>

	                    <div class="form__label mt30">
	                        <input type="text" name="phone" placeholder="+7(___)-___-__-__" value="" inputmode="text">
	                    </div>

	                    <textarea class="input textarea" name="comment" id="" cols="30" rows="10" placeholder="Сообщение"></textarea>

	                
	               </div>
	               <div class="modal__btn">
	                  <button class="btn btn-blue" type="submit">Отправить</button>
	               </div>
	            </form>
	         </div>

	         <div class="modal__thanks" style="display: none;">
	                <img src="/images/form-fanks.png" class="modal__thanks-img">
	                <div class="modal__thanks-title">Благодарим за заявку!</div>
	                <div class="modal__thanks-text">
	                   В течение 15 минут с Вами свяжется наш менеджер и уточнит все детали покупки данного товара!
	                </div>
	                <div class="modal__btn">
	                   <button class="btn btn-blue" data-dismiss="modal" type="submit">Продолжить</button>
	                </div>
	         </div>

	      </div>
	   </div>
	</div>







<script type="text/javascript">

$(document).ready(function() {

	
    $(document).on('click', '.about-page__sidebar-btn', function (e) {

        // e.preventDefault();



        // var title = $(this).data('modal-name');
        // var modal_name = $(this).data('modal-name');
        // console.log(modal_name)
        $('#order-project .modal__thanks').hide()
        $('#order-project').show()

    })







    $(document).on('click', '.modal__thanks .modal__btn .btn', function (e) {
        $( ".modal" ).hide();
    })


    $(document).on('click', '.modal__close', function(e){
        var $this = $(this);
        $this.parent().parent().parent().hide();
    })


    $(document).on('click', '.modal', function(e){
      
        var $this = $(this)

        var div = $( ".modal-dialog" );

        // if ( !div.is(e.target) // если клик был не по нашему блоку
        //     && div.has(e.target).length === 0 ) { // и не по его дочерним элементам
        //   $(this).hide(); // скрываем его
        // }

        var modal_close = $(this).find('.modal__close');


        modal_close.click(function (e) {

          $this.hide()
          
        })
        // console.log(modal_close)

    })

})
</script>


<style>
.modal {
	position: fixed;
	top: 0;
	left: 0;
	z-index: 10500;
	display: none;
	width: 100%;
	height: 100%;
	overflow: hidden;
	outline: 0;
	background-color: rgb(0 0 0 / 70%);
}

.modal .modal-dialog {
    max-width: 32.875rem;
    background: white;
}

@media (min-width: 576px){
    .modal-dialog {
          max-width: 500px;
          margin: 1.75rem auto;
    }
}


.modal-dialog {
    position: relative;
    width: auto;
    margin: 0.5rem;
    pointer-events: none;
    margin: 1.75rem auto;
}


.modal .modal-dialog .modal-content {
    position: relative;
    padding: 2.8125rem;
    border-radius: 0;
    border: none;
}


.modal-content {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    position: absolute;
    right: 1.25rem;
    top: 1.25rem;
}

.modal__title {
    font-family: bebasneueregular,sans-serif;
    text-transform: uppercase;
    font-size: 1.875rem;
    margin-bottom: 2.1875rem;
    line-height: 1.5;
}

.modal input {
    height: 3.5rem;
    padding: 1.25rem 1.5625rem;
    font-size: 1rem;
    border-radius: 0;
    border: 1px solid #dfdfdf;
    -webkit-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
}

.modal .modal-content input {
    display: block;
    margin-bottom: 1.25rem;
    width: 100%;
}



.modal .modal-content .btn {
    margin-top: 0.625rem;
    width: 100%;
}

[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}

.modal .btn {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    letter-spacing: .14em;
    height: 3.5rem;
    cursor: pointer;
    font-family: BebasNeueCyrillic,sans-serif;
    display: inline-block;
    font-size: 1.125rem;
    line-height: 1.45rem;
    text-transform: uppercase;
    text-align: center;
    color: #fff;
    border: none;
    background-color: #f21530;
    padding: 0.9375rem 2.5rem;
    -webkit-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
}

.modal .btn-blue {
    background-color: #0071bc;
}

.modal .modal-dialog .modal-content .input {
    display: block;
    margin-bottom: 1.25rem;
    width: 100%;
}

.modal .textarea {
    height: 9.375rem;
}

.modal textarea {
    overflow: auto;
    resize: vertical;
    border-radius: 0;
    border: 1px solid #dfdfdf;
}

.modal__thanks {
    margin-right: 1.25rem;
    text-align: center;
}

.modal__thanks-img {
    margin-bottom: 1.25rem;
}

.modal__thanks-title {
    text-transform: uppercase;
    font-family: BebasNeueCyrillic,sans-serif;
    font-size: 1.875rem;
    margin-bottom: 0.3125rem;
}

.modal__thanks-text {
    display: inline-block;
    width: 21.875rem;
    font-family: Ubuntu-Light,sans-serif;
    font-size: 1rem;
    color: #9aa8b2;
    margin-bottom: 1.875rem;
}

@media (max-width: 998.98px) {
    .left__menu-ul li a {
        width: 100%;
     /* color: black;
      font-weight: 700;
      padding: 20px 80px 20px 20px;
      display: block;
      font-size: 14px;
      white-space: nowrap;*/
    }

    .image__container-full img {
        width: 100%;
    }

    .voprosi .services__text {
      height: inherit;
    }

    .modal-content {
      width: inherit;
    }

   /* .modal .modal-dialog .modal-content {
      padding: 1.8125rem;
    }    

    .modal .modal-dialog {
      max-width: 21.875rem;
    }*/
}  


@media (max-width: 576px){

    .modal .modal-dialog .modal-content {
      padding: 1.8125rem;
    }    

    .modal .modal-dialog {
      max-width: 21.875rem;
    }

    #Vins {
      min-width: 320px !important;
    }

}
.bx-core-popup-menu {
z-index: 995000 !important;
}
#bx-admin-prefix {
	z-index: 100000 !important;
}
<?= $style?>
</style>

	<div class="wrapper">

	<header class="header">
		<div class="container">
		    <div class="header__nav">
		        <a href="<?= $GLOBALS['lang'] ? $GLOBALS['lang'] : '/'; ?>" class="header__logo slideInUp">

		        	<? if($page == '/close/'){ ?>

		        		<svg width="192" height="38" viewBox="0 0 192 38" fill="none" xmlns="http://www.w3.org/2000/svg">
		                    <path d="M0 38V0H34.8113V4.47401H4.35849V16.7339H32.0943V21.208H4.35849V37.9419H0V38Z" fill="black"></path>
		                    <path d="M44.8868 4.47401V16.7339H75.3396V21.208H44.8868V33.4679H75.3396V37.9419H40.5283V0H75.3396V4.47401H44.8868Z" fill="black"></path>
		                    <path d="M112.811 38H82.3584V0H86.7169V33.526H112.811V38Z" fill="black"></path>
		                    <path d="M141.51 4.47401H126.283V38H121.925V4.47401H106.698V0H141.51V4.47401Z" fill="black"></path>
		                    <path d="M170.83 19L192 38H185.377L167.49 21.9633L149.604 38H142.981L164.151 19L143.038 0H149.66L167.547 16.0367L185.377 0H192L170.83 19Z" fill="black"></path>
		                </svg>

		        	<? }else{ ?>


		            <svg width="192" height="38" viewBox="0 0 192 38" fill="none" xmlns="http://www.w3.org/2000/svg">
		                <path d="M0 38V0H34.8113V4.47401H4.35849V16.7339H32.0943V21.208H4.35849V37.9419H0V38Z" fill="white" />
		                <path
		                        d="M44.8868 4.47401V16.7339H75.3396V21.208H44.8868V33.4679H75.3396V37.9419H40.5283V0H75.3396V4.47401H44.8868Z"
		                        fill="white" />
		                <path d="M112.811 38H82.3584V0H86.7169V33.526H112.811V38Z" fill="white" />
		                <path d="M141.51 4.47401H126.283V38H121.925V4.47401H106.698V0H141.51V4.47401Z" fill="white" />
		                <path
		                        d="M170.83 19L192 38H185.377L167.49 21.9633L149.604 38H142.981L164.151 19L143.038 0H149.66L167.547 16.0367L185.377 0H192L170.83 19Z"
		                        fill="white" />
		            </svg>

		            <? } ?>

		        </a>
		        <nav class="header-nav">

		        	<? if($page == '/close/'){ ?>


		        		<?
		        		$APPLICATION->IncludeComponent(
			                "bitrix:menu",
			                "footer-menu",
			                Array(
			                    "ALLOW_MULTI_SELECT" => "N",
			                    "CHILD_MENU_TYPE" => "left",
			                    "DELAY" => "N",
			                    "MAX_LEVEL" => "1",
			                    "MENU_CACHE_GET_VARS" => array(0=>"",),
			                    "MENU_CACHE_TIME" => "3600",
			                    "MENU_CACHE_TYPE" => "N",
			                    "MENU_CACHE_USE_GROUPS" => "Y",
			                    "ROOT_MENU_TYPE" => "top",
			                    "USE_EXT" => "N"
			                )
			            );?>

		        	<? }else{ ?>

			        	<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"header-menu",
							Array(
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "left",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => array(0=>"",),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "N",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE" => "top",
								"USE_EXT" => "N"
							)
						);?>

					<? } ?>
		        </nav>

		        <div class="header__lang slideInUp">


		        	
		        	<? if(SITE_ID == 's2'){ ?>


		        		<?

		        		$url = str_replace('en/', '', $url);


		        		?>

			      		<a href="<? echo $url; ?>">RU</a>
			            <a class="active" href="/en/">EN</a>

		        	<? }else { ?>

		        		<?

		        			$url_en = $_SERVER['REQUEST_URI'];
							$url_en = explode('?', $url_en);
							$url_en = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/en' . $url_en[0];

							// debug($url);

		        		?>

		        		<a class="active" href="<?= $url?>">RU</a>
		            	<a href="<?= $url_en?>">EN</a>

		        	<? } ?>

		        </div>
		        <div class="barsContainer">
		            <div class="bars">
		                <span></span>
		                <span></span>
		                <span></span>
		            </div>
		            <div class="nav-overlay"></div>
		        </div>
		    </div>
		</div>
	</header>



<?if($USER->IsAdmin()):?>
<?endif?>

<? if($page == '/auth/'){ ?>

<!-- 	<div style="margin-top: 5rem;" class="about">
		<div class="container">
	 -->

<? } ?>