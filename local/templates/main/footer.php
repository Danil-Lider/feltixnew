</main>

<footer class="footer animated">
    <div class="container">
        <div class="footer-wrap">
            <a href="index.php" class="footer__logo">
                <svg width="192" height="38" viewBox="0 0 192 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 38V0H34.8113V4.47401H4.35849V16.7339H32.0943V21.208H4.35849V37.9419H0V38Z"
                          fill="black"/>
                    <path d="M44.8868 4.47401V16.7339H75.3396V21.208H44.8868V33.4679H75.3396V37.9419H40.5283V0H75.3396V4.47401H44.8868Z"
                          fill="black"/>
                    <path d="M112.811 38H82.3584V0H86.7169V33.526H112.811V38Z" fill="black"/>
                    <path d="M141.51 4.47401H126.283V38H121.925V4.47401H106.698V0H141.51V4.47401Z" fill="black"/>
                    <path d="M170.83 19L192 38H185.377L167.49 21.9633L149.604 38H142.981L164.151 19L143.038 0H149.66L167.547 16.0367L185.377 0H192L170.83 19Z"
                          fill="black"/>
                </svg>
            </a>
            <?$APPLICATION->IncludeComponent(
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
        </div>
        <div class="footer-copyrights">
            <p>
                © FELTIX, 2022
            </p>
        </div>
    </div>
</footer>
<script src="<?= SITE_TEMPLATE_PATH?>/public/js/lightgallery.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH?>/public/js/swiper.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH?>/public/js/script.js"></script>
</div>
</body>
</html>