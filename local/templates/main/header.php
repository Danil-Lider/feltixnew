<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
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
</head>
<?$APPLICATION->ShowPanel()?>

<?
	
$page = $APPLICATION->GetCurPage();
$body_class = '';

if($page == '/faq/'){

	$body_class = 'faq-page';

}elseif ($page == '/dealers/') {
	
	$body_class = 'dealers-page';
}


// FOR LANG

// if(SITE_ID == 's2'){
// 	$lang = 'en';
// }else{
// 	$lang = 'ru';
// }
// echo SITE_ID;

?>
<body class="<?= $body_class?>">

	<style>
		.bx-core-popup-menu {
			z-index: 995000 !important;
		}
	</style>

	<div class="wrapper">

	<header class="header">
		<div class="container">
		    <div class="header__nav">
		        <a href="/" class="header__logo slideInUp">
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
		        </a>
		        <nav class="header-nav">
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
		        </nav>

		        <div class="header__lang slideInUp">


		        	
		        	<? if(SITE_ID == 's2'){ ?>

			      		<a href="/">RU</a>
			            <a class="active" href="/en/">EN</a>

		        	<? }else { ?>

		        		<a class="active" href="/">RU</a>
		            	<a href="/en/">EN</a>

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

